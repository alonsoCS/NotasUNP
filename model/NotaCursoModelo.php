<?php

class NotaCursoModelo extends mainModel
{
	
	public function ConsultarNotaCurso($datos)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT Nota FROM notacurso WHERE CodCurso=? AND CodEstudiante=? LIMIT 1");
		$sql->bind_param('is',$datos['codCurso'],$datos['codEstudiante']);
		$sql->execute();
		$resultado=$sql->get_result();
		if($resultado->num_rows > 0)
		{
			$notaCurso=$resultado->fetch_assoc();	
		}else{
			$notaCurso='1';
		}
		$sql->close();
		$con->close();
 		return $notaCurso;
	}  
		
	public function guardarNota($datos) {
		$existe=$this->ConsultarNotaCurso($datos);
		if($existe=='1'){
			$con=mainModel::conectar();
 			$sql=$con->prepare("INSERT INTO notacurso (CodCurso, CodEstudiante,Nota) VALUES (?, ?, ? )");
			$sql->bind_param('isi',$datos['codCurso'],$datos['codEstudiante'],$datos['nota']);
			$sql->execute();
			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
		}else{
			return "existe";
		}
 	}
 	
}