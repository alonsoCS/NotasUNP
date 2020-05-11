<?php
class FacultadController extends ControladorBase{
    
	
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        $uni= new FacultadModelo();
       	$datos=$uni->ConsultarFacultades();
        $arr=$this->CargarUniversidades();
        $_POST['unis']=$arr;
        
        $this->view("Facultad","Index",$datos);
    }
    public function Create(){

        $universidad=$_POST['universidades'];

        $uni= new UniversidadModelo();
        $datos=$uni->ConsultarUniversidades();
        
        foreach ($datos as $obj) 
        {
            if($obj->Nombre==$universidad)
            {
                $universidad=$obj->CodUniversidad;
                break;
            }
        } 


        $fac= new FacultadModelo();
        $fac->setNombre($_POST['nombre']);
        $fac->setCodUniversidad($universidad);
        $nombre=$fac->getNombre();
        if($nombre!="") 
        {
            $resultado=$fac->save();
            if($resultado==1)//se guardó correctamente
            {
                $mensaje="Guadado con éxito";
            }elseif ($resultado=="10") {
                # code...
                $mensaje="Facultad ya ha sido agregada";
            }
            else
            {
                $mensaje="Hubo un error" ;
            }
        }else{
            $mensaje="introduzca un nombre";
        }
        $_POST['mensaje']=$mensaje;
         $this->Index();

    }

    public function CargarUniversidades()
    {
        $uni= new UniversidadModelo();
        $datos=$uni->ConsultarUniversidades();
        $arr=array();
        foreach ($datos as $obj) 
        {
            if($obj->Estado=='1')
            {
                $arr[$obj->CodUniversidad]=$obj->Nombre;
            }
        } 
        return $arr;

    }
}
    
?>