<?php
require_once('conexion.php');

class CitaTecnicoModel extends Conexion {
    private $conexion;
    private $table = 'citastecnicos';

    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    // ✅ Ver todos los registros de citastecnicos
    public function verCitasTecnicos(){
        try {
            $sql = "SELECT * FROM {$this->table}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener las relaciones cita-técnico: " . $e->getMessage();
            return [];
        }
    }

    // ✅ Ver por ID (citaTecnicoId)
    public function verCitaTecnico($id){
        try {
            $sql = "SELECT * FROM {$this->table} WHERE citaTecnicoId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':id', $id, PDO::PARAM_INT);
            $cmd->execute();
            return $cmd->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener la relación: " . $e->getMessage();
            return null;
        }
    }

    // 🟢 Crear nueva relación cita - técnico
    public function crearCitaTecnico($tecnicoId, $citaId){
        try {
            $sql = "INSERT INTO {$this->table} (tecnicoId, citaId) VALUES (:tecnicoId, :citaId)";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':tecnicoId', $tecnicoId);
            $cmd->bindParam(':citaId', $citaId);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al asignar técnico a cita: " . $e->getMessage();
            return false;
        }
    }

    // 🟡 Actualizar relación
    public function actualizarCitaTecnico($citaTecnicoId, $tecnicoId, $citaId){
        try {
            $sql = "UPDATE {$this->table}
                    SET tecnicoId = :tecnicoId, citaId = :citaId
                    WHERE citaTecnicoId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':tecnicoId', $tecnicoId);
            $cmd->bindParam(':citaId', $citaId);
            $cmd->bindParam(':id', $citaTecnicoId, PDO::PARAM_INT);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al actualizar relación: " . $e->getMessage();
            return false;
        }
    }

    // 🔴 Eliminar relación
    public function eliminarCitaTecnico($citaTecnicoId){
        try {
            $sql = "DELETE FROM {$this->table} WHERE citaTecnicoId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':id', $citaTecnicoId, PDO::PARAM_INT);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al eliminar relación: " . $e->getMessage();
            return false;
        }
    }

    // 📌 Extra: Ver técnicos asignados a una cita específica
    public function verTecnicosPorCita($citaId){
        try {
            $sql = "SELECT t.* FROM tecnicos t
                    INNER JOIN {$this->table} ct ON t.tecnicoId = ct.tecnicoId
                    WHERE ct.citaId = :citaId";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':citaId', $citaId, PDO::PARAM_INT);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener técnicos de la cita: " . $e->getMessage();
            return [];
        }
    }

    // 📌 Extra: Ver citas asignadas a un técnico específico
    public function verCitasPorTecnico($tecnicoId){
        try {
            $sql = "SELECT c.* FROM citas c
                    INNER JOIN {$this->table} ct ON c.citaId = ct.citaId
                    WHERE ct.tecnicoId = :tecnicoId";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':tecnicoId', $tecnicoId, PDO::PARAM_INT);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener citas del técnico: " . $e->getMessage();
            return [];
        }
    }
}
?>
