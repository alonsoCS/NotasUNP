<?php
class UniversidadController extends ControladorBase{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        $uni= new UniversidadModelo();
        $datos=$uni->ConsultarUniversidades();
 
        
        $this->view("Universidad","Index",$datos);
    }
    public function Create(){

        $nombre=$_POST['nombre'];
        $ciudad=$_POST['ciudad'];
        $rector=$_POST['rector'];
        
       $uni= new UniversidadModelo();
        $uni->setNombre($nombre);
        $uni->setCiudad($ciudad);
        $uni->setRector($rector);
        if($nombre!=""||$ciudad!=""||$rector!="") 
        {
            $resultado=$uni->save();
            if($resultado==1)//se guardó correctamente
            {
                $mensaje="Guadado con éxito";
            }elseif ($resultado=="10") {
                # code...
                $mensaje="Universidad ya ha sido agregada";
            }
            else
            {
                $mensaje="Hubo un error" ;
            }
        }else{
            $mensaje="introduzca un todos los datos correctos";
        }
        $_POST['mensaje']=$mensaje;
         $this->Index();
    }

}
?>