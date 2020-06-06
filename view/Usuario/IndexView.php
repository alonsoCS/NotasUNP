<?php 
 	if(isset($_SESSION['user']))
 	{
 		$usuario=$_SESSION['user'];
 	}else{

 	}
 ?>
<div align="center" class="Padmin">
	<br>
	<h2>BIENVENIDO    <?php echo  strtoupper($usuario['nombre']." ".$usuario['apellidos']); ?></h2>	
	<br>
		
	<img class="imgAdmin" src="<?php echo URL?>img/User<?php echo $usuario['sexo']; ?>.svg">

</div> 