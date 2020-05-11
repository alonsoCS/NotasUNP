<?php 
	date_default_timezone_set('UTC');
	if(isset($_SESSION['user'])){
		$usuario=$_SESSION['user'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<meta http-equiv="cache-control" content="no-cache">
	<title><?php echo TITULO; ?></title>
	<?php include "Modelos/header.php"; ?>
</head>
<body > 
	<header >
		<div class="contenedor">
			<h1 class="icon-home">REGISTRO DE NOTAS</h1>
			<?php 	
				if($controlador!="Login")
				{ 
			?>
    		<input type="checkbox" id="menu-bar">
			<label class="icon-menu" for="menu-bar"></label>
    		<?php	
					if ($usuario=="Administrador") 
					{
						include "Modelos/NavAdministrador.php";
					}else{ 
						include "Modelos/NavUsuario.php";
					}
				} 
			?>
		</div>
	</header>
	<main>
		<section>
			<br>
			<?php include_once 'view/'.$controlador.'/'.$vista.'View.php'; ?>
			<br>
		</section>
	</main>
	<footer>
		<p align="center">&copy;Creado por JACS - Piura - <?php echo date("Y"); ?></p>
	</footer>
</body>
</html>