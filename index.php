<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Administrador de Productos</title>
</head>
<body>
  <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> 👋</h1>
  <a href="logout.php">Cerrar sesión</a>
  <hr>

  <?php
  require 'vendor/autoload.php';
  use MongoDB\Client;

  $uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/?retryWrites=true&w=majority&tls=true';
  $client = new Client($uri);
  $database = $client->selectDatabase('test_db');
  $collection = $database->selectCollection('test_collection');

  $cursor = $collection->find();

  echo "<h3>Datos BD</h3><ul>";
  foreach ($cursor as $doc) {
      echo "<li>" . htmlspecialchars(json_encode($doc)) . "</li>";
  }
  echo "</ul>";
  ?>
</body>
</html>
