<?php
require_once('UsuarioModel.php');

class EstudianteModelo extends UsuarioModelo
{
	
	
	private $CodEscuela;
	private $nombre;
	private $apellidos;
	private $dni;
	private $direccion;
	private $sexo;
	private $email;
	
	private $Estado;

	public function setEstado($est)
	{
		$this->Estado=$est;
	}
	public function getEstado() {
        return $this->Estado;
    }

	public function setEmail($email)
	{
		$this->email=$email;
	}
	public function getEmail() {
        return $this->email;
    }

	public function setSexo($sexo)
	{
		$this->sexo=$sexo;
	}
	public function getSexo() {
        return $this->sexo;
    }

	public function setDireccion($dire)
	{
		$this->direccion=$dire;
	}
	public function getDireccion() {
        return $this->direccion;
    }

	public function setDni($dni)
	{
		$this->dni=$dni;
	}
	public function getDni() {
        return $this->dni;
    }

	public function setApellidos($apes)
	{
		$this->apellidos=$apes;
	}
	public function getApellidos() {
        return $this->apellidos;
    }

	

    public function setCodEscuela($code)
	{
		$this->CodEscuela=$code;
	}
	public function getCodEscuela() {
        return $this->CodEscuela;
    }

    public function setNombre($name)
	{
		$this->nombre=$name;
	}
	public function getNombre() {
        return $this->nombre;
    }
	
	public function ConsultarEstudiantes()
	{
		$sql = "SELECT * FROM estudiante ";
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
		if(!$this->Existe()){
 		$sql = "INSERT INTO estudiante (CodEstudiante,CodEscuela,nombre,apellidos,dni,direccion,sexo,email,contraseña,Estado) VALUES ('".$this->getCodigo()."','".$this->getCodEscuela()."','".$this->getNombre()."','".$this->getApellidos()."','".$this->getDni()."','".$this->getDireccion()."','".$this->getSexo()."','".$this->getEmail()."','".$this->getContraseña()."' ,'1' )";
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
 		$sql = "SELECT * FROM estudiante WHERE CodEstudiante='".$this->getCodigo()."' ";
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