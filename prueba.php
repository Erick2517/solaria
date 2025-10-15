<?php
require_once 'controllers/MarcaController.php'; //las rutas son importantes tambien
$controller=new MarcaController();

$controller->listarMarcas();
