<?php
require_once __DIR__ . '/app/config/database.php';
require_once __DIR__ . '/app/controllers/UserController.php';

$controller = new UserController();
$controller->login();
