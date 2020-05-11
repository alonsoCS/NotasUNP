<?php
/**
 * 
 */
class EscuelaModelo
{
	
	private  $CodEscuela;
	private $CodFacultad;
	private $Codigo;
	private $Nombre;
	private $creO;
	private $creE;
	private $Estado;

	public function setCreO($code)
	{
		$this->creO=$code;
	}
	public function getCreO() {
        return $this->creO;
    }
	
	public function setCreE($code)
	{
		$this->creE=$code;
	}
	public function getCreE() {
        return $this->creE;
    }

	public function setCodFacultad($code)
	{
		$this->CodFacultad=$code;
	}
	public function getCodFacultad() {
        return $this->CodFacultad;
    }

    public function setCodEscuela($code)
	{
		$this->CodEscuela=$code;
	}
	public function getCodEscuela() {
        return $this->CodEscuela;
    }


    public function setCodigo($number)
	{
		$this->Codigo=$number;
	}
	public function getCodigo() {
        return $this->Codigo;
    }

    public function setNombre( $name)
	{
		$this->Nombre=$name;
	}
	public function getNombre() {
        return $this->Nombre;
    }

    public function setEstado($estado)
	{
		$this->Estado=$estado;
	}
	public function getEstado() {
        return $this->Estado;
    }


	public function ConsultarEscuelas($codEscuela=false)
	{
		if($codEscuela==false)
		{
			$sql = "SELECT * FROM escuela ";
		}else{
			$sql="SELECT * FROM escuela WHERE CodEscuela='".$codEscuela."'";
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
 		$sql = "INSERT INTO escuela (CodFacultad, Codigo,Nombre,CresObli,CresElec Estado) VALUES ('".$this->getCodFacultad()."','".$this->getCodigo()."','".$this->getNombre()."','".$this->getCreO()."','".$this->getCreE()."' ,'1' )";
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
 		$sql = "SELECT * FROM escuela WHERE CodFacultad='".$this->getCodFacultad()."' AND Nombre='".$this->getNombre()."'";
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