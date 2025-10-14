<?php 
require_once('models/CategoriaModel.php');
require_once('helpers/config.php');
class CategoriaController {
    private $categoriaModel;

    public function __construct() {
        $this->categoriaModel = new CategoriaModel();
    }

    public function listarCategorias() {
        $categorias = $this->CategoriaModel->verCategorias();
        require_once(VIEWS_PATH.'categorias/panelCategorias.php');
    }
}