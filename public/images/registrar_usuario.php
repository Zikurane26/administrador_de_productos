<?php
require 'vendor/autoload.php';
use MongoDB\Client;

$uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/?retryWrites=true&w=majority&tls=true';

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

try {
    $client = new Client($uri);
    $database = $client->selectDatabase('test_db');
    $usuarios = $database->selectCollection('usuarios');

    // Verifica si el usuario ya existe
    $existe = $usuarios->findOne(['usuario' => $usuario]);
    if ($existe) {
        echo "<script>alert('El usuario ya existe.'); window.location='register.php';</script>";
        exit();
    }

    // Hashea la contraseña antes de guardar
    $hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Inserta el nuevo usuario
    $usuarios->insertOne([
        'usuario' => $usuario,
        'contrasena' => $hash
    ]);

    echo "<script>alert('Usuario registrado correctamente'); window.location='login.php';</script>";
} catch (Exception $e) {
    echo "<h3>Error al registrar:</h3>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
?>
