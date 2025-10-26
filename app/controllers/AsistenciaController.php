<?php
require_once __DIR__ . '/../models/Asistencia.php';

class AsistenciaController {
    public function generarCodigo() {
        //session_start();
        if (!isset($_SESSION['user_id'])) {
            header('Location: /public/index.php?controller=Auth&action=login');
            exit;
        }

        // Generar un código aleatorio de 6 dígitos o letras
        $codigo = strtoupper(substr(bin2hex(random_bytes(3)), 0, 6));

        $asistenciaModel = new Asistencia();
        $asistenciaModel->guardarCodigo([
            'profesor_id' => $_SESSION['user_id'],
            'codigo' => $codigo,
            'fecha_creacion' => new MongoDB\BSON\UTCDateTime()
        ]);

        // Redirigir al panel del profesor con el nuevo código
        header('Location: /public/index.php?controller=Profesor&action=index');
        exit;
    }
}
