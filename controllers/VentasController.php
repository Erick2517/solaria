<?php
//autor: Erick Landaverde
//descripcion: Controlador para manejar las ventas

require_once('models/VentaModel.php');
require_once('helpers/config.php');
require_once('models/ProductoModel2.php');
require_once('models/ClienteModel.php');
require_once('models/PagoModel.php');

class VentasController {
    private $ventaModel;
    private $productoModel;
    private $clienteModel;
    private $pagosModel;


    public function __construct() {
        $this->ventaModel = new VentaModel();
        $this->productoModel = new ProductoModel();
        $this->clienteModel = new ClienteModel();
        $this->pagosModel = new PagoModel();
    }

    public function listarVentas() {
        $dataPagos = $this->pagosModel->verPagos(); 
        $pagos = array_column($dataPagos, null, 'ventaId'); //para buscar pago por id de venta
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

            $prod = $this->productoModel->obtenerProductoPorId($productoId);

            $total = $prod['precioUnitario'] * $cantidad;

            $resultado = $this->ventaModel->crearVenta($clienteId, $fechaVenta, $direccionEntrega, $fechaEntregaEstimada, $productoId, $cantidad, $total);

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

            $prod = $this->productoModel->obtenerProductoPorId($productoId);

            $total = $prod['precioUnitario'] * $cantidad;

            $resultado = $this->ventaModel->actualizarVenta($ventaId, $clienteId, $fechaVenta, $direccionEntrega, $fechaEstimada, $productoId, $cantidad, $total);

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
    public function pagar($id) {
        $venta = $this->ventaModel->obtenerVenta($id);
        $clientes = $this->clienteModel->verClientes();
        $productos = $this->productoModel->verProductos();
        if ($venta) {
            require_once(VIEWS_PATH.'ventas/formPagarVenta.php');
        } else {
            $_SESSION['mensaje_error'] = "Venta no encontrada.";
            header("Location: " . BASE_URL . "ventas/listarVentas");
            exit();
        }
    }

    public function verficarPago() {
        // Obtener los datos enviados desde la solicitud fetch
        $input = json_decode(file_get_contents('php://input'), true);
        $orderID = $input['orderID'];
        $ventaId = $input['ventaId'];
        $clienteId = $input['clienteId'];
        $monto = $input['monto'];

        //verificar el pago si es necesario con paypal

        // Registrar el pago en la base de datos
        $resultado = $this->pagosModel->registrarPago($ventaId,$clienteId,$monto,date('Y-m-d H:i:s'),'Pagado');

        if ($resultado) {
            // Responder con éxito
            $_SESSION['mensaje_exito'] = "Pago registrado exitosamente.";
            echo json_encode(['status' => 'success']);
        } else {
            $_SESSION['mensaje_error'] = "Error al registrar el pago.";
            // Responder con error
            echo json_encode(['status' => 'error']);
        }
    }

    public function ver($id) {
        $venta = $this->ventaModel->obtenerVenta($id);
        $clientes = $this->clienteModel->verClientes();
        $productos = $this->productoModel->verProductos();
        if ($venta) {
            require_once(VIEWS_PATH.'ventas/verVenta.php');
        } else {
            $_SESSION['mensaje_error'] = "Venta no encontrada.";
            header("Location: " . BASE_URL . "ventas/listarVentas");
            exit();
        }
    }
}