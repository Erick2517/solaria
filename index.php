<?php
//autor: Erick Landaverde
//fecha: 11/10/2025
//descripcion: Archivo principal para iniciar la aplicacion

// ==================== CARGAR VARIABLES DE ENTORNO ====================
require_once __DIR__ . '/helpers/EnvLoader.php';
EnvLoader::load(__DIR__ . '/.env');

require_once(__DIR__ . '/helpers/config.php');

// ==================== Router ====================
$url = isset($_GET['url']) ? explode('/', $_GET['url']) : [];

$controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : null;
$action = (isset($url[1]) && $url[1] !== '') ? $url[1] : 'index';
$param = $url[2] ?? null;

// Si no hay controlador, carga la vista de inicio
if ($controllerName === null) {
    require_once(VIEWS_PATH . 'home.php');
    exit();
}

// Verificar si el controlador existe
$controllerFile = 'controllers/' . $controllerName . '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $action)) {
        if ($param !== null) {
            $controller->$action($param);
        } else {
            $controller->$action();
        }
    } else {
        echo "Método '$action' no encontrado.";
    }
} else {
    echo "Controlador '$controllerName' no encontrado.";
}

exit();
