<?php
session_start(); //varibel que me perimite navegar con el usuario
$idu   = $_SESSION['usr_id'];
include '../dataLyR.php';
$cur=$_GET["curs"];

$filas=$conn->query("SELECT * FROM registro WHERE id='$idu'")->fetchAll(PDO::FETCH_OBJ);
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
 $ids = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM registro WHERE id=$ids");
 
while($row = mysqli_fetch_array($result))
{
	$id = $row['id'];
    $nombre = $row['nombre'];
	$curso = $row['curso'];
	$celularE = $row['celularE'];
	$correoE = $row['correoE'];
	$nombreR = $row['nombreR'];
	$celularR = $row['celularR'];
	$correoR = $row['correoR'];
	$direccion = $row['direccion'];
	$usuario = $row['usuario'];
	$cedula = $row['cedula'];
	$pass= $row['pass'];
	$tipo = $row['tipo'];
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
	<a href="cerrarsesion.php" class="button-S">Cerrar Sesión</a>
	<div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
    <h3>Editar informacion del alumno</h3>
    <h4><b style="color: red;"></b></h4><hr>
			<div class="col-sm-6">
	<a href="../Ingreso-Sistema/IngresoSistema4.php?curs=<?php echo $cur;?>" class="btn btn-info">Volver a la tabla</a>

	<form action="editar1_tabla4.php" method="post" name="form1">
		<input type="hidden" name="curs" class="form-control" value="<?php echo $cur;?>"><!--Variable-->

		<div class="form-group" style="display: none;">
				<label>id</label>
				<input type="hidden" name="idu" class="form-control" value="<?php echo $ids;?>">
			
		</div>
		<div class="form-group">
				<label>Nombre</label>
				<input type="text" name="nombre" class="form-control" value="<?php echo $nombre;?>">	
		</div>

		<div class="form-group">
				<label>Curso</label>
				<input type="text" name="curso" class="form-control" value="<?php echo $curso;?>">
		</div>
		<div class="form-group">
				<label>Celuar Estudiante</label>
				<input type="text" name="celularE" class="form-control" value="<?php echo $celularE;?>">
		</div>
		<div class="form-group">
				<label>Correo Estudiante</label>
				<input type="text" name="correoE" class="form-control" value="<?php echo $correoE;?>">
		</div>

		<div class="form-group">
				<label>Nombre del  Representante</label>
				<input type="text" name="nombreR" class="form-control" value="<?php echo $nombreR;?>">
		</div>

		<div class="form-group">
				<label>Celular Representante</label>
				<input type="text" name="celularR" class="form-control" value="<?php echo $celularR;?>">
		</div>

		<div class="form-group">
				<label>Correo Representante</label>
				<input type="text" name="correoR" class="form-control" value="<?php echo $correoR;?>">
		</div>

		<div class="form-group">
				<label>Dirección</label>
				<input type="text" name="direccion" class="form-control" value="<?php echo $direccion;?>">
		</div>

		<div class="form-group">
				<label>Usuario</label>
				<input type="text" name="usuario" class="form-control" value="<?php echo $usuario;?>">
		</div>

		<div class="form-group">
				<label>Cédula</label>
				<input type="text" name="cedula" class="form-control" value="<?php echo $cedula;?>">
		</div>

		<div class="form-group" style="display: none;">
				<label>pass</label>
				<input type="text" name="pass" class="form-control" value="<?php echo $pass;?>">
		</div>

		<div class="form-group">
				<label style="display: none;">Tipo</label>
				<input type="hidden" name="tipo" class="form-control" value="<?php echo $tipo;?>">
		</div>
				<div class="form-group">
				<input type="submit" name="Submit" value="Actualizar" class="btn btn-primary btn-block" name="update">
			
		
	</form>

</div>
</div>
</div>
</body>
</html>

