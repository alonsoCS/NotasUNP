<?php

class InformeController extends MainController{
    public function __construct()
    {
       
        MainController::__construct();
    }
    
    public function Index(){
        $usuario=$_SESSION['user'];
        $_POST['user']=$usuario;
        $datos=$this->ConsultarCursosUsuario($usuario['CodEscuela'],$usuario['CodEstudiante']);
        $creditos=$this->Creditos($usuario['CodEscuela'],$usuario['CodEstudiante']);
        $_POST['creditos']=$creditos['creditos'];
        $_POST['informe']=$creditos['informe'];
        $_POST['informacion']=$this->Informacion($usuario['CodEscuela'],$usuario['CodEstudiante']);
        
        $this->view("Informe","Index",$datos);
    }
    protected function Creditos($codEscuela,$codEstudiante){
        //arreglo
        $creditos=array();
        
        $escuelas=new EscuelaModelo();
        $dataEscuela=$escuelas->ConsultarEscuela($codEscuela);
        $escuela=$dataEscuela->fetch();

        //creditos de carrera[e,o]****
        $creEscuelaObli=$escuela['CresObli'];
        $creEscuelaElec=$escuela['CresElec'];

        //creditos aprobados[obli, elec]
        $creditoAproObli=0;
        $creditoAproElec=0;

        $creditoDes=0;

        $Tcursos=0;
        //cursos aprobados 
        $cursoAproObli=0;
        $cursoAproElec=0;

        //sumaNotas
        $SumaNotas=0;
        
        $cursos=new CursoModelo();
        $datos=[
            "codEscuela"=>$codEscuela,
            "codEstudiante"=>$codEstudiante
        ];
        $dataCursos=$cursos->ConsultarCursosEstudiante($datos);
        foreach ($dataCursos as $curso) {
            $Tcursos++;
            $SumaNotas+=($curso['nota']*$curso['creditos']);
                # code...
            if($curso['tipo']=="O")
            {
                if($curso['nota']>10){
                    $creditoAproObli+=$curso['creditos'];
                    $cursoAproObli++;
                }else{
                    $creditoDes+=$curso['creditos'];
                }
            }else
            {
                if($curso['nota']>10){
                    $creditoAproElec+=$curso['creditos'];
                    $cursoAproElec++;
                }else{
                    $creditoDes+=$curso['creditos'];
                }
            }
        }
        //debe[o,e]
        $creditosDebeObli=$creEscuelaObli-$creditoAproObli;
        $creditosDebeElec=$creEscuelaElec-$creditoAproElec;

        $creditos=[
            "CEscuelaObli"=>$creEscuelaObli,
            "CEscuelaElec"=>$creEscuelaElec,
            "CEstudianteObli"=>$creditoAproObli,
            "CEstudianteElec"=>$creditoAproElec,
            "CEstDebeOblig"=>$creditosDebeObli,
            "CEstDebeElec"=>$creditosDebeElec,
        ];

        //Ponderado
        if($Tcursos==0){
            $ponderado=0;
        }else{
            $ponderado=$SumaNotas/($creditoAproObli+$creditoAproElec+$creditoDes);
            $ponderado=round($ponderado * 100) / 100;
        }
        $informe=[
            "totalCursos"=>$Tcursos,
            "cursoAproOblig"=>$cursoAproObli,
            "cursoAproElec"=>$cursoAproElec,
            "ponderado"=>$ponderado,
            "creditosApro"=>$creditoAproObli+$creditoAproElec
        ];

        $informeGeneral=[

            "creditos"=>$creditos,
            "informe"=>$informe
        ];
        return $informeGeneral;
    }
    protected function Informacion($codEscuela,$codEstudiante)
    {
        //universidad, escuela, facultad
        $escuelas=new EscuelaModelo();
        $dataEscuela=$escuelas->ConsultarEscuela($codEscuela);
        $escuela=$dataEscuela->fetch();

        $facultades=new FacultadModelo();
        $dataFacultad=$facultades->consultarFacultad($escuela['CodFacultad']);
        $facultad=$dataFacultad->fetch();

        $universidades=new UniversidadModelo();
        $dataUniversidad=$universidades->consultarUniversidad($facultad['CodUniversidad']);
        $universidad=$dataUniversidad->fetch();

        $informacion=[
            "Universidad"=>$universidad['Nombre'],
            "Facultad"=>$facultad['Nombre'],
            "Escuela"=>$escuela['Nombre']
        ];

        return $informacion;

    }
    protected function ConsultarCursosUsuario($codEscuela,$codEstudiante)
    {
        $rowCurso=array();
        $cursos=new CursoModelo();
        $dataCursos=$cursos->ConsultarCursosCicloGeneral($codEscuela);
        foreach ($dataCursos as $rowCurso) {
            $notas= new NotaCursoModelo();
            $datos=[
                "codCurso"=>$rowCurso["CodCurso"],
                "codEstudiante"=>$codEstudiante
            ];
            $dataNota=$notas->ConsultarNotaCurso($datos);
            if($dataNota->rowCount()>0)
            {
                $nota=$dataNota->fetch();
                $rowCurso["Nota"]=$nota['Nota'];
            }
                
            $resultSet[]=$rowCurso;
        }
        return $resultSet;

    } 
}
    

    
?>