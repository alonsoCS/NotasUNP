<div class="row">
	<div class="col-lg-8">
		<div class="input-group">
			<span class="input-group-addon">Universidad:</span>
			<select id="universidades" name="universidades" class="form-control" autofocus>
				<option value="0">SELECCIONAR</option>
				<?php 
					if (isset($_POST['universidades'])) 
					{
						$universidades=$_POST['universidades'];
						foreach ($universidades as $universidad) 
						{
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
			<select id="escuelaE" name="escuelas" class="form-control">
				<option value="0">SELECCIONAR</option>
			</select>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-lg-8">
		<div class="input-group">
			<span class="input-group-addon">Estudiante:</span>
			<select id="estudiantes" name="estudiantes" class="form-control">
				<option value="0">SELECCIONAR</option>
			</select>
		</div>
	</div>
</div>
<br>
<div align="left">
	<button class="btn btn-success" id="btn-Notas">Actualizar</button>
</div>