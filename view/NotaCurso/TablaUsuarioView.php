<div class="table-responsive text-center">
<fieldset>

	<legend>Todos los Cursos</legend>
	<table id="tabla" class="table table-striped table-bordered" >
				
	<thead>
		<tr class="bg-primary">
			<td>Codigo</td>
			<td>Ciclo</td>
			<td>Tipo</td>
			<td>Nombre</td>
			<td>Creditos</td>
			<td>Nota</td>
		</tr>
	</thead>
	<tbody>


		<?php foreach ($datos as $cur) { 
			$datos=$cur->CodCurso."||".$cur->NumCiclo."||".$cur->Tipo."||".$cur->Nombre."||".$cur->Creditos;
			?>

		<tr align="center">
			<td><?php echo $cur->CodCurso; ?></td>
			<td><?php echo $cur->NumCiclo; ?></td>
			<td><?php echo $cur->Tipo; ?></td>
			<td><?php echo $cur->Nombre; ?></td>
			<td><?php echo $cur->Creditos; ?></td>
			<td><?php 
					if(isset($cur->Nota)){
						echo $cur->Nota; 
					}else{
				?>
					<button class="btn btn-warning icon-pencil" data-toggle="modal" data-target="#ModalAgregar" onclick="agregarFormClase('<?php echo $datos ?>')">
						

					</button>
				<?php
					}
				?>	
			</td>
		</tr>
		<?php } ?>
	
	</tbody>


</table>
</fieldset>
</div>
