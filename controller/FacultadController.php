<?php
    class FacultadController extends MainController{
 
        protected $facultad;
        public function __construct()
        {
            MainController::__construct();
            $this->facultad = new FacultadModelo();
        }

        public function Index(){ 
            $data=$this->facultad->ConsultarFacultades();
            $this->view("Facultad","Index",$data);
        }
        public function Nuevo(){
            $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();
             $this->view("Facultad","Nuevo");
        }

        public function Guardar(){
            $universidad=mainModel::limpiar_cadena($_POST['universidades']);
            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $datos=[
                "codigo"=>$universidad,
                "nombre"=>$nombre
            ];
            $resultado=$this->facultad->guardarFacultad($datos);

            if($resultado == "0")
            {
                $mensaje="Facultad ya ha sido agregada";
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
            $data=$this->facultad->consultarFacultad($id);
            $data=$data->fetch();
            $_POST['universidades']=UniversidadModelo::ConsultarUniversidades();
            $this->view("Facultad","Modificar",$data);
        }
        public function Actualizar()
        {
            $codigo=mainModel::limpiar_cadena($_POST['codigo']);
            $universidad=mainModel::limpiar_cadena($_POST['universidades']);
            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $datos=[
                "codFacultad"=>$codigo,
                "codigo"=>$universidad,
                "nombre"=>$nombre
            ];
            $guardar=$this->facultad->actualizarFacultad($datos);
            if($guardar=="0")
            {
                $_POST['mensaje']="La facultad ya existe";
            }elseif($guardar->rowCount()>0){
                $_POST['mensaje']="Se actualizó correctamente";
            }else{
                $_POST['mensaje']="Hubo un error en actualizar";
            }
            $this->Index();
        }

        public function Eliminar($id)
        {
            $id=mainModel::limpiar_cadena($id);

            $data=$this->facultad->eliminarFacultad($id);
            if($data->rowCount()>0){
                $_POST['mensaje']="Se eliminó correctamente";
            }else{
                $_POST['mensaje']="Hubo un error en Eliminar";
            }
            $this->Index();
        }
    }
    
?>