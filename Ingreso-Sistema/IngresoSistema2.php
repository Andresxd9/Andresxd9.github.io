<?php
session_start(); //varibel que me perimite navegar con el usuario
$idu   = $_SESSION['usr_id'];
include '../dataLyR.php';
$cur=$_GET["curs"];


$filas=$conn->query("SELECT * FROM registro WHERE id='$idu' ")->fetchAll(PDO::FETCH_OBJ);
if ($filas) {   
$quien=$filas[0];
echo $donde=$quien->nombre; //
$tipo=$quien->tipo; // avriguo el tipo si es profe o alumno
}
?>

 <!DOCTYPE html>
 <html>
 <head>
    <title>Asignaturas</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel = "stylesheet" type = "text/css" href="../Css/Profes.css">
 </head>

 <body>
    <?php if($tipo==2){ ?>

    <a href="../cerrarsesion.php?" class="button-S">Cerrar Sesión</a>
    <a href="IngresoSistema.php?curs=<?php echo $cur;?>" class="button-E">Asistencia general</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="IngresoSistema3.php?curs=<?php echo $cur;?>" class="button-E">Asistencia por asignaturas</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="IngresoSistema4.php?curs=<?php echo $cur;?>" class="button-E">Estudiantes</a> <br>

        <div class="container" style="width: 600px; margin-top: 100px;">
        <h3 align ="center">Tabla de Asignaturas</h3><br><br>
        <a href="../Agregar/agregar2.php?curs=<?php echo $cur;?>" class="btn btn-info">Agregar Asignatura</a><br><br>
        <div class="row">
    <table id="example" class="display" style="width:100%;">
        <thead>
            <tr>
            <!--<th>mate_id</th>-->
                <th>Asignaturas</th>
                <!--<th>Fecha</th>
                <th>Asis_conf</th>-->
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                  include("../config.php");
                  $query ="SELECT * FROM materias";
                  $sql = mysqli_query($connect,$query);
                  while($row = mysqli_fetch_array($sql))
                  {

            ?>
            <tr>
                <!--<td><?php echo $row["mate_id"];?></td>-->
                <td><?php echo $row["mate_nombre"];?></td>
                <!--<td><?php echo $row["fecha"];?></td>
                <td><?php echo $row["asis_conf"];?></td>-->
                
                
                
                <!--<td><a href="editar_tabla2.php?mate_id=<?php echo $row['mate_id'];?>" class="btn btn-info">Editar</a></td>-->
                <td><a href="../Editar/editar_tabla2.php?mate_id=<?php echo $row['mate_id'];?>&&curs=<?php echo $cur;?>" class="btn btn-info">Editar</a></td>
                <td><a href="../Eliminar/eliminar2.php?mate_id=<?php echo $row['mate_id'];?>&&curs=<?php echo $cur;?>" class="btn btn-danger" onClick="return confirm('Desea borrar la información de esa fila?')">Eliminar</a></td>
                 
            </tr>
            <?php } ?>
            
                

        </tbody>
        
    </table>

        </div>
    </div>

    <?php }else{  ?>
    <!--<a href="Estudiantes.php" class="button-E">Confirmar Asistencia</a>-->

    <?php } ?>
 </body>
 </html>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>