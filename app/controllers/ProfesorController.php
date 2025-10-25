<?php

require_once __DIR__ . '/../models/Usuario.php';


class ProfesorController
{
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = Usuario::getAll();

        // Enviar a la vista
        require_once 'app/views/profesor/index.php';
    }
}
