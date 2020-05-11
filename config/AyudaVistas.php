<?php
class AyudaVistas{
    
    public function url($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
        $urlString=$controlador."/".$accion;
        return URL.$urlString;
    }
    
   
    
}
?>