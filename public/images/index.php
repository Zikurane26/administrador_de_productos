<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrador de Productos</title>

  <!-- Íconos de Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <style>
    /* 🌈 Fondo animado igual que el login */
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
    }

    @keyframes gradientMove {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* 🧩 Contenedor principal */
    .admin-container {
      background: rgba(255, 255, 255, 0.92);
      backdrop-filter: blur(12px);
      padding: 2.5rem;
      border-radius: 18px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.25);
      width: 100%;
      max-width: 700px;
      text-align: center;
      animation: fadeIn 1s ease;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* 🧑‍💻 Encabezado */
    h1 {
      color: #007bff;
      font-size: 1.8rem;
      margin-bottom: 1rem;
    }

    .user-info {
      font-size: 1rem;
      margin-bottom: 1.5rem;
      color: #333;
    }

    /* 🔘 Botón de cerrar sesión */
    .logout-btn {
      display: inline-block;
      margin-bottom: 1.5rem;
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
      transform: scale(1.05);
      box-shadow: 0 5px 20px rgba(0, 123, 255, 0.3);
    }

    /* 📋 Lista de productos */
    h3 {
      color: #007bff;
      margin-bottom: 1rem;
    }

    ul {
      list-style: none;
      padding: 0;
      margin: 0;
      text-align: left;
    }

    li {
      background: rgba(240, 240, 240, 0.9);
      margin-bottom: 10px;
      padding: 10px 15px;
      border-radius: 10px;
      box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
      font-size: 0.95rem;
      word-wrap: break-word;
    }

    /* 🌙 Modo oscuro automático */
    @media (prefers-color-scheme: dark) {
      body {
        background: linear-gradient(135deg, #1b2735, #090a0f);
      }

      .admin-container {
        background: rgba(25, 25, 25, 0.88);
        color: #f0f0f0;
      }

      li {
        background: rgba(40, 40, 40, 0.9);
        color: #eaeaea;
      }

      .logout-btn {
        background: linear-gradient(90deg, #00c6ff, #007bff);
      }
    }

    /* 📱 Responsividad */
    @media (max-width: 600px) {
      .admin-container {
        padding: 2rem 1.5rem;
        border-radius: 14px;
      }

      h1 {
        font-size: 1.4rem;
      }
    }
  </style>
</head>
<body>

  <div class="admin-container">
    <h1>Panel de Administración</h1>
    <p class="user-info">Bienvenido, <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong> 👋</p>

    <a href="logout.php" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Cerrar sesión</a>

    <h3>📦 Datos de la Base de Datos</h3>

    <ul>
      <?php
      require 'vendor/autoload.php';
      use MongoDB\Client;

      $uri = getenv('MONGODB_URI') ?: 'mongodb+srv://Zikurane26:TKzk2LN9YsJxA9x2@cluster0.umwdkel.mongodb.net/?retryWrites=true&w=majority&tls=true';
      $client = new Client($uri);
      $database = $client->selectDatabase('test_db');
      $collection = $database->selectCollection('test_collection');

      $cursor = $collection->find();

      foreach ($cursor as $doc) {
          echo "<li><i class='fa-solid fa-database'></i> " . htmlspecialchars(json_encode($doc)) . "</li>";
      }
      ?>
    </ul>
  </div>

</body>
</html>
