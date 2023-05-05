<?php
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename= Asistencia por asiganatura de Alumnos.xls');
$cur=$_GET["curs"];
?>

 <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Nombre</th>
                <th>Asignatura</th>
                <th>Curso</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Asistencia</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                  include("../config.php");
                  $query ="SELECT * FROM profe_control,asi_alum,materias,registro WHERE materias.mate_id=profe_control.mate_id and profe_control.id_asi=asi_alum.id_asi and asi_alum.id=registro.id and curso='$cur' and profe_control.fecha=curdate()";
                  $sql = mysqli_query($connect,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

            ?>
            <tr>
                <td><?php echo $row["id_profe"];?></td>
                <td><?php echo $row["nombre"];?></td>
                <td><?php echo $row["mate_nombre"];?></td>
                <td><?php echo $row["curso"];?></td>
                <td><?php echo $row["fecha"];?></td>
                <td><?php echo $row["hora"];?></td>
                <td><?php echo $row["asistencia"];?></td>
                 
            </tr>
            <?php } ?>

        </tbody>
        
    </table>