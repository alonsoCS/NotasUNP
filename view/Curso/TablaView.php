<fieldset>
	<legend>Todos los Cursos</legend>

	<div class="table-responsive">
		<table id="tabla" class="table table-striped table-bordered" >	
			<thead>
				<tr class="bg-primary">
					<th>Codigo</th>
					<th>CodCiclo</th>
					<th>Tipo</th>
					<th>Nombre</th>
					<th>Creditos</th>
					<th>Estado</th>
					<th>operaciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					foreach ($datos as $cur) 
					{	 
				?>
				<tr>
					<td><?php echo $cur->CodCurso; ?></td>
					<td><?php echo $cur->CodCiclo; ?></td>
					<td><?php echo $cur->tipo; ?></td>
					<td><?php echo $cur->nombre; ?></td>
					<td><?php echo $cur->creditos; ?></td>
					<td><?php echo $cur->Estado; ?></td>
					<td><button  class="btn btn-danger  icon-trash " name="<?php echo $cur->CodCurso; ?>" ></button>
						<button  class="btn btn-warning icon-pencil" name="as" ></button>
					</td>
				</tr>
				<?php 	
					}
				?>
			</tbody>		
		</table>
	</div>
</fieldset>