<?php
session_start();
require 'vendor/autoload.php';

use MongoDB\Client;

// Conexión a MongoDB Atlas
$uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/?retryWrites=true&w=majority&tls=true';

$usuario_ingresado = $_POST['usuario'];
$contrasena_ingresada = $_POST['contrasena']; // Contraseña en texto plano

try {
    $client = new Client($uri);
    $database = $client->selectDatabase('test_db');
    $usuarios = $database->selectCollection('usuarios');

    // 1. Buscar usuario por nombre
    $user = $usuarios->findOne(['usuario' => $usuario_ingresado]);

    // 2. Usar password_verify() para comparar la contraseña ingresada con el hash guardado
    // ¡Esta es la corrección crucial!
    if ($user && password_verify($contrasena_ingresada, $user['contrasena'])) {
        // Iniciar sesión
        $_SESSION['usuario'] = $usuario_ingresado;
        header('Location: index.php');
        exit();
    } else {
        // Falló el login (usuario no existe o contraseña incorrecta)
        echo "<script>alert('Usuario o contraseña incorrectos'); window.location='login.php';</script>";
    }

} catch (Exception $e) {
    echo "<h3>Error al conectar con MongoDB:</h3>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
?>
