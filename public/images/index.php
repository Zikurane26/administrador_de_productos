<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

require 'vendor/autoload.php';
use MongoDB\Client;

$uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/?retryWrites=true&w=majority&tls=true';
$client = new Client($uri);
$database = $client->selectDatabase('test_db');
$collection = $database->selectCollection('test_collection');
$cursor = $collection->find();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Administrador de Productos</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Iconos -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    /* 🌈 Fondo animado */
    body {
      font-family: 'Poppins', 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #007bff, #00c6ff, #4facfe);
      background-size: 300% 300%;
      animation: gradientMove 8s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 1rem;
    }
    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* 🌟 Contenedor principal */
    .admin-container {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(12px);
      padding: 2.5rem;
      border-radius: 18px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
      width: 100%;
      max-width: 850px;
      text-align: center;
      animation: fadeIn 1s ease;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h1 {
      color: #333;
      margin-bottom: 1rem;
    }
    h3 {
      color: #555;
      margin-top: 1.5rem;
    }

    /* 🔘 Botón de cerrar sesión */
    .logout-btn {
      display: inline-block;
      background: linear-gradient(90deg, #007bff, #00c6ff);
      color: white;
      padding: 10px 18px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .logout-btn:hover {
      background: linear-gradient(90deg, #0056b3, #0099ff);
      box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
      transform: scale(1.05);
    }

    /* 📊 Tabla */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1.5rem;
      background: white;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
      animation: slideIn 1s ease;
    }
    @keyframes slideIn {
      from { opacity: 0; transform: translateY(15px); }
      to { opacity: 1; transform: translateY(0); }
    }

    th, td {
      padding: 12px 16px;
      border-bottom: 1px solid #e0e0e0;
      text-align: left;
      font-size: 14px;
    }
    th {
      background: #007bff;
      color: white;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    tr:hover {
      background: #f2f8ff;
      transition: background 0.3s ease;
    }

    /* 🌙 Modo oscuro */
    @media (prefers-color-scheme: dark) {
      body {
        background: linear-gradient(135deg, #1b2735, #090a0f);
      }
      .admin-container {
        background: rgba(25, 25, 25, 0.85);
        color: #f0f0f0;
      }
      table {
        background: #1e1e1e;
        color: #ccc;
      }
      th {
        background: #00c6ff;
        color: #000;
      }
      tr:hover {
        background: #2a2a2a;
      }
    }

    /* 📱 Responsivo */
    @media (max-width: 600px) {
      .admin-container {
        padding: 1.5rem;
      }
      table {
        font-size: 12px;
      }
      h1 {
        font-size: 1.3rem;
      }
    }
  </style>
</head>
<body>
  <div class="admin-container">
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?> 👋</h1>
    <a class="logout-btn" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>
    <hr>

    <h3><i class="fa-solid fa-database"></i> Datos de la Base de Datos</h3>
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Contenido del Documento</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $i = 1;
        foreach ($cursor as $doc) {
            echo "<tr><td>" . $i++ . "</td><td><pre style='white-space: pre-wrap; margin: 0;'>" . htmlspecialchars(json_encode($doc, JSON_PRETTY_PRINT)) . "</pre></td></tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
