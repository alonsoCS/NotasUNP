<?php  

class MainController{
	public function __construct()
	{
		foreach(glob("model/*.php") as $file){
            require_once $file;
        }
	}



	public function view($controlador,$vista,$datos=False){//vistas
        include_once 'view/main.php';
    }
    
}