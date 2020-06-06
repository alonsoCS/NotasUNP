<?php 
    $informacion=$_POST['informacion'];
    $informe= $_POST['informe'];
 ?>
 <div class="table-responsive">
<table class="table table-condensed">
            <tbody>
                <tr>
                    <td>Su Universidad es: </td>
                    <td><?php echo $informacion["Universidad"]; ?></td>
                </tr>
                <tr>
                    <td>Su Facultadad es:</td>
                    <td><?php echo $informacion["Facultad"]; ?></td>
                </tr>
                <tr>
                    <td>Su Escuela es: </td>
                    <td><?php echo $informacion["Escuela"]; ?></td>
                </tr>
                <tr>
                    <td>Sus cursos llevados:</td>
                    <td><?php echo $informe["totalCursos"]; ?></td>
                </tr>
                <tr>
                    <td>Sus cursos Aprobados obligatorios son:</td>
                    <td><?php echo $informe["cursoAproOblig"];  ?></td>
                </tr>
                 <tr>
                    <td>Sus cursos Aprobados electivos son:</td>
                    <td><?php echo $informe["cursoAproElec"]; ?> </td>
                </tr>
                <tr>
                    <td>Su Promedio Ponderado Acumulado es:</td>
                    <td><?php echo $informe["ponderado"]; ?></td>
                </tr>
                <tr>
                    <td>Tiene aprobados en su historial un total de:</td>
                    <td><?php echo $informe["creditosApro"];  ?> Creditos</td>
                </tr>
               
            </tbody>
</table>
</div>