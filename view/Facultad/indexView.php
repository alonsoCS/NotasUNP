
<div >
	
	<h2>FACULTADES</h2>

	<br>
	<div id="alerta">
		<?php if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} ?>
	</div>
	<a href="<?php echo URL;?>Facultad/Nuevo" class="btn btn-primary">Nueva Facultad</a>
	<br>
	<div>

		<?php
		include "TablaView.php"; 
		?>

	</div>
	
</div>

