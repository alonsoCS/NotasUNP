<?php
class EscuelaController extends ControladorBase{
    
	
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        $esc= new EscuelaModelo();
       	$datos=$esc->ConsultarEscuelas();
        $facus=$this->CargarFacultades();
        $unis=$this->CargarUniversidades();
        $_POST['facus']=$facus;
        $_POST['unis']=$unis;
        
        $this->view("Escuela","Index",$datos);
    }
    public function Create(){

        $fac=$_POST['facultades'];


        $escuela= new EscuelaModelo();
        $escuela->setNombre($_POST['nombre']);
        $escuela->setCodigo($_POST['codigo']);
        $escuela->setCreO($_POST['creO']);
        $escuela->setCreE($_POST['creE']);
        $escuela->setCodFacultad($fac); 
        $nombre=$escuela->getNombre();
        if($nombre!="" || $fac!='' || $fac!='0') 
        {
            $resultado=$escuela->save();
            if($resultado==1)//se guardó correctamente
            {
                $mensaje="Guadado con éxito";
            }elseif ($resultado="10") {
                # code...
                $mensaje="Escuela ya existe";
            }
            else
            {
                $mensaje="Hubo un error" ;
            }
        }else{
            $mensaje="introduzca un nombre o seleccione una facultad";
        }
        $_POST['mensaje']=$mensaje;
         $this->Index();

    }

    private function CargarUniversidades()
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
    private function CargarFacultades()
    {
        $fac= new FacultadModelo();
        $datosF=$fac->ConsultarFacultades();

        return $datosF;
    }
} 
    
?>