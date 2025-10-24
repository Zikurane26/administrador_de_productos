<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Administrador de Productos</title>

  <!-- Íconos de Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #007bff, #00c6ff);
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

    .login-container img {
      width: 95px;
      margin-bottom: 1rem;
      transition: transform 0.4s ease;
    }

    .login-container img:hover {
      transform: rotate(5deg) scale(1.05);
    }

    h2 {
      color: #333;
      margin-bottom: 1.5rem;
      font-weight: 600;
      font-size: 1.5rem;
      letter-spacing: 0.5px;
    }

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
      background: #111;        /* ← Fondo oscuro para todos */
      color: #e0e0e0;           /* ← Texto claro para visibilidad */
      border-radius: 8px;
      font-size: 14px;
      transition: all 0.3s ease;
      box-sizing: border-box;
    }

    /* Forzamos que en todos los dispositivos mantenga el fondo oscuro */
    input, input:focus {
      background-color: #111 !important;
      color: #e0e0e0 !important;
      -webkit-text-fill-color: #e0e0e0 !important; /* Para Safari */
    }

    input:focus {
      border-color: #00c6ff;
      box-shadow: 0 0 8px rgba(0, 198, 255, 0.4);
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
    }

    a:hover {
      color: #0056b3;
      text-decoration: underline;
    }

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
