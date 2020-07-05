<?php
   
class EscuelaController extends MainController{
 
    protected $escuela;
    public function __construct()
    {
        MainController::__construct();
        $this->escuela = new EscuelaModelo();
    }

    public function Index(){ 
        $data=$this->escuela->ConsultarEscuelas();
        $this->view("Escuela","Index",$data);
    }

    public function Nuevo(){
        $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();
        $this->view("Escuela","Nuevo");
    }
    
    public function Guardar(){
        $facultad=mainModel::limpiar_cadena($_POST['facultades']);
        $nombre=mainModel::limpiar_cadena($_POST['nombre']);
        $codigo=mainModel::limpiar_cadena($_POST['codigo']);
        $creO=mainModel::limpiar_cadena($_POST['creO']);
        $creE=mainModel::limpiar_cadena($_POST['creE']);
        $ciclos=mainModel::limpiar_cadena($_POST['ciclos']);
        $datos=[ 
            "codFacultad"=>$facultad,
            "nombre"=>$nombre,
            "codigo"=>$codigo,
            "creObli"=>$creO,
            "creElec"=>$creE,
            "ciclos"=>$ciclos
        ];
        $resultado=$this->escuela->guardarEscuela($datos);
        
        if($resultado == "existe")
        {
            $_POST['mensaje']="Escuela ya ha sido agregada";
        }elseif ($resultado>0) {
            $_POST['mensaje']="Guadado con éxito";  
        }else{
            $_POST['mensaje']="Error al guardar";
        }
        $this->Index();
    }

    public function Modificar($id)
    {
        $id=mainModel::limpiar_cadena($id);
        $data=$this->escuela->consultarEscuela($id);
        
        $facultad=FacultadModelo::consultarFacultad($data['CodFacultad']);
        $_POST['facultades']=FacultadModelo::ConsultarFacultadesAjax($facultad['CodUniversidad']);
        $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();
        $_POST['universidad']=$facultad['CodUniversidad'];
        $_POST['facultad']=$facultad['CodFacultad'];
        $this->view("Escuela","Modificar",$data);
    }
    public function Actualizar()
    {
        $codEscuela=mainModel::limpiar_cadena($_POST['codEscuela']);
        $facultad=mainModel::limpiar_cadena($_POST['facultades']);
        $nombre=mainModel::limpiar_cadena($_POST['nombre']);
        $codigo=mainModel::limpiar_cadena($_POST['codigo']);
        $creO=mainModel::limpiar_cadena($_POST['creO']);
        $creE=mainModel::limpiar_cadena($_POST['creE']);
        $ciclos=mainModel::limpiar_cadena($_POST['ciclos']);
        $datos=[
            "codEscuela"=>$codEscuela,
            "codFacultad"=>$facultad,
            "nombre"=>$nombre,
            "codigo"=>$codigo,
            "creObli"=>$creO,
            "creElec"=>$creE,
            "ciclos"=>$ciclos
        ];
        $resultado=$this->escuela->actualizarEscuela($datos);
        
        if($resultado == "existe")
        {
            $_POST['mensaje']="Escuela ya ha sido agregada";
        }elseif ($resultado>0) {
            $_POST['mensaje']="Se actualizó con éxito";  
        }else{
            $_POST['mensaje']="Error al actualizar";
        }
        $this->Index();
    }

    public function Eliminar($id)
    {
            $id=mainModel::limpiar_cadena($id);

            $data=$this->escuela->eliminarEscuela($id);
            if($data>0){
                $_POST['mensaje']="Se eliminó correctamente";
            }else{
                $_POST['mensaje']="Hubo un error en Eliminar";
            }
            $this->Index();
        }


} 