<?php
class EstudianteModelo extends mainModel
{

	public function ConsultarEstudiantes()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM estudiante ");
		return $sql;
	} 

	public function BuscarEstudiante($codigo){
		$con=mainModel::conectar();
		if($con != '0'){
			$sql=$con->prepare("SELECT * FROM estudiante WHERE CodEstudiante=?");
	 		$sql->bind_param('s',$codigo);
			$sql->execute();
			
			$resultado=$sql->get_result();
			if($resultado->num_rows > 0)
			{
				$usuario=$resultado->fetch_assoc();	
			}else{
				$usuario='1';
			}
			$sql->close();
			$con->close();
	 		return $usuario;
		}else{
			return '0';
		}
	} 
	public function consultarEstudiantesAjax($codEscuela){
		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT nombre, apellidos, CodEstudiante FROM Estudiante WHERE CodEscuela=?");
 		$sql->bind_param('i',$codEscuela);
		$sql->execute();
 		$resultado=$sql->get_result();
		$sql->close();
		$con->close();
 		return $resultado;
	} 
	public function guardarEstudiante($datos) {
		$existe=self::BuscarEstudiante($datos['codigo']);
		if($existe=='1')
		{
			$con=mainModel::conectar();
 			$sql=$con->prepare("INSERT INTO estudiante (CodEstudiante, CodEscuela, nombre, apellidos, dni, direccion ,sexo ,email, contraseña) VALUES (?,?,?,?,?,?,?,?,?)");
 			$sql->bind_param('sisssssss',$datos['codigo'],$datos['codEscuela'],$datos['nombre'],$datos['apellidos'],$datos['dni'],$datos['direccion'],$datos['sexo'],$datos['email'],$datos['pass']);
			$sql->execute();
 			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
 		}else{
 			return "existe";
 		}
 	}

 	public function actualizarEstudiante($datos){ 
 		$con=mainModel::conectar();
 		$sql=$con->prepare("UPDATE estudiante SET CodEscuela=?, nombre=?, apellidos=?, dni=?, direccion=?, sexo=?,email=?, contraseña=? WHERE CodEstudiante=?");
		$sql->bind_param('issssssss',$datos['codEscuela'],$datos['nombre'],$datos['apellidos'],$datos['dni'],$datos['direccion'],$datos['sexo'],$datos['email'],$datos['pass'],$datos['codigo']);
		$sql->execute();
			$resultado=$sql->affected_rows;
		$sql->close();
		$con->close();
 		return $resultado;
 	}

 	public function eliminarEstudiante($codEstudiante)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("DELETE FROM estudiante WHERE CodEstudiante=? ");
		$sql->bind_param('s',$codEstudiante);
		$sql->execute();
		$resultado=$sql->affected_rows;
		$sql->close();
		$con->close();
 		return $resultado;
	}
}