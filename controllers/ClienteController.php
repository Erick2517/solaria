<?php
//autor: José García
//fecha de última modificación: 21/10/2025
//descripcion: Controlador para manejar los usuarios
// los archivos
require_once('models/ClienteModel.php');
require_once('models/InstalacionModel.php');
require_once('models/UsuarioModel.php');
// Para que se pueda usar VIEWS_PATH y redirect()
require_once('helpers/config.php'); 
class ClienteController {
    
    private $clienteModel;
    private $instalacionModel;

    /**
     * Constructor para instanciar el modelo
     */
    public function __construct() {
        // Iniciar sesion para poder usar SESSION['mensaje']
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->instalacionModel=new InstalacionModel();
        $this->clienteModel = new ClienteModel();
    }


    /**
     * mostrar la lista de clientes.
     */
    public function mostrarPanelClientes() {
        //pedimos los datos (osea la lista) al modelo
        $data['clientes'] = $this->clienteModel->verClientes();
        /* $data['instalaciones']=$this->instalacionModel->obtenerTodas(); */
        $data['instalaciones']=$this->instalacionModel->obtenerInstalacionesConTecnico();
        
        $data['titulo'] = "Panel de Clientesss";

        if (isset($_SESSION['mensaje'])) {
            $data['mensaje'] = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']); 
        }
        
         //pasándole los datos a la vista y mostrnadola
        require_once(VIEWS_PATH . 'clientes/panelClientes.php');
    }

    /**
     * muestra el formulario que permite hacer registro de nuevos clientes 
     */
        public function mostrarFormularioInsertar() {
        $data['titulo'] = "Crear Nuevo Cliente";
        require_once(VIEWS_PATH . 'clientes/formCrearCliente.php');
    }


/**
     * trabaja con los datos del formulario de creación de un cliente nuevo
     * cuando da error recarga el formulario.
     * Si todo sale bien redirige al panel.
     */
    public function insertar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $nombres = trim($_POST['nombres']);
            $apellidos = trim($_POST['apellidos']);
            $numDocumento = trim($_POST['numDocumentoId']);
            $presupuestoDisp = trim($_POST['presupuestoDisp']);
            $username = trim($_POST['username']);
            
//asegurando que los datos no estén vacíos
            if (empty($nombres) || empty($apellidos) || empty($numDocumento) || $presupuestoDisp === '' || empty($username)) {
                //se usan losmismos los datos para recargar el formulario
                $data['titulo'] = "Crear Nuevo Cliente";
                $data['dantig'] = $_POST; 
                // Guardamos los datos viejos para rellenar el form
                $data['mensaje'] = "los campos con * son obligatorios.";
                require_once(VIEWS_PATH . 'clientes/formCrearCliente.php');
                return;
            }
            
            //llamar al modelo para poder insertar
            $resultado = $this->clienteModel->insertarCliente($nombres, $apellidos, $numDocumento, $presupuestoDisp, $username);
        
            if ($resultado === true) {
                $_SESSION['mensaje'] = "cliente creado";
                redirect("cliente/mostrarPanelClientes");
            
            } else {
                $data['titulo'] = "Crear Nuevo cliente";
                $data['mensaje'] = $resultado;
                $data['dantig'] = $_POST;
                require_once(VIEWS_PATH . 'clientes/formCrearCliente.php');
                return;
            }

        } else {
            redirect("cliente/mostrarFormularioInsertar");
        }
    }
public function mostrarFormularioEditar($clienteId) {
    // Cargar modelo cliente y usuario
    $clienteModel = new ClienteModel();
    $usuarioModel = new UsuarioModel();

    // Obtener datos del cliente
    $cliente = $clienteModel->obtenerClientePorId($clienteId);

    if (!$cliente) {
        // Manejar error, cliente no existe
        $data['mensaje'] = "Cliente no encontrado.";
        require_once VIEWS_PATH . 'error.php';
        return;
    }

    // Obtener datos de usuario relacionados (nombres, apellidos, username)
    $usuario = $usuarioModel->obtenerUsuarioPorId($cliente['usuarioId']);

    $data['cliente'] = $cliente;
    $data['clienteUsuario'] = $usuario;

    // Si hubo intento de edición fallida, puede haber 'anteriores' con valores para rellenar el formulario
    if (isset($_SESSION['datos_anteriores'])) {
        $data['anteriores'] = $_SESSION['datos_anteriores'];
        unset($_SESSION['datos_anteriores']);
    }

    $data['titulo'] = "Editar Cliente";

    // Cargar la vista con los datos
    require_once VIEWS_PATH . 'clientes/formEditarCliente.php';
}


    /**
     * metodo update, permite actualizar la info de clientes
     *
     */
    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            $clienteId = $_POST['clienteId'];
            $nombres = trim($_POST['nombres']);
            $apellidos = trim($_POST['apellidos']);
            $numDocumento = trim($_POST['numDocumentoId']);
            $presupuestoDisp = trim($_POST['presupuestoDisp']);
            //este campo es de la tabla de usuarios
            $username = trim($_POST['username']);
            if (empty($nombres) || empty($apellidos) || empty($numDocumento) || $presupuestoDisp === '' || empty($username)) {
                $data['titulo'] = "Editar Cliente";
                $data['mensaje'] = "no deben haber campos vacíos";
                $data['dantig'] = $_POST;
                $data['cliente'] = $this->clienteModel->obtenerClientePorId($clienteId);
                
                require_once(VIEWS_PATH . 'clientes/formEditarCliente.php');
                return;
            }
            
            //se debe actualizar el modelo
            $resultado = $this->clienteModel->actualizarCliente($clienteId, $nombres, $apellidos, $numDocumento, $presupuestoDisp, $username);
            if ($resultado === true) {
                $_SESSION['mensaje'] = "Cliente actualizado exitosamente.";
                redirect("cliente/mostrarPanelClientes");
            } else {
                $data['titulo'] = "Editar Cliente";
                $data['mensaje'] = $resultado;
                $data['dantig'] = $_POST;
                $data['cliente'] = $this->clienteModel->obtenerClientePorId($clienteId);
                
                require_once(VIEWS_PATH . 'clientes/formEditarCliente.php');
                return;
            }
        } else {
            redirect("cliente/mostrarPanelClientes");
        }
    }


}
?>