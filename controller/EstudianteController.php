<?php
class EstudianteController extends MainController{
 
    protected $estudiante;
    public function __construct()
    {
        MainController::__construct();
        $this->estudiante = new EstudianteModelo();
    }

    public function Index(){ 
        $data=$this->estudiante->ConsultarEstudiantes();
        $this->view("Estudiante","Index",$data);
    }

    public function Nuevo(){
        $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();
        $this->view("Estudiante","Nuevo");
    }
    
    public function Guardar(){
        
        $escuela=mainModel::limpiar_cadena($_POST['escuelas']);//codescuela
        $sexo=mainModel::limpiar_cadena($_POST['sexo']);//tipo
        $nombre=mainModel::limpiar_cadena($_POST['nombres']);
        $apellido=mainModel::limpiar_cadena($_POST['apellidos']);
        $dni=mainModel::limpiar_cadena($_POST['dni']);
        $direccion=mainModel::limpiar_cadena($_POST['direccion']);
        $email=mainModel::limpiar_cadena($_POST['email']);
        $contraseña=mainModel::limpiar_cadena($_POST['contraseña']);
        $codigo=mainModel::limpiar_cadena($_POST['codigo']);
        
        $datos=[
            "codigo"=>$codigo,
            "codEscuela"=>$escuela,
            "nombre"=>$nombre,
            "apellidos"=>$apellido,
            "dni"=>$dni,
            "direccion"=>$direccion,
            "sexo"=>$sexo,
            "email"=>$email,
            "pass"=>$contraseña
        ];

        $resultado=$this->estudiante->guardarEstudiante($datos);
        
        if($resultado == "0")
        {
            $mensaje="Estudiante ya ha sido agregado";
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
        $dataEstudiante=$this->estudiante->BuscarEstudiante($id);
        $dataEstudiante=$dataEstudiante->fetch();

        $escuela=EscuelaModelo::consultarEscuela($dataEstudiante['CodEscuela']);
        $escuela=$escuela->fetch();
        
        $facultad=FacultadModelo::consultarFacultad($escuela['CodFacultad']);
        $facultad=$facultad->fetch();

        $_POST['facultad']=$escuela['CodFacultad'];
        $_POST['universidad']=$facultad['CodUniversidad'];
        $_POST['escuelas']=EscuelaModelo::consultarEscuelasAjax($escuela['CodFacultad']);
        $_POST['facultades']=FacultadModelo::ConsultarFacultadesAjax($facultad['CodUniversidad']);
        $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();

        $this->view("Estudiante","Modificar",$dataEstudiante);
    }
    public function Actualizar()
    {
         $escuela=mainModel::limpiar_cadena($_POST['escuelas']);//codescuela
        $sexo=mainModel::limpiar_cadena($_POST['sexo']);//tipo
        $nombre=mainModel::limpiar_cadena($_POST['nombres']);
        $apellido=mainModel::limpiar_cadena($_POST['apellidos']);
        $dni=mainModel::limpiar_cadena($_POST['dni']);
        $direccion=mainModel::limpiar_cadena($_POST['direccion']);
        $email=mainModel::limpiar_cadena($_POST['email']);
        $contraseña=mainModel::limpiar_cadena($_POST['contraseña']);
        $codigo=mainModel::limpiar_cadena($_POST['codigo']);
        
        $datos=[
            "codigo"=>$codigo,
            "codEscuela"=>$escuela,
            "nombre"=>$nombre,
            "apellidos"=>$apellido,
            "dni"=>$dni,
            "direccion"=>$direccion,
            "sexo"=>$sexo,
            "email"=>$email,
            "pass"=>$contraseña
        ];

        $resultado=$this->estudiante->actualizarEstudiante($datos);
        
        if ($resultado->rowCount()==0) {
            $mensaje="Hubo un error";
        }else{
            $mensaje="Se actualizó correctamente";  
        }
        $_POST['mensaje']=$mensaje;
        $this->Index();
    }

    public function Eliminar($id)
    {
            $id=mainModel::limpiar_cadena($id);

            $data=$this->estudiante->eliminarEstudiante($id);
            if($data->rowCount()>0){
                $_POST['mensaje']="Se eliminó correctamente";
            }else{
                $_POST['mensaje']="Hubo un error en Eliminar";
            }
            $this->Index();
        }

}
    

    
?>