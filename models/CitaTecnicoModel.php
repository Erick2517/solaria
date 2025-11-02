<?php
require_once('conexion.php');

class CitaTecnicoModel extends Conexion {
    private $conexion;
    private $tabla = 'citastecnicos';

    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    // ✅ Ver todas las relaciones Cita - Técnico
    public function listarCitasTecnicos() {
        try {
            $sql = "SELECT 
                        ct.citaTecnicoId,
                        c.citaId, c.descripcion, c.fechaAcordadaCita, c.fechaRegistro,
                        t.tecnicoId, t.especialidad, t.nivelCategoria,
                        CONCAT('Técnico ', t.tecnicoId) AS tecnicoNombre
                    FROM {$this->tabla} ct
                    INNER JOIN tecnicos t ON ct.tecnicoId = t.tecnicoId
                    INNER JOIN citas c ON ct.citaId = c.citaId
                    ORDER BY c.fechaAcordadaCita DESC";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al listar Citas-Técnicos: " . $e->getMessage();
            return [];
        }
    }

    // ✅ Crear nueva relación
    public function crearRelacion($tecnicoId, $citaId) {
        try {
            $sql = "INSERT INTO {$this->tabla} (tecnicoId, citaId) VALUES (:tecnicoId, :citaId)";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':tecnicoId', $tecnicoId);
            $cmd->bindParam(':citaId', $citaId);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al crear relación: " . $e->getMessage();
            return false;
        }
    }

    // ✅ Eliminar relación
    public function eliminarRelacion($id) {
        try {
            $sql = "DELETE FROM {$this->tabla} WHERE citaTecnicoId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindParam(':id', $id, PDO::PARAM_INT);
            return $cmd->execute();
        } catch (Exception $e) {
            echo "Error al eliminar relación: " . $e->getMessage();
            return false;
        }
    }

    // 📋 Obtener lista de técnicos para el formulario
    public function listarTecnicos() {
        try {
            $sql = "SELECT tecnicoId, especialidad, nivelCategoria FROM tecnicos ORDER BY tecnicoId ASC";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener técnicos: " . $e->getMessage();
            return [];
        }
    }

    // 📋 Obtener lista de citas para el formulario
    public function listarCitas() {
        try {
            $sql = "SELECT citaId, descripcion, fechaAcordadaCita FROM citas ORDER BY fechaAcordadaCita DESC";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "Error al obtener citas: " . $e->getMessage();
            return [];
        }
    }
}
?>
