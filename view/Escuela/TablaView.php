<fieldset>
	<legend>Todas las Escuelas</legend>
	<div class="table-responsive">
	<table id="tabla" class="table table-striped table-bordered" >
			
	<thead>
		<tr class="bg-primary">
			<th>Codigo</th>
			<th>CodFacultad</th>
			<th>Nombre</th>
			<th>Codigo</th>
			<th>Cred. Obli.</th> 
			<th>Cred. Elec.</th>
			
			<th >operaciones</th>
		</tr>
	</thead>
	<tbody>

		<?php foreach ($datos as $esc) { ?>

		<tr>
			<td><?php echo $esc->CodEscuela; ?></td>
			<td><?php echo $esc->CodFacultad; ?></td>
			<td><?php echo $esc->Nombre; ?></td>
			<td><?php echo $esc->Codigo ;?></td>
			<td><?php echo $esc->CresObli ;?></td>
			<td><?php echo $esc->CresElec ;?></td>
			
			<td><button  class="btn btn-danger  icon-trash " name="<?php echo $uni->CodUniversidad; ?>" ></button>
				<button  class="btn btn-warning icon-pencil" name="as" ></button>
			</td>
		</tr>
		<?php } ?>
	
	</tbody>

</table>
</div>
</fieldset>
