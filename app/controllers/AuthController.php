<?php
require_once __DIR__ . '/../helpers/session_helper.php';
iniciar_sesion_segura();
require_once __DIR__ . '/../models/Usuario.php';

class AuthController {
    public function login() {
        if (isset($_SESSION['usuario'])) {
            header("Location: /public/index.php?controller=Home&action=index");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'] ?? '';
            $contrasena = $_POST['contrasena'] ?? '';

            $userModel = new Usuario();
            $user = $userModel->verifyLogin($usuario, $contrasena);

            if ($user) {
                $_SESSION['usuario'] = (string) $user['_id'];
                $_SESSION['nombre'] = $user['usuario'];
                $_SESSION['rol'] = $user['rol'] ?? 'estudiante';

                // Redirigir según el rol
                if ($user['rol'] === 'profesor') {
                    header('Location: /public/index.php?controller=Profesor&action=index');
                } else {
                    header('Location: /public/index.php?controller=Estudiante&action=index');
                }
                exit();
            } else {
                $error = "Usuario o contraseña incorrectos";
                require __DIR__ . '/../views/auth/login.php';
            }
        } else {
            require __DIR__ . '/../views/auth/login.php';
        }
    }

    public function register() {
        if (isset($_SESSION['usuario'])) {
            header("Location: /public/index.php?controller=Home&action=index");
            exit();
        }
        require_once __DIR__ . '/../models/Usuario.php';
        $userModel = new Usuario();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = trim($_POST['usuario'] ?? '');
            $contrasena = $_POST['contrasena'] ?? '';
            $confirmar = $_POST['confirmar_contrasena'] ?? '';
            $rol = $_POST['rol'] ?? 'estudiante';

            if ($contrasena !== $confirmar) {
                $error = "Las contraseñas no coinciden";
                require __DIR__ . '/../views/auth/register.php';
                return;
            }

            if ($userModel->findByUsername($usuario)) {
                $error = "El usuario ya existe";
                require __DIR__ . '/../views/auth/register.php';
                return;
            }

            $exito = $userModel->crearUsuario($usuario, $contrasena, $rol);
            if ($exito) {
                $success = "Usuario registrado correctamente. Ahora puedes iniciar sesión.";
                require __DIR__ . '/../views/auth/login.php';
            } else {
                $error = "Error al registrar el usuario.";
                require __DIR__ . '/../views/auth/register.php';
            }
        } else {
            require __DIR__ . '/../views/auth/register.php';
        }
    }


    public function logout() {
        session_destroy();
        header('Location: /public/index.php?controller=Auth&action=login');
        exit();
    }
}
