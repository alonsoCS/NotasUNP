<fieldset>
	<legend>Todos los Ciclos</legend>
	<div class="table-responsive">
		<table id="tabla" class="table table-striped table-bordered" >	
			<thead>
				<tr class="bg-primary">
					<th>Codigo</th>
					<th>CodEscuela</th>
					<th>Numero</th>
					<th>Estado</th>
					<th>operaciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datos as $cic) 
					{ 
				?>
				<tr>
					<td><?php echo $cic->CodCiclo; ?></td>
					<td><?php echo $cic->CodEscuela; ?></td>
					<td><?php echo $cic->Numero; ?></td>
			
					<td><?php echo $cic->Estado; ?></td>
					<td><button  class="btn btn-danger  icon-trash " name="<?php echo $cic->CodCiclo; ?>" ></button><button  class="btn btn-warning icon-pencil" name="as" ></button>
					</td>
				</tr>
				<?php 
					} 
				?>
			</tbody>
		</table>
	</div>
</fieldset>