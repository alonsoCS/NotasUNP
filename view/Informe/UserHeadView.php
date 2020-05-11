<?php 
$informe=$_POST['informacion'];
$primero=$informe[0];
$segundo=$informe[1];
 ?>
 <div class="table-responsive">
<table class="table table-condensed">
            <tbody>
                <tr>
                    <td>Su Universidad es: </td>
                    <td><?php echo $primero[2]; ?></td>
                </tr>
                <tr>
                    <td>Su Facultadad es:</td>
                    <td><?php echo $primero[1]; ?></td>
                </tr>
                <tr>
                    <td>Su Escuela es: </td>
                    <td><?php echo $primero[0]; ?></td>
                </tr>
                <tr>
                    <td>Sus cursos llevados:</td>
                    <td><?php echo $segundo[1]; ?></td>
                </tr>
                <tr>
                    <td>Sus cursos Aprobados obligatorios son:</td>
                    <td><?php echo $segundo[3];  ?></td>
                </tr>
                 <tr>
                    <td>Sus cursos Aprobados electivos son:</td>
                    <td><?php echo $segundo[4]; ?> </td>
                </tr>
                <tr>
                    <td>Su Promedio Ponderado Acumulado es:</td>
                    <td><?php echo $segundo[0]; ?></td>
                </tr>
                <tr>
                    <td>Tiene aprobados en su historial un total de:</td>
                    <td><?php echo $segundo[2];  ?> Creditos</td>
                </tr>
               
            </tbody>
</table>
</div>