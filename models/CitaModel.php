<?php
require_once('conexion.php');

class CitaModel extends Conexion {
    private $conexion;
    private $table = 'citas';

    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    // ✅ Ver todas las citas
    public function verCitas(){
        try {
            $sql = "SELECT * FROM {$this->table}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener citas: " . $e->getMessage();
            return [];
        }
    }

    // ✅ Ver cita por ID
    public function verCita($id){
        try {
            $sql = "SELECT * FROM {$this->table} WHERE citaId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':id', $id, PDO::PARAM_INT);
            $cmd->execute();
            return $cmd->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener cita: " . $e->getMessage();
            return null;
        }
    }

    // 🟢 Crear nueva cita
    public function crearCita($clienteId, $descripcion, $fechaAcordadaCita){
        try {
            $fechaRegistro = date('Y-m-d H:i:s'); // guarda la fecha actual
            $sql = "INSERT INTO {$this->table} (clienteId, descripcion, fechaAcordadaCita, fechaRegistro)
                    VALUES (:clienteId, :descripcion, :fechaAcordadaCita, :fechaRegistro)";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':clienteId', $clienteId);
            $cmd->bindParam(':descripcion', $descripcion);
            $cmd->bindParam(':fechaAcordadaCita', $fechaAcordadaCita);
            $cmd->bindParam(':fechaRegistro', $fechaRegistro);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al crear cita: " . $e->getMessage();
            return false;
        }
    }

    // 🟡 Actualizar cita
    public function actualizarCita($citaId, $clienteId, $descripcion, $fechaAcordadaCita){
        try {
            $sql = "UPDATE {$this->table}
                    SET clienteId = :clienteId, descripcion = :descripcion, fechaAcordadaCita = :fechaAcordadaCita
                    WHERE citaId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':clienteId', $clienteId);
            $cmd->bindParam(':descripcion', $descripcion);
            $cmd->bindParam(':fechaAcordadaCita', $fechaAcordadaCita);
            $cmd->bindParam(':id', $citaId, PDO::PARAM_INT);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al actualizar cita: " . $e->getMessage();
            return false;
        }
    }

    // 🔴 Eliminar cita
    public function eliminarCita($citaId){
        try {
            $sql = "DELETE FROM {$this->table} WHERE citaId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':id', $citaId, PDO::PARAM_INT);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al eliminar cita: " . $e->getMessage();
            return false;
        }
    }
}
?>
