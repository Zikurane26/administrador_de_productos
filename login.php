<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Administrador de Productos</title>

  <!-- Fuente e iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Estilos -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form class="login-container" method="POST" action="validar_login.php">
    <!-- Logo tipo ícono grande -->
    <div class="logo-icon">
      <i class="fa-solid fa-user-circle"></i>
    </div>

    <h2>Iniciar sesión</h2>

    <div class="input-group">
      <i class="fa fa-user"></i>
      <input type="text" name="usuario" placeholder="Usuario" required>
    </div>

    <div class="input-group">
      <i class="fa fa-lock"></i>
      <input type="password" name="contrasena" placeholder="Contraseña" required>
    </div>

    <button type="submit">Ingresar</button>

    <a href="registrar.php">¿No tienes cuenta? Regístrate aquí</a>
  </form>
</body>
</html>
