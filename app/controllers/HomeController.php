<?php
require_once __DIR__ . '/../models/Usuario.php';
class HomeController {
    public function index() {
        if (!isset($_SESSION['usuario'])) {
            header("Location: /app/views/auth/login.php");
            exit();
        }

        $usuario = $_SESSION['usuario'];
        $rol = $_SESSION['rol'];

        // Cargar vista según el rol
        if ($rol === 'profesor') {

            // Redirigir al controlador de Profesor
            header('Location: /public/index.php?controller=Profesor&action=index');
            exit;
            // Crear instancia del modelo y obtener todos los usuarios desde MongoDB
            $usuarioModel = new Usuario();
            $usuarios = $usuarioModel->getAll();

            require_once dirname(__DIR__) . '/views/profesor/home.php';
        } elseif ($rol === 'estudiante') {
            include dirname(__DIR__) . '/views/estudiante/home.php';
        } else {
            echo "Rol no reconocido.";
        }
    }
}
