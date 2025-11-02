<?php
//autor: Erick Landaverde
//fecha: 11/10/2025
//descripcion: clase para crear conexion a base de datos

//carga de variables de entorno
require_once __DIR__ . '/../helpers/EnvLoader.php';
EnvLoader::load(__DIR__ . '/../.env');


class Conexion 
{
    private $host;
    private $port;
    private $user;
    private $pass;
    private $dbname;
    private $conDB = null;

    public function __construct() {
        try{
            $this->host = EnvLoader::get('DBHOST', 'localhost');
            $this->port = EnvLoader::get('DBPORT', '3306');
            $this->user = EnvLoader::get('DBUSER', 'root');
            $this->pass = EnvLoader::get('DBPASS', '');
            $this->dbname = EnvLoader::get('DBNAME', 'test');
            $strConexion = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}";
            $this->conDB = new PDO($strConexion, $this->user, $this->pass);
            //echo "Conexion exitosa";
        }catch(Exception $e){
            echo "Error al cargar la conexion: " . $e->getMessage();
        }
    }

    public function getConexion() {
        return $this->conDB;
    }

}
