<?php
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename= Estudiantes del curso.xls');
$cur=$_GET["curs"];
?>

  <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Curso</th>
                <th>Celular</th>
                <th>Correo</th>
                <th>Nombre del Reprecentante</th>
                <th>Celular Representante</th>
                <th>Correo Representante</th>
                <th>Dirección</th>
                <th>Usuario</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                  include("../config.php");
                  $query ="SELECT * FROM `registro` WHERE tipo='0' AND curso='$cur'";
                  $sql = mysqli_query($connect,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

            ?>
            <tr>
                <td><?php echo $row["id"];?></td>
                <td><?php echo $row["cedula"];?></td>
                <td><?php echo $row["nombre"];?></td>
                <td><?php echo $row["curso"];?></td>
                <td><?php echo $row["celularE"];?></td>
                <td><?php echo $row["correoE"];?></td>
                <td><?php echo $row["nombreR"];?></td>
                <td><?php echo $row["celularR"];?></td>
                <td><?php echo $row["correoR"];?></td>
                <td><?php echo $row["direccion"];?></td>
                <td><?php echo $row["usuario"];?></td>   
            </tr>
            <?php } ?>

        </tbody>
        
    </table>