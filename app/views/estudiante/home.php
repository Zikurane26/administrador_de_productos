<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel del Estudiante</title>
</head>
<body>
  <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); var_dump($_SESSION['usuario']); ?> 👋</h1>
  <a href="logout.php">Cerrar sesión</a>
  <hr>

  <?php
  require 'vendor/autoload.php';
  use MongoDB\Client;

  $uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/?retryWrites=true&w=majority&tls=true';
  $client = new Client($uri);
  $database = $client->selectDatabase('test_db');
  $collection = $database->selectCollection('usuarios');

  $cursor = $collection->find();

  echo "<h3>Datos BD</h3><ul>";
  foreach ($cursor as $doc) {
      echo "<li>" . htmlspecialchars(json_encode($doc)) . "</li>";
  }
  echo "</ul>";
  ?>
  
  <h1>👋 Bienvenido Estudiante, <?= htmlspecialchars($usuario['nombre']); var_dump($_SESSION['usuario']);?></h1>
  <a href="/public/index.php?controller=Auth&action=logout">Cerrar sesión</a>
  <hr>

  <h2>Ingresar código de asistencia</h2>
  <form action="/public/index.php?controller=estudiante&action=marcarAsistencia" method="POST">
      <label for="codigo">Código de lista:</label>
      <input type="text" name="codigo" id="codigo" required>
      <button type="submit">Marcar asistencia</button>
  </form>
</body>
</html>
