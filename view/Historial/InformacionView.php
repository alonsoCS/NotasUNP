<?php 


//descipcion de cada ciclo con curso 
$ciclo=array();
foreach ($datos as $value) {
	
	$ciclo[$value->NumCiclo]=$value->NumCiclo;
}
sort($ciclo);
if(count($ciclo)){
	foreach ($ciclo as $dato) {
	# tabla de cada ciclo
		$creditos=0;
		$Snota=0;
?>
<div class="table-responsive">
<table border="1" class="table table-striped table-bordered">
	<caption><strong>Ciclo : <?php echo $dato; ?></strong></caption>
	<thead >
		<tr class="bg-primary">
			<th scope="col">Codigo</td>
			<th scope="col">Tipo</td>
			<th scope="col">Nombre</td>
			<th scope="col">Creditos</td>
			<th scope="col">Nota</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($datos as $cur) { 
			if($cur->NumCiclo==$dato)
			{
				$creditos+=$cur->Creditos;
				$Snota+=($cur->Nota*$cur->Creditos);
		?>

		<tr align="center">
			<td><?php echo $cur->CodCurso; ?></td>

			<td><?php echo $cur->Tipo; ?></td>
			<td align="left"><?php echo $cur->Nombre; ?></td>
			<td><?php echo $cur->Creditos; ?></td>
			<td><?php echo $cur->Nota; ?></td>
		</tr>
			<?php 	

					}
			} 
			?>
	</tbody>
	<tfoot>
		<tfoot>
        <tr class="bg-primary">
          	<td ><strong>Creditos:</strong></td>
          	<td><?php echo $creditos;?></td>
          	<td></td>
          	<td><strong>Promedio:</strong></td>
          	<td><?php echo round(($Snota/$creditos) * 100) / 100; ?></td>
        </tr>
      </tfoot>
	</tfoot>
</table>
</div>
<br>
	<?php
	}
}else{
	echo "No hay notas";
}
?>

