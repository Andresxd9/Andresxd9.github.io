<?php
session_start(); //varibel que me perimite navegar con el usuario
$idu   = $_SESSION['usr_id'];
include '../dataLyR.php';
$cur=$_GET["curs"]; //curso seleccionado en el login

$filas=$conn->query("SELECT * FROM registro WHERE id='$idu'")->fetchAll(PDO::FETCH_OBJ);
if ($filas) {	
$quien=$filas[0];
echo $donde=$quien->nombre;	
$idu=$quien->id;//
$tipo=$quien->tipo;	// avriguo el tipo si es profe o alumno
}
?>

<?php
date_default_timezone_set("America/Bogota");
$hor= date("H:i:s", time());
$dat= date("Y-m-d");
$datime=$dat.' '.$hor;

    if(isset($_POST["Submit"]))
    {
    	include("./config.php");
    	//post all value
    	$m=extract($_POST);
    	var_dump($m);
    	$query = "INSERT INTO asi_alum ( id, fecha, hora, asis_conf) 
		VALUES ('".$idus."', '".$fecha."', '".$hora."', '".$asis_conf."');";

    	mysqli_query($connect,$query);
    	header("location:IngresoSistema.php");
    }else{
    	//echo "la falla";
    }

?>

<!--INTERFAZ DEL USUARIO-->
 <!DOCTYPE html>
 <html>
 <head>
    <link rel="shortcut icon" type="image/x-icon" href="Css/Imagenes/icono.png">
 	<title>Asistencia General</title>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel = "stylesheet" type = "text/css" href="../Css/Profes.css">
 </head>
 <body> <!--INTERFAZ DEL PROFESOR-->
 	<?php if($tipo==2){ ?>
    <a href="../cerrarsesion.php" class="button-S">Cerrar Sesión</a>
     
    <a href="IngresoSistema2.php?curs=<?php echo $cur;?>" class="button-E">Asignaturas</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="IngresoSistema3.php?curs=<?php echo $cur;?>" class="button-E">Asistencia por Asignatura</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="IngresoSistema4.php?curs=<?php echo $cur;?>" class="button-E">Estudiantes</a> <br>

    	<div class="container" style="width: 1100px; margin-top: 100px;">
		<h3 align ="center">Asistencia por día del Estudiante</h3><br><br>
		<!--<a href="agregar.php?=add-record" class="btn btn-info">Registrar asistencia</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp-->
		<a  href="IngresoSistema1.php?curs=<?php echo $cur;?>" class="button-P">Asistencias Anteriores</a>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
		<a href="../Descargar/Descargar.php?curs=<?php echo $cur;?>" class="button-D">Descargar Tabla</a><br><br>
		

		<div class="row">
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
                <td>
                    <?php if ($row["asis_conf"]!=0) {
                	   echo "Presente";
                    }else{
                	echo "<m style = 'color:red'>Falta</m>";
                } ?>
                </td>       
            </tr>
            <?php } ?>
        </tbody>
        
    </table>

		</div>
	</div>

    <?php }else{ header("Location:../Estudiantes.php");//Vista del Estuadiante para registrar la asistencia ?>  
    <?php if($tipo==1){ 
    	header("Location:../Ingreso-Sistema/IngresoSistema3.php?curs=".$cur);?>

  <?php } ?>
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