<?php
//autor: 
//fecha: 12/10/2025
//descripcion: Controlador para manejar las marcas

require_once('models/MarcaModel.php');
require_once('helpers/config.php');
class MarcaController {
    private $marcaModel;

    public function __construct() {
        $this->marcaModel = new MarcaModel();
    }

    public function listarMarcas() {
        $marcas = $this->marcaModel->verMarcas();
<<<<<<< HEAD
        require_once("views/prueba-1.php");
=======
        require_once(VIEWS_PATH.'marcas/panelMarcas.php');
    }

    public function verMarca($id) {
        $marca = $this->marcaModel->obtenerMarca($id);
        require_once(VIEWS_PATH.'marcas/verMarca.php');
        /*if ($marca) {
            
        } else {
            echo "Marca no encontrada.";
        }*/
>>>>>>> master
    }
}