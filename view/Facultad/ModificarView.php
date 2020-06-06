
<fieldset>
	<legend>Modificar Facultad</legend>
	<form method="post" action="<?php echo URL;?>Facultad/Actualizar" autocomplete="off" >
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon" >Codigo</span>
  					<input type="text"  name="codigo" class="form-control" id="codigo" value="<?php echo $datos['CodFacultad'];?>"  readonly>
  				</div>
  			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon" >Universidad :</span>
					<select id="universidades" class="form-control" name="universidades" >

						<?php 
						if(isset($_POST['universidades']))
						{
							$data=$_POST['universidades'];
							foreach ($data as $universidad) 
							{
								if($datos['CodUniversidad']==$universidad['CodUniversidad'])
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
  					<span class="input-group-addon" >Nombre</span>
  					<input type="text"  name="nombre" class="form-control" id="nombre" value="<?php echo $datos['Nombre'];?>" required>
  				</div>
  			</div>
		</div>
		<br>
		<div>
			<input type="submit" class="btn btn-success icon-folder" name="crear" id="crear" value="ACTUALIZAR">
		</div>
</form>
</fieldset>