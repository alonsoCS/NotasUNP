<fieldset>
	<legend>Todas las Universidades</legend>
	<div class="table-responsive">
		<table id="tabla" class="table table-striped table-bordered" >	
			<thead> 
				<tr class="bg-primary">
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Ciudad</th>
					<th>Rector</th>
					<th>Operaciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				foreach ($datos as $universidad) { 
				?>
					<tr>
						<td><?php echo $universidad['CodUniversidad'];?></td>
						<td><?php echo $universidad['Nombre']; ?></td>
						<td><?php echo $universidad['Ciudad']; ?></td>
						<td><?php echo $universidad['Rector']; ?></td>
						<td><a class="btn btn-warning icon-pencil" href="<?php echo URL."Universidad/Modificar&id=".$universidad['CodUniversidad']; ?>">
							</a>
							<a class="btn btn-danger icon-trash" href="<?php echo URL."Universidad/Eliminar&id=".$universidad['CodUniversidad']; ?>"></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</fieldset>
