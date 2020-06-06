
<div >
	<h2>CURSO</h2>
	<br>
	<div id="alerta">
		<?php if (isset($_POST['mensaje'])) {
			echo "<p>".$_POST['mensaje']."</p>";
		} ?>
	</div>
	<a href="<?php echo URL;?>Curso/Nuevo" class="btn btn-primary">Nuevo Curso</a>
	<br>
	<div>
		<?php
		include "TablaView.php"; 
		?>

	</div>
</div>
