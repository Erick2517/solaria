<?php
class Controlador{
    function __construct()
    {
        
    }
    public function modelo($modelo){
        require_once("../app/models/".$modelo.".php");
        return new $modelo;
    }

    public function vista($vista, $datos=[]){
        if(file_exists("../app/views/".$vista.".php")){//tener cudado con el nombre de carpetas
            require_once("../app/views/".$vista.".php");
        }else{
            die("la bista no eciste");
        }
    }



}