<?php
session_start(); //varibel que me perimite navegar con el usuario
echo $idu   = $_SESSION['usr_id'];
include 'dataLyR.php';

$filas=$conn->query("SELECT * FROM registro WHERE id='$idu' ")->fetchAll(PDO::FETCH_OBJ);
if ($filas) {	
$quien=$filas[0];
echo $donde=$quien->nombre;	//
$tipo=$quien->tipo;	// avriguo el tipo si es profe o alumno
}
?>


<?php
   include("config.php");
    if(isset($_POST["Submit"]))
    {
    	//post all value
    	extract($_POST);
    	$query = "INSERT INTO `asi_alum` (`id_asi`, `id`, `fecha`, `hora`, `asis_conf`) 
		VALUES (NULL, '".$id."', '".$fecha."', '".$hora."' '".$id_conf."');";

    	mysqli_query($connect,$query);
    	header("location:IngresoSistema.php");
    }

?>


<html>
<head>
	<title>Agregar Estudiante</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel = "stylesheet" type = "text/css" href="Css/Profes.css">
</head>

<body>
	<a href="cerrarsesion.php" class="button-S">Cerrar Sesión</a>
	
	<div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
    <h3>AGREGAR ESTUDIANTE</h3>
    <h4><b style="color: red;">Ingrese los datos para agregarlo en la tabla</b></h4><hr>
			<div class="col-sm-6"> 
	  <a href="IngresoSistema.php?=data-list" class="btn btn-info">Volver a la tabla</a><br><br>
	
<!--FORMULARIO DE AGREGAR ESTUDIANTE A LA TABLA DE ALUMNOS-->

	  <form action="" method="post" name="form1">
		<div class="form-group">
				<label>Id</label>
				<input type="text" name="id" class="form-control" placeholder="Ingrese los nombres">
			
		</div>
			<div class="form-group">
				<label>Fecha</label>
				<input type="text" name="fecha" class="form-control" placeholder="Ingrese la cedula">
			</div>

			<div class="form-group">
				<label>Fecha</label>
				<input type="text" name="hora" class="form-control" placeholder="Ingrese la cedula">
			</div>

			 <div class="form-group">
				<label>asistencia</label>
				<input type="text" name="asis_conf" class="form-control" placeholder="Ingrese el curso">
			  </div>
			 <!-- <div class="form-group">
				<label>Celular</label>
				<input type="text" name="celular" class="form-control" placeholder="Ingrese el numero de celular">
			  </div>
			  <div class="form-group">
				<label>Direccion</label>
				<input type="text" name="direccion" class="form-control" placeholder="Ingrese la direccion">
			  </div>-->
				<div class="form-group">
				<input type="submit" name="Submit" value="Agregar" class="btn btn-primary btn-block">
			
		
	</form>

</div>
</div>
</div>
</body>
</html>

