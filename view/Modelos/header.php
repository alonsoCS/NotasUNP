<?php 
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

	<!-- jQuery -->
    <script src="<?php echo URL;?>js/jquery-3.3.1.min.js"></script>
    <!--  modal  -->
    <script src="<?php echo URL;?>js/jquery.modal.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/jquery.modal.min.css">
	<!--    Mis PAQUETES   -->
   <link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/fontello.css">
   <link rel="stylesheet" type="text/css" href="<?php echo URL;?>css/main.css">

</head>
<body > 
	<header  >
		<div class="cabecera">
			<div class="contenedor">
				<h1 class="icon-home">REGISTRO DE NOTAS</h1>
				<?php 	
					if($controlador!="Login")
					{ 
				?>
    			<input type="checkbox" class="icon-menu" id="icon-menu">
			</div>
		</div>
    	<?php	
			if ($usuario=="Administrador") 
			{
				include "NavAdministrador.php";
			}else{ 
				include "NavUsuario.php";
			}
		}  
		?>
		
	</header>




 
    



   

