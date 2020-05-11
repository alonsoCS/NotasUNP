<?php
class ControladorBase{

    public function __construct() {
		
        //Incluir todos los modelos
        foreach(glob("model/*.php") as $file){
            require_once $file;
        }
    }
    
    //Plugins y funcionalidades
    
    public function view($controlador,$vista,$datos=False){//vistas
        require_once 'config/AyudaVistas.php';
        
        $helper=new AyudaVistas();
        
        include_once 'view/main.php';
        
    }
    
    public function redirect($controlador=CONTROLADOR_DEFECTO,$accion=ACCION_DEFECTO){
       
        header("Location: http://localhost:81/MVC/".$controlador."/".$accion);

    }
    
    //Métodos para los controladores

}
?>
