<form class="formulario"  method="post" action="<?php echo URL;?>NotaCurso/Consultar" >
	<table>
		<tr>
			<td>
				<span>Universidad:</span>
			</td>
			<td>
				<div class="col-12">
					<select id="universidades" name="universidades" class="campo" autofocus>
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
			</td>
		</tr>
		<tr>
			<td>
				<span>Facultades:</span>
			</td>
			<td>
				<div class="col-12">
					<select id="facultad" name="facultades" class="campo">
						<option value="0">SELECCIONAR</option>
					</select>
				</div>
			</td>
		</tr>
		<tr>
			<td>
				<span class="input-group-addon">Escuela:</span>
			</td>
			<td>
				<div class="col-12">
					<select id="escuelaE" name="escuelas" class="campo">
						<option value="0">SELECCIONAR</option>
					</select>
				</div>
			</td>
		</tr>
	
		<tr>
			<td>
				<span class="input-group-addon">Estudiante:</span>
			</td>
			<td>
				<div class="col-12">
					<select id="estudiantes" name="estudiantes" class="campo">
						<option value="0">SELECCIONAR</option>
					</select>
				</div>
			</td>
		</tr>
	</table>
	<input type="submit" class="button" id="btn-Notas" value="Consultar">
</form>