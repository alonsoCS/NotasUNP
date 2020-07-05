<?php

class FacultadModelo extends mainModel
{	
	public function ConsultarFacultades()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM facultad ");
 		return $sql;
	} 
	public function ConsultarFacultadesAjax($CodUniversidad)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT * FROM facultad WHERE CodUniversidad=? ");
		$sql->bind_param('i',$CodUniversidad);
		$sql->execute();

		$resultado=$sql->get_result();
		
		$sql->close();
		$con->close();
 		return $resultado;
	} 
	public function ConsultarfacultadModel($datos)
 	{
 		$con=mainModel::conectar();
 		$sql=$con->prepare("SELECT * FROM facultad WHERE CodUniversidad=? AND Nombre=?");
		$sql->bind_param('is',$datos['codigo'],$datos['nombre']);
		$sql->execute();
		$resultado=$sql->get_result();
		$sql->close();
		$con->close();
 		return $resultado;
 	}
	public function consultarFacultad($codFacultad)
	{
		$con=mainModel::conectar();
		$sql=$con->prepare("SELECT * FROM facultad WHERE CodFacultad=? LIMIT 1");
		$sql->bind_param('i',$codFacultad);
		$sql->execute();
		$resultado=$sql->get_result();
		if($resultado->num_rows > 0)
		{
			$resultado=$resultado->fetch_assoc();	
		}else{
			$resultado='1';
		}
		$sql->close();
		$con->close();
 		return $resultado;
 	}
		
	public function guardarFacultad($datos)
	{
		$existe=self::ConsultarfacultadModel($datos);
		if($existe->num_rows == 0)
		{
			$con=mainModel::conectar();
			$sql=$con->prepare("INSERT INTO facultad (CodUniversidad, Nombre) VALUES (?,?)");
			$sql->bind_param('is',$datos['codigo'],$datos['nombre']);
			$sql->execute();
			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
		}else{
			return 'existe';
		}
 	}

 	public function actualizarFacultad($datos){
 		$existe=self::ConsultarfacultadModel($datos);
 		$facultad=$existe->fetch_assoc();
		if($existe->num_rows==0 || $facultad['CodFacultad']==$datos['codFacultad'])
		{
			$con=mainModel::conectar();
 			$sql=$con->prepare("UPDATE facultad SET CodUniversidad=?, Nombre=?  WHERE CodFacultad=? ");
 			$sql->bind_param('isi',$datos['codigo'],$datos['nombre'],$datos['codFacultad']);
			$sql->execute();
			$resultado=$sql->affected_rows;
			$sql->close();
			$con->close();
	 		return $resultado;
		}else{
			return 'existe';
		}
 	}
 	public function eliminarFacultad($codigo)
 	{
 		$con=mainModel::conectar();
 		$sql=$con->prepare("DELETE FROM facultad WHERE CodFacultad=?");
 		$sql->bind_param('i',$codigo);
		$sql->execute();
 		$resultado=$sql->affected_rows;
		$sql->close();
		$con->close();
 		return $resultado;
 	}
}