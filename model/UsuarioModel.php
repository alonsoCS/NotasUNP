<?php 
	require_once('conexion.php');

	class UsuarioModelo 
	{
		/*
		contraseña-- 50
		codEstudiante -- 10
		*/
		private $CodEstudiante;
		private $contraseña;

		public function setCodigo($code)
		{
			$this->CodEstudiante=$code;
		}
		public function getCodigo() {
        	return $this->CodEstudiante;
    	}

    	public function setContraseña($econt)
		{
			$this->contraseña=$econt;
		}
		public function getContraseña() {
        	return $this->contraseña;
    	}


		public function BuscarEstudiante(){
			$sql = "SELECT * FROM Estudiante WHERE CodEstudiante='".$this->getCodigo()."'";
			
			$conn=Coneccion::getConeccion();
			$query=$conn->query($sql);
			$resultSet="0";
        	while ($row = $query->fetch_object()) 
        	{
           		$resultSet=$row;
        	}
        	Coneccion::finalizar();
			return $resultSet;
		} 
		public function saveUsuario() {
 			$sql = "INSERT INTO boton (material, color, ojales) VALUES (?, ?, ?)";
 			$data = array("ssi",
 						"{$this->material}",
 						"{$this->color}",
 						"{$this->ojales}");
 			return Coneccion::ejecutar($sql, $data);
 		}
 




	}
