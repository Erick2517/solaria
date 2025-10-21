<?php
//models/ClienteModel.php
//autor: José Garcia
//fecha de última modificacion: lun 20/10/2025

require_once('conexion.php');

/**
 *ClienteModel
 * modelo para todas las operaciones de la base
 * para la tabla de "clientes".
 */
class ClienteModel extends Conexion {
    
    private $conexion;
    private $table = 'clientes';

    /**
     *Obtiene la conexión de la clase padre que se llama Conexion.
     */
    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }


    /**
     * LEER (Read - Todos los Clientes)
     * Obtiene todos los clientes con su información de usuario.
     *
     * @return array Un array de arrays asociativos con los clientes.
     */
    public function verClientes() {
        try {
            //se usa join para unir clientes con usuarios, osea para llamar info de varias tablas
            $sql = "SELECT c.clienteId,c.nombres, c.apellidos,c.numDocumentoId,c.presupuestoDisp,
                        u.email,
                        u.telefonoContacto 
                    FROM clientes AS c
                    JOIN usuarios AS u ON c.usuarioId = u.usuarioId";
            
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            
            return $cmd->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e) {
            error_log("Error al obtener clientes: " . $e->getMessage());
             //array vacío en caso de error
            return [];
        }
    }


}
?>