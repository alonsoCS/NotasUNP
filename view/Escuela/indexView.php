
	<h2>ESCUELAS</h2>
	<div id="alerta">
		<?php if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} ?>
	</div>
	<a href="<?php echo URL;?>Escuela/Nuevo" class="button">Nueva Escuela</a>
	
		<?php
		include "TablaView.php"; 
		?>
