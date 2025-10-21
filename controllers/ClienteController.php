<?php
// controllers/ClienteController.php

// los archivos
require_once('models/ClienteModel.php');
// Para que se pueda usar VIEWS_PATH y redirect()
require_once('helpers/config.php'); 
class ClienteController {
    
    private $clienteModel;

    /**
     * Constructor para instanciar el modelo y arranca las sesiones para mensajes flash.
     */
    public function __construct() {
        // Iniciamos sesión para poder usar $_SESSION['mensaje']
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->clienteModel = new ClienteModel();
    }


    /**
     * mostrar la lista de clientes.
     */
    public function mostrarPanelClientes() {
        //pedimos los datos (la lista) al modelo
        $data['clientes'] = $this->clienteModel->verClientes();
        // título para la vista
        $data['titulo'] = "Panel de Clientesss";

        if (isset($_SESSION['mensaje'])) {
            $data['mensaje'] = $_SESSION['mensaje'];
            unset($_SESSION['mensaje']); 
        }
        
         //pasándole los datos a la vista y mostrnadola
        require_once(VIEWS_PATH . 'clientes/panelClientes.php');
    }



}
?>