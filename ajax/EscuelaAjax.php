<?php 
 	if(isset($_POST['codFacultad']))
 	{	
 		require_once "../config/mainModel.php";	
        require_once "../model/escuelaModelo.php";
 		//crear nueva universidad

 		$escuelas=new EscuelaModelo();
 		$escuelas=$escuelas->consultarEscuelasAjax($_POST['codFacultad']);
 		$data="";
 		foreach ($escuelas as $escuela) {
 			$data=$data."/".$escuela['Nombre']."-".$escuela['CodEscuela']; 
 		}
 		echo $data;
 	}elseif(isset($_POST['codEscuela']))
 	{	
 		require_once "../config/mainModel.php";	
        require_once "../model/escuelaModelo.php";
 		//crear nueva universidad

 		$escuelas=new EscuelaModelo();
 		$escuelas=$escuelas->consultarEscuela($_POST['codEscuela']);
 		$escuela=$escuelas->fetch();
 		echo $escuela['Ciclos'];
 	}
 	else
 	{
 		echo "0";
 	}