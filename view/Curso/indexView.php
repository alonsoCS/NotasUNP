
	<h2>CURSO</h2>
	<div id="alerta">
		<?php if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} ?>
	</div>
	<a href="<?php echo URL;?>Curso/Nuevo" class="button">Nuevo Curso</a>
	
		<?php
		include "TablaView.php"; 
		?>

