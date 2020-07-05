<div class="tabla-responsiva">
	<h3>Los cursos de su carrera</h3>
	<table id="tabla" class="tabla" >		
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
			<?php foreach ($datos as $curso) : ?>

			<tr align="center">
				<td><?php echo $curso['CodCurso']; ?></td>
				<td><?php echo $curso['Ciclo']; ?></td>
				<td><?php echo $curso['tipo']; ?></td>
				<td><?php echo $curso['nombre']; ?></td>
				<td><?php echo $curso['creditos']; ?></td>
			</tr>
			<?php endforeach ;?>
	</tbody>
</table>
</div>
</fieldset>

