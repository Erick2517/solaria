<?php
//autor: Erick Landaverde
//descripcion: Controlador para manejar las ventas

require_once('models/VentaModel.php');
require_once('helpers/config.php');
class VentasController {
    private $ventaModel;

    public function __construct() {
        $this->ventaModel = new VentaModel();
    }

    public function listarVentas() {
        $ventas = $this->ventaModel->verVentas();
        require_once(VIEWS_PATH.'ventas/panelVentas.php');
    }

    public function agregarVentaForm() {
        require_once(VIEWS_PATH.'ventas/agregarVentaForm.php');
    }
    /*
    public function verventa($id) {
        $venta = $this->ventaModel->obtenerVenta($id);
        require_once(VIEWS_PATH.'ventas/verventa.php');
        /*if ($marca) {
            
        } else {
            echo "Marca no encontrada.";
        }
    }*/
}