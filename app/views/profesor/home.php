<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel del Profesor</title>
</head>
<body>
  <h1>Bienvenido Profesor, <?php echo htmlspecialchars($_SESSION['usuario']); var_dump($_SESSION['usuario']); ?> 👋</h1>
  <a href="/public/index.php?controller=Auth&action=logout">Cerrar sesión</a>
  <hr>

  <h1>Lista de Usuarios</h1>

  <table border="1" cellpadding="8">
      <thead>
          <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Usuario</th>
              <th>Rol</th>
          </tr>
      </thead>
      <tbody>
          <?php foreach ($usuarios as $usuario): ?>
              <tr>
                  <td><?= htmlspecialchars($usuario['id']) ?></td>
                  <td><?= htmlspecialchars($usuario['nombre']) ?></td>
                  <td><?= htmlspecialchars($usuario['usuario']) ?></td>
                  <td><?= htmlspecialchars($usuario['rol']) ?></td>
              </tr>
          <?php endforeach; ?>
      </tbody>
  </table>

  
  <h2>Crear lista de asistencia</h2>
  <form action="/public/index.php?controller=profesor&action=crearLista" method="POST">
      <button type="submit">Generar código de asistencia</button>
  </form>

  <hr>
  <a href="/public/index.php?controller=profesor&action=verListas">Ver listas creadas</a>
</body>
</html>
