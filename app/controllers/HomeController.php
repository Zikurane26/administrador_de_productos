<?php
require_once __DIR__ . '/../models/Usuario.php';
class HomeController {
    public function index() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: /app/views/auth/login.php");
            exit();
        }
        var_dump($_SESSION['rol']);
        $usuario = $_SESSION['usuario'];
        $rol = $_SESSION['rol'];
        echo "<pre>Buscando vista en: " . dirname(__DIR__) . '/views/estudiante/home.php' . "</pre>";

        // Cargar vista según el rol
        if ($rol === 'profesor') {
            // Obtener todos los usuarios
            $usuarios = Usuario::getAll();
            require_once dirname(__DIR__) . '/views/profesor/home.php';
        } elseif ($rol === 'estudiante') {
            include dirname(__DIR__) . '/views/estudiante/home.php';
        } else {
            echo "Rol no reconocido.";
        }
    }
}

