<?php
/**
 * contro que maneja la url y lanza los procesos
 * el primer elemento es el objeto o controlador
 * el segundo es el metodo o accion
 * y el tercer y posteriores son los parametros que se pasan
 */
 class Control
 {

    protected $controlador="Login";
    protected $metodo= "caratula";
    protected $parametros = [];

    function __construct()

    {
        $url=$this->separarURL();
        /* var_dump($url); */
        if($url !="" && file_exists("../app/controllers/".ucwords($url[0]).".php")){
            $this->controlador=ucwords($url[0]);
            unset($url[0]);
            var_dump($url);

        }
        //instanciando la clase del controlador
        require_once("../app/controllers/".ucwords($this->controlador).".php");
        //instanciando la clase
        $this->controlador=new $this->controlador;

    }

    function separarURL(){
        $url= "";
        if(isset($_GET["url"])){
            //eliminamos el caracter final
            $url=rtrim($_GET["url"], "/");
            $url = rtrim($_GET["url"], "\\");
            ///limpíamos caracteres que no son propios para la url
            $url= filter_var($url, FILTER_SANITIZE_URL);
            //separamos
            $url=explode("/",$url);
            return $url;

        }
    }


}
