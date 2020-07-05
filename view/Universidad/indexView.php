
	<h2>UNIVERSIDADES</h2>

	<div id="alerta">
		<?php if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} ?>
	</div>
	<a href="<?php echo URL;?>Universidad/Nuevo" class="button centrar">Nueva Universidad</a>

		<?php
		include "TablaView.php"; 
		?>
	

