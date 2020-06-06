<?php

class UniversidadModelo extends mainModel
{
	public function ConsultarUniversidades()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM universidad ");
 		return $sql->fetchAll();
	} 

	public function consultarUniversidad($Codigo)
 	{
 		$sql=mainModel::conectar()->prepare("SELECT * FROM universidad WHERE CodUniversidad=:codigo LIMIT 1");
 		$sql->bindParam(':codigo',$Codigo);
		$sql->execute();
 		return $sql;
 	}
 	public function consultarUniversidadModel($nombre)
 	{
 		$sql=mainModel::conectar()->prepare("SELECT CodUniversidad FROM universidad WHERE nombre=:Nombre LIMIT 1");
 		$sql->bindParam(':Nombre',$nombre);
		$sql->execute();
 		return $sql;
 	}
		
	public function crearUniversidad($datos)
	{
		$existe=self::consultarUniversidadModel($datos['nombre']);
		if($existe->rowCount()==0)
		{
			$sql=mainModel::conectar()->prepare("INSERT INTO universidad (Nombre, Ciudad,Rector) VALUES (:Nombre,:Ciudad,:Rector )");
			$sql->bindParam(':Nombre',$datos['nombre']);
			$sql->bindParam(':Ciudad',$datos['ciudad']);
			$sql->bindParam(':Rector',$datos['rector']);
			$sql->execute();
			return $sql;
		}else{
			return 0;
		}
 	}
 	

 	public function actualizarUniversidad($datos){
 		$existe=self::consultarUniversidadModel($datos['nombre']);
 		$universidad=$existe->fetch();
 		if($existe->rowCount()=="0" || $universidad['CodUniversidad']==$datos['codigo'])
 		{
 			$sql=mainModel::conectar()->prepare("UPDATE universidad SET Nombre=:Nombre, Ciudad=:Ciudad, Rector= :Rector WHERE CodUniversidad=:Codigo");
 			$sql->bindParam(':Codigo',$datos['codigo']);
			$sql->bindParam(':Nombre',$datos['nombre']);
			$sql->bindParam(':Ciudad',$datos['ciudad']);
			$sql->bindParam(':Rector',$datos['rector']);
			$sql->execute();
			return $sql;
		}else{
 			return "0";
 		}
 	}
 	public function eliminarUniversidad($codigo)
 	{
 		$sql=mainModel::conectar()->prepare("DELETE FROM universidad WHERE CodUniversidad=:codigo");
 		$sql->bindParam(':codigo',$codigo);
		$sql->execute();
 		return $sql;
 	}
}