
<div >
	<h2>ESTUDIANTE</h2>
	<br>
	<div id="alerta">
		<?php if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} ?>
	</div>
	<a href="<?php echo URL;?>Estudiante/Nuevo" class="btn btn-primary">Nuevo Estudiante</a>
	<br>
	<div>
		<?php
		include "TablaView.php"; 
		?>

	</div>
</div>