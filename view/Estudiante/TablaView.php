<fieldset>
	<legend>Todos los Estudiantes</legend>
	<div class="table-responsive">
		<table id="tabla" class="table table-striped table-bordered" >		
			<thead>
				<tr class="bg-primary">
					<th>Codigo</th>
					<th>CodEscuela</th>
					<th>Nombres</th>
					<th>Apellidos</th>
					<th>DNI</th>
					<th>Direccion</th>
					<th>Sexo</th>
					<th>Email</th>
					<th>Contraseña</th>
					<th>operaciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if(isset($datos))
				{
					foreach ($datos as $estudiante) 
					{ 
				?>
				<tr>
					<td><?php echo $estudiante['CodEstudiante']; ?></td>
					<td><?php echo $estudiante['CodEscuela']; ?></td>
					<td><?php echo $estudiante['nombre']; ?></td>
					<td><?php echo $estudiante['apellidos']; ?></td>
					<td><?php echo $estudiante['dni']; ?></td>
					<td><?php echo $estudiante['direccion']; ?></td>
					<td><?php echo $estudiante['sexo']; ?></td>
					<td><?php echo $estudiante['email']; ?></td>
					<td><?php echo $estudiante['contraseña']; ?></td>
					<td><a class="btn btn-warning icon-pencil" href="<?php echo URL."Estudiante/Modificar&id=".$estudiante['CodEstudiante']; ?>"></a>
						<a class="btn btn-danger icon-trash" href="<?php echo URL."Estudiante/Eliminar&id=".$estudiante['CodEstudiante']; ?>"></a>
					</td>
				</tr>
				<?php 
					}
				} 
				?>
			</tbody>
		</table>
	</div>
</fieldset>
