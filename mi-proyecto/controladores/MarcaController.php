<?php
// controladores/MarcaController.php

// Cargamos los archivos que necesitamos
require_once 'modelos/MarcaModel.php';
require_once 'config/database.php'; // ¡Importante!

class MarcaController {
    
    /**
     * Muestra la lista de todas las marcas.
     */
    public function mostrarListaDeMarcas() {
        
        // 1. Obtenemos la conexión a la BD
        $db = conectarDB();
        
        // 2. Creamos una instancia del Modelo y le pasamos la conexión
        $modelo = new MarcaModel($db);
        
        // 3. Pedimos los datos (la lista de marcas) al Modelo
        $marcas = $modelo->obtenerMarcas();
        
        // 4. Cargamos la Vista
        // (La vista ahora tendrá acceso a la variable $marcas)
        require_once 'vistas/listaMarcasView.php';
    }
}
?>