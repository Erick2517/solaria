<?php

require_once('conexion.php');

class ProductoModel extends Conexion {
    private $conexion;
    private $table = 'productos';
    public function __construct() {
        parent::__construct();
        $this->conexion = $this->getConexion();
    }

    public function verProductos(){
        try{
            $sql = "SELECT * FROM {$this->table}";
            $cmd = $this->conexion->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }catch(Exception $e){
            echo "Error al obtener los productos: " . $e->getMessage();
            return [];
            
        }
    }
}
