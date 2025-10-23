<?php
/*
    manejo de la base
*/


class MySQLdb{
    private $host = "localhost";
    private $usuario = "root";
    private $clave = ""; 
    private $db = "solaria";
    private $puerto = "";
    private $conn;

    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->usuario, $this->clave, $this->db);
        if(mysqli_connect_errno()){
            printf("error en la conexions %s", mysqli_connect_errno());
            exit();
        }
        else{
            print "conexion salio bien". "<br>";
        }


        if(!mysqli_set_charset($this->conn, "utf8")){
            printf("error en la conexions %s", mysqli_connect_error());
            exit();
        }else{
            print "el conjunto de caracteres es :".mysqli_character_set_name($this->conn). "<br>";
        }

    }
}

?>