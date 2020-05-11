<?php

class FacultadModelo
{
	
	private $CodFacultad;/**/
	private $CodUniversidad;
	private $Nombre;/**/
	private $Estado; 
	
	public function setCodigo($code)
	{
		$this->CodFacultad=$code;
	}
	public function getCodigo() {
        return $this->CodFacultad;
    }

    public function setNombre($nombre)
	{
		$this->Nombre=$nombre;
	}
	public function getNombre() {
        return $this->Nombre;
    }

    public function setCodUniversidad($code)
	{
		$this->CodUniversidad=$code;
	}
	public function getCodUniversidad() {
        return $this->CodUniversidad;
    }

    public function setEstado($estado)
	{
		$this->Estado=$estado;
	}
	public function getEstado() {
        return $this->Estado;
    }
	
	public function ConsultarFacultades($CodFac=false)
	{
		if($CodFac==false)
		{
			$sql = "SELECT * FROM facultad ";
		}else{
			$sql = "SELECT * FROM facultad WHERE CodFacultad='".$CodFac."'";
		}
		
		$conn=Coneccion::getConeccion();
		$query=$conn->query($sql);
		$resultSet=array();
        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        Coneccion::finalizar();
		return $resultSet;
	} 
		
	public function save() {
		if(!$this->Existe())
		{
 			$sql = "INSERT INTO facultad (CodUniversidad, Nombre, Estado) VALUES ('".$this->getCodUniversidad()."','".$this->getNombre()."' ,'1' )";
 			$con=Coneccion::getConeccion();
			$query=$con->query($sql);
			Coneccion::finalizar();
 			return $query;
 		}else{
 			return "10";
 		}
 	}
 	private function Existe()
 	{
 		$sql = "SELECT * FROM facultad WHERE CodUniversidad='".$this->getCodUniversidad()."' AND Nombre='".$this->getNombre()."'";
		$conn=Coneccion::getConeccion();
		$query=$conn->query($sql);
		$result=false;
		while ($row = $query->fetch_object()) {
           $result=true;
        }
        Coneccion::finalizar();
		return $result;
 	}
}