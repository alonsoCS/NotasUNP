
<fieldset>
	<legend>Nueva Escuela</legend>
	<form method="post" action="<?php echo URL;?>Escuela/Actualizar"  >
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon" >Codigo:</span>
  					<input type="text"  name="codEscuela" class="form-control" id="codEscuela" value="<?php echo $datos['CodEscuela'];?>" readonly>
  				</div>
  			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
					<span class="input-group-addon" >Universidad :</span>
					<select id="universidades" class="form-control" name="universidades" autofocus>
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
					<select id="facultades" name="facultades" class="form-control">
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
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon" >Nombre</span>
  					<input type="text"  name="nombre" class="form-control" id="nombre" value="<?php echo $datos['Nombre'];?>">
  				</div>
  			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Creditos Obligatorios :</span>
					<input type="number" class="form-control" name="creO" id="creO" min="0" value="<?php echo $datos['CresObli'];?>" max="999" maxlength="3">
				</div>
			</div>
			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon" >Creditos Electivos :</span>
					<input type="number" class="form-control" name="creE" id="creE" min="0" max="99" maxlength="2" value="<?php echo $datos['CresElec'];?>">
				</div>
			</div>
  			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Codigo de Escuela :</span>	
					<input type="number" name="codigo" class="form-control" id="codigo"  min="0" max="999" maxlength="3" value="<?php echo $datos['Codigo'];?>">
					
				</div>
			</div>
			
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-5">
  				<div class="input-group">
  					<span class="input-group-addon" >Cantidad de Ciclos :</span>
  					<input type="number"  name="ciclos" class="form-control" id="ciclos" value="<?php echo $datos['Ciclos'];?>" required>
  				</div>
  			</div>
		</div>
		<br>
		<div  >
			<input type="submit" class="btn btn-success " name="crear" id="crear" value="ACTUALIZAR">
		</div>
	</form>
</fieldset>