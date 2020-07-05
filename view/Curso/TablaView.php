<div class="tabla-responsiva">
		<h3>Todos los Cursos</h3>
		<table id="tabla" class="tabla" >	
			<thead>
				<tr class="bg-primary">
					<th>Codigo</th>
					<th>CodEscuela</th>
					<th>Ciclo</th>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Creditos</th>
					<th>operaciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(isset($datos))
				{
					foreach ($datos as $curso) 
					{	 
				?>
				<tr>
					<td><?php echo $curso['CodCurso']; ?></td>
					<td><?php echo $curso['CodEscuela']; ?></td>
					<td><?php echo $curso['Ciclo']; ?></td>
					<td><?php echo $curso['tipo']; ?></td>
					<td><?php echo $curso['nombre']; ?></td>
					<td><?php echo $curso['creditos']; ?></td>
					<td><a class="btn btn-warning icon-pencil" href="<?php echo URL."Curso/Modificar&id=".$curso['CodCurso']; ?>">
							</a>
						<a class="btn btn-danger icon-trash" href="<?php echo URL."Curso/Eliminar&id=".$curso['CodCurso']; ?>"></a>
					</td>
				</tr>
				<?php 	
					}
				}
				?>
			</tbody>		
		</table>
	</div>