<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel del Estudiante</title>
</head>
<body>
  <h1>👋 Bienvenido Estudiante, <?= htmlspecialchars($usuario['nombre']) ?></h1>
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
