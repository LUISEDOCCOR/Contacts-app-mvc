<?php
require_once "models/ContactoModel.php";

class ContactoController
{
    private function render_view_home($view)
    {
        require "views/header.php";
        require "views/contactos/" . $view;
        require "views/footer.php";
    }

    public function inicio()
    {
        $this->render_view_home("index.php");
    }
    public function editar($id)
    {
        $this->render_view_home("editar.php");
    }
    public function crear()
    {
        $this->render_view_home("index.php");
    }
    public function borrar($id)
    {
        $this->render_view_home("index.php");
    }
}
