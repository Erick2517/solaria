<?php
//autor: Erick Landaverde
//fecha: 11/10/2025
//descripcion: Archivo principal para iniciar la aplicacion

// ==================== CARGAR VARIABLES DE ENTORNO ====================
require_once __DIR__ . '/helpers/EnvLoader.php';
EnvLoader::load(__DIR__ . '/.env');

require_once(__DIR__ . '/helpers/config.php');

// ==================== Router ====================
$url = isset($_GET['url']) ? explode('/', $_GET['url']) : []; //se divide la url en partes despues de la escritura del htacces

$controllerName = !empty($url[0]) ? ucfirst($url[0]) . 'Controller' : null; //si no hay controlador, se carga la pagina de inicio
$action = (isset($url[1])) ? $url[1] : null;
$param = $url[2] ?? null;

//por si solicita la pagina de inicio, no viene controller en la url
if($controllerName === null) {
    require_once(VIEWS_PATH . 'home.php');
    exit();
}

//por si solicita una accion de controller
$controllerFile = 'controllers/' . $controllerName . '.php'; //solicita la direcion url del controlador

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controller = new $controllerName();

    if (method_exists($controller, $action)) {
        if ($param !== null) {
            $controller->$action($param);//si vienes parametros quiere decir que es un detalle u otra accion con datos por url
        } else {
            $controller->$action();//si no viene un tercer parametro solo llama a la accion del controlador
        }
    } else {
        echo "Método '$action' no encontrado.";
    }
} else {
    echo "Controlador '$controllerName' no encontrado.";
}

exit();