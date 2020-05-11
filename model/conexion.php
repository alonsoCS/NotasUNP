<?php
class Coneccion{
	private static $conn;
	
	public function getConeccion(){
		self::$conn=new mysqli('localhost', 'root', 'alonso2014', 'notasunp');//conecta a la base ce datos
		if (self::$conn->connect_error) {
			return "0";
		}else{
			return self::$conn;	
		}
		
	}

	public function finalizar() {
 		
 		self::$conn ->close();
 	}



}
