<?php
class HistorialController extends ControladorBase{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
       
        $usuario=$_SESSION['user'];
        $curso=new CursoModelo();
        $datos=$curso->ConsultarCursosHistorial($usuario->CodEscuela,$usuario->CodEstudiante);
        $this->view("Historial","Index",$datos);
    }
    public function Create(){
        
    }
}
    

    
?>