<?php

function cargarControlador($controlador)
{
    $nomCont = ucwords($controlador)."Controller";//primera letra en mayuscula
    $archivoC = 'controller/'.ucwords($controlador)."Controller.php";
   
    if(!is_file($archivoC))
    {
        $archivoC='controller/'.CONTROLADOR_DEFECTO.'Controller.php';
        $nomCont = ucwords(CONTROLADOR_DEFECTO."Controller");
    }
   
    require_once $archivoC;
    $control =new $nomCont;
    return $control;
}

function cargarAccion($controller,$accion,$id=false)
{
    
    if(isset($accion) && method_exists($controller,$accion))
    {
        if(!$id){
            $controller->$accion();//invocando accion
           
        }else{
            $controller->$accion($id);
        }
    }else{
        $accion=ACCION_DEFECTO;
        $controller->$accion();
    }
}

 //Helpers para las vistas
function VistasDisponibles($controller,$user)
{
        $cUser=['Informe','Historial','NotaCurso','Usuario'];
        $cAdmin=['Universidad','Facultad','Escuela','Curso','Estudiante','NotaCurso','Administrador'];
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