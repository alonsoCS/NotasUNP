<?php 
 	if(isset($_POST['codFacultad']))
 	{	
 		require_once "../config/mainModel.php";	
        require_once "../model/escuelaModelo.php";
 		//crear nueva universidad

 		$escuelas=new EscuelaModelo();
 		$escuelas=$escuelas->consultarEscuelasAjax($_POST['codFacultad']);
 		$data=array();
 		foreach ($escuelas as $escuela) {
 			$data[]=$escuela;
 		}
 		echo json_encode($data);
 	}elseif(isset($_POST['codEscuela']))
 	{	
 		require_once "../config/mainModel.php";	
        require_once "../model/escuelaModelo.php";
 		//crear nueva universidad

 		$escuelas=new EscuelaModelo();
 		$escuela=$escuelas->consultarEscuela($_POST['codEscuela']);
 		echo $escuela['Ciclos'];
 	}
 	else
 	{
 		echo "0";
 	}