<?php
	
class CursoModelo extends mainModel
{
	public function ConsultarCursos()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM curso ");
 		return $sql;
	} 

	public function ConsultarCursosEstudiante($datos)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT e.CodCurso,e.Ciclo,e.tipo,e.nombre, e.creditos, d.Nota AS nota FROM curso AS e INNER JOIN notacurso AS d ON e.CodCurso = d.CodCurso AND d.CodEstudiante=? WHERE  e.CodEscuela=?");
		$sql->bind_param('ii',$datos['codEstudiante'],$datos['codEscuela']);
		$sql->execute();
		$resultado=$sql->get_result();
		$sql->close();
		$con->close();
 		return $resultado;
	}
	public function ConsultarCursosCicloGeneral($codEscuela)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT * FROM curso  WHERE CodEscuela=? ");
		$sql->bind_param('i',$codEscuela);
		$sql->execute();
		$resultado=$sql->get_result();
		$sql->close();
		$con->close();
 		return $resultado;
	}
	public function ConsultarCursoModel($datos)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT * FROM curso WHERE nombre=? AND CodEscuela=? LIMIT 1");
		$sql->bind_param('si',$datos['nombre'],$datos['codEscuela']);
		$sql->execute();
		$resultado=$sql->get_result();
		$sql->close();
		$con->close();
 		return $resultado;
	}
	public function ConsultarCurso($codCurso)
 	{
 		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT * FROM curso  WHERE CodCurso=? ");
		$sql->bind_param('i',$codCurso);
		$sql->execute();
		$resultado=$sql->get_result();
		if($resultado->num_rows > 0)
		{
			$curso=$resultado->fetch_assoc();	
		}else{
			$curso='1';
		}
		$sql->close();
		$con->close();
 		return $curso;
 	}

	public function guardarCurso($datos)
	{
		$existe=self::ConsultarCursoModel($datos);
		if($existe->num_rows==0)
		{
			$con=mainModel::conectar();
			$sql=$con->prepare("INSERT INTO curso (CodEscuela, Ciclo, tipo, nombre, creditos) VALUES (?,?,?,?,?) ");
			$sql->bind_param('iissi',$datos['codEscuela'],$datos['ciclo'],$datos['tipo'],$datos['nombre'],$datos['creditos']);
			$sql->execute();
			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
 		}else{
 			return "existe";
 		}
 	}
	public function actualizarCurso($datos){
		$existe=self::ConsultarCurso($datos['codCurso']);
		if($existe=='1' || $existe['CodCurso']==$datos['codCurso'])
		{
			$con=mainModel::conectar();
 			$sql=$con->prepare("UPDATE curso SET CodEscuela=?, Ciclo=?, tipo=?, nombre=?, creditos=? WHERE CodCurso=? ");
 			$sql->bind_param('iissii',$datos['codEscuela'],$datos['ciclo'],$datos['tipo'],$datos['nombre'],$datos['creditos'],$datos['codCurso']);
			$sql->execute();
			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
		}else{
			return 'existe';
		}
 	}

 	public function eliminarCurso($codCurso)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("DELETE FROM curso WHERE CodCurso=? ");
		$sql->bind_param('i',$codCurso);
		$sql->execute();
		$resultado=$sql->affected_rows;
		$sql->close();
		$con->close();
 		return $resultado;
	}
}