<?php
//autor: 
//fecha: 12/10/2025
//descripcion: Controlador para manejar las marcas

require_once('models/MarcaModel.php');
class MarcaController {
    private $marcaModel;

    public function __construct() {
        $this->marcaModel = new MarcaModel();
    }

    public function listarMarcas() {
        $marcas = $this->marcaModel->verMarcas();
    }
}