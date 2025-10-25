<?php
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

// Rutas simples, ejemplo: index.php?controller=asistencia&action=index
$controllerName = $_GET['controller'] ?? 'home';
$action = $_GET['action'] ?? 'index';

$controllerPath = __DIR__ . "/../app/controllers/" . ucfirst($controllerName) . "Controller.php";

if (file_exists($controllerPath)) {
    require_once $controllerPath;
    $controllerClass = ucfirst($controllerName) . "Controller";
    $controller = new $controllerClass();

    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo "⚠️ Acción '$action' no encontrada en el controlador $controllerClass.";
    }
} else {
    echo "⚠️ Controlador '$controllerName' no encontrado.";
}
