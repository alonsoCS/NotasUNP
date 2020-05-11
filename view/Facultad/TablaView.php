<fieldset>
<legend>Todas las facultades</legend>
<div class="table-responsive">
	<table id="tabla" class="table table-striped table-bordered" >	
		<thead> 
			<tr class="bg-primary">
				<td>Codigo</td>
				<td>CodUniversidad</td>
				<td>Nombre</td>
				<td>Estado</td>
				<td></td>
			</tr>
		</thead>
		<tbody>

		<?php foreach ($datos as $fac) { ?>

		<tr>
			<td><?php echo $fac->CodFacultad; ?></td>
			<td><?php echo $fac->CodUniversidad; ?></td>
			<td><?php echo $fac->Nombre; ?></td>
			
			<td><?php echo $fac->Estado; ?></td>
			<td><button  class="btn btn-danger  glyphicon glyphicon-trash " name="<?php echo $fac->CodFacultad; ?>" ></button>
				<button  class="btn btn-warning glyphicon glyphicon-pencil" name="as" ></button>
			</td>
		</tr>
		<?php } ?>
	
		</tbody>

</table>
</div>	
</fieldset>			
