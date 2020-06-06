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
        if($resultado=="0")
        {
             $_POST['mensaje']="El curso ya existe";
        }else if($resultado->rowCount()>0)
        {
             $_POST['mensaje']="Guardado con éxito";
        }
        else
        {
             $_POST['mensaje']="Hubo un error" ;
        }
         $this->Index();
    }

    public function Modificar($codCurso)
    {
        $codCurso=mainModel::limpiar_cadena($codCurso);
        $dataCurso=$this->curso->ConsultarCursoModel($codCurso);
        $dataCurso=$dataCurso->fetch();
        
        $escuela=EscuelaModelo::consultarEscuela($dataCurso['CodEscuela']);
        $escuela=$escuela->fetch();
        
        $facultad=FacultadModelo::consultarFacultad($escuela['CodFacultad']);
        $facultad=$facultad->fetch();

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
        $ciclos=mainModel::limpiar_cadena($_POST['ciclos']);
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
        if($resultado=="0")
        {
            $mensaje="El curso ya existe";
        }elseif ($resultado->rowCount()==0) {
            $mensaje="Error al guardar";
        }else{
            $mensaje="Actualizado con éxito";  
        }
        $_POST['mensaje']=$mensaje;
        $this->Index();
    }

    public function Eliminar($id)
    {
            $id=mainModel::limpiar_cadena($id);

            $data=$this->curso->eliminarCurso($id);
            if($data->rowCount()>0){
                $_POST['mensaje']="Se eliminó correctamente";
            }else{
                $_POST['mensaje']="Hubo un error en Eliminar";
            }
            $this->Index();
        }

  
}
    
?>