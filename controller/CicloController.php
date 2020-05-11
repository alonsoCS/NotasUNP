<?php
class CicloController extends ControladorBase{
    
	
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        $cic= new CicloModelo();
       	$datos=$cic->ConsultarCiclos();
        $facus=$this->CargarFacultades();
        $unis=$this->CargarUniversidades();
        $escus=$this->CargarEscuelas();
        $_POST['facus']=$facus;
        $_POST['unis']=$unis;
        $_POST['escus']=$escus;
        $this->view("Ciclo","Index",$datos);
    }
    public function Create(){
    	
        $esc=$_POST['escuelas'];
        
        $ciclo= new CicloModelo();
        $ciclo->setNumero($_POST['numero']);
        
        $ciclo->setCodEscuela($esc);
        $numero=$ciclo->getNumero();
        if($numero!="" || $esc!="" || $esc!='0') 
        {
            $resultado=$ciclo->save();
            if($resultado==1)//se guardó correctamente
            {
                $mensaje="Guadado con éxito";
            }elseif ($resultado=="10") {
                # code...
                $mensaje="El ciclo ya existe";
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
    public function CargarFacultades()
    {
        $fac= new FacultadModelo();
        $datosF=$fac->ConsultarFacultades();

        return $datosF;
    }
    public function CargarEscuelas()
    {
        $fac= new EscuelaModelo();
        $datosF=$fac->ConsultarEscuelas();

        return $datosF;
    }
}
    
?>