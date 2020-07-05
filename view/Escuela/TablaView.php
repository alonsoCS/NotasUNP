
<div class="tabla-responsiva">
	<h3>Todas las Escuelas</h3>
	<table id="tabla" class="tabla" >
			
	<thead>
		<tr class="bg-primary">
			<th>Codigo</th>
			<th>CodFacultad</th>
			<th>Nombre</th>
			<th>Codigo</th>
			<th>Cred. Obli.</th> 
			<th>Cred. Elec.</th>
			<th>Ciclos</th>
			<th >operaciones</th>
		</tr>
	</thead>
	<tbody>

	<?php 
	if(isset($datos))
	{
		foreach ($datos as $escuela) { ?>

		<tr>
			<td><?php echo $escuela['CodEscuela']; ?></td>
			<td><?php echo $escuela['CodFacultad']; ?></td>
			<td><?php echo $escuela['Nombre']; ?></td>
			<td><?php echo $escuela['Codigo'] ;?></td>
			<td><?php echo $escuela['CresObli'] ;?></td>
			<td><?php echo $escuela['CresElec'] ;?></td>
			<td><?php echo $escuela['Ciclos'] ;?></td>
			
			<td><a class="btn btn-warning icon-pencil" href="<?php echo URL."Escuela/Modificar&id=".$escuela['CodEscuela']; ?>">
							</a>
				<a class="btn btn-danger icon-trash" href="<?php echo URL."Escuela/Eliminar&id=".$escuela['CodEscuela']; ?>"></a>
			</td>
		</tr>
		<?php } 
	}?>
	
	</tbody>

</table>
</div>
