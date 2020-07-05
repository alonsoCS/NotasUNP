<?php

class UniversidadModelo extends mainModel
{
	public function ConsultarUniversidades()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM universidad ");
		return $sql;
	} 

	public function consultarUniversidad($Codigo)
 	{ 
 		$con=mainModel::conectar();
 		$sql=$con->prepare("SELECT * FROM universidad WHERE CodUniversidad=? LIMIT 1");
	 	$sql->bind_param('i',$Codigo);
		$sql->execute();
		
		$resultado=$sql->get_result();
		if($resultado->num_rows > 0)
		{
			$universidad=$resultado->fetch_assoc();	
		}else{
			$universidad='1';
		}
		$sql->close();
		$con->close();
 		return $universidad;
 	}

 	public function consultarUniversidadModel($nombre)
 	{
 		$con=mainModel::conectar();
 		$sql=$con->prepare("SELECT CodUniversidad FROM universidad WHERE nombre=? LIMIT 1");
 		$sql->bind_param('s',$nombre);
		$sql->execute();
		$resultado=$sql->get_result();
		$sql->close();
		$con->close();
 		return $resultado;
 	}
		
	public function crearUniversidad($datos)
	{
		$uniExiste=self::consultarUniversidadModel($datos['nombre']);
		if($uniExiste->num_rows==0)
		{
			$con=mainModel::conectar();
			$sql=$con->prepare("INSERT INTO universidad (Nombre, Ciudad,Rector) VALUES (?,?,? )");
			$sql->bind_param('sss',$datos['nombre'],$datos['ciudad'],$datos['rector']);
			$sql->execute();
			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
		}else{
			return 'existe';
		}
 	}
 	

 	public function actualizarUniversidad($datos){
 		$existe=self::consultarUniversidadModel($datos['nombre']);
 		$universidad=$existe->fetch_assoc();
 		if($existe->num_rows=='0' || $universidad['CodUniversidad']==$datos['codigo'])
 		{
 			$con=mainModel::conectar();
 			$sql=$con->prepare("UPDATE universidad SET Nombre=?, Ciudad=?, Rector=? WHERE CodUniversidad=? ");
 			$sql->bind_param('sssi',$datos['nombre'],$datos['ciudad'],$datos['rector'],$datos['codigo']);
			$sql->execute();
			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
		}else{
 			return "existe";
 		}
 	}
 	public function eliminarUniversidad($codigo)
 	{
 		$con=mainModel::conectar();
 		$sql=$con->prepare("DELETE FROM universidad WHERE CodUniversidad=?");
 		$sql->bind_param('i',$codigo);
		$sql->execute();
		$resultado=$sql->affected_rows;
		$sql->close();
		$con->close();
 		return $resultado;
 	}
}