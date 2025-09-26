<?php
require_once 'config/config.php';
require_once 'model/db.php';

// Establecer controlador y acción por defecto si no se especifican
if (!isset($_GET["controller"])) $_GET["controller"] = constant("DEFAULT_CONTROLLER");
if (!isset($_GET["action"])) $_GET["action"] = constant("DEFAULT_ACTION");

// Construir ruta del controlador
$controller_path = 'controller/' . $_GET["controller"] . 'Controller.php';

// Verificar si el archivo del controlador existe
if (!file_exists($controller_path)) {
    die("Error: El controlador '" . $_GET["controller"] . "' no fue encontrado.");
}

// Cargar el controlador
require_once $controller_path;
$controllerName = $_GET["controller"] . 'Controller';

// Verificar si la clase del controlador existe
if (!class_exists($controllerName)) {
    die("Error: La clase del controlador '" . $controllerName . "' no está definida.");
}

$controller = new $controllerName();

// Ejecutar la acción si existe
$dataToView["data"] = array();
$action = $_GET["action"];

if (method_exists($controller, $action)) {
    $dataToView["data"] = $controller->$action();
} else {
    die("Error: La acción '" . $action . "' no está definida en el controlador '" . $controllerName . "'.");
}

// Preparar los datos para la vista
$data = $dataToView["data"];

// Cargar las vistas
require_once 'view/template/header.php';
require_once 'view/' . $controller->view . '.php';
require_once 'view/template/footer.php';
?>