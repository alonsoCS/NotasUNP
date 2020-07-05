<?php
class HistorialController extends MainController{
  
    public function __construct()
    {
       
      	MainController::__construct();
    }

    public function Index(){
       
        $usuario = $_SESSION['user'];
        $datos = $this->ConsultarCursosHistorial($usuario['CodEscuela'],$usuario['CodEstudiante']);
        $this->view("Historial","Index",$datos);
    } 

    protected function ConsultarCursosHistorial($codEscuela,$codEstudiante)
	{
        $cursos=new CursoModelo();
        $datos=[
        		"codEscuela"=>$codEscuela,
        		"codEstudiante"=>$codEstudiante
        ];
        $dataCursos=$cursos->ConsultarCursosEstudiante($datos);
        return $dataCursos;
    } 
}
    

    
?>