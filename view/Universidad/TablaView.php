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
					<th>Estado</th>
					<th>Operaciones</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach ($datos as $uni) { ?>

					<tr>
						<td><?php echo $uni->CodUniversidad; ?></td>
						<td><?php echo $uni->Nombre; ?></td>
						<td><?php echo $uni->Ciudad; ?></td>
						<td><?php echo $uni->Rector; ?></td>
						<td><?php echo $uni->Estado; ?></td>
						<td><button  class="btn btn-danger  icon-trash " name="<?php echo $uni->CodUniversidad; ?>" ></button>
						<button  class="btn btn-warning icon-pencil" name="as" ></button>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</fieldset>