<?php

class NotaCursoModelo extends mainModel
{
	
	public function ConsultarNotas()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM notacurso ");
		return $sql;
	}
	public function ConsultarNotaCurso($datos)
	{
		$sql=mainModel::conectar()->prepare("SELECT Nota FROM notacurso WHERE CodCurso=:codCurso AND CodEstudiante=:codEstudiante LIMIT 1");
		$sql->bindParam(':codCurso',$datos['codCurso']);
		$sql->bindParam(':codEstudiante',$datos['codEstudiante']);
		$sql->execute();
		return $sql;
	} 
		
	public function guardar($datos) {
		if($this->ConsultarNotaCurso($datos)->rowCount()==0){
 			$sql=mainModel::conectar()->prepare("INSERT INTO notacurso (CodCurso, CodEstudiante,Nota) VALUES (:codCurso, :codEstudiante, :nota )");
			$sql->bindParam(':codCurso',$datos['codCurso']);
			$sql->bindParam(':codEstudiante',$datos['codEstudiante']);
			$sql->execute();
			return $sql;
		}else{
			return null;
		}
 	}
 	
}