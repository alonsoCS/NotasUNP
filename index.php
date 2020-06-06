<?php
session_start(['name'=>'Notas']);
    //Configuración global
    require_once "config/global.php";
    //base global
    require_once "config/router.php";

    require_once "config/MainController.php";

    require_once "config/mainModel.php";
    
    
    if(isset($_GET['views']))
	{
		$ruta=explode("/",$_GET['views']);
		if(isset($ruta[0]))
		{
            if(!isset($_SESSION['user']) && $ruta[0]!="Login"){
                $ruta[0]="Login";
                $ruta[1]="Index";
            }else if($ruta[0]!="Login")
            {
                $ruta[0]=VistasDisponibles($ruta[0],$_SESSION['user']);
            }
            $controlador=cargarControlador($ruta[0]);
			if(isset($ruta[1]))
			{

                if(isset($_GET['id']))
                {
                    cargarAccion($controlador,$ruta[1],$_GET['id']);
                }else{
                    cargarAccion($controlador,$ruta[1]);
                }
    			
    		}else{
    			cargarAccion($controlador,ACCION_DEFECTO);
    		}
    	}
    }else{
         $controlador=cargarControlador(CONTROLADOR_DEFECTO);
        cargarAccion($controlador,ACCION_DEFECTO);
    }
