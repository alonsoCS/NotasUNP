<?php
class NotaCursoController extends mainController{
    public function __construct()
    {
        MainController::__construct();
    }

    public function Index(){
        $datos=array();
        $usuario=$_SESSION['user'];
        if($usuario!="Administrador")
        {
            $ciclos=new CicloModelo();
            $dataCiclos=$ciclos->ConsultarCicloEscuela($usuario['CodEscuela']);
            foreach ($dataCiclos as  $rowCiclo) {
                $cursos=new CursoModelo();
                $data=[
                    "codCiclo"=>$rowCiclo["CodCiclo"],
                    "codEstudiante"=>$usuario["CodEstudiante"]
                ];
                $dataCursos=$cursos->ConsultarCursosCiclo($data);
                foreach ($dataCursos as $curso) {
                    $curso['NumCiclo']=$rowCiclo["Numero"];
                    $datos[]=$curso;
                }
            }
            $this->view("NotaCurso","Index",$datos);
        }else{
             $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();
             $this->view("NotaCurso","Index");
        }
        
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