<?php  
	class mainModel
	{
		//conexion a la base de datos
		protected function conectar()
		{
			$conexion=new mysqli('localhost','root','alonso2014','notasunp');
			if($conexion->connect_errno)
			{
				echo $conexion->connect_error;
				return '0';
			}else{
				return $conexion;
			}
		}
		//ejecuta una consulta simple
		protected function ejecutar_consulta_simple($consulta)
		{
			$respuesta=self::conectar()->query($consulta);//prepara para la consulta
			return $respuesta;
		}

		
		//limpiar las cadenas
		public function limpiar_cadena($cadena)
		{
			$cadena=trim($cadena);//elimina espacios en cadena
			$cadena=stripslashes($cadena);//quita las barras invertidas\\
			$cadena=str_ireplace("<script>", "", $cadena);
			$cadena=str_ireplace("</script>", "", $cadena);
			$cadena=str_ireplace("<script", "", $cadena);
			$cadena=str_ireplace("<script src", "", $cadena);
			$cadena=str_ireplace("<script type", "", $cadena);
			$cadena=str_ireplace("SELECT * FROM", "", $cadena);
			$cadena=str_ireplace("DELETE FROM", "", $cadena);
			$cadena=str_ireplace("INSERT INTO", "", $cadena);
			$cadena=str_ireplace("--", "", $cadena);
			$cadena=str_ireplace("^", "", $cadena);
			$cadena=str_ireplace("[", "", $cadena);
			$cadena=str_ireplace("]", "", $cadena);
			$cadena=str_ireplace("==", "", $cadena);
			$cadena=str_ireplace(";", "", $cadena);

			return $cadena;
		}
	}

		
