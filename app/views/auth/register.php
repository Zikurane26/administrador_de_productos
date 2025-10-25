<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar usuario</title>
  <link rel="stylesheet" href="/public/css/register.css"> <!-- puedes renombrarlo luego a register.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

  <div class="register-container">
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo del sistema">

    <h2>Crear nueva cuenta</h2>

    <!-- Mostrar mensaje de error o éxito -->
    <?php if (isset($error)): ?>
      <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php elseif (isset($success)): ?>
      <p style="color:green;"><?php echo htmlspecialchars($success); ?></p>
    <?php endif; ?>

    <form method="POST" action="/public/index.php?controller=Auth&action=register">

      <div class="input-group">
        <i class="fa-solid fa-user-plus"></i>
        <input type="text" name="usuario" placeholder="Usuario" required>
      </div>

      <div class="input-group">
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
      </div>

      <div class="input-group">
        <i class="fa-solid fa-check-double"></i>
        <input type="password" name="confirmar_contrasena" placeholder="Confirmar contraseña" required>
      </div>

      <div class="input-group">
        <i class="fa-solid fa-id-badge"></i>
        <select name="rol" required>
          <option value="">Selecciona tu rol</option>
          <option value="profesor">Profesor</option>
          <option value="estudiante">Estudiante</option>
        </select>
      </div>

      <button type="submit">Registrar</button>
    </form>

    <a href="/public/index.php?controller=Auth&action=login">¿Ya tienes cuenta? Inicia sesión aquí</a>
  </div>

</body>
</html>
