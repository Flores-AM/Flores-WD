<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\HomeController;
use MVC\Router;

$router = new Router();

// Home
$router->get('/', [HomeController::class, 'home']);
$router->post('/', [HomeController::class, 'home']);
$router->get('/', [HomeController::class, 'contacto']);
$router->post('/', [HomeController::class, 'contacto']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();