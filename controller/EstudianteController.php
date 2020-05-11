<?php
class EstudianteController extends ControladorBase{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        $est= new EstudianteModelo();
        $datos=$est->ConsultarEstudiantes();
        $facus=$this->CargarFacultades();
        $unis=$this->CargarUniversidades();
        $escus=$this->CargarEscuelas();
        
        $_POST['facus']=$facus;
        $_POST['unis']=$unis;
        $_POST['escus']=$escus;
       
        $this->view("Estudiante","Index",$datos);
    }
    public function Create(){
        
        $esc=$_POST['escuelas'];//codescuela
        $sexo=$_POST['sexo'];//tipo
        $nombre=$_POST['nombres'];
        $apellido=$_POST['apellidos'];
        $dni=$_POST['dni'];
        $direccion=$_POST['direccion'];
        $email=$_POST['email'];
        $contraseña=$_POST['contraseña'];
        $codigo=$_POST['codigo'];
        
        if($nombre!="" || $esc!="" || $sexo !="" || $apellido!=""||$dni!=""||$direccion!=""||$email!=""||$contraseña!="" || $codigo!="") 
        {
            $est= new EstudianteModelo();
            $est->setCodigo($codigo);
            $est->setNombre($nombre) ;
            $est->setCodEscuela($esc);
            $est->setApellidos($apellido);
            $est->setDni($dni);
            $est->setSexo($sexo);
            $est->setDireccion($direccion);
            $est->setEmail($email);
            $est->setContraseña($contraseña);
            $resultado=$est->save();
            if($resultado==1)//se guardó correctamente
            {
                $mensaje="Guadado con éxito";
            }else if($resultado=="10")
            {
                $mensaje="Ya existe";
            }    
            else
            {
                $mensaje="Hubo un error" ;
            }
        }else{
            $mensaje="complete el formulario del Crear Curso";
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
    public function CargarCiclos()
    {
        $fac= new CicloModelo();
        $datosF=$fac->ConsultarCiclos();

        return $datosF;
    }
}
    

    
?>