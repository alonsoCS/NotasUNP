
<div >
	<br>
	<h2>ESCUELAS</h2>
	<br>
	<div id="alerta">
		<?php if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} ?>
	</div>
	<a href="<?php echo URL;?>Escuela/Nuevo" class="btn btn-primary">Nueva Escuela</a>
	<br>
	<div>
		<?php
		include "TablaView.php"; 
		?>

	</div>
</div>