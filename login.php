<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Administrador de Productos</title>

  <!-- Íconos (Font Awesome) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Tu hoja de estilos -->
  <link rel="stylesheet" href="estilos_login.css">
</head>
<body>
  <div class="login-container">
    <img src="logo.png" alt="Logo" class="logo"> <!-- Puedes cambiar o borrar esta línea -->

    <h2>Iniciar sesión</h2>

    <form method="POST" action="validar_login.php">
      <div class="input-group">
        <i class="fa-solid fa-user"></i>
        <input type="text" name="usuario" placeholder="Usuario" required>
      </div>

      <div class="input-group">
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
      </div>

      <button type="submit">Ingresar</button>

      <a href="registrar.php" class="register-link">¿No tienes cuenta? Regístrate aquí</a>
    </form>
  </div>
</body>
</html>
