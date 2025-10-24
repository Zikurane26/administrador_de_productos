<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrar nuevo usuario</title>

  <!-- 🔹 Íconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* 🌈 Fondo animado */
    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #00c6ff, #007bff, #4facfe);
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

    /* 📦 Contenedor principal */
    .register-container {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      padding: 2.5rem;
      border-radius: 18px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
      width: 100%;
      max-width: 360px;
      text-align: center;
      animation: fadeIn 1s ease;
      transition: all 0.4s ease;
    }

    .register-container:hover {
      transform: translateY(-6px);
      box-shadow: 0 15px 50px rgba(0, 0, 0, 0.3);
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* 🧠 Logo */
    .register-container img {
      width: 95px;
      margin-bottom: 1rem;
      transition: transform 0.4s ease;
    }

    .register-container img:hover {
      transform: rotate(-5deg) scale(1.05);
    }

    h2 {
      color: #d5d5d5;
      margin-bottom: 1.5rem;
      font-weight: 600;
      font-size: 1.5rem;
    }

    /* 🔹 Campos */
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
      background: linear-gradient(90deg, #28a745, #34ce57);
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
      background: linear-gradient(90deg, #218838, #2ecc71);
      transform: scale(1.03);
      box-shadow: 0 5px 20px rgba(40, 167, 69, 0.3);
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

    /* 💫 Animaciones de entrada */
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

      .register-container {
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
        background: linear-gradient(90deg, #00c851, #007e33);
      }

      a {
        color: #00c6ff;
      }
    }

    /* 📱 Responsividad */
    @media (max-width: 480px) {
      .register-container {
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

  <div class="register-container">
    <!-- 🧠 Logo -->
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo del sistema">

    <h2>Crear nueva cuenta</h2>

    <form method="POST" action="registrar_usuario.php">

      <!-- 👤 Usuario -->
      <div class="input-group">
        <i class="fa-solid fa-user-plus"></i>
        <input type="text" name="usuario" placeholder="Usuario" required>
      </div>

      <!-- 🔒 Contraseña -->
      <div class="input-group">
        <i class="fa-solid fa-lock"></i>
        <input type="password" name="contrasena" placeholder="Contraseña" required>
      </div>

      <!-- 🔐 Confirmar contraseña -->
      <div class="input-group">
        <i class="fa-solid fa-check-double"></i>
        <input type="password" name="confirmar_contrasena" placeholder="Confirmar contraseña" required>
      </div>

      <button type="submit">Registrar</button>
    </form>

    <!-- 🔗 Enlace al login -->
    <a href="login.php">¿Ya tienes cuenta? Inicia sesión aquí</a>
  </div>

</body>
</html>
