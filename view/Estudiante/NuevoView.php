<fieldset>
	<legend>Nuevo Estudiante</legend>
	<form method="post" action="<?php echo URL;?>Estudiante/Guardar" autocomplete="off" >
		<br>
		<div class="row">
  			<div class="col-lg-6">
  				<div class="input-group">
  					<span class="input-group-addon">Código Universitario :</span>
					<input type="number" name="codigo" id="codigo" placeholder="codigo" maxlength="10" class="form-control" required autofocus>
				</div>
			</div>

			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">DNI :</span>
					<input type="number" name="dni" id="dni" maxlength="8" placeholder="dni" class="form-control" required>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-6">
  				<div class="input-group">
  					<span class="input-group-addon">Universidad:</span>
					<select id="universidades" name="universidades" class="form-control">
						<option value="0">SELECCIONAR</option>
						<?php 
						if (isset($_POST['universidades'])) 
						{
							$datos=$_POST['universidades'];
							foreach ($datos as $universidad) {
						?>
						<option value="<?php echo $universidad['CodUniversidad']; ?>">
							<?php echo $universidad['Nombre']; ?>
						</option>
						<?php
							}
						}
				 		?>
					</select>			
				</div>
			</div>
  			<div class="col-lg-6">
  				<div class="input-group">
  					<span class="input-group-addon">Facultades:</span>
					<select id="facultad" name="facultades" class="form-control">
						<option value="0">SELECCIONAR</option>
					</select>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-6">
  				<div class="input-group">
  					<span class="input-group-addon">Escuelas:</span>
					<select id="escuelas" name="escuelas" class="form-control">
						<option value="0">SELECCIONAR</option>
					</select>
				</div>
			</div>
			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Sexo : </span>
					<select id="sexo" name="sexo" class="form-control">
						<option value="0">SELECCIONAR</option>
						<option value="M">MASCULINO</option>
						<option value="F">FEMENINO</option>
					</select>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Nombres :</span>
					<input type="text" name="nombres" id="nombres" placeholder="nombre" maxlength="90" class="form-control" required>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Apellidos :</span>
					<input type="text" name="apellidos" id="apellidos" maxlength="90" placeholder="apellidos" class="form-control" required>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Direccion :</span>
					<input type="text" name="direccion" id="direccion" maxlength="90" placeholder="direccion" class="form-control" required>
				</div>
			</div>			
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-6">
  				<div class="input-group">
  					<span class="input-group-addon">Email :</span>
					<input type="email" name="email" id="email" maxlength="50" placeholder="email" class="form-control" required>
				</div>
			</div>
			<div class="col-lg-6">
  				<div class="input-group">
  					<span class="input-group-addon">Contraseña :</span>
					<input type="password" name="contraseña" id="contraseña" maxlength="50" placeholder="contraseña" class="form-control" required>
				</div>
			</div>
		</div>
		<br>
		<div>
			<input type="submit" class="btn btn-success" name="crear" id="crear" value="AGREGAR">
		</div>
	</form>
</fieldset>

