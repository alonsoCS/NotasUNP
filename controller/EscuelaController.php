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
        
        if($resultado == "0")
        {
            $mensaje="Escuela ya ha sido agregada";
        }elseif ($resultado->rowCount()==0) {
            $mensaje="Error al guardar";
        }else{
            $mensaje="Guadado con éxito";  
        }
        $_POST['mensaje']=$mensaje;
        $this->Index();
    }

    public function Modificar($id)
    {
        $id=mainModel::limpiar_cadena($id);
        $data=$this->escuela->consultarEscuela($id);
        $data=$data->fetch();

        $facultad=FacultadModelo::consultarFacultad($data['CodFacultad']);
        $facultad=$facultad->fetch();
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
        
        if($resultado == "0")
        {
            $mensaje="Escuela ya ha sido agregada";
        }elseif ($resultado->rowCount()==0) {
            $mensaje="Error al guardar";
        }else{
            $mensaje="Guadado con éxito";  
        }
        $_POST['mensaje']=$mensaje;
        $this->Index();
    }

    public function Eliminar($id)
    {
            $id=mainModel::limpiar_cadena($id);

            $data=$this->escuela->eliminarEscuela($id);
            if($data->rowCount()>0){
                $_POST['mensaje']="Se eliminó correctamente";
            }else{
                $_POST['mensaje']="Hubo un error en Eliminar";
            }
            $this->Index();
        }


} 