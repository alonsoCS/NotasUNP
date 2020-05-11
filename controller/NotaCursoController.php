<?php
class NotaCursoController extends ControladorBase{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        
        $usuario=$_SESSION['user'];
        if($usuario!="Administrador")
        {
            $curso=new CursoModelo();
            $datos=$curso->ConsultarCursosUsuario($usuario->CodEscuela,$usuario->CodEstudiante);
        }else{
            $datos="aun no hay";
        }
        $this->view("NotaCurso","Index",$datos);
    }
    public function CargarCursosUsuario($codUser){
        $datos=array();
        $aCurso=$curso->ConsultarCursosUsuario($codUser);
        return $datos;
    }
    public function Agregar()
    {
        $codigoCurso=$_POST['codigo'];
        $usuario=$_SESSION['user'];
        $nota=$_POST['nota'];
        $NotaCurso=new NotaCursoModelo();
        $NotaCurso->setCodCurso($codigoCurso);
        $NotaCurso->setCodEstudiante($usuario->CodEstudiante);
        $NotaCurso->setNota($nota);
        if($NotaCurso->save()=="1"){
          
        }else{
           
        }
        $this->Index();
    }
}
    

    
?>