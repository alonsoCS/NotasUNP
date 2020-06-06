
<div align="center" class="Plogin" align="center" >
	
	<form action="<?php echo URL;?>Login/Ingresar"  method="post"  class="form-signin" >
		<h2 class="form-signin-heading">INICIAR SESION</h2>
		<div class="row">
  			<div class="col-lg-12">
  				<div class="input-group">
  					<span class="input-group-addon icon-user" ></span>
					<input type="number" name="user" id="user" maxlength="10" class="form-control" value="<?php echo $user;?>" placeholder="codigo" autofocus required>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-12">
  				<div class="input-group">
  					<span class="input-group-addon icon-key-inv" ></span>
					<input type="password" class="form-control" class="form-control" name="password" id="password" placeholder="contraseña" required >
				</div>
			</div>
		</div>
		<br>
		<h4><a href="Login/Registrar">Crear una cuenta</a></h4>
		<br>
		<?php if (isset($_POST['mensaje'])) { ?>
			<div id="alert" >
				<?php echo $_POST['mensaje'] ?>
			</div>
		<?php } ?>
		<br>
		<input type="submit" class="btn btn-lg btn-block btn-success"  value="Iniciar Sesion">
		</form>
</div> 
