<?php
class CicloModelo
{
	
	private $CodCiclo;
	private $CodEscuela;
	private $Numero;
	private $Estado;

	public function setCodCiclo($code)
	{
		$this->CodCiclo=$code;
	}
	public function getCodCiclo() {
        return $this->CodCiclo;
    }

    public function setCodEscuela($code)
	{
		$this->CodEscuela=$code;
	}
	public function getCodEscuela() {
        return $this->CodEscuela;
    }


    public function setNumero($number)
	{
		$this->Numero=$number;
	}
	public function getNumero() {
        return $this->Numero;
    }

    public function setEstado($estado)
	{
		$this->Estado=$estado;
	}
	public function getEstado() {
        return $this->Estado;
    }

	public function ConsultarCiclos($codEscuela=false)
	{
		if($codEscuela==false){
			$sql = "SELECT * FROM ciclo ";
		}else{
			$sql = "SELECT * FROM ciclo WHERE CodEscuela='".$codEscuela."' ";
		}
		
		$conn=Coneccion::getConeccion();
		if($conn=="0")
		{
			return "0";
		}else{
			$query=$conn->query($sql);
			$resultSet=array();
        	while ($row = $query->fetch_object()) {
           		$resultSet[]=$row;
        	}
        	Coneccion::finalizar();
    	}
		return $resultSet;
	}

		
	public function save() {
		if(!$this->Existe())
		{
 		$sql = "INSERT INTO ciclo (CodEscuela, Numero, Estado) VALUES ('".$this->getCodEscuela()."','".$this->getNumero()."','1' )";
 		$con=Coneccion::getConeccion();
		$query=$con->query($sql);
		Coneccion::finalizar();
 		return $query;
 		}
 		else{
 			return "10";
 		}
 	}
 	private function Existe()
 	{
 		$sql = "SELECT * FROM ciclo WHERE CodEscuela='".$this->getCodEscuela()."' AND Numero='".$this->getNumero()."'";
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
