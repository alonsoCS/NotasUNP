<?php 
$usuario=$_SESSION['user'];
?>

<div align="center">
	<?php if($usuario=="Administrador"){
		
		echo "<h2>NOTA DE CURSO</h2>";
	} elseif(isset($usuario->CodEstudiante)){
		
		echo "<h2>NOTA DE CURSO</h2>";
		include "TablaUsuarioView.php";
	}
	?>
	
		

</div>
<?php
	include "agregarNota.php";
?>