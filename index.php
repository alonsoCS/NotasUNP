<?php
 session_start();
//Configuración global
require_once 'config/global.php';//variables globales

//Base para los controladores
require_once 'config/controladorBase.php';//importa los modelos

//Funciones para el controlador frontal
require_once 'config/controladorFrontal.php';

$host= $_SERVER["HTTP_HOST"];
$url= $_SERVER["REQUEST_URI"];
$url=trim($url);
$url=str_ireplace("/MVC/", "",$url);
$url=explode("/", $url);

    //Cargamos controladores y acciones
    if(count($url)!=0 && $url[0]!=""){
	    if(!isset($_SESSION['user']) && $url[0]!="Login"){
            $url[0]="Login";
            $url[1]="Index";
        }else if($url[0]!="Login")
        {
            $url[0]=VistasDisponibles($url[0],$_SESSION['user']);
        }

            $controllerObj=cargarControlador($url[0]);
            if(isset($url[1])){
    	       lanzarAccion($controllerObj,$url[1]);
            }else
            {
    	       lanzarAccion($controllerObj,ACCION_DEFECTO);
            }
    }
    else
    {
        $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
        lanzarAccion($controllerObj,ACCION_DEFECTO);
    }

?>
