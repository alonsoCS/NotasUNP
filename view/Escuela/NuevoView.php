
<fieldset>
	<legend>Nueva Escuela</legend>
	<form method="post" action="<?php echo URL;?>Escuela/Guardar" autocomplete="off" >
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
					<span class="input-group-addon" >Universidad :</span>
					<select id="universidades" class="form-control" name="universidades" autofocus>
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
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Facultades:</span>
					<select id="facultades" name="facultades" class="form-control">
						<option value="0">SELECCIONAR</option>
					</select>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon" >Nombre</span>
  					<input type="text"  name="nombre" class="form-control" id="nombre" required>
  				</div>
  			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Creditos Obligatorios :</span>
					<input type="number" class="form-control" name="creO" id="creO" min="0" max="999" maxlength="3" required>
				</div>
			</div>
			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon" >Creditos Electivos :</span>
					<input type="number" class="form-control" name="creE" id="creE" min="0" max="99" maxlength="2" required>
				</div>
			</div>
  			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Codigo de Escuela :</span>	
					<input type="number" name="codigo" class="form-control" id="codigo"  min="0" max="999" maxlength="3" required>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			<div class="col-lg-5">
  				<div class="input-group">
  					<span class="input-group-addon" >Cantidad de Ciclos :</span>
  					<input type="number"  name="ciclos" class="form-control" id="ciclos" required>
  				</div>
  			</div>
		</div>
		<br>
		<div  >
			<input type="submit" class="btn btn-success " name="crear" id="crear" value="AGREGAR">
		</div>
	</form>
</fieldset>