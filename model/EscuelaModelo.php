<?php
	
class EscuelaModelo extends mainModel
{
	
	public function ConsultarEscuelas()
	{
		$sql=mainModel::ejecutar_consulta_simple("SELECT * FROM escuela ");
 		return $sql->fetchAll();
	} 
	public function consultarEscuela($codescuela)
	{
		$sql=mainModel::conectar()->prepare("SELECT * FROM escuela WHERE CodEscuela=:Codigo LIMIT 1");
		$sql->bindParam(':Codigo',$codescuela);
		$sql->execute();
		return $sql;
	}
	public function consultarEscuelasAjax($codFacultad)
	{
		$sql=mainModel::conectar()->prepare("SELECT * FROM escuela WHERE CodFacultad=:Codigo");
		$sql->bindParam(':Codigo',$codFacultad);
		$sql->execute();
		return $sql;
	}
	public function ConsultarEscuelaModel($datos)
 	{
 		$sql=mainModel::ejecutar_consulta_simple("SELECT CodEscuela FROM escuela WHERE CodFacultad=:codFacultad AND Nombre=:nombre LIMIT 1");
		$sql->bindParam(':codFacultad',$datos['codFacultad']);
 		$sql->bindParam(':nombre',$datos['nombre']);
		$sql->execute();
		return $sql;
 	}
		
	public function guardarEscuela($datos) {
		$existe=self::ConsultarEscuelaModel($datos);
		if($existe->rowCount()==0)
		{
 			$sql=mainModel::conectar()->prepare("INSERT INTO escuela (CodFacultad, Codigo,Nombre,CresObli,CresElec,Ciclos) VALUES (:codFacultad,:codigo,:nombre,:creObli,:creElec,:ciclos )");
 			$sql->bindParam(':codFacultad',$datos['codFacultad']);
 			$sql->bindParam(':codigo',$datos['codigo']);
 			$sql->bindParam(':nombre',$datos['nombre']);
 			$sql->bindParam(':creObli',$datos['creObli']);
 			$sql->bindParam(':creElec',$datos['creElec']);
 			$sql->bindParam(':ciclos',$datos['ciclos']);
			$sql->execute(); 
			return $sql;
 		}else{
 			return "0";
 		}
 	}
 	public function actualizarEscuela($datos) {
		$existe=self::ConsultarEscuelaModel($datos);
		$escuela=$existe->fetch();
		if($existe->rowCount()==0 || $escuela['CodEscuela']==$datos['codEscuela'])
		{
 			$sql=mainModel::conectar()->prepare("UPDATE escuela SET CodFacultad=:codFacultad, Codigo=:codigo, Nombre=:nombre,CresObli=:creObli,CresElec=:creElec, Ciclos=:ciclos WHERE CodEscuela=:codEscuela");
 			$sql->bindParam(':codEscuela',$datos['codEscuela']);
 			$sql->bindParam(':codFacultad',$datos['codFacultad']);
 			$sql->bindParam(':codigo',$datos['codigo']);
 			$sql->bindParam(':nombre',$datos['nombre']);
 			$sql->bindParam(':creObli',$datos['creObli']);
 			$sql->bindParam(':creElec',$datos['creElec']);
 			$sql->bindParam(':ciclos',$datos['ciclos']);
			$sql->execute();
			return $sql;
 		}else{
 			return "0";
 		}
 	}

 	public function eliminarEscuela($codescuela)
	{
		$sql=mainModel::conectar()->prepare("DELETE FROM escuela WHERE CodEscuela=:Codigo ");
		$sql->bindParam(':Codigo',$codescuela);
		$sql->execute();
		return $sql;
	}
 	
}