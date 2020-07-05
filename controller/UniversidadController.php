<?php
    
    class UniversidadController extends MainController{

        protected $universidad;
        public function __construct()
        {
            MainController::__construct();
            $this->universidad = new UniversidadModelo();
        }
        public function Index()
        {
            $data=$this->universidad->ConsultarUniversidades();
            $this->view("Universidad","Index",$data);
        }

        public function Nuevo(){
             $this->view("Universidad","Nuevo");
        }
        public function Guardar(){

            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $ciudad=mainModel::limpiar_cadena($_POST['ciudad']);
            $rector=mainModel::limpiar_cadena($_POST['rector']);
           
            $datos=[
                "nombre"=>$nombre,
                "ciudad"=>$ciudad,
                "rector"=>$rector
            ];
            $guardar=$this->universidad->crearUniversidad($datos);
            
            if($guardar=="existe")
            {
                $_POST['mensaje']="La universidad ya existe";
            }elseif($guardar>0){
                $_POST['mensaje']="La universidad se creó correctamente";
            }else{
                $_POST['mensaje']="Hubo un error en actualizar";
            }
            $this->Index();
        }

        public function Modificar($id)
        {
            $id=mainModel::limpiar_cadena($id);
            $data=$this->universidad->consultarUniversidad($id);
            $this->view("Universidad","Modificar",$data);
        }
        public function Actualizar()
        {
            $codigo=mainModel::limpiar_cadena($_POST['codigo']);
            $nombre=mainModel::limpiar_cadena($_POST['nombre']);
            $ciudad=mainModel::limpiar_cadena($_POST['ciudad']);
            $rector=mainModel::limpiar_cadena($_POST['rector']);
           
            $datos=[
                "codigo"=>$codigo,
                "nombre"=>$nombre,
                "ciudad"=>$ciudad,
                "rector"=>$rector
            ];
            $guardar=$this->universidad->actualizarUniversidad($datos);
            if($guardar=="existe")
            {
                $_POST['mensaje']="La universidad ya existe";
            }elseif($guardar>0){
                $_POST['mensaje']="Se actualizó correctamente";
            }else{
                $_POST['mensaje']="Hubo un error en actualizar";
            }
            $this->Index();
        }

        public function Eliminar($id)
        {
            $id=mainModel::limpiar_cadena($id);

            $data=$this->universidad->eliminarUniversidad($id);
            if($data>0){
                $_POST['mensaje']="Se eliminó correctamente";
            }else{
                $_POST['mensaje']="Hubo un error en Eliminar";
            }
            $this->Index();
        }
        
    }
?>