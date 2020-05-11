<?php
require_once('conexion.php');

class UniversidadModelo
{

	private $CodUniversidad;
	private $Nombre;
	private $Ciudad ;
	private $Rector ;
	private $Estado ;

	public function setCodigo($code)
	{
		$this->CodUniversidad=$code;
	}
	public function getCodigo() {
        return $this->CodUniversidad;
    }

    public function setNombre($nombre)
	{
		$this->Nombre=$nombre;
	}
	public function getNombre() {
        return $this->Nombre;
    }

    public function setCiudad($ciudad)
	{
		$this->Ciudad=$ciudad;
	}
	public function getCiudad() {
        return $this->Ciudad;
    }


    public function setRector($rector)
	{
		$this->Rector=$rector;
	}
	public function getRector() {
        return $this->Rector;
    }

    public function setEstado($estado)
	{
		$this->Estado=$estado;
	}
	public function getEstado() {
        return $this->Estado;
    }
	
	public function ConsultarUniversidades($codUni=false)
	{
		if($codUni==false)
		{
			$sql = "SELECT * FROM universidad ";
		}else{
			$sql = "SELECT * FROM universidad WHERE CodUniversidad='".$codUni."'";
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
 			$sql = "INSERT INTO universidad (Nombre, Ciudad,Rector, Estado) VALUES ('".$this->getNombre()."','".$this->getCiudad()."','".$this->getRector()."' ,'1' )";
 			$con=Coneccion::getConeccion();
			$query=$con->query($sql);
			Coneccion::finalizar();
 			return $query;
 		}else
 		{
 			return "10";
 		}
 	}
 	private function Existe()
 	{
 		$sql = "SELECT * FROM universidad WHERE Nombre='".$this->getNombre()."'";
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


?>