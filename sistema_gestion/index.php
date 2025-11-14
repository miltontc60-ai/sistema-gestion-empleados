<?php
// Activar mostrar errores (colocar esto al INICIO del archivo)
error_reporting(E_ALL);
ini_set('display_errors', 1);


// Incluir configuración de base de datos
require_once 'config/database.php';
// ... el resto del código sigue igual

// index.php - Archivo principal en la raíz
session_start();

// Incluir configuración de base de datos
require_once 'config/database.php';

// Obtener controlador y acción desde la URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'empleado';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Crear instancia de la base de datos
$database = new Database();
$db = $database->getConnection();

// Determinar qué controlador cargar
switch($controller) {
    case 'empleado':
        require_once 'controllers/EmpleadoController.php';
        $controllerObj = new EmpleadoController($db);
        break;
    case 'proyecto':
        require_once 'controllers/ProyectoController.php';
        $controllerObj = new ProyectoController($db);
        break;
    case 'participacion':
        require_once 'controllers/ParticipacionController.php';
        $controllerObj = new ParticipacionController($db);
        break;
    default:
        require_once 'controllers/EmpleadoController.php';
        $controllerObj = new EmpleadoController($db);
        break;
}

// Ejecutar la acción
if(method_exists($controllerObj, $action)) {
    $controllerObj->$action();
} else {
    echo "Acción no encontrada";
}
?>