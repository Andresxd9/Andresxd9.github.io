<?php
session_start(); //varibel que me perimite navegar con el usuario
$idu   = $_SESSION['usr_id'];
include '../dataLyR.php';
$cur=$_GET['curs'];
$mate=$_GET["mate_id"];


$filas=$conn->query("SELECT * FROM registro WHERE id='$idu' ")->fetchAll(PDO::FETCH_OBJ);
if ($filas) {	
$quien=$filas[0];
echo $donde=$quien->nombre;	//
$tipo=$quien->tipo;	// avriguo el tipo si es profe o alumno
}
?>


<?php
// including the database connection file
include_once("../config.php");

//error_reporting(0);
//getting id from url
 $id = $_GET['mate_id'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM materias WHERE mate_id=$id");
 
while($row = mysqli_fetch_array($result))
{
	$mate_id = $row['mate_id'];
	$mate_nombre = $row['mate_nombre'];
   /* $fecha = $row['fecha'];
	$asis_conf = $row['asis_conf'];*/
	
}
?>

<html>
<head>
	<title>Editar Informacion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel = "stylesheet" type = "text/css" href="../Css/Profes.css">
</head>

<body>
	<a href="../cerrarsesion.php" class="button-S">Cerrar Sesión</a>

	<div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
    <h3>Editar Asignatura</h3>
    <h4><b style="color: red;"></b></h4><hr>
			<div class="col-sm-6"> 
	<!--<a href="IngresoSistema2.php?=data-list" class="btn btn-info">Volver a la tabla</a>-->
	<a href="../Ingreso-Sistema/IngresoSistema2.php?curs=<?php echo $cur;?>" class="btn btn-info">Volver a la tabla</a><br><br>
	
	<form action="editar1_tabla2.php" method="post" name="form1">
		<div class="form-group">
				
		<input type="hidden" name="mate_id" class="form-control" value="<?php echo $mate_id;?>">
			
		</div>
		<div class="form-group">
				<label>Asignatura</label>
				<input type="text" name="mate_nombre" class="form-control" value="<?php echo $mate_nombre;?>">
				<input type="hidden" name="curs" class="form-control" value="<?php echo $cur;?>">
			
		</div>
				<div class="form-group">
				<input type="submit" name="Submit" value="Actualizar" class="btn btn-primary btn-block" name="update">
		</div>
		
	</form>

</div>
</div>
</div>
</body>
</html>

