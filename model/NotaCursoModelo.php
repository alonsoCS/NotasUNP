<?php

class NotaCursoModelo
{
	
	private $CodCurso;
	private  $CodEstudiante;
	private $Nota;
	private $Estado;

	
	public function setCodCurso($code)
	{
		$this->CodCurso=$code;
	}
	public function getCodCurso() {
        return $this->CodCurso;
    }

    public function setCodEstudiante($code)
	{
		$this->CodEstudiante=$code;
	}
	public function getCodEstudiante() {
        return $this->CodEstudiante;
    }

    public function setNota($nota)
	{
		$this->Nota=$nota;
	}
	public function getNota() {
        return $this->Nota;
    }

    public function setEstado($estado)
	{
		$this->Estado=$estado;
	}
	public function getEstado() {
        return $this->Estado;
    }
	
	public function ConsultarNotas()
	{
		$sql = "SELECT * FROM notacurso ";
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
 		$sql = "INSERT INTO notacurso (CodCurso, CodEstudiante,Nota, Estado) VALUES ('".$this->getCodCurso()."','".$this->getCodEstudiante()."','".$this->getNota()."' ,'1' )";
 		$con=Coneccion::getConeccion();
		$query=$con->query($sql);
		Coneccion::finalizar();
 		return $query;
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