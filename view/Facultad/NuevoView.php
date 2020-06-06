
<fieldset>
	<legend>Nueva Facultad</legend>
	<form method="post" action="<?php echo URL;?>Facultad/Guardar" autocomplete="off" >
		<div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<span class="input-group-addon" >Universidad :</span>
					<select id="universidades" class="form-control" name="universidades" autofocus>
						<option value="0">SELECCIONAR</option>
						<?php 
						if(isset($_POST['universidades']))
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
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon" >Nombre</span>
  					<input type="text"  name="nombre" class="form-control" id="nombre"  required>
  				</div>
  			</div>
		</div>
		<br>
		<div>
			<input type="submit" class="btn btn-success icon-folder" name="crear" id="crear" value="NUEVO">
		</div>
</form>
</fieldset>