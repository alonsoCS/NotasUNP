<?php 
$creditos=$_POST['creditos']; ?>
<div class="table-responsive">
        <table class="table table-striped table-bordered">
        		<colgroup>
            		<col style="width: 300px">
            		<col style="width: 200px">
            		<col style="width: 100px">
            		<col style="width: 100px">
        		</colgroup>
                <thead>
                    <tr class="bg-primary">
                        <th >Créditos</th>
                        <th >Requisitos de Graduación</th>
                        <th >Aprobados</th> 
                        <th >Debe</th>
                    </tr>
                </thead> 
        		<tbody>
            		<tr align="center">
                		<td class="bg-primary"><strong>Número de Créditos Obligatorios</strong></td>
                		<td><?php echo $creditos[0]; ?></td>
                		<td><?php echo $creditos[2]; ?></td>
                		<td><?php echo $creditos[4]; ?></td>
            		</tr>
                    <tr align="center">
                        <td class="bg-primary"><strong>Número de Créditos Electivos</strong>
                        </td>
                        <td><?php echo $creditos[1]; ?></td>
                        <td><?php echo $creditos[3]; ?></td>
                        <td><?php echo $creditos[5]; ?></td>
                    </tr>
                    <tr align="center">
                        <td class="bg-primary"><strong>Número Total de Créditos</strong></td>
                        <td><?php echo $creditos[6]; ?></td>
                        <td><?php echo $creditos[7]; ?></td>
                        <td><?php echo $creditos[8]; ?></td>
                    </tr>
                </tbody>
        </table>
</div>