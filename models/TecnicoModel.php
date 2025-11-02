<?php
require_once('conexion.php');

class TecnicoModel extends Conexion {
    private $conexion;
    private $table = 'tecnicos';

    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    // ✅ Ver todos los técnicos
    public function verTecnicos(){
        try {
            $sql = "SELECT * FROM {$this->table}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener técnicos: " . $e->getMessage();
            return [];
        }
    }

    // ✅ Ver técnico por ID
    public function verTecnico($id){
        try {
            $sql = "SELECT * FROM {$this->table} WHERE tecnicoId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':id', $id, PDO::PARAM_INT);
            $cmd->execute();
            return $cmd->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener técnico: " . $e->getMessage();
            return null;
        }
    }

    // 🟢 Crear nuevo técnico
    public function crearTecnico($usuarioId, $especialidad, $nivelCategoria, $fechaContratacion, $fechaFinContrato){
        try {
            $sql = "INSERT INTO {$this->table} (usuarioId, especialidad, nivelCategoria, fechaContratacion, fechaFinContrato)
                    VALUES (:usuarioId, :especialidad, :nivelCategoria, :fechaContratacion, :fechaFinContrato)";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':usuarioId', $usuarioId);
            $cmd->bindParam(':especialidad', $especialidad);
            $cmd->bindParam(':nivelCategoria', $nivelCategoria);
            $cmd->bindParam(':fechaContratacion', $fechaContratacion);
            $cmd->bindParam(':fechaFinContrato', $fechaFinContrato);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al crear técnico: " . $e->getMessage();
            return false;
        }
    }

    // 🟡 Actualizar técnico
    public function actualizarTecnico($tecnicoId, $especialidad, $nivelCategoria, $fechaContratacion, $fechaFinContrato){
        try {
            $sql = "UPDATE {$this->table}
                    SET especialidad = :especialidad, nivelCategoria = :nivelCategoria, 
                        fechaContratacion = :fechaContratacion, fechaFinContrato = :fechaFinContrato
                    WHERE tecnicoId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':especialidad', $especialidad);
            $cmd->bindParam(':nivelCategoria', $nivelCategoria);
            $cmd->bindParam(':fechaContratacion', $fechaContratacion);
            $cmd->bindParam(':fechaFinContrato', $fechaFinContrato);
            $cmd->bindParam(':id', $tecnicoId, PDO::PARAM_INT);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al actualizar técnico: " . $e->getMessage();
            return false;
        }
    }

    // 🔴 Eliminar técnico
    public function eliminarTecnico($tecnicoId){
        try {
            $sql = "DELETE FROM {$this->table} WHERE tecnicoId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':id', $tecnicoId, PDO::PARAM_INT);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al eliminar técnico: " . $e->getMessage();
            return false;
        }
    }
}
?>
