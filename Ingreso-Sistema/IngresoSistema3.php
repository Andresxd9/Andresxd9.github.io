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
    <title>Asistencia por Asignatura</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel = "stylesheet" type = "text/css" href="../Css/Profes.css">
 </head>

 <body>
    <?php if($tipo!=0){ ?>
        <a href="../cerrarsesion.php" class="button-S";>Cerrar Sesión</a>

        <?php if($tipo==2){ ?>
    <a href="IngresoSistema.php?curs=<?php echo $cur;?>" class="button-E">Asistencia General</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="IngresoSistema2.php?curs=<?php echo $cur;?>" class="button-E">Asignaturas</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="IngresoSistema4.php?curs=<?php echo $cur;?>" class="button-E">Estudiantes</a> <br>
        <?php } ?>

        <div class="container" style="width: 1100px; margin-top: 100px;">

        <h3 align ="center">Tabla de asistencia por Asignatura de Docentes</h3><br><br>
        <!--<a href="agregar3.php?=add-record" class="btn btn-info">Registrar Asistencia</a>-->
        <a href="../Agregar/agregar3.php?curs=<?php echo $cur;?>" class="btn btn-info">Registrar Asistencia</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
        <a href="../Descargar/Descargar3.php?curs=<?php echo $cur;?>" class="button-D">Descargar Tabla</a><br><br>
        <div class="row">
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
                <th>Editar</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
                  include("../config.php");
                  $query ="SELECT * FROM profe_control,asi_alum,materias,registro 
                  WHERE materias.mate_id=profe_control.mate_id 
                  and profe_control.id_asi=asi_alum.id_asi 
                  and asi_alum.id=registro.id 
                  and curso='$cur' 
                  and profe_control.fecha=curdate()";
                  
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
                
                
                <td><a href="../Editar/editar_tabla3.php?id_profe=<?php echo $row['id_profe'];?>&&curs=<?php echo $cur;?>" class="btn btn-info">Editar</a></td>
                <td><a href="../Eliminar/eliminar3.php?id_profe=<?php echo $row['id_profe'];?>&curs=<?php echo $cur;?>" class="btn btn-danger" onClick="return confirm('Desea borrar la información de esa fila?')">Eliminar</a></td>
                 
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