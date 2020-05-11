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
		<?php foreach ($datos as $cur) { 
		?>

		<tr align="center">
			<td><?php echo $cur->CodCurso; ?></td>
			<td><?php echo $cur->NumCiclo; ?></td>
			<td><?php echo $cur->Tipo; ?></td>
			<td><?php echo $cur->Nombre; ?></td>
			<td><?php echo $cur->Creditos; ?></td>
		</tr>
			<?php 		
					
			} 
			?>
	</tbody>
</table>
</div>
</fieldset>

