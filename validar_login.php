<?php
session_start();
require 'vendor/autoload.php';

use MongoDB\Client;

// Conexión a MongoDB Atlas
$uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/?retryWrites=true&w=majority&tls=true';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

try {
    $client = new Client($uri);
    $database = $client->selectDatabase('test_db');
    $usuarios = $database->selectCollection('usuarios');

    // Buscar usuario por nombre
    $user = $usuarios->findOne(['usuario' => $usuario]);

    if ($user && $user['contrasena'] === $contrasena) {
        // Iniciar sesión
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        exit();
    } else {
        echo "<script>alert('Usuario o contraseña incorrectos'); window.location='login.php';</script>";
    }

} catch (Exception $e) {
    echo "<h3>Error al conectar con MongoDB:</h3>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
?>
