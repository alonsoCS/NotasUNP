<?php 

 	if(isset($_POST['codUniversidad']))
 	{	
 		require_once "../config/mainModel.php";	
        require_once "../model/FacultadModelo.php";
 		//crear nueva universidad

 		$facultades=new FacultadModelo();
 		$facultades=$facultades->ConsultarFacultadesAjax($_POST['codUniversidad']);
 		$data="";
 		foreach ($facultades as $facultad) {
 			$data=$data."/".$facultad['Nombre']."-".$facultad['CodFacultad']; 
 		}
 		echo $data;
 	}
 	else
 	{
 		echo "0";
 	}