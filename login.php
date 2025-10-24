<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login - Administrador de Productos</title>
  <style>
    body {
      font-family: Arial;
      background: #f3f3f3;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    form {
      background: white;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      width: 300px;
      text-align: center;
    }
    input {
      display: block;
      margin-bottom: 1rem;
      width: 100%;
      padding: 8px;
    }
    button {
      padding: 10px 15px;
      background: #007bff;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background: #0056b3;
    }
    a {
      display: inline-block;
      margin-top: 10px;
      text-decoration: none;
      color: #007bff;
    }
    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <form method="POST" action="validar_login.php">
    <h2>Iniciar sesión</h2>

    <label>Usuario:</label>
    <input type="text" name="usuario" required>

    <label>Contraseña:</label>
    <input type="password" name="contrasena" required>

    <button type="submit">Ingresar</button>

    <!-- 👇 Enlace para registrar nueva cuenta -->
    <a href="registrar.php">¿No tienes cuenta? Regístrate aquí</a>
  </form>
</body>
</html>
