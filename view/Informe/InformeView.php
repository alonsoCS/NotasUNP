<fieldset>
	<legend>Los cursos de su carrera</legend>
<div class="table-responsive">
<table id="tabla" class="table table-striped table-bordered" >		
	<thead>
		<tr class="bg-primary"> 
			<th>Codigo</th>
			<th>Ciclo</th>
			<th>Tipo</th>
			<th>Nombre</th>
			<th>Creditos</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $curso) { 
		?>

		<tr align="center">
			<td><?php echo $curso['CodCurso']; ?></td>
			<td><?php echo $curso['NumCiclo']; ?></td>
			<td><?php echo $curso['Tipo']; ?></td>
			<td><?php echo $curso['Nombre']; ?></td>
			<td><?php echo $curso['Creditos']; ?></td>
		</tr>
			<?php 		
					
			} 
			?>
	</tbody>
</table>
</div>
</fieldset>

