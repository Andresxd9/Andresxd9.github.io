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
    	$query = "INSERT INTO `registro` (`id`, `nombre`, `curso`, `usuario`, `cedula`, `pass`, `tipo`) 
		VALUES (NULL, '".$nombre."', '".$curso."', '".$usuario."', '".$cedula."', '".$pass."', '".$tipo."');";

    	mysqli_query($connect,$query);
    	header("location:IngresoSistema4.php");
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
	  <a href="IngresoSistema4.php?=data-list" class="btn btn-info">Volver a la tabla</a><br><br>
	
<!--FORMULARIO DE AGREGAR ESTUDIANTE A LA TABLA DE ALUMNOS-->

	  <form action="" method="post" name="form1">
	  	<div class="form-group" style="display: none;">
			<label>id</label>
			<input type="hidden" name="id" class="form-control" placeholder="Ingrese los nombres">
		</div>

		<div class="form-group">
			<label>Nombre</label>
			<input type="text" name="nombre" class="form-control" placeholder="Ingrese Apellidos y nombres">
		</div>

		<div class="form-group">
			<label>Curso</label>
			<input type="text" name="curso" class="form-control" placeholder="Ingrese el curso">
		</div>

		<div class="form-group">
			<label>Usuario</label>
			<input type="text" name="usuario" class="form-control" placeholder="Ingrese un usuario">
		</div>

		<div class="form-group">
			<label>Cedula</label>
			<input type="text" name="cedula" class="form-control" placeholder="Ingrese la cedula">
		</div>

		<div class="form-group">
			<label>Contraseña</label>
			<input type="password" name="pass" class="form-control" placeholder="INgrese una contraseña">
		</div>

        <div class="form-group">
				<label>Tipo de Usuario</label>
				<select  name="tipo" class="form-control" required="true">
					<option value="">Seleccione</option>
                	<option type="text" value ="1">Profesor</option>
                	<option type="text" value ="0">Alumno</option>
                </select>
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

