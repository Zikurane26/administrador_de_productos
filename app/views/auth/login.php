<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar-Sesion</title>

  <!-- 🔹 Íconos de Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <link rel="stylesheet" href="/public/css/login.css">
  </head>
<body>

  <div class="login-container">
    <!-- 🧠 Logo -->
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo del sistema">

    <h2>Iniciar sesión</h2>
    <?php if (isset($error)): ?>
        <p style="color: red; font-weight: bold;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>


    <form method="POST" action="/public/index.php?controller=Auth&action=login">
      <!-- 👤 Usuario -->
      <div class="input-group">
        <i class="fa-solid fa-user"></i>
        <input type="text" name="usuario" placeholder="Usuario" required>
      </div>

      <!-- 🔒 Contraseña -->
      <div class="input-group">
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
      </div>

      <button type="submit">Ingresar</button>
    </form>

    <!-- 🔗 Enlace al registro -->
    <a href="/public/index.php?controller=Auth&action=register">¿No tienes cuenta? Regístrate aquí</a>
  </div>

</body>
</html>