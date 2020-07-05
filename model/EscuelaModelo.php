<?php
	
class EscuelaModelo extends mainModel
{
	
	public function ConsultarEscuelas()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM escuela ");
 		return $sql;
	} 
	public function consultarEscuela($codescuela) 
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT * FROM escuela WHERE CodEscuela=? LIMIT 1");
		$sql->bind_param('i',$codescuela);
		$sql->execute();
		$resultado=$sql->get_result();
		if($resultado->num_rows > 0)
		{
			$escuela=$resultado->fetch_assoc();	
		}else{
			$escuela='1';
		}
		$sql->close();
		$con->close();
 		return $escuela;
	}
	public function consultarEscuelasAjax($codFacultad)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT * FROM escuela WHERE CodFacultad=?");
		$sql->bind_param('i',$codFacultad);
		$sql->execute();
		$resultado=$sql->get_result();
		$sql->close();
		$con->close();
 		return $resultado;
	}
	public function ConsultarEscuelaModel($datos)
 	{
 		$con=mainModel::conectar();
 		$sql=$con->prepare("SELECT CodEscuela FROM escuela WHERE CodFacultad=? AND Nombre=? LIMIT 1");
		$sql->bind_param('is',$datos['codFacultad'],$datos['nombre']);
		$sql->execute();
		$resultado=$sql->get_result();
		$sql->close();
		$con->close();
 		return $resultado;
 	}
		
	public function guardarEscuela($datos) {
		$existe=self::ConsultarEscuelaModel($datos);
		if($existe->num_rows==0)
		{
			$con=mainModel::conectar();
 			$sql=$con->prepare("INSERT INTO escuela (CodFacultad, Codigo, Nombre, CresObli, CresElec, Ciclos) VALUES (?,?,?,?,?,?)");
 			$sql->bind_param('iisiii',$datos['codFacultad'],$datos['codigo'],$datos['nombre'],$datos['creObli'],$datos['creElec'],$datos['ciclos']);
			$sql->execute(); 
			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
 		}else{
 			return "existe";
 		}
 	}
 	public function actualizarEscuela($datos) {
		$existe=self::ConsultarEscuela($datos['codEscuela']);
		if($existe=='1' || $existe['CodEscuela']==$datos['codEscuela'])
		{
			$con=mainModel::conectar();
 			$sql=$con->prepare("UPDATE escuela SET CodFacultad=?, Codigo=?, Nombre=?,CresObli=?,CresElec=?, Ciclos=? WHERE CodEscuela=?");
 			$sql->bind_param('issiiii',$datos['codFacultad'],$datos['codigo'],$datos['nombre'],$datos['creObli'],$datos['creElec'],$datos['ciclos'],$datos['codEscuela']);
			$sql->execute();
			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
		}else{
			return 'existe';
		}
 	}

 	public function eliminarEscuela($codescuela)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("DELETE FROM escuela WHERE CodEscuela=? ");
		$sql->bind_param('i',$codescuela);
		$sql->execute();
		$resultado=$sql->affected_rows;
		$sql->close();
		$con->close();
 		return $resultado;
	}
 	
}