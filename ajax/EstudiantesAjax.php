<?php  
 	if(isset($_POST['codEscuela']))
 	{	
 		require_once "../config/mainModel.php";	
        require_once "../model/EstudianteModelo.php";
 		//crear nueva universidad

 		$estudiantes=new EstudianteModelo();
 		$estudiantes=$estudiantes->consultarEstudiantesAjax($_POST['codEscuela']);
 		$data=array();
 		foreach ($estudiantes as $estud) {
 			$data[]=$estud;
 		}
 		echo json_encode($data);
 	}
 	else
 	{
 		echo "0";
 	}