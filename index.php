<?php
//autor: Erick Landaverde
//fecha: 11/10/2025
//descripcion: Archivo principal para iniciar la aplicacion

// ==================== CARGAR VARIABLES DE ENTORNO ====================
require_once __DIR__ . '/helpers/EnvLoader.php';
EnvLoader::load(__DIR__ . '/.env');

// ==================== REDIRECCION A HOME ====================
header('Location: home.php');
exit();