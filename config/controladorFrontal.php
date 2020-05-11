<?php
//FUNCIONES PARA EL CONTROLADOR FRONTAL

function cargarControlador($controller){
    $controlador=ucwords($controller).'Controller';
    //echo $controlador."   ";
    $strFileController='controller/'.$controlador.'.php';
    if(!is_file($strFileController)){
       
        $strFileController='controller/'.ucwords(CONTROLADOR_DEFECTO).'Controller.php';   
    }
   
    require_once $strFileController;
   
    $controllerObj= new $controlador();
    return $controllerObj;
    
}

function cargarAccion($controllerObj,$action){
    $accion=$action;
   
   $controllerObj->$accion();
}

function lanzarAccion($controllerObj,$action){
        if(method_exists($controllerObj, $action)){
            
            cargarAccion($controllerObj, $action);
        }else{
            cargarAccion($controllerObj, ACCION_DEFECTO);
        }
}

 //Helpers para las vistas
function VistasDisponibles($controller,$user)
{
        $cUser=['Informe','Historial','NotaCurso','Usuario'];
        $cAdmin=['Universidad','Facultad','Escuela','Ciclo','Curso','Estudiante','NotaCurso','Administrador'];
        if($user=="Administrador")
        {
            if (in_array($controller, $cAdmin)) 
            {
                return $controller;
            }else
            {
                return "Administrador";
            }
        }else
        {
            if (in_array($controller, $cUser))
            {
                return $controller;
            }else{
                return "Usuario";
            }
        }

    }

?>