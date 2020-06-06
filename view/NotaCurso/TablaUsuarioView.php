<div class=" text-center">
	<fieldset>
		<legend>Todos los Cursos</legend>
		<table id="tabla" class="table table-striped table-bordered" >		
			<thead>
				<tr class="bg-primary">
					<th>Codigo</th>
					<th>Ciclo</th>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Creditos</th>
					<th>Nota</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				foreach ($datos as $curso) { 
			?>
				<tr align="center">
					<td><?php echo $curso['CodCurso']; ?></td>
					<td><?php echo $curso['Ciclo']; ?></td>
					<td><?php echo $curso['tipo']; ?></td>
					<td><?php echo $curso['nombre']; ?></td>
					<td><?php echo $curso['creditos']; ?></td>
					<td><?php echo $curso['nota']; ?></td>
				</tr>
			<?php 
				} 
			?>
			</tbody>
		</table>
	</fieldset>
</div>
