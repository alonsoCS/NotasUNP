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
                		<td><?php echo $creditos["CEscuelaObli"]; ?></td>
                		<td><?php echo $creditos["CEstudianteObli"]; ?></td>
                		<td><?php echo  $creditos["CEstDebeOblig"]; ?></td>
            		</tr>
                    <tr align="center">
                        <td class="bg-primary"><strong>Número de Créditos Electivos</strong>
                        </td>
                        <td><?php echo $creditos["CEscuelaElec"]; ?></td>
                        <td><?php echo $creditos["CEstudianteElec"]; ?></td>
                        <td><?php echo $creditos["CEstDebeElec"]; ?></td>
                    </tr>
                    <tr align="center">
                        <td class="bg-primary"><strong>Número Total de Créditos</strong></td>
                        <td><?php echo  $creditos["CEscuelaObli"]+$creditos["CEscuelaElec"]; ?></td>
                        <td><?php echo $creditos["CEstudianteObli"]+$creditos["CEstudianteElec"]; ?></td>
                        <td><?php echo $creditos["CEstDebeOblig"]+$creditos["CEstDebeElec"]; ?></td>
                    </tr>
                </tbody>
        </table>
</div>