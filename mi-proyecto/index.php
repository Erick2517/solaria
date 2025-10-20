<?php
// index.php

// --- Enrutamiento Súper Básico ---

// 1. Obtenemos la 'accion' de la URL.
$accion = $_GET['accion'] ?? 'inicio';

// 2. Decidimos qué Controlador llamar
switch ($accion) {
    case 'verMarcas':
        // Si la acción es 'verMarcas'...
        require_once 'controladores/MarcaController.php';
        $controlador = new MarcaController();
        $controlador->mostrarListaDeMarcas();
        break;
        
    case 'inicio':
    default:
        // Acción por defecto (página de inicio)
        echo "<h1>Bienvenido a mi sitio web</h1>";
        echo "<p>Elige una acción:</p>";
        echo "<a href='index.php?accion=verMarcas'>Ver Lista de Marcas</a><br>";
        break;
}
?>