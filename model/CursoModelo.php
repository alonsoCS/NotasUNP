<?php
	
class CursoModelo extends mainModel
{
	
	public function ConsultarCursos()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM curso ");
 		return $sql->fetchAll();
	} 

	public function ConsultarCursosEstudiante($datos)
	{
		$sql=mainModel::conectar()->prepare("SELECT e.CodCurso,e.Ciclo,e.tipo,e.nombre, e.creditos, d.Nota AS nota FROM curso AS e INNER JOIN notacurso AS d ON e.CodCurso = d.CodCurso AND d.CodEstudiante=:codEstudiante  WHERE  e.CodEscuela=:Codigo ");
		$sql->bindParam(':Codigo',$datos['codEscuela']);
		$sql->bindParam(':codEstudiante',$datos['codEstudiante']);
		$sql->execute();
		return $sql;
	}
	public function ConsultarCursosCicloGeneral($codEscuela)
	{
		$sql=mainModel::conectar()->prepare("SELECT CodCurso,tipo,nombre, creditos  FROM curso  WHERE CodEscuela=:Codigo ");
		$sql->bindParam(':Codigo',$codEscuela);
		$sql->execute();
		return $sql;
	}
	public function ConsultarCursoModel($codCurso)
	{
		$sql=mainModel::conectar()->prepare("SELECT * FROM curso  WHERE CodCurso=:Codigo ");
		$sql->bindParam(':Codigo',$codCurso);
		$sql->execute();
		return $sql;
	}
	public function ConsultarCurso($codEscuela,$nombre)
 	{
		$sql=mainModel::conectar()->prepare("SELECT * FROM curso WHERE nombre=:Nombre AND CodEscuela=:Codigo LIMIT 1");
		$sql->bindParam(':Codigo',$codEscuela);
		$sql->bindParam(':Nombre',$nombre);
		$sql->execute();
		return $sql;
 	}

	public function guardarCurso($datos)
	{
		$existe=self::ConsultarCurso($datos['codEscuela'],$datos['nombre']);
		if($existe->rowCount()==0)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO curso (CodEscuela, Ciclo, tipo, nombre, creditos) VALUES (:codEscuela,:Ciclo,:Tipo,:Nombre,:Creditos) ");
			$sql->bindParam(':codEscuela',$datos['codEscuela']);
			$sql->bindParam(':Ciclo',$datos['ciclo']);
			$sql->bindParam(':Tipo',$datos['tipo']);
			$sql->bindParam(':Nombre',$datos['nombre']);
			$sql->bindParam(':Creditos',$datos['creditos']);
			$sql->execute();
			return $sql;	
		}else{
			return 0;
		}
		
 	}
	public function actualizarCurso($datos){
		$existe=self::ConsultarCurso($datos['codEscuela'],$datos['nombre']);
		$curso=$existe->fetch();
		if($existe->rowCount()==0 || $curso['CodCurso']==$datos['codCurso'])
		{
 			$sql=mainModel::conectar()->prepare("UPDATE curso SET CodEscuela=:codEscuela, Ciclo=:Ciclo, tipo=:Tipo, nombre=:Nombre, creditos=:Creditos WHERE CodCurso=:CodCurso ");
 			$sql->bindParam(':codEscuela',$datos['codEscuela']);
 			$sql->bindParam(':Ciclo',$datos['ciclo']);
			$sql->bindParam(':Tipo',$datos['tipo']);
			$sql->bindParam(':Nombre',$datos['nombre']);
			$sql->bindParam(':Creditos',$datos['creditos']);
			$sql->bindParam(':CodCurso',$datos['codCurso']);
			$sql->execute();
			return $sql;
		}else{
			return 0;
		}
 	}

 	public function eliminarCurso($codCurso)
	{
		$sql=mainModel::conectar()->prepare("DELETE FROM curso WHERE CodCurso=:Codigo ");
		$sql->bindParam(':Codigo',$codCurso);
		$sql->execute();
		return $sql;
	}
}