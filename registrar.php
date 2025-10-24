<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar nuevo usuario</title>
  <style>
    body { font-family: Arial; background: #f3f3f3; display: flex; justify-content: center; align-items: center; height: 100vh; }
    form { background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.2); }
    input { display: block; margin-bottom: 1rem; width: 100%; padding: 8px; }
    button { padding: 10px 15px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer; }
    button:hover { background: #218838; }
  </style>
</head>
<body>
  <form method="POST" action="registrar_usuario.php">
    <h2>Crear nueva cuenta</h2>
    <label>Usuario:</label>
    <input type="text" name="usuario" required>

    <label>Contraseña:</label>
    <input type="password" name="contrasena" required>

    <button type="submit">Registrar</button>
  </form>
</body>
</html>
