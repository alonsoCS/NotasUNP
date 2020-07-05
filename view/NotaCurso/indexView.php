<?php 
$usuario=$_SESSION['user'];

	if($usuario=="Administrador"){
		
		if($datos!=false || is_array($datos))
		{
			echo '<div id="alerta">';
			if (isset($_POST['mensaje'])) {
				echo "<p>".$_POST['mensaje']."</p>";
			} 
			echo "</div>";
			include "TablaAdministradorView.php";
		}else{
			echo "<h2>NOTA DE CURSO</h2>";
			include "Seleccionador.php";
		}
		
	} elseif(isset($usuario['CodEstudiante'])){
		
		echo "<h2>NOTA DE CURSO</h2>";
		include "TablaUsuarioView.php";
	}

?>