<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Panel del Profesor</title>
</head>
<body>
  <h1>👨‍🏫 Bienvenido, <?= htmlspecialchars($_SESSION['nombre']) ?></h1>
  <a href="/public/index.php?controller=Auth&action=logout">Cerrar sesión</a>
  <hr>

  <h2>Usuarios registrados</h2>
  <?php if (!empty($usuarios)): ?>
      <table border="1" cellpadding="5">
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
