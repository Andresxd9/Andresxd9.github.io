<?php
session_start(); //varibel que me perimite navegar con el usuario
$idu   = $_SESSION['usr_id'];
include 'dataLyR.php';

$filas=$conn->query("SELECT * FROM registro WHERE id='$idu' ")->fetchAll(PDO::FETCH_OBJ);
if ($filas) {	
$quien=$filas[0];
echo $donde=$quien->nombre;	//
$tipo=$quien->tipo;	// avriguo el tipo si es profe o alumno
}
?>


<?php
// including the database connection file
include_once("config.php");

//error_reporting(0);
//getting id from url
 $id = $_GET['id_asi'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM asi_alum WHERE id_asi=$id");
 
while($row = mysqli_fetch_array($result))
{
	$id_asi = $row['id_asi'];
	$id = $row['id'];
    $fecha = $row['fecha'];
	$asis_conf = $row['asis_conf'];
	
}
?>
<html>
<head>
	<title>Editar Informacion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
	<div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
			<a href="cerrarsesion.php" class="button-E">Cerrar Sesion</a>
			
    <h3>EDITAR INFORMACION</h3>
    <h4><b style="color: red;">....</b></h4><hr>
			<div class="col-sm-6"> 
	
	<form action="editar1_tabla.php" method="post" name="form1">
		<div class="form-group">
				
				<input type="hidden" name="id_asi" class="form-control" value="<?php echo $id_asi;?>">
			
		</div>
		<div class="form-group">
				<label>id</label>
				<input type="text" name="id" class="form-control" value="<?php echo $id;?>">
			
		</div>
		<div class="form-group">
				<label>fecha</label>
				<input type="text" name="fecha" class="form-control" value=" <?php echo $fecha;?>">
		</div>
		<div class="form-group">
				<label>asis_conf</label>
				<input type="text" name="asis_conf" class="form-control" value="<?php echo $asis_conf;?>">
		</div>
		<!--<div class="form-group">
				<label>Celular</label>
				<input type="text" name="celular" class="form-control" value="<?php echo $celular;?>">
		</div>
		<div class="form-group">
				<label>Direccion</label>
				<input type="text" name="direccion" class="form-control" value="<?php echo $direccion;?>">
		</div>-->
				<div class="form-group">
				<input type="submit" name="Submit" value="Actualizar" class="btn btn-primary btn-block" name="update">
			
		
	</form>

</div>
</div>
</div>
</body>
</html>

