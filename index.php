<?php
require_once "controllers/ContactoController.php";
require_once "controllers/AuthController.php";
require_once __DIR__ . "/vendor/autoload.php";

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$action = $_GET["action"] ?? "inicio";
$id = $_GET["id"] ?? null;

$contactoController = new ContactoController();
$authController = new AuthController();

$rutas = [
    "login" => fn() => $authController->auth("login"),
    "signup" => fn() => $authController->auth("signup"),
    "logout" => fn() => $authController->auth("logout"),
    "inicio" => fn() => $contactoController->inicio(),
    "crear" => fn() => $contactoController->crear(),
    "editar" => fn() => $contactoController->editar($id),
    "borrar" => fn() => $contactoController->borrar($id),
];

$priv_rutas = ["inicio", "crear", "editar", "borrar"];

if (array_key_exists($action, $rutas)) {
    if (in_array($action, $priv_rutas)) {
        if (!isset($_SESSION["usuario_id"])) {
            header("Location: index.php?action=signup");
            exit();
        }
    }
    $rutas[$action]();
} else {
    http_response_code(404);
    echo "🚩 404 - NOT FOUND";
}
