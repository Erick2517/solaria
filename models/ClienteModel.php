<?php
//models/ClienteModel.php
//autor: José Garcia
//fecha de última modificacion: lun 20/10/2025

require_once('conexion.php');

/**
 * modelo para todas las operaciones de la base para la tabla de clientes
 */
class ClienteModel extends Conexion {
    
    private $conexion;
    private $tabla = 'clientes';

    /**
     *Obtiene la conexión de la clase padre que se llama Conexion.
     */
    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }


    /**
     * ver clientes
     *
     * @return array Un array de arrays con los clientes.
     */
    public function verClientes() {
        try {
            //se usa join para unir clientes con usuarios, osea para llamar info de varias tablas
            $sql = "SELECT c.clienteId,u.nombres, u.apellidos,c.numDocumentoId,c.presupuestoDisp,
                        u.email,
                        u.telefonoContacto 
                    FROM clientes AS c
                    JOIN usuarios AS u ON c.usuarioId = u.usuarioId";
            
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            
            return $cmd->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            error_log("Error al obtener clientes: ".$e->getMessage());
            return [];
        }
    }

public function insertarCliente($nombres, $apellidos, $numDocumentoId, $presupuestoDisp, $username) {
    $this->conexion->beginTransaction();

    try {
        // 1. Buscar usuarioId a partir del username
        $sqlUser = "SELECT usuarioId FROM usuarios WHERE username = ?";
        $cmdUser = $this->conexion->prepare($sqlUser);
        $cmdUser->execute([$username]);
        $usuario = $cmdUser->fetch(PDO::FETCH_ASSOC);

        if (!$usuario) {
            $this->conexion->rollBack();
            return "Error: El nombre de usuario '{$username}' no existe.";
        }

        $usuarioId = $usuario['usuarioId'];

        // 2. Validar que NO tenga ya un cliente relacionado
        $sqlCheck = "SELECT clienteId FROM clientes WHERE usuarioId = ?";
        $cmdCheck = $this->conexion->prepare($sqlCheck);
        $cmdCheck->execute([$usuarioId]);
        if ($cmdCheck->fetch(PDO::FETCH_ASSOC)) {
            $this->conexion->rollBack();
            return "Error: El usuario '{$username}' ya está asignado a un cliente.";
        }

        // 3. Actualizar nombres y apellidos directamente en la tabla usuarios
        require_once('UsuarioModel.php');
        $usuarioModel = new UsuarioModel();
        $edicion = $usuarioModel->editarUsuarioPorID($usuarioId, $nombres, $apellidos);
        if ($edicion !== true) {
            $this->conexion->rollBack();
            return $edicion ?: "Error al actualizar los datos de usuario.";
        }

        // 4. Insertar el nuevo cliente
        $sqlInsert = "INSERT INTO clientes (usuarioId, numDocumentoId, presupuestoDisp) VALUES (?, ?, ?)";
        $cmdInsert = $this->conexion->prepare($sqlInsert);
        $cmdInsert->execute([$usuarioId, $numDocumentoId, $presupuestoDisp]);

        $this->conexion->commit();
        return true;

    } catch(PDOException $e) {
        $this->conexion->rollBack();
        error_log("Error al insertar cliente: " . $e->getMessage());
        return "Error de base de datos al intentar crear el cliente.";
    }
}


/**
     * Obtiene los datos de un cliente, un id se necesita
     */
    public function obtenerClientePorId($clienteId) {
        try {
            //un join para mandar a llamar info de la otra tabla.
            $sql = "SELECT c.*, u.username 
                    FROM {$this->tabla} AS c
                    JOIN usuarios AS u ON c.usuarioId = u.usuarioId
                    WHERE c.clienteId = ?";
            
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute([$clienteId]);
            return $cmd->fetch(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            error_log("Error al obtener cliente por ID: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Actualiza un cliente buscando el ID con ayuda del username.
     */
    public function actualizarCliente($clienteId, $nombres, $apellidos, $numDocumentoId, $presupuestoDisp, $username) {
        
        $this->conexion->beginTransaction();
        try {
            //buscar el usuarioId usando el username
            $sqlUser = "SELECT usuarioId FROM usuarios WHERE username = ?";
            $cmdUser = $this->conexion->prepare($sqlUser);
            $cmdUser->execute([$username]);
            $usuario = $cmdUser->fetch(PDO::FETCH_ASSOC);

            if (!$usuario) {
                $this->conexion->rollBack();
                return "Error: El 'username' ({$username}) no fue encontrado.";
            }
            $usuarioId = $usuario['usuarioId'];
            $sql = "UPDATE {$this->tabla} 
                    SET nombres = ?, apellidos = ?, numDocumentoId = ?, 
                        presupuestoDisp = ?, usuarioId = ?
                    WHERE clienteId = ?";
            
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute([$nombres, $apellidos, $numDocumentoId, $presupuestoDisp, $usuarioId, $clienteId]);
            
            $this->conexion->commit();
            return true;

        } catch(PDOException $e) {
            $this->conexion->rollBack();
            error_log("Error al actualizar cliente: " . $e->getMessage());
            return "Error DB al intentar actualizar.";
        }
    }

}
?>