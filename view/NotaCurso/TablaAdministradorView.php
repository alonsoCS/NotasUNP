<div class="tabla-responsiva">
	<h3>Las notas de <?=$_POST['CodEstudiante']; ?></h3>
	<table id="tabla" class="tabla" >		
		<thead>
			<tr class="bg-primary">
				<th>Codigo</th>
				<th>Tipo</th>
				<th>Nombre</th>
				<th>Creditos</th>
				<th>Nota</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			if(count($datos)>0)
			{
				foreach ($datos as $curso) { 
			?>
				<tr id="<?php echo $curso['CodCurso']; ?>">
					<td><?php echo $curso['CodCurso']; ?></td>
					<td><?php echo $curso['tipo']; ?></td>
					<td><?php echo $curso['nombre']; ?></td>
					<td><?php echo $curso['creditos']; ?></td>
					<td><?php
						if(isset($curso['nota'])){ 
							echo $curso['nota']; 
						}else{
							echo '<a href="'.$_POST['CodEstudiante'].'/'.$curso['CodCurso'].'" class="registrarNota btn-warning icon-pencil">';
						}?></td>
				</tr>
			<?php 
				} 
			}else{
				echo "<tr><td colspan='5'>Aun no hay cursos disponibles</td></tr>";
			}
			?>
		</tbody>
	</table>
</div>

<div id="informacion" class="modal">
  <form action="<?php echo URL; ?>NotaCurso/GuardarNota" method="POST" >
  	<h3>Registrar Nota</h3>
  		<input type="hidden"  id="codigoAlumno" name="CodEstudiante" > 	
  		<input type="hidden"  id="codigoCurso" name="CodCurso" >
  	
  	<div class="row">
  	<div class="col-6">
  		<label>Tipo:</label>
  		<input type="text" class="campo" id="tipoCurso" name="tipo" readonly>
  	</div>
  	<div class="col-6">
  		<label>Creditos:</label>
  		<input type="number" class="campo" id="creditosCurso" name="creditos" readonly>
  	</div>
  </div>
  	<div class="col-12">
  		<label>Nombre:</label>
  		<input type="text" class="campo" id="nombreCurso" name="nombre" readonly>
  	</div>
  	<div class="col-6">
  		<label>Nota:</label>
  		<input type="number" class="campo" name="nota" maxlength="2" max="20" id="nota" class="campo" placeholder="0" required autofocus="on">
  	</div>
  	<div><input type="submit" class="button" value="Registrar"></p>
  </form>
</div>


