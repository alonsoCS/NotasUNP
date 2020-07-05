<?php
class NotaCursoController extends mainController{
    protected $NotaCurso;
    public function __construct()
    {
        MainController::__construct();
        $this->NotaCurso=new NotaCursoModelo();
    } 

    public function Index(){
        $datos=array();
        $usuario=$_SESSION['user'];
        if($usuario!="Administrador")
        {
            $this->view("NotaCurso","Index");
        }else{
             $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();
             $this->view("NotaCurso","Index");
        }
        
    }
    public function Consultar($codEstudiante=false)
    {  
        if($codEstudiante==false){
            $codEstudiante=$_POST['estudiantes'];
        }
        if($codEstudiante!="0")
        {
            $estudiante=EstudianteModelo::BuscarEstudiante($codEstudiante);

            $cursos=new CursoModelo();
            $dataCursos=$cursos->ConsultarCursosCicloGeneral($estudiante['CodEscuela']);
            $datos=array();
            
            foreach ($dataCursos as $curso) {
                $data=[
                    "codCurso"=>$curso["CodCurso"],
                    "codEstudiante"=>$codEstudiante
                ];
                $nota=$this->NotaCurso->ConsultarNotaCurso($data);
                if($nota!='1'){
                    $curso['nota']=$nota["Nota"];
                }
                $datos[]=$curso;
            }
            $_POST['CodEstudiante']=$codEstudiante;
            $this->view("NotaCurso","Index",$datos);
        }else{
            $this->Index();
        }
        
    }
    public function GuardarNota()
    {
        $estudiante=MainModel::limpiar_cadena($_POST["CodEstudiante"]);
        $curso=MainModel::limpiar_cadena($_POST["CodCurso"]);
        $nota=MainModel::limpiar_cadena($_POST["nota"]);
        $data=[
            "codCurso"=>$curso,
            "codEstudiante"=>$estudiante,
            "nota"=>$nota
        ];
        $resultado=$this->NotaCurso->guardarNota($data);
        if($resultado=="existe")
        {
             $_POST['mensaje']="La nota ya existe";
        }else if($resultado->num_rows>0)
        {
             $_POST['mensaje']="Guardado con éxito";
        }
        else
        {
             $_POST['mensaje']="Hubo un error" ;
        }
        $this->Consultar($estudiante);
    }
}

    

    
?>