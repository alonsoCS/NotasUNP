<?php
/**
 * 
 */
class CursoModelo
{
	
	private $CodCurso;
	private $CodCiclo;
	private $tipo;
	private $nombre;
	private $creditos;
	private $Estado;
	
	public function setCodCurso($code)
	{
		$this->CodCurso=$code;
	}
	public function getCodCurso() {
        return $this->CodCurso;
    }

	public function setCodCiclo($code)
	{
		$this->CodCiclo=$code;
	}
	public function getCodCiclo() {
        return $this->CodCiclo;
    }

    public function setTipo($tipo)
	{
		$this->tipo=$tipo;
	}
	public function getTipo() {
        return $this->tipo;
    }


    public function setNombre($name)
	{
		$this->nombre=$name;
	}
	public function getNombre() {
        return $this->nombre;
    }

    public function setCreditos($cre)
	{
		$this->creditos=$cre;
	}
	public function getCreditos() {
        return $this->creditos;
    }

    public function setEstado($estado)
	{
		$this->Estado=$estado;
	}
	public function getEstado() {
        return $this->Estado;
    }

	public function ConsultarCursos()
	{
		$sql = "SELECT * FROM curso ";
		$conn=Coneccion::getConeccion();
		$query=$conn->query($sql);
		$resultSet=array();
        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        Coneccion::finalizar();
		return $resultSet; 
	}
	public function ConsultarCursosUsuario($codEscuela,$codEstudiante)
	{
		$sqlCiclo = "SELECT CodCiclo,Numero FROM ciclo WHERE CodEscuela='".$codEscuela."'";
		$conn=Coneccion::getConeccion();
		$queryCiclo=$conn->query($sqlCiclo);
		$resultSet=array();
		while ($rowCiclo = $queryCiclo->fetch_object()) {
           
           $sqlCurso = "SELECT * FROM curso WHERE CodCiclo='".$rowCiclo->CodCiclo."'";
           $queryCurso=$conn->query($sqlCurso);
           while ($rowCurso = $queryCurso->fetch_object()) {
           		$curso = new stdClass();
           		$curso->CodCurso =$rowCurso->CodCurso ;
				$curso->NumCiclo =$rowCiclo->Numero ;
				$curso->Tipo=$rowCurso->tipo;
				$curso->Nombre=$rowCurso->nombre;
				$curso->Creditos=$rowCurso->creditos;

				$sqlnota = "SELECT Nota FROM notacurso WHERE CodCurso='".$rowCurso->CodCurso."' AND CodEstudiante='".$codEstudiante."'";
           		$querynota=$conn->query($sqlnota);
           		while ($rowNota = $querynota->fetch_object()) {
           			# code...
           			$curso->Nota=$rowNota->Nota;
           		}

           		$resultSet[]=$curso;
           }
        }
        
        Coneccion::finalizar();
		return $resultSet;
	} 

	public function ConsultarCursosHistorial($codEscuela,$codEstudiante)
	{
		$sqlCiclo = "SELECT CodCiclo,Numero FROM ciclo WHERE CodEscuela='".$codEscuela."'";
		$conn=Coneccion::getConeccion();
		$queryCiclo=$conn->query($sqlCiclo);
		$resultSet=array();
		while ($rowCiclo = $queryCiclo->fetch_object()) {
           
           $sqlCurso = "SELECT * FROM curso WHERE CodCiclo='".$rowCiclo->CodCiclo."'";
           $queryCurso=$conn->query($sqlCurso);
           while ($rowCurso = $queryCurso->fetch_object()) {
				$sqlnota = "SELECT Nota FROM notacurso WHERE CodCurso='".$rowCurso->CodCurso."' AND CodEstudiante='".$codEstudiante."'";
           		$querynota=$conn->query($sqlnota);
           		while ($rowNota = $querynota->fetch_object()) {
           			# code...
           			$curso = new stdClass();
           			$curso->CodCurso =$rowCurso->CodCurso ;
					$curso->NumCiclo =$rowCiclo->Numero ;
					$curso->Tipo=$rowCurso->tipo;
					$curso->Nombre=$rowCurso->nombre;
					$curso->Creditos=$rowCurso->creditos;
           			$curso->Nota=$rowNota->Nota;
           			$resultSet[]=$curso;
           		}
           		
           }
        }
        Coneccion::finalizar();
		return $resultSet;
	} 
		
	public function save() {
		if(!$this->Existe())
		{
			$sql = "INSERT INTO curso (CodCiclo,tipo,nombre, creditos,Estado) VALUES ('".$this->getCodCiclo()."','".$this->getTipo()."','".$this->getNombre()."','".$this->getCreditos()."' ,'1' )";
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
 		$sql = "SELECT * FROM curso WHERE nombre='".$this->getNombre()."' ";
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