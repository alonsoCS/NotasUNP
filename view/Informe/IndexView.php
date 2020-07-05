
<div align="center">
	<h2>INFORME ACADÉMICO </h2>
	<h3 ><?php echo $usuario['CodEstudiante']."-".$usuario['nombre']." ".$usuario['apellidos']; ?></h3>
	<div>
		<?php
		 	include "UserHeadView.php";
		?>
    </div>
    <br>
    <div>
       	<?php
		 	include "CreditosView.php";
		?>
    </div>
    <br>
	<div>
		<?php
		 	include "InformeView.php";
		?>

	</div>
</div>