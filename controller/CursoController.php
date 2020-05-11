<?php
class CursoController extends ControladorBase{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        
        $cur= new CursoModelo();
                $datos=$cur->ConsultarCursos();
                $facus=$this->CargarFacultades();
                $unis=$this->CargarUniversidades();
                $escus=$this->CargarEscuelas();
                $ciclos=$this->CargarCiclos();
                $_POST['facus']=$facus;
                $_POST['unis']=$unis;
                $_POST['escus']=$escus;
                $_POST['ciclos']=$ciclos;
        $this->view("Curso","Index",$datos);
    }
    public function Create(){
        
        $esc=$_POST['escuelas'];//codescuela
        $tipo=$_POST['tipo'];//tipo
        $nombre=$_POST['nombre'];
        $creditos=$_POST['creditos'];
        $ciclo=$_POST['ciclos'];
        if($nombre!="" || $esc!="" || $tipo !="" || $creditos!=""||$ciclo=="0"||$ciclo="") 
        {
            $curso= new CursoModelo();
            $curso->setNombre($nombre);
            $curso->setCreditos($creditos) ;
            $curso->setCodCiclo($ciclo);
            $curso->setTipo($tipo);
            $resultado=$curso->save();
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