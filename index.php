<?php
require_once "controllers/ContactoController.php";

$action = $_GET["action"] ?? "inicio";
$id = $_GET["id"] ?? null;

$contactoController = new ContactoController();

switch ($action) {
    case "inicio":
        $contactoController->inicio();
        break;
    case "crear":
        $contactoController->crear();
        break;
    case "editar":
        $contactoController->editar($id);
        break;
    case "borrar":
        $contactoController->borrar($id);
        break;
}
