<fieldset>
	<legend>Modificar Curso</legend>
	<form method="post" action="<?php echo URL; ?>Curso/Actualizar" autocomplete="off" >
		<br>
		<div class="row">
			<div class="col-lg-4">
				<div class="input-group">
  					<span class="input-group-addon">Codigo Curso:</span>
  					<input type="text" class="form-control" name="codCurso" id="codCurso" maxlength="50" readonly value="<?php echo $datos['CodCurso'];?>">
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Universidad:</span>
					<select id="universidades" name="universidades" class="form-control" autofocus>
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
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
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
									<option value="<?php echo $facultad['CodFacultad']; ?>">
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
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Escuelas:</span>
					<select id="escuela" name="escuelas" class="form-control">
						<option value="0">SELECCIONAR</option>
						<?php 
						if(isset($_POST['escuelas']))
						{
							$data=$_POST['escuelas'];
							foreach ($data as $escuela) 
							{
								if($escuela['CodEscuela']==$datos['CodEscuela'])
								{
						?>
									<option value="<?php echo $escuela['CodEscuela']; ?>" selected>
										<?php echo $escuela['Nombre']; ?>
									</option>
						<?php
								}else
								{
						?>
									<option value="<?php echo $escuela['CodEscuela']; ?>">
										<?php echo $escuela['Nombre']; ?>
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
  			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Ciclo:</span>
					<select id="ciclos" name="ciclos" class="form-control">
						<option value="0">SELECCIONAR</option>
						<?php 
						if(isset($_POST['ciclos']))
						{
							$ciclos=$_POST['ciclos'];
							for ($i=0; $i <$ciclos ; $i++) 
							{
								if($i==$datos['Ciclo'])
								{
						?>
									<option value="<?php echo $i; ?>" selected>
										<?php echo $i; ?>
									</option>
						<?php
								}else
								{
						?>
									<option value="<?php echo $i; ?>">
										<?php echo $i; ?>
									</option>
						<?php
								}
							}
						}
				 		?>
					</select>
				</div>
			</div>
			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Tipo:</span>
					<select id="tipo" name="tipo" class="form-control">
						<option value="0">SELECCIONAR</option>
						<?php 
							if ($datos['tipo']=="O") {
								echo '<option value="O" selected>OBLIGATORIO</option>';
								echo '<option value="E" >ELECTIVO</option>';
							}else{
								echo '<option value="E" selected>ELECTIVO</option>';
								echo '<option value="O">OBLIGATORIO</option>';
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
  					<span class="input-group-addon">Nombre:</span>
  					<input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" required value="<?php echo $datos['nombre'];?>">
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			
  			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Creditos:</span>
					<input type="number" name="creditos" id="creditos" class="form-control" maxlength="2" required value="<?php echo $datos['creditos'];?>">

				</div>
			</div>
		</div>
		<br>
		<div>
			<input type="submit" class="btn btn-success" name="crear" id="crear" value="AGREGAR">
		</div>
</form>
</fieldset>
