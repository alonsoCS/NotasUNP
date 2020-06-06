<?php 
class UsuarioController extends MainController{

    public function __construct()
    {
        MainController::__construct();
    }

    public function Index(){
        if(isset($_SESSION['user'])){
            $this->view("Usuario","Index",$_SESSION['user']);
        }else{
            $this->view("Login","Index");
        }
    }
  
}
?> 
