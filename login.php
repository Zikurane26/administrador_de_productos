<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Administrador de Productos</title>
  <style>
    /* 🌆 Fondo con gradiente elegante */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #007bff, #00c6ff);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    /* 🧩 Contenedor principal */
    .login-container {
      background: #ffffff;
      padding: 2.5rem;
      border-radius: 15px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
      width: 350px;
      text-align: center;
      transition: all 0.3s ease;
    }

    .login-container:hover {
      transform: translateY(-5px);
    }

    /* 🖼️ Imagen o logo */
    .login-container img {
      width: 100px;
      margin-bottom: 1rem;
    }

    h2 {
      color: #333;
      margin-bottom: 1.5rem;
    }

    label {
      display: block;
      text-align: left;
      margin-bottom: 5px;
      font-weight: bold;
      color: #555;
    }

    input {
      display: block;
      margin-bottom: 1.2rem;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      transition: border-color 0.3s;
    }

    input:focus {
      border-color: #007bff;
      outline: none;
    }

    button {
      width: 100%;
      padding: 10px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s;
    }

    button:hover {
      background: #0056b3;
    }

    a {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      color: #007bff;
      font-size: 14px;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <div class="login-container">
    <!-- 🔹 Aquí va tu imagen -->
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo del sistema">

    <h2>Iniciar sesión</h2>

    <form method="POST" action="validar_login.php">
      <label>Usuario:</label>
      <input type="text" name="usuario" required>

      <label>Contraseña:</label>
      <input type="password" name="contrasena" required>

      <button type="submit">Ingresar</button>
    </form>

    <!-- Enlace al registro -->
    <a href="registrar.php">¿No tienes cuenta? Regístrate aquí</a>
  </div>

</body>
</html>
