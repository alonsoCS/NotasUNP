<?php
class CursoController extends MainController{
  
    protected $curso;
    public function __construct()
    {
        MainController::__construct();
        $this->curso = new CursoModelo();
    }

    public function Index(){ 
        $datos=$this->curso->ConsultarCursos();
        $this->view("Curso","Index",$datos);
    }

    public function Nuevo(){
        $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();
        $this->view("Curso","Nuevo");
    }
    
    public function Guardar(){   
        $escuela=mainModel::limpiar_cadena($_POST['escuelas']);//codescuela
        $tipo=mainModel::limpiar_cadena($_POST['tipo']);//tipo
        $nombre=mainModel::limpiar_cadena($_POST['nombre']);
        $creditos=mainModel::limpiar_cadena($_POST['creditos']);
        $ciclo=mainModel::limpiar_cadena($_POST['ciclos']);
        
        $data=[
            "codEscuela"=>$escuela,
            "ciclo"=>$ciclo,
            "tipo"=>$tipo,
            "nombre"=>$nombre,
            "creditos"=>$creditos
        ];
        $resultado=$this->curso->guardarCurso($data);
        if($resultado=="existe")
        {
             $_POST['mensaje']="El curso ya existe";
        }else if($resultado>0)
        {
            $_POST['mensaje']="Guardado con éxito";
        }
        else
        {
            $_POST['mensaje']="Hubo un error";
        }
         $this->Index();
    }

    public function Modificar($codCurso)
    {
        $codCurso=mainModel::limpiar_cadena($codCurso);
        $dataCurso=$this->curso->ConsultarCurso($codCurso);
        
        $escuela=EscuelaModelo::consultarEscuela($dataCurso['CodEscuela']);
        
        $facultad=FacultadModelo::consultarFacultad($escuela['CodFacultad']);

        $_POST['facultad']=$escuela['CodFacultad'];
        $_POST['universidad']=$facultad['CodUniversidad'];
        $_POST['ciclos']=$escuela['Ciclos'];
        $_POST['escuelas']=EscuelaModelo::consultarEscuelasAjax($escuela['CodFacultad']);
        $_POST['facultades']=FacultadModelo::ConsultarFacultadesAjax($facultad['CodUniversidad']);
        $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();
       
        $this->view("Curso","Modificar",$dataCurso); 
    } 
    public function Actualizar()
    {
        $codCurso=mainModel::limpiar_cadena($_POST['codCurso']);
        $escuela=mainModel::limpiar_cadena($_POST['escuelas']);
        $nombre=mainModel::limpiar_cadena($_POST['nombre']);
        $ciclo=mainModel::limpiar_cadena($_POST['ciclos']);
        $tipo=mainModel::limpiar_cadena($_POST['tipo']);
        $creditos=mainModel::limpiar_cadena($_POST['creditos']);
        $datos=[
            "codCurso"=>$codCurso,
            "codEscuela"=>$escuela,
            "ciclo"=>$ciclo,
            "tipo"=>$tipo,
            "nombre"=>$nombre,
            "creditos"=>$creditos
        ];
        $resultado=$this->curso->actualizarCurso($datos);
        if($resultado=="existe")
        {
            $_POST['mensaje']="El curso ya existe";
        }elseif ($resultado>0) {
            $_POST['mensaje']="Actualizado con éxito";  
        }else{
            $_POST['mensaje']="Error al guardar";
        }
        $this->Index();
    }

    public function Eliminar($id)
    {
        $id=mainModel::limpiar_cadena($id);

        $data=$this->curso->eliminarCurso($id);
        if($data>0){
            $_POST['mensaje']="Se eliminó correctamente";
        }else{
            $_POST['mensaje']="Hubo un error en Eliminar";
        }
        $this->Index();
    }
}
    
?>