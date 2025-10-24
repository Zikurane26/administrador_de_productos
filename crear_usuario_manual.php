<?php
require 'vendor/autoload.php';
use MongoDB\Client;

$uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/?retryWrites=true&w=majority&tls=true';
$client = new Client($uri);
$db = $client->selectDatabase('test_db');
$usuarios = $db->selectCollection('usuarios');

$usuario = "nuevo_admin";
$contraseña_plana = "12345";
$hash = password_hash($contraseña_plana, PASSWORD_DEFAULT);

$usuarios->insertOne([
  'usuario' => $usuario,
  'contrasena' => $hash
]);

echo "Usuario '$usuario' creado correctamente con hash: $hash\n";
