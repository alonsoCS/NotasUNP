<?php
class EstudianteModelo extends mainModel
{

	public function ConsultarEstudiantes()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM estudiante ");
		return $sql;
	} 

	public function BuscarEstudiante($codigo){
		$sql=mainModel::conectar()->prepare("SELECT * FROM Estudiante WHERE CodEstudiante=:Codigo");
 		$sql->bindParam(':Codigo',$codigo);
		$sql->execute();
 		return $sql;
	} 
	public function consultarEstudiantesAjax($codEscuela){
		$sql=mainModel::conectar()->prepare("SELECT nombre, apellidos, CodEstudiante FROM Estudiante WHERE CodEscuela=:Codigo");
 		$sql->bindParam(':Codigo',$codEscuela);
		$sql->execute();
 		return $sql;
	} 
	public function BuscarEstudianteEscuela($datos){
		$sql=mainModel::conectar()->prepare("SELECT * FROM Estudiante WHERE CodEstudiante=:Codigo AND CodEscuela=:codEscuela");
 		$sql->bindParam(':Codigo',$datos['codEstudiante']);
 		$sql->bindParam(':codEscuela',$datos['codEscuela']);
		$sql->execute();
 		return $sql;
	} 
		
	public function guardarEstudiante($datos) {
		$existe=self::BuscarEstudiante($datos['codigo']);
		if($existe->rowCount()==0)
		{
 			$sql=mainModel::conectar()->prepare("INSERT INTO estudiante (CodEstudiante, CodEscuela, nombre, apellidos, dni, direccion ,sexo ,email, contraseña) VALUES (:Codigo, :CodEscuela, :nombre, :apellidos, :dni, :direccion, :sexo, :email, :pass)");
 			$sql->bindParam(':Codigo',$datos['codigo']);
 			$sql->bindParam(':CodEscuela',$datos['codEscuela']);
 			$sql->bindParam(':nombre',$datos['nombre']);
 			$sql->bindParam(':apellidos',$datos['apellidos']);
 			$sql->bindParam(':dni',$datos['dni']);
 			$sql->bindParam(':direccion',$datos['direccion']);
 			$sql->bindParam(':sexo',$datos['sexo']);
 			$sql->bindParam(':email',$datos['email']);
 			$sql->bindParam(':pass',$datos['pass']);
			$sql->execute();
 			return $sql;
 		}
 		else
 		{
 		 	return "0";
 		}
 	}

 	public function actualizarEstudiante($datos){ 
 		$sql=mainModel::conectar()->prepare("UPDATE estudiante SET CodEscuela=:CodEscuela, nombre=:nombre, apellidos=:apellidos, dni=:dni, direccion=:direccion, sexo=:sexo,email=:email, contraseña=:pass WHERE CodEstudiante=:Codigo");
 			$sql->bindParam(':Codigo',$datos['codigo']);
 			$sql->bindParam(':CodEscuela',$datos['codEscuela']);
 			$sql->bindParam(':nombre',$datos['nombre']);
 			$sql->bindParam(':apellidos',$datos['apellidos']);
 			$sql->bindParam(':dni',$datos['dni']);
 			$sql->bindParam(':direccion',$datos['direccion']);
 			$sql->bindParam(':sexo',$datos['sexo']);
 			$sql->bindParam(':email',$datos['email']);
 			$sql->bindParam(':pass',$datos['pass']);
			$sql->execute();
 			return $sql;
 	}

 	public function eliminarEstudiante($codEstudiante)
	{
		$sql=mainModel::conectar()->prepare("DELETE FROM estudiante WHERE CodEstudiante=:Codigo ");
		$sql->bindParam(':Codigo',$codEstudiante);
		$sql->execute();
		return $sql;
	}
}