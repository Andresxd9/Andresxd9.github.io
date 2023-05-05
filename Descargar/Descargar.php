<?php
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename= Asistencia por dia de Alumnos.xls');
$cur=$_GET["curs"];
?>

<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Curso</th>
                <th>Celular Representante</th>
                <th>Correo Representante</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Asistencia</th>
                <!--<th>Editar</th>
                <th>Eliminar</th>-->
                
            </tr>
        </thead>
        <tbody>
        	<?php
        	      include("../config.php");
                  $query ="SELECT * FROM asi_alum, registro
					WHERE asi_alum.id=registro.id AND registro.curso  AND curso='$cur' AND asi_alum.fecha=curdate()";
                  $sql = mysqli_query($connect,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

        	?>
            <tr>
                <td><?php echo $row["id_asi"];?></td>
                <td><?php echo $row["cedula"];?></td>
                <td><?php echo $row["nombre"];?></td>
                <td><?php echo $row["curso"];?></td>
                <td><?php echo $row["celularR"];?></td>
                <td><?php echo $row["correoR"];?></td>
                <td><?php echo $row["fecha"];?></td>
                <td><?php echo $row["hora"];?></td>
                <td><?php if ($row["asis_conf"]!=0) {
                	echo "Presente";
                }else{
                	echo "<m style = 'color:red'>Falta</m>";
                } ?></td>       
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
