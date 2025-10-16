<?php

class Login extends Controlador{
    function __construct(){
        print "hola desde el controlador login";
    }
    function caratula(){
        print "hola desde la caractula"."<br>";
    }

    function metodoVariable(){
        if(func_num_args()>0){
            for($i=0; $i< func_num_args(); $i++){
                print func_get_arg($i)."<br>";
            }
        }else{
            print "no hay argumentos."."<br>";
        }
    }

    function metodoFijo($arg1="uno", $arg2="dos", $arg3="tres"){
        print $arg1."<br>";
        print $arg2."<br>";
        print $arg3."<br>";

    }

}