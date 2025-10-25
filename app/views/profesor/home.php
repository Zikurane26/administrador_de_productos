<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel del Profesor</title>
  <link rel="stylesheet" href="/public/css/profesor.css">
</head>
<body>
  <h1>👨‍🏫 Bienvenido, <?= htmlspecialchars($_SESSION['nombre']) ?></h1>
  <a href="/public/index.php?controller=Auth&action=logout">Cerrar sesión</a>
  <hr>

  <!-- Sección de código de asistencia -->
  <h2>Código de asistencia</h2>

  <?php if (!empty($codigo_asistencia)): ?>
      <p>Código actual: <span class="codigo"><?= htmlspecialchars($codigo_asistencia) ?></span></p>
  <?php else: ?>
      <p>No hay código activo actualmente.</p>
  <?php endif; ?>

  <form method="post" action="/public/index.php?controller=Asistencia&action=generarCodigo">
      <button type="submit" class="boton">Generar nuevo código</button>
  </form>

  <hr>

  <!-- Tabla de usuarios -->
  <h2>Usuarios registrados</h2>
  <?php if (!empty($usuarios)): ?>
      <table>
          <tr>
              <th>ID</th>
              <th>Usuario</th>
              <th>Rol</th>
          </tr>
          <?php foreach ($usuarios as $user): ?>
              <tr>
                  <td><?= htmlspecialchars($user['_id']) ?></td>
                  <td><?= htmlspecialchars($user['usuario']) ?></td>
                  <td><?= htmlspecialchars($user['rol']) ?></td>
              </tr>
          <?php endforeach; ?>
      </table>
  <?php else: ?>
      <p>No hay usuarios registrados.</p>
  <?php endif; ?>
</body>
</html>
