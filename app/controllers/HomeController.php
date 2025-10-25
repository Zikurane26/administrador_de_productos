<?php
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
            include __DIR__ . '/../views/profesor/home.php';
        } elseif ($rol === 'estudiante') {
            include __DIR__ . '/../views/estudiante/home.php';
        } else {
            echo "Rol no reconocido.";
        }
    }
}
