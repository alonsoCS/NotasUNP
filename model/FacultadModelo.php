<?php

class FacultadModelo extends mainModel
{	
	public function ConsultarFacultades()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM facultad ");
 		return $sql->fetchAll();
	} 
	public function ConsultarFacultadesAjax($CodUniversidad)
	{
		$sql=mainModel::conectar()->prepare("SELECT * FROM facultad WHERE CodUniversidad=:Codigo ");
		$sql->bindParam(':Codigo',$CodUniversidad);
		$sql->execute();
		return $sql;
	} 
	public function ConsultarfacultadModel($datos)
 	{
 		$sql=mainModel::conectar()->prepare("SELECT * FROM facultad WHERE CodUniversidad=:Codigo AND Nombre=:Nombre");
		$sql->bindParam(':Codigo',$datos['codigo']);
		$sql->bindParam(':Nombre',$datos['nombre']);
		$sql->execute();
		return $sql;
 	}
	public function consultarFacultad($codFacultad)
	{
		$sql=mainModel::conectar()->prepare("SELECT * FROM facultad WHERE CodFacultad=:Codigo LIMIT 1");
		$sql->bindParam(':Codigo',$codFacultad);
		$sql->execute();
		return $sql;
 	}
		
	public function guardarFacultad($datos)
	{
		$existe=self::ConsultarfacultadModel($datos);
		if($existe->rowCount() == 0)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO facultad (CodUniversidad, Nombre) VALUES (:Codigo,:Nombre  )");
			$sql->bindParam(':Codigo',$datos['codigo']);
			$sql->bindParam(':Nombre',$datos['nombre']);
			$sql->execute();
			return $sql;
		}else{
			return 0;
		}
 	}

 	public function actualizarFacultad($datos){
 		$existe=self::ConsultarfacultadModel($datos);
 		$facultad=$existe->fetch();
		if($existe->rowCount()==0 || $facultad['CodFacultad']==$datos['codFacultad'])
		{
 			$sql=mainModel::conectar()->prepare("UPDATE facultad SET CodUniversidad=:CodUniversidad, Nombre=:Nombre  WHERE CodFacultad=:CodFacultad ");
 			$sql->bindParam(':CodUniversidad',$datos['codigo']);
			$sql->bindParam(':Nombre',$datos['nombre']);
			$sql->bindParam(':CodFacultad',$datos['codFacultad']);
			$sql->execute();
			return $sql;
		}else{
			return 0;
		}
 	}
 	public function eliminarFacultad($codigo)
 	{
 		$sql=mainModel::conectar()->prepare("DELETE FROM facultad WHERE CodFacultad=:codigo");
 		$sql->bindParam(':codigo',$codigo);
		$sql->execute();
 		return $sql;
 	}
}