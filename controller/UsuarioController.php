<?php 
class UsuarioController extends ControladorBase{
    
    public function __construct() {
        parent::__construct();
    }

    public function Index(){
        if(isset($_SESSION['user'])){
            self::view("Usuario","Index",$_SESSION['user']);
        }else{
            self::view("Login","Index");
        }
    }
  
}
?>
