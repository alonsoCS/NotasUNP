<?php 
	$user="";
	if(isset($_POST['user']))
	{ 
		$user= $_POST['user'];
	}
 ?>


<div align="center" class="Plogin" align="center" >
	<form action="<?php echo $helper->url("Login","Verificar"); ?>" method="post" class="form-signin" onsubmit="return Verificar();" >
		<h2 class="form-signin-heading">INICIAR SESION</h2>
		<div class="row">
  			<div class="col-lg-12">
  				<div class="input-group">
  					<span class="input-group-addon icon-user" ></span>
					<input type="number" name="user" id="user" maxlength="10" class="form-control" value="<?php echo $user;?>" required autofocus>

				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-12">
  				<div class="input-group">
  					<span class="input-group-addon icon-key-inv" ></span>
					<input type="password" class="form-control" class="form-control" name="password" id="password" required >
				</div>
			</div>
		</div>
		<br>
			<?php
				if(isset($_POST['mensaje']))
				{
				echo $_POST['mensaje']; 
				}
			?>
			<br>
		<h4><a href="<?php echo URL; ?>Login/Registrar">Crear una cuenta</a></h4>
		<br>
		<br>
		<input type="submit" class="btn btn-lg btn-block btn-success" name="login" value="Iniciar Sesion">
		</form>
</div> 

<script type="text/javascript">
	function Verificar() {
			// body...
			var user=document.getElementById('user').value;
			var contrseña=document.getElementById('password').value;
			if(user=="" || contrseña=="")
			{
				alert("ingrese todos los datos");
				return false;
			}else{
				return true;
			}

	}
</script>