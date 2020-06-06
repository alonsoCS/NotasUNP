
<div >
	<h2>UNIVERSIDADES</h2>

	<div id="alerta">
		<?php if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} ?>
	</div>
	<a href="<?php echo URL;?>Universidad/Nuevo" class="btn btn-primary">Nueva Universidad</a>
	<div id="contenido" >
		<?php
		include "TablaView.php"; 
		?>
	</div>
</div>
