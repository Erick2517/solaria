<?php

require_once('conexion.php');
require_once('ClienteModel.php');

class PagoModel extends Conexion {
    private $conexion;
    private $table = 'pagos';
    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }
    
    public function verPagos(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Error al obtener los pagos: " . $e->getMessage();
            return [];
        }
    }
    public function registrarPago($ventaId, $clienteId, $monto, $fechaPago, $estado){
        try{
            $sql = "INSERT INTO {$this->table} (ventaId, clienteId, montoPago, fechaPago, estadoPago) 
                    VALUES (?,?,?,?,?)";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute([$ventaId, $clienteId, $monto, $fechaPago, $estado]);
            header('Content-Type: application/json');
            return json_encode(['status' => 'success']);
            exit;
        }catch(Exception $e){
            http_response_code(400);
            return json_encode(['status' => 'error', 'message' => 'El pago no fue completado']);
            exit;
        }
    }
}
