<?php
// models/EnviosModel.php
require_once('conexion.php');

class EnviosModel extends Conexion {
    private $conexion;
    private $tabla = 'envios';

    public function __construct() {
        parent::__construct();                 // igual que ClienteModel
        $this->conexion = $this->getConexion(); // igual que ClienteModel
    }

    // Listar todos los envíos con nombre del repartidor y estado derivado por fechas
    public function listarEnvios() {
        try {
            $sql = "SELECT
                        e.envioId, e.ventaId, e.repartidorId,
                        e.direccionEntrega, e.costoEnvio,
                        e.fechaPaqueteRecibido, e.fechaPaqueteEntregado,
                        r.nombreRepartidor,
                        CASE
                          WHEN e.fechaPaqueteEntregado IS NOT NULL THEN 'entregado'
                          WHEN e.fechaPaqueteRecibido  IS NOT NULL THEN 'en tránsito'
                          ELSE 'pendiente'
                        END AS estado
                    FROM {$this->tabla} AS e
                    JOIN repartidores AS r ON e.repartidorId = r.repartidorId
                    ORDER BY e.envioId DESC";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error listarEnvios: ".$e->getMessage());
            return [];
        }
    }

    // Insertar nuevo envío (sin columna estado; se deriva de fechas)
    public function agregarEnvio($ventaId, $repartidorId, $costoEnvio, $direccionEntrega, $fechaRecibido = null, $fechaEntregado = null) {
        $this->conexion->beginTransaction();
        try {
            $sql = "INSERT INTO {$this->tabla}
                    (ventaId, repartidorId, direccionEntrega, costoEnvio, fechaPaqueteRecibido, fechaPaqueteEntregado)
                    VALUES (?, ?, ?, ?, ?, ?)";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute([$ventaId, $repartidorId, $direccionEntrega, $costoEnvio, $fechaRecibido, $fechaEntregado]);

            $id = (int)$this->conexion->lastInsertId();
            $this->conexion->commit();
            return $id;
        } catch (PDOException $e) {
            $this->conexion->rollBack();
            error_log("Error agregarEnvio: ".$e->getMessage());
            return false;
        }
    }

    // Cambiar “estado” ajustando fechas según regla de negocio
    // pendiente => ambas NULL; recibido => recibida NOW y entregada NULL; entregado => recibida COALESCE y entregada NOW
    public function actualizarEstado($envioId, $estado) {
        try {
            $estado = strtolower($estado);
            if ($estado === 'pendiente') {
                $sql = "UPDATE {$this->tabla}
                        SET fechaPaqueteRecibido = NULL, fechaPaqueteEntregado = NULL
                        WHERE envioId = ?";
                $cmd = $this->conexion->prepare($sql);
                return $cmd->execute([$envioId]);
            } elseif ($estado === 'recibido') {
                $sql = "UPDATE {$this->tabla}
                        SET fechaPaqueteRecibido = COALESCE(fechaPaqueteRecibido, NOW()),
                            fechaPaqueteEntregado = NULL
                        WHERE envioId = ?";
                $cmd = $this->conexion->prepare($sql);
                return $cmd->execute([$envioId]);
            } elseif ($estado === 'entregado') {
                $sql = "UPDATE {$this->tabla}
                        SET fechaPaqueteRecibido = COALESCE(fechaPaqueteRecibido, NOW()),
                            fechaPaqueteEntregado = NOW()
                        WHERE envioId = ?";
                $cmd = $this->conexion->prepare($sql);
                return $cmd->execute([$envioId]);
            }
            return false;
        } catch (PDOException $e) {
            error_log("Error actualizarEstado: ".$e->getMessage());
            return false;
        }
    }

    // Para combo en formulario "nuevo"
    public function listarRepartidores() {
        try {
            $sql = "SELECT repartidorId, nombreRepartidor, costoEntrega, telefono
                    FROM repartidores
                    ORDER BY nombreRepartidor";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error listarRepartidores: ".$e->getMessage());
            return [];
        }
    }
}
