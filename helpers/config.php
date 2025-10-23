<?php
// Define la ruta base del proyecto
define('BASE_URL', 'http://localhost/Solaria/');
define('VIEWS_PATH', dirname(__FILE__) . '/../views/');




















/**
 * Función para redireccionar.
 * ayuda a formar una URL completa usando la BASE_URL y redirige
 *
 * @param string $url La ruta a la que se quiere redirigir por ejmplo la de cliente/mostrarPanelClientes
 */
function redirect($url) {
    $urlCompleta = BASE_URL . $url;
    
    header('Location: ' . $urlCompleta);
    
    // exit después de un header de redirección
    // para detener la ejecución del script actual.
    exit();
}
?>
