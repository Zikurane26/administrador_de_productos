<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión</title>

  <!-- Íconos Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* 🌌 Fondo con gradiente oscuro */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #0a0f1a, #081a2b);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    /* 🧱 Contenedor */
    .login-container {
      background: rgba(20, 20, 20, 0.95);
      padding: 2.5rem;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4);
      width: 100%;
      max-width: 360px;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .login-container:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(0, 200, 255, 0.3);
    }

    /* 👤 Imagen */
    .login-container img {
      width: 90px;
      margin-bottom: 1rem;
      filter: drop-shadow(0 0 5px #00c6ff);
    }

    h2 {
      color: #e0e0e0;
      margin-bottom: 1.5rem;
      font-weight: 600;
    }

    /* 🧩 Inputs con iconos */
    .input-group {
      position: relative;
      margin-bottom: 1.2rem;
    }

    .input-group i {
      position: absolute;
      top: 50%;
      left: 12px;
      transform: translateY(-50%);
      color: #00bfff;
    }

    input {
      width: 100%;
      padding: 10px 10px 10px 35px;
      border: 1px solid #333;
      background: #fff; /* 👈 Fondo claro */
      color: #111;      /* 👈 Texto oscuro */
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s ease;
      box-shadow: inset 0 2px 5px rgba(0,0,0,0.1);
    }

    input:focus {
      border-color: #00c6ff;
      box-shadow: 0 0 8px #00c6ff;
      outline: none;
    }

    /* ⚙️ Forzar mismo color en móviles */
    input, input:focus {
      background-color: #fff !important;
      color: #111 !important;
      -webkit-text-fill-color: #111 !important;
    }

    /* 🔵 Botón */
    button {
      width: 100%;
      padding: 10px;
      background: linear-gradient(90deg, #007bff, #00c6ff);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.3s, transform 0.2s;
    }

    button:hover {
      background: linear-gradient(90deg, #009eff, #00e6ff);
      transform: scale(1.03);
    }

    /* 🔗 Enlace */
    a {
      display: inline-block;
      margin-top: 15px;
      text-decoration: none;
      color: #00bfff;
      font-size: 14px;
    }

    a:hover {
      text-decoration: underline;
    }

    /* 📱 Responsive */
    @media (max-width: 480px) {
      .login-container {
        width: 90%;
        padding: 2rem;
      }
    }
  </style>
</head>
<body>

  <div class="login-container">
    <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Logo del sistema">

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
    </form>

    <a href="registrar.php">¿No tienes cuenta? Regístrate aquí</a>
  </div>

</body>
</html>
