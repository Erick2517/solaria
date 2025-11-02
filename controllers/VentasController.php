<?php
//autor: Erick Landaverde
//descripcion: Controlador para manejar las ventas

require_once('models/VentaModel.php');
require_once('helpers/config.php');
require_once('models/ProductoModel2.php');
require_once('models/ClienteModel.php');

class VentasController {
    private $ventaModel;
    private $productoModel;
    private $clienteModel;


    public function __construct() {
        $this->ventaModel = new VentaModel();
        $this->productoModel = new ProductoModel();
        $this->clienteModel = new ClienteModel();
    }

    public function listarVentas() {
        $ventas = $this->ventaModel->verVentas();
        $dataClientes = $this->clienteModel->verClientes();
        $clientes = array_column($dataClientes, null, 'clienteId');//para burcar cliente por id
        require_once(VIEWS_PATH.'ventas/panelVentas.php');
    }

    public function agregarVentaForm() {
        $productos = $this->productoModel->verProductos();
        $clientes = $this->clienteModel->verClientes();
        require_once(VIEWS_PATH.'ventas/agregarVentaForm.php');
    }

    public function guardarVenta() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $clienteId = $_POST['clienteId'];
            $fechaVenta = $_POST['fechaVenta'];
            $direccionEntrega = $_POST['direccionEntrega'];
            $fechaEntregaEstimada = $_POST['fechaEstimada'];
            $productoId = $_POST['productoId'];
            $cantidad = $_POST['cantidad'];

            //aqui deberia consultar el precio del producto y calcular el total

            $resultado = $this->ventaModel->crearVenta($clienteId, $fechaVenta, $direccionEntrega, $fechaEntregaEstimada, $productoId, $cantidad);

            if ($resultado) {
                $_SESSION['mensaje_exito'] = "Venta creada exitosamente.";
                header("Location: " . BASE_URL . "ventas/listarVentas");
                exit();
            } else {
                $_SESSION['mensaje_error'] = "Error al crear la venta.";
                header("Location: " . BASE_URL . "ventas/agregarVentaForm");
                exit();
            }
        }
    }

    public function editar($id) {
        $productos = $this->productoModel->verProductos();
        $clientes = $this->clienteModel->verClientes();
        $venta = $this->ventaModel->obtenerVenta($id);
        if ($venta) {
            require_once(VIEWS_PATH.'ventas/editarVentaForm.php');
        } else {
            $_SESSION['mensaje_error'] = "Venta no encontrada.";
            header("Location: " . BASE_URL . "ventas/listarVentas");
            exit();
        }
    }

    function actualizarVenta($ventaId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($_POST);

            $resultado = $this->ventaModel->actualizarVenta($ventaId, $clienteId, $fechaVenta, $direccionEntrega, $fechaEstimada, $productoId, $cantidad);

            if ($resultado) {
                $_SESSION['mensaje_exito'] = "Venta actualizada exitosamente.";
                header("Location: " . BASE_URL . "ventas/listarVentas");
                exit();
            } else {
                $_SESSION['mensaje_error'] = "Error al actualizar la venta.";
                header("Location: " . BASE_URL . "ventas/editar/" . $ventaId);
                exit();
            }
        }
    }

    public function eliminar($id) {
        $resultado = $this->ventaModel->eliminarVenta($id);
        if ($resultado) {
            $_SESSION['mensaje_exito'] = "Venta eliminada exitosamente.";
        } else {
            $_SESSION['mensaje_error'] = "Error al eliminar la venta.";
        }
        header("Location: " . BASE_URL . "ventas/listarVentas");
        exit();
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