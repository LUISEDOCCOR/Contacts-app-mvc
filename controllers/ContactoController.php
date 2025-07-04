<?php
require_once "models/ContactoModel.php";

class ContactoController
{
    private function render_view($view, $error = "", $contacto = [])
    {
        if (!isset($_SESSION["usuario_id"])) {
            header("Location: index.php?action=signup");
            exit();
        }

        if ($view == "index.php") {
            $contactos = ContactoModel::obtenerTodos($_SESSION["usuario_id"]);
        }

        require "views/header.php";
        require "views/contactos/" . $view;
        require "views/footer.php";
    }
    public function inicio()
    {
        $this->render_view("index.php");
    }
    public function editar($id)
    {
        $error = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre_contacto"] ?? "";
            $numero = $_POST["numero_contacto"] ?? "";
            $error = "";

            if (empty($nombre) || empty($numero)) {
                $error = "Todos los campos son necesarios";
            } else {
                $filasAfectadas = ContactoModel::editar(
                    $id,
                    $nombre,
                    $numero,
                    $_SESSION["usuario_id"]
                );
                if ($filasAfectadas <= 0) {
                    $error = "No se modificó ningún contacto";
                } else {
                    header("Location: index.php");
                    exit();
                }
            }
        }

        $contacto = ContactoModel::obtenerById($id, $_SESSION["usuario_id"]);
        if (!$contacto) {
            header("Location: index.php");
            exit();
        }

        $this->render_view("editar.php", $error, $contacto);
    }
    public function crear()
    {
        $nombre = $_POST["nombre_contacto"] ?? "";
        $numero = $_POST["numero_contacto"] ?? "";
        $error = "";

        if (empty($nombre) || empty($numero)) {
            $error = "Todos los campos son necesarios";
        } else {
            $filasAfectadas = ContactoModel::crear(
                $nombre,
                $numero,
                $_SESSION["usuario_id"]
            );
            if ($filasAfectadas <= 0) {
                $error = "Hubo un error";
            } else {
                header("Location: index.php");
                exit();
            }
        }

        $this->render_view("index.php", $error);
    }
    public function borrar($id)
    {
        $error = "";
        $filasAfectadas = ContactoModel::borrar($id, $_SESSION["usuario_id"]);
        if ($filasAfectadas <= 0) {
            $error = "No se borro";
        } else {
            header("Location: index.php");
            exit();
        }
        $this->render_view("index.php", $error);
    }
}
