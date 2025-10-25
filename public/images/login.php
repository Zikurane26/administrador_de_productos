<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar-Sesion</title>

  <!-- 🔹 Íconos de Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* 🌈 Fondo animado con gradiente */
    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #007bff, #00c6ff, #4facfe);
      background-size: 300% 300%;
      animation: gradientMove 8s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      padding: 1rem;
      transition: background 0.5s ease;
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* 🧩 Contenedor principal */
    .login-container {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      padding: 2.5rem;
      border-radius: 18px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
      width: 100%;
      max-width: 360px;
      text-align: center;
      transition: all 0.4s ease;
      animation: fadeIn 1s ease;
    }

    .login-container:hover {
      transform: translateY(-6px);
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* 🖼️ Logo */
    .login-container img {
      width: 95px;
      margin-bottom: 1rem;
      transition: transform 0.4s ease;
    }

    .login-container img:hover {
      transform: rotate(5deg) scale(1.05);
    }

    h2 {
      color: #d5d5d5;
      margin-bottom: 1.5rem;
      font-weight: 600;
      font-size: 1.5rem;
      letter-spacing: 0.5px;
    }

    /* 🔹 Campo con icono */
    .input-group {
      position: relative;
      margin-bottom: 1.3rem;
      width: 100%;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #007bff;
      font-size: 16px;
      transition: color 0.3s;
    }

    input {
      width: 100%;
      padding: 10px 12px 10px 38px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s ease;
      box-sizing: border-box;
    }

    input:focus {
      border-color: #007bff;
      box-shadow: 0 0 6px rgba(0, 123, 255, 0.3);
      outline: none;
    }

    button {
      width: 100%;
      padding: 10px;
      background: linear-gradient(90deg, #007bff, #00c6ff);
      color: white;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 16px;
      font-weight: 500;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }

    button:hover {
      background: linear-gradient(90deg, #0056b3, #0099ff);
      transform: scale(1.03);
      box-shadow: 0 5px 20px rgba(0, 123, 255, 0.3);
    }

    a {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      color: #007bff;
      font-size: 14px;
      transition: color 0.3s;
    }

    a:hover {
      color: #0056b3;
      text-decoration: underline;
    }

    /* 💫 Efecto de entrada de los campos */
    .input-group, button, a {
      opacity: 0;
      animation: slideIn 0.7s forwards;
    }

    .input-group:nth-child(1) { animation-delay: 0.3s; }
    .input-group:nth-child(2) { animation-delay: 0.5s; }
    button { animation-delay: 0.7s; }
    a { animation-delay: 0.9s; }

    @keyframes slideIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* 🌙 Modo oscuro automático */
    @media (prefers-color-scheme: dark) {
      body {
        background: linear-gradient(135deg, #1b2735, #090a0f);
      }

      .login-container {
        background: rgba(25, 25, 25, 0.85);
        color: #f0f0f0;
      }

      input {
        background: #222;
        border-color: #444;
        color: #f0f0f0;
      }

      input:focus {
        border-color: #00c6ff;
        box-shadow: 0 0 6px rgba(0, 198, 255, 0.4);
      }

      .input-group i {
        color: #00c6ff;
      }

      button {
        background: linear-gradient(90deg, #00c6ff, #007bff);
      }

      a {
        color: #00c6ff;
      }
    }

    /* 📱 Responsividad */
    @media (max-width: 480px) {
      .login-container {
        padding: 2rem 1.5rem;
        border-radius: 14px;
      }

      h2 {
        font-size: 1.25rem;
      }

      input {
        font-size: 13px;
      }

      button {
        font-size: 15px;
      }

      a {
        font-size: 13px;
      }
    }
  </style>
</head>
<body>

  <div class="login-container">
    <!-- 🧠 Logo -->
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo del sistema">

    <h2>Iniciar sesión</h2>

    <form method="POST" action="validar_login.php">
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
    <a href="register.php">¿No tienes cuenta? Regístrate aquí</a>
  </div>

</body>
</html>
