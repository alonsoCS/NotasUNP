<?php 

 	if(isset($_POST['codUniversidad']))
 	{	
 		require_once "../config/mainModel.php";	
        require_once "../model/FacultadModelo.php";
 		//crear nueva universidad

 		$facultades=new FacultadModelo();
 		$facultades=$facultades->ConsultarFacultadesAjax($_POST['codUniversidad']);
 		$data=array();
 		foreach ($facultades as $facultad) {
 			$data[]=$facultad;
 		}
 		echo json_encode($data);
 	}
 	else
 	{
 		echo "0";
 	}