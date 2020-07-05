

<div class="tabla-responsiva">
	<h3>Todas las facultades</h3>
	<table  id="tabla" class="tabla" >	
		<thead> 
			<tr class="bg-primary">
				<th>Codigo</th>
				<th>CodUniversidad</th>
				<th>Nombre</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
		<?php 
		if(isset($datos))
		{
			foreach ($datos as $facultad) 
			{ 
		?>
		<tr>
			<td><?php echo $facultad['CodFacultad']; ?></td>
			<td><?php echo $facultad['CodUniversidad']; ?></td>
			<td><?php echo $facultad['Nombre']; ?></td>
			<td><a class="btn-warning icon-pencil" href="<?php echo URL."Facultad/Modificar&id=".$facultad['CodFacultad']; ?>">
							</a>
				<a class="btn-danger icon-trash" href="<?php echo URL."Facultad/Eliminar&id=".$facultad['CodFacultad']; ?>"></a>
			</td>
		</tr>
		<?php 
			} 
		}
		?>
	
		</tbody>

</table>
</div>		
