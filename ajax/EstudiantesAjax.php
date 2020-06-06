<?php  
 	if(isset($_POST['codEscuela']))
 	{	
 		require_once "../config/mainModel.php";	
        require_once "../model/EstudianteModelo.php";
 		//crear nueva universidad

 		$estudiantes=new EstudianteModelo();
 		$estudiantes=$estudiantes->consultarEstudiantesAjax($_POST['codEscuela']);
 		$data="";
 		foreach ($estudiantes as $estud) {
 			$data=$data."/".$estud['nombre']." ".$estud['apellidos']."-".$estud['CodEstudiante']; 
 		}
 		echo $data;
 	}
 	else
 	{
 		echo "0";
 	}