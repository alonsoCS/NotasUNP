
	<h2>FACULTADES</h2>
	<div id="alerta">
		<?php if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} ?>
	</div>
	<a href="<?php echo URL;?>Facultad/Nuevo" class="button">Nueva Facultad</a>

	<?php
		include "TablaView.php"; 
	?>


