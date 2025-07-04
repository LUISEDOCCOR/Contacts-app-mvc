<?php
require_once "models/UsuarioModel.php";

class AuthController
{
    private function render_view($action, $error = "")
    {
        require "views/header.php";
        require "views/auth/index.php";
        require "views/footer.php";
    }
    private function signup($nombre, $correo, $password)
    {
        $usuario = UsuariosModel::obtenerByEmail($correo);
        if ($usuario) {
            return "Ya existe un usuario con ese correo";
        }
        $usuario_id = UsuariosModel::crear(
            $nombre,
            $correo,
            password_hash($password, PASSWORD_BCRYPT)
        );
        if ($usuario_id <= 0) {
            return "Hubo un error";
        }

        $_SESSION["usuario_nombre"] = $nombre;
        $_SESSION["usuario_correo"] = $correo;
        $_SESSION["usuario_id"] = $usuario_id;

        header("Location: index.php");
        exit();
    }
    private function login($correo, $password)
    {
        $usuario = UsuariosModel::obtenerByEmail($correo);
        if (!$usuario) {
            return "No existe un usuario con ese correo";
        }

        if (!password_verify($password, $usuario["password"])) {
            return "Datos erroneos, intente de nuevo";
        }

        $_SESSION["usuario_nombre"] = $usuario["nombre"];
        $_SESSION["usuario_correo"] = $correo;
        $_SESSION["usuario_id"] = $usuario["id"];

        header("Location: index.php");
        exit();
    }
    public function auth($action)
    {
        $error = "";

        if ($action == "logout") {
            $_SESSION = [];
            session_destroy();
            header("Location: index.php?action=signup");
            exit();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["usuario_nombre"] ?? "";
            $correo = $_POST["usuario_correo"] ?? "";
            $password = $_POST["usuario_password"] ?? "";

            if (empty($correo) || empty($password)) {
                $error = "Todos los campos son necesarios";
            } else {
                if ($action == "login") {
                    $error = $this->login($correo, $password);
                } else {
                    if (empty($nombre)) {
                        $error = "Todos los campos son necesarios";
                    } else {
                        $error = $this->signup($nombre, $correo, $password);
                    }
                }
            }
        }

        $this->render_view($action, $error);
    }
}
