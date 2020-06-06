<fieldset>
<legend>Todas las facultades</legend>
<div class="table-responsive">
	<table id="tabla" class="table table-striped table-bordered" >	
		<thead> 
			<tr class="bg-primary">
				<td>Codigo</td>
				<td>CodUniversidad</td>
				<td>Nombre</td>
				<td></td>
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
			<td><a class="btn btn-warning icon-pencil" href="<?php echo URL."Facultad/Modificar&id=".$facultad['CodFacultad']; ?>">
							</a>
				<a class="btn btn-danger icon-trash" href="<?php echo URL."Facultad/Eliminar&id=".$facultad['CodFacultad']; ?>"></a>
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
