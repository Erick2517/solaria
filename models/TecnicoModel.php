<?php
require_once('conexion.php');

class TecnicoModel extends Conexion {
    private $conexion;
    private $tabla = 'tecnicos'; // nombre de la tabla

    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();

        // Validar conexión
        if (!$this->conexion) {
            throw new Exception("Error: No se pudo establecer conexión con la base de datos.");
        }
    }

    // ✅ Ver todos los técnicos
    public function verTecnicos() {
        try {
            $sql = "SELECT * FROM {$this->tabla}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener técnicos: " . $e->getMessage());
            return [];
        }
    }

    // ✅ Ver técnico por ID
    public function verTecnico($id) {
        try {
            $sql = "SELECT * FROM {$this->tabla} WHERE tecnicoId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindValue(':id', $id, PDO::PARAM_INT);
            $cmd->execute();
            return $cmd->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener técnico: " . $e->getMessage());
            return null;
        }
    }

    // 🟢 Crear nuevo técnico
    public function crearTecnico($usuarioId, $especialidad, $nivelCategoria, $fechaContratacion, $fechaFinContrato) {
        try {
            $sql = "INSERT INTO {$this->tabla} 
                    (usuarioId, especialidad, nivelCategoria, fechaContratacion, fechaFinContrato)
                    VALUES (:usuarioId, :especialidad, :nivelCategoria, :fechaContratacion, :fechaFinContrato)";
            
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindValue(':usuarioId', $usuarioId, PDO::PARAM_INT);
            $cmd->bindValue(':especialidad', $especialidad, PDO::PARAM_STR);
            $cmd->bindValue(':nivelCategoria', $nivelCategoria, PDO::PARAM_STR);
            $cmd->bindValue(':fechaContratacion', $fechaContratacion);
            $cmd->bindValue(':fechaFinContrato', $fechaFinContrato);

            return $cmd->execute();
        } catch (PDOException $e) {
            error_log("Error al crear técnico: " . $e->getMessage());
            return false;
        }
    }

    // 🟡 Actualizar técnico
    public function actualizarTecnico($tecnicoId, $especialidad, $nivelCategoria, $fechaContratacion, $fechaFinContrato) {
        try {
            $sql = "UPDATE {$this->tabla}
                    SET especialidad = :especialidad,
                        nivelCategoria = :nivelCategoria,
                        fechaContratacion = :fechaContratacion,
                        fechaFinContrato = :fechaFinContrato
                    WHERE tecnicoId = :id";

            $cmd = $this->conexion->prepare($sql);
            $cmd->bindValue(':especialidad', $especialidad, PDO::PARAM_STR);
            $cmd->bindValue(':nivelCategoria', $nivelCategoria, PDO::PARAM_STR);
            $cmd->bindValue(':fechaContratacion', $fechaContratacion);
            $cmd->bindValue(':fechaFinContrato', $fechaFinContrato);
            $cmd->bindValue(':id', $tecnicoId, PDO::PARAM_INT);

            return $cmd->execute();
        } catch (PDOException $e) {
            error_log("Error al actualizar técnico: " . $e->getMessage());
            return false;
        }
    }

    // 🔴 Eliminar técnico
    public function eliminarTecnico($tecnicoId) {
        try {
            $sql = "DELETE FROM {$this->tabla} WHERE tecnicoId = :id";
            $cmd = $this->conexion->prepare($sql);
            $cmd->bindValue(':id', $tecnicoId, PDO::PARAM_INT);
            return $cmd->execute();
        } catch (PDOException $e) {
            error_log("Error al eliminar técnico: " . $e->getMessage());
            return false;
        }
    }
}
?>
