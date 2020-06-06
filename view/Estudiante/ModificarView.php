<fieldset>
	<legend>Nuevo Estudiante</legend>
	<form method="post" action="<?php echo URL;?>Estudiante/Actualizar" autocomplete="off" >
		<br>
		<div class="row">
  			<div class="col-lg-6">
  				<div class="input-group">
  					<span class="input-group-addon">Código Universitario :</span>
					<input type="number" name="codigo" id="codigo" placeholder="codigo" maxlength="10" class="form-control"  value="<?php echo $datos['CodEstudiante'];?>" readonly>
				</div>
			</div>

			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">DNI :</span>
					<input type="number" name="dni" id="dni" maxlength="8" placeholder="dni" class="form-control" required autofocus value="<?php echo $datos['dni'];?>">
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
						if(isset($_POST['universidades']))
						{
							$data=$_POST['universidades'];
							foreach ($data as $universidad) 
							{
								if($universidad['CodUniversidad']==$_POST['universidad'])
								{
						?>
									<option value="<?php echo $universidad['CodUniversidad']; ?>" selected>
										<?php echo $universidad['Nombre']; ?>
									</option>
						<?php
								}else
								{
						?>
									<option value="<?php echo $universidad['CodUniversidad']; ?>">
										<?php echo $universidad['Nombre']; ?>
									</option>
						<?php
								}
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
						<?php
						if(isset($_POST['facultades']))
						{
							$data=$_POST['facultades'];
							foreach ($data as $facultad) 
							{
								if($facultad['CodFacultad']==$_POST['facultad'])
								{
						?>
									<option value="<?php echo $facultad['CodFacultad']; ?>" selected>
										<?php echo $facultad['Nombre']; ?>
									</option>
						<?php
								}else
								{
						?>
									<option value="<?php echo $facultad['CodFacultad']; ?>" >
										<?php echo $facultad['Nombre']; ?>
									</option>
						<?php
								}
							}
						}
				 		?>
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
						<?php 
						if(isset($_POST['escuelas']))
						{
							$data=$_POST['escuelas'];
							foreach ($data as $escuela) 
							{
								if($escuela['CodEscuela']==$datos['CodEscuela'])
								{
									echo '<option value="'.$escuela['CodEscuela'].'" selected>'.$escuela['Nombre'].'</option>';
								}else
								{
									echo '<option value="'.$escuela['CodEscuela'].'" >'.$escuela['Nombre'].'</option>';
								}
							}
						}
				 		?>
					</select>
				</div>
			</div>
			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Sexo : </span>
					<select id="sexo" name="sexo" class="form-control">
						<option value="0">SELECCIONAR</option>
						<?php  
						if ($datos['sexo']=="M") {
								echo '<option value="M" selected>MASCULINO</option>';
								echo '<option value="F">FEMENINO</option>';
							}else{
								echo '<option value="F" selected>FEMENINO</option>';
								echo '<option value="M">MASCULINO</option>';
							} 
						?>
						
						
					</select>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Nombres :</span>
					<input type="text" name="nombres" id="nombres" placeholder="nombre" maxlength="90" class="form-control" required value="<?php echo $datos['nombre'];?>">
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Apellidos :</span>
					<input type="text" name="apellidos" id="apellidos" maxlength="90" placeholder="apellidos" class="form-control" required value="<?php echo $datos['apellidos'];?>">
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Direccion :</span>
					<input type="text" name="direccion" id="direccion" maxlength="90" placeholder="direccion" class="form-control" required value="<?php echo $datos['direccion'];?>">
				</div>
			</div>			
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-6">
  				<div class="input-group">
  					<span class="input-group-addon">Email :</span>
					<input type="email" name="email" id="email" maxlength="50" placeholder="email" class="form-control" required value="<?php echo $datos['email'];?>">
				</div>
			</div>
			<div class="col-lg-6">
  				<div class="input-group">
  					<span class="input-group-addon">Contraseña :</span>
					<input type="password" name="contraseña" id="contraseña" maxlength="50" placeholder="contraseña" class="form-control" required value="<?php echo $datos['contraseña'];?>">
				</div>
			</div>
		</div>
		<br>
		<div>
			<input type="submit" class="btn btn-success" value="ACTUALIZAR">
		</div>
	</form>
</fieldset>

