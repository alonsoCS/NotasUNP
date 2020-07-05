<?php 
if(isset($datos))
{
	//descripcion de cada ciclo con curso 
	$ciclo=array();
	foreach ($datos as $curso) {
		$ciclo[$curso['Ciclo']]=$curso['Ciclo'];
	}
	sort($ciclo);
	if(count($ciclo)){
		foreach ($ciclo as $dato) {
			# tabla de cada ciclo
			$creditos=0;
			$Snota=0;
	?>
			<div class="tabla-responsiva">
				<table border="1" class="tabla">
					<caption><strong>Ciclo : <?php echo $dato; ?></strong></caption>
					<thead >
						<tr class="bg-primary">
							<th scope="col">Tipo</td>
							<th scope="col">Nombre</td>
							<th scope="col">Creditos</td>
							<th scope="col">Nota</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach ($datos as $curso) { 
							if($curso['Ciclo']==$dato)
							{
								$creditos+=$curso['creditos'];
								$Snota+=($curso['nota']*$curso['creditos']);
						?>
								<tr align="center">
									<td><?php echo $curso['tipo']; ?></td>
									<td align="left"><?php echo $curso['nombre']; ?></td>
									<td><?php echo $curso['creditos']; ?></td>
									<td><?php echo $curso['nota']; ?></td>
								</tr>
						<?php 	
							}
						} 
						?>
					</tbody>
					<tfoot>
        				<tr class="bg-primary">
          					<td colspan="2"><strong>Creditos: <?=$creditos;?></strong></td>
          					<td><strong>Promedio:</strong></td>
          					<td><?php echo round(($Snota/$creditos) * 100) / 100; ?></td>
        				</tr>
      				</tfoot>
				</table>
			</div>
			<br>
<?php
		}
	}else{
		echo "No hay notas";
	}
}
?>

