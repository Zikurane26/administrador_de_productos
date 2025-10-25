<?php
use App\Controllers\AuthController;
use App\Controllers\ProductController;

// Rutas de autenticación
$router->get('/', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/logout', [AuthController::class, 'logout']);
$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'register']);

// Rutas de productos
$router->get('/productos', [ProductController::class, 'index']);
$router->get('/productos/crear', [ProductController::class, 'create']);
$router->post('/productos/guardar', [ProductController::class, 'store']);
