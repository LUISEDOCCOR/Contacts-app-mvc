<?php
require_once "controllers/ContactoController.php";
require_once "controllers/AuthController.php";

session_start();

$action = $_GET["action"] ?? "inicio";
$id = $_GET["id"] ?? null;

$contactoController = new ContactoController();
$authController = new AuthController();

switch ($action) {
    case "login":
        $authController->auth($action);
        break;
    case "signup":
        $authController->auth($action);
        break;
    case "logout":
        $authController->auth($action);
        break;
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
