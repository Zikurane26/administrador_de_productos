<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel del Profesor</title>
</head>
<body>
  <h1>👋 Bienvenido Profesor, <?= htmlspecialchars($usuario['nombre']) ?></h1>
  <a href="/public/index.php?controller=Auth&action=logout">Cerrar sesión</a>
  <hr>
  
  <h2>Crear lista de asistencia</h2>
  <form action="/public/index.php?controller=profesor&action=crearLista" method="POST">
      <button type="submit">Generar código de asistencia</button>
  </form>

  <hr>
  <a href="/public/index.php?controller=profesor&action=verListas">Ver listas creadas</a>
</body>
</html>
