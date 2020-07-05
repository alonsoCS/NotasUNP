<h2>ESTUDIANTE</h2>

<div id="alerta">
	<?php 
		if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} 
	?>
</div>
<a href="<?php echo URL;?>Estudiante/Nuevo" class="button">Nuevo Estudiante</a>

<?php
	include "TablaView.php"; 
?>
