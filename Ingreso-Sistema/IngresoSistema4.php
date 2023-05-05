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
    <title>Estudiantes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel = "stylesheet" type = "text/css" href="../Css/Profes.css">
 </head>

 <body>
    <?php if($tipo==2){ ?>

    <a href="../cerrarsesion.php" class="button-S">Cerrar Sesión</a>
    <a href="IngresoSistema.php?curs=<?php echo $cur;?>" class="button-E">Asistencia general</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="IngresoSistema2.php?curs=<?php echo $cur;?>" class="button-E">Asisgnaturas</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="IngresoSistema3.php?curs=<?php echo $cur;?>" class="button-E">Asistencia por Asignatura</a> <br>

        <div class="container" style="width: 1350px; margin-top: 100px;">
        <h3 align ="center">Tabla de Estudiantes</h3>
        <a href="../Descargar/Descargar4.php?curs=<?php echo $cur;?>" class="button-D">Descargar Tabla</a><br><br><br>
        <div class="row">
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
                <!--<th>Tipo</th>-->
                <th>Editar</th>
                <!--<th>Eliminar</th>-->
                
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
                <!--<td><?php echo $row["tipo"];?></td>-->  
                
                
                
                <td><a href="../Editar/editar_tabla4.php?id=<?php echo $row['id'];?>&&curs=<?php echo $cur;?>" class="btn btn-info">Editar</a></td>   
            </tr>
            <?php } ?>

        </tbody>
        
    </table>

        </div>
    </div>

    <?php }else{  ?>
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