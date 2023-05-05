<?php
session_start(); //varibel que me perimite navegar con el usuario
$idu   = $_SESSION['usr_id'];
include '../dataLyR.php';
$cur=$_GET["curs"];

$filas=$conn->query("SELECT * FROM registro WHERE id='$idu' ")->fetchAll(PDO::FETCH_OBJ);
if ($filas) {	
$quien=$filas[0];
echo $donde=$quien->nombre;	//
$tipo=$quien->tipo;	// avriguo el tipo si es profe o alumno
}
?>


<?php
   include("../config.php");
    if(isset($_POST["Submit"]))
    {
    	//post all value
    	extract($_POST);
    	$query = "INSERT INTO `materias` (`mate_id`, `mate_nombre`) 
		VALUES (NULL, '".$mate_nombre."');";

    	mysqli_query($connect,$query);
    	header("location:../Ingreso-Sistema/IngresoSistema2.php?curs=".$cur);
    }

?>


<html>
<head>
	<title>Agregar Estudiante</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel = "stylesheet" type = "text/css" href="../Css/Profes.css">
</head>

<body>
	<a href="../cerrarsesion.php" class="button-S">Cerrar Sesión</a>
	<div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
    <h3>AGREGAR ASIGNATURA</h3>
    <h4><b style="color: red;">Ingrese los datos para agregarlo en la tabla</b></h4><hr>
			<div class="col-sm-6"> 
	  <!--<a href="IngresoSistema2.php?=data-list>" class="btn btn-info">Volver a la tabla</a><br><br>-->
	  <a href="../Ingreso-Sistema/IngresoSistema2.php?curs=<?php echo $cur;?>" class="btn btn-info">Volver a la tabla</a><br><br>
	
<!--FORMULARIO DE AGREGAR ESTUDIANTE A LA TABLA DE ALUMNOS-->

	  <form action="" method="post" name="form1">
		<div class="form-group">
				<label>Asisgnatura</label>
				<input type="text" name="mate_nombre" class="form-control" placeholder="Ingrese nombre de la Asignatura">	
		</div>
				<div class="form-group">
				<input type="submit" name="Submit" value="Agregar" class="btn btn-primary btn-block">
		</div>
		
	</form>

</div>
</div>
</div>
</body>
</html>

