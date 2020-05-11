<?php
class InformeController extends ControladorBase{
    
    
    public function __construct() {
        parent::__construct();
    }
    
    public function Index(){
        $usuario=$_SESSION['user'];
        $_POST['user']=$usuario;
        $curso=new CursoModelo();
        $datos=$curso->ConsultarCursosUsuario($usuario->CodEscuela,$usuario->CodEstudiante);

        $_POST['creditos']=$this->Creditos($usuario);
        $_POST['informacion']=$this->InforHead($usuario);
        
        $this->view("Informe","Index",$datos);
    }
    public function Creditos($usuario){
        $creditos=array();
        //creditos de carrera[e,o]****
        
        $Escu=new EscuelaModelo();

        $escuela=$Escu->ConsultarEscuelas($usuario->CodEscuela);

        $creCarOB=$escuela[0]->CresObli;
        $creCarEl=$escuela[0]->CresElec;
        
        //aprobados[o,e]
        $cur=new CursoModelo();
        $cursos=$cur->ConsultarCursosHistorial($usuario->CodEscuela,$usuario->CodEstudiante);
        $credObEst=0;
        $credElEst=0;
        foreach ($cursos as $value) {
            # code...
            if($value->Tipo=="O")
            {
                if($value->Nota>10){
                    $credObEst+=$value->Creditos;
                }
            }else
            {
                if($value->Nota>10){
                $credElEst+=$value->Creditos;
                }
            }
        }
        //debe[o,e]
        $creDebeO=$creCarOB-$credObEst;
        $creDebeE=$creCarEl-$credElEst;

        $creditos[]=$creCarOB;
        $creditos[]=$creCarEl;
         $creditos[]=$credObEst;
        $creditos[]=$credElEst;
         $creditos[]=$creDebeO;
        $creditos[]=$creDebeE;

        $creditos[]=$creCarOB+$creCarEl;
        $creditos[]=$credObEst+$credElEst;
        $creditos[]=$creDebeE+$creDebeO;
        return $creditos;
    }
    private function InforHead($usuario)
    {
        //universidad, escuela, facultad
        $Escu=new EscuelaModelo();

        $escuela=$Escu->ConsultarEscuelas($usuario->CodEscuela)[0];

        $fac=new FacultadModelo();
        $facultad=$fac->ConsultarFacultades($escuela->CodFacultad)[0];
        $uni=new UniversidadModelo();
        $universidad=$uni->ConsultarUniversidades($facultad->CodUniversidad)[0];

        $primero=[$escuela->Nombre,$facultad->Nombre,$universidad->Nombre];

        /*----- creditos y cursos-------*/
        $cur=new CursoModelo();
        $cursos=$cur->ConsultarCursosHistorial($usuario->CodEscuela,$usuario->CodEstudiante);
        
        $Tcursos=count($cursos);
        $SumaNotas=0;
         //creditos aprobados[obli, elec]
        $creApro=0;
        $creDes=0;
        //cursos aprobados 
        $curAprO=0;
        $curAprE=0;
       
        foreach ($cursos as $value) {
            # code...
            
            if($value->Nota>10)
            {
                $creApro+=$value->Creditos;
                if($value->Tipo=="O")
                {
                    $curAprO++;
                }else
                {
                    $curAprE++;
                }
            }else{
               $creDes+=$value->Creditos; 
            }
           
            $SumaNotas+=($value->Nota*$value->Creditos);
        }
        //Ponderado
        if($Tcursos==0){
            $ponderado=0;
        }else{
            $ponderado=$SumaNotas/($creApro+$creDes);
            $ponderado=round($ponderado * 100) / 100;
        }

        $segundo=[$ponderado,$Tcursos,$creApro,$curAprO,$curAprE];
        return [$primero,$segundo];
    }
}
    

    
?>