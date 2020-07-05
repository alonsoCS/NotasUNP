
<div class="tabla-responsiva">
	<h3>Todos los Estudiantes</h3>
	<table id="tabla" class="tabla" >		
		<thead>
			<tr class="bg-primary">
				<th>Codigo</th>
				<th>Escuela</th>
				<th>Nombres</th>
				<th>Apellidos</th>
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
					<td>
						<a href="#informacion" rel="modal:open">Detalles</a>
						<a class="btn btn-warning icon-pencil" href="<?php echo URL."Estudiante/Modificar&id=".$estudiante['CodEstudiante']; ?>"></a>
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

<div id="informacion" class="modal">
  <p>Codigo Universitario:</p>
  <p>DNI</p>
  <p>Nombre:</p>
  <p>Apellidos:</p>
  <p>Universidad:</p>
  <p>Facultad:</p>
  <p>Escuela:</p>
  <p>Direccion:</p>
  <p>Sexo:</p>
  <p>Email:</p>
  <p>Contraseña</p>
  <!--a href="#" class="button" rel="modal:close">Close</a-->
</div>
