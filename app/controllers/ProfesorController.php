<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Asistencia.php';

class ProfesorController {
    public function index() {
        session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /public/index.php?controller=Auth&action=login');
            exit;
        }

        $usuarioModel = new Usuario();
        $usuarios = $usuarioModel->obtenerTodos();

        $asistenciaModel = new Asistencia();
        $codigoActual = $asistenciaModel->obtenerCodigoPorProfesor($_SESSION['user_id']);

        $codigo_asistencia = $codigoActual ? $codigoActual['codigo'] : null;

        require_once __DIR__ . '/../views/profesor/index.php';
    }
}
