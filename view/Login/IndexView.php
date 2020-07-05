
<div align="center" class="login" align="center" >
	
	<form action="<?php echo URL;?>Login/Ingresar"  method="post"  >
		<h2>INICIAR SESION</h2>
		<br>
		<div class="col-12">
  			<span class="icon-user icono" ></span>
			<input type="number" name="user" id="user" maxlength="10" class="campo" value="<?php if(isset($_POST['user'])){ echo $_POST['user'];} ?>" placeholder="codigo" autofocus required>
		</div>
		<br>
		<div class="col-12">
  			<span class="icon-key-inv icono" ></span>
			<input type="password" class="campo" name="password" id="password" placeholder="contraseña" required >		
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
		<input type="submit" class="button"  value="Iniciar Sesion">
		</form>
		<br>

</div> 
