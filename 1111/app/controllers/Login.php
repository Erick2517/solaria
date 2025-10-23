<?php

class Login extends Controlador{
    private $modelo;
    function __construct(){
        $this->modelo=$this->modelo("LoginModelo");//el metodo llamado modelo es del Controlador (clase dentro del archivo Controlador.php)
    }
    function caratula(){
        $datos=[];
        $this->vista("loginVista",$datos);//tambien este metodo esta en : clase dentro del archivo Controlador.php

    }



}