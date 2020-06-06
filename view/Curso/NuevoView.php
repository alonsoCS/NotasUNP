<fieldset>
	<legend>Nuevo Curso</legend>
	<form method="post" action="<?php echo URL; ?>Curso/Guardar" autocomplete="off" >
		<br>
		<div class="row">
  			<div class="col-lg-8">
  				<div class="input-group">
  					<span class="input-group-addon">Universidad:</span>
					<select id="universidades" name="universidades" class="form-control" autofocus>
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
					<select id="facultad" name="facultades" class="form-control">
						<option value="0">SELECCIONAR</option>
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
					</select>
				</div>
			</div>
			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Tipo:</span>
					<select id="tipo" name="tipo" class="form-control">
						<option value="0">SELECCIONAR</option>
						<option value="O">OBLIGATORIO</option>
						<option value="E">ELECTIVO</option>
					</select>
				</div>
			</div>
		</div>
		<br>		
		<div class="row">
			<div class="col-lg-8">
				<div class="input-group">
  					<span class="input-group-addon">Nombre:</span>
  					<input type="text" class="form-control" name="nombre" id="nombre" maxlength="50" required>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
  			
  			<div class="col-lg-4">
  				<div class="input-group">
  					<span class="input-group-addon">Creditos:</span>
					<input type="number" name="creditos" id="creditos" class="form-control" maxlength="2" required>

				</div>
			</div>
		</div>
		<br>
		<div>
			<input type="submit" class="btn btn-success" name="crear" id="crear" value="AGREGAR">
		</div>
</form>
</fieldset>
