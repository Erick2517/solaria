<?php

require_once('conexion.php');
require_once('ClienteModel.php');

class VentaModel extends Conexion {
    private $conexion;
    private $table = 'ventas';
    private $tablaDetalle = 'detallesventas';
    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }
    
    public function verVentas(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Error al obtener las ventas: " . $e->getMessage();
            return [];
        }
    }

    public function crearVenta($clienteId, $fechaVenta, $direccionEntrega, $fechaEntregaEstimada, $productoId, $cantidad){
        try{
            $this->conexion->beginTransaction();

            $sqlVenta = "INSERT INTO {$this->table} (clienteId, fechaVenta, direccionEntrega, fechaEntregaEstimada, total) 
                          VALUES (?,?,?,?,0)";
            $cmdVenta = $this->conexion->prepare($sqlVenta);
            $cmdVenta->execute([$clienteId, $fechaVenta, $direccionEntrega, $fechaEntregaEstimada]);

            $ventaId = $this->conexion->lastInsertId();

            $sqlDetalle = "INSERT INTO {$this->tablaDetalle} (ventaId, productoId, cantidad, subtotal) 
                           VALUES (?,?,?,0)";
            $cmdDetalle = $this->conexion->prepare($sqlDetalle);
            $cmdDetalle->execute([$ventaId, $productoId, $cantidad]);

            $this->conexion->commit();
            return true;
        }catch(Exception $e){
            $this->conexion->rollBack();
            echo "Error al crear la venta: " . $e->getMessage();
            exit();
            return false;
        }
    }

    public function obtenerVenta(int $id){
        try{
            $sql = "SELECT * FROM {$this->table} where ventaId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':id', $id, PDO::PARAM_INT);
            $cmd->execute();
            $datos  = $cmd->fetch(PDO::FETCH_ASSOC);
            if (!$datos) {
                return null; // Venta no encontrada
            }
            //aqui solicito datos del productos y del cliente si es necesario
            $cliente = (new ClienteModel())->obtenerClientePorId($datos['clienteId']);
            $datos['cliente'] = $cliente;

            //datos del detalle
            $sqlDetalle = "SELECT * FROM {$this->tablaDetalle} WHERE ventaId = :id";
            $cmdDetalle = $this->conexion->prepare($sqlDetalle);
            $cmdDetalle->bindParam(':id', $id, PDO::PARAM_INT);
            $cmdDetalle->execute();
            $detalle = $cmdDetalle->fetchAll(PDO::FETCH_ASSOC);
            $datos['detalle'] = $detalle;
            return $datos;
        }catch(Exception $e){
            echo "Error al obtener las ventas: " . $e->getMessage();
            return null;
        }
    }

    public function actualizarVenta($ventaId, $clienteId, $fechaVenta, $direccionEntrega, $fechaEntregaEstimada, $productoId, $cantidad){
        try{
            $this->conexion->beginTransaction();

            $sqlVenta = "UPDATE {$this->table} 
                          SET clienteId = ?, fechaVenta = ?, direccionEntrega = ?, fechaEntregaEstimada = ? 
                          WHERE ventaId = ?";
            $cmdVenta = $this->conexion->prepare($sqlVenta);
            $cmdVenta->execute([$clienteId, $fechaVenta, $direccionEntrega, $fechaEntregaEstimada, $ventaId]);

            $sqlDetalle = "UPDATE {$this->tablaDetalle} 
                           SET productoId = ?, cantidad = ? 
                           WHERE ventaId = ?";
            $cmdDetalle = $this->conexion->prepare($sqlDetalle);
            $cmdDetalle->execute([$productoId, $cantidad, $ventaId]);

            $this->conexion->commit();
            return true;
        }catch(Exception $e){
            $this->conexion->rollBack();
            echo "Error al actualizar la venta: " . $e->getMessage();
            return false;
        }
    }

    public function eliminarVenta($id) {
        try {
            $sql = "DELETE FROM {$this->table} WHERE ventaId = ?";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute([$id]);
            return true;
        } catch (Exception $e) {
            echo "Error al eliminar la venta: " . $e->getMessage();
            $_SESSION['mensaje_error'] = "No se puede eliminar la venta porque tiene detalles asociados.";
            header("Location: " . BASE_URL . "ventas/listarVentas");
            return false;
            exit();
        }
    }


    /*public function obtenerMarca(int $id){
        try{
            $sql = "SELECT * FROM {$this->table} where marcaId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':id', $id, PDO::PARAM_INT);
            $cmd->execute();
            return $cmd->fetch(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Error al obtener las marcas: " . $e->getMessage();
            return null;
        }
    }*/
}
