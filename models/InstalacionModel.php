<?php
require_once('conexion.php');

class InstalacionModel extends Conexion {
    private $conexion;

    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    public function obtenerTodas() {
        $sql = "SELECT * FROM instalaciones";
        $cmd = $this->conexion->prepare($sql);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    public function obtenerInstalacionesConTecnico() {
        $sql = "SELECT 
                    c.clienteId,
                    i.instalacionId,
                    i.estado,
                    i.fechaEstimada,
                    u.nombres AS tecnico
                FROM instalaciones i
                JOIN clientes c ON c.clienteId = i.clienteId
                LEFT JOIN instalacionestecnicos it ON i.instalacionId = it.instalacionId
                LEFT JOIN tecnicos t ON t.tecnicoId = it.tecnicoId
                LEFT JOIN usuarios u ON u.usuarioId = t.usuarioId
                ";
        $cmd = $this->conexion->prepare($sql);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }

}
