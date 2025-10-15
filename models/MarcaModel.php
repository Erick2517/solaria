<?php

require_once('conexion.php');

class MarcaModel extends Conexion {
    private $conexion;
    private $table = 'marcas';
    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    public function verMarcas(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Error al obtener las marcas: " . $e->getMessage();
            return [];
            
        }
    }
}
