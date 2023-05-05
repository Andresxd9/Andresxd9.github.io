<?php
session_start(); //varibel que me perimite navegar con el usuario
$idu   = $_SESSION['usr_id'];
include '../dataLyR.php';
$id = $_GET['id_profe'];
$cur=$_GET["curs"];

$filas=$conn->query("SELECT * FROM registro WHERE id='$idu'")->fetchAll(PDO::FETCH_OBJ);
if ($filas) {	
$quien=$filas[0];
echo $donde=$quien->nombre;	//
$tipo=$quien->tipo;	// avriguo el tipo si es profe o alumno
}

$fil=$conn->query("SELECT * FROM profe_control,asi_alum,registro
WHERE profe_control.id_asi=asi_alum.id_asi
and asi_alum.id=registro.id
and profe_control.id_profe='$id'")->fetchAll(PDO::FETCH_OBJ);
if ($fil) {	
$est=$fil[0];
$nom=$est->nombre;
}	//
?>


<?php
// including the database connection file
include_once("../config.php");

//error_reporting(0);
//getting id from url
 $id = $_GET['id_profe'];
 
//selecting data associated with this particular id
$result = mysqli_query($connect, "SELECT * FROM profe_control WHERE id_profe=$id");
 
while($row = mysqli_fetch_array($result))
{
	$id_profe = $row['id_profe'];
	$id_asi = $row['id_asi'];
    $mate_id = $row['mate_id'];
	$fecha = $row['fecha'];
	$hora = $row['hora'];
	$asistencia = $row['asistencia'];
	
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
    <h3>Editar Asistencia del Alumno</h3>
    <h4><b style="color: red;"></b></h4><hr>
			<div class="col-sm-6"> 
	<a href="../Ingreso-Sistema/IngresoSistema3.php?curs=<?php echo $cur;?>" class="btn btn-info">Volver a la tabla</a>
	
	<form action="editar1_tabla3.php" method="post" name="form1">
		<input type="hidden" name="curs" class="form-control" value="<?php echo $cur;?>"><!--Variable-->
		<div class="form-group">	
		<input type="hidden" name="id_profe" class="form-control" value="<?php echo $id_profe;?>">	
		</div>

		<div class="form-group" style="display: none;">
				<label >id asi</label>
				<input type="hidden" name="id_asi" class="form-control" value="<?php echo $id_asi;?>">
		</div>
		<div class="form-group" style="display: none;">
				<label>mate id</label>
				<input type="hidden" name="mate_id" class="form-control" value=" <?php echo $mate_id;?>">
		</div>
		<div class="form-group" style="display: none;">
				<label>fecha</label>
				<input type="hidden" name="fecha" class="form-control" value="<?php echo $fecha;?>">
		</div>
		<div class="form-group" style="display: none;">
				<label>hora</label>
				<input type="hidden" name="hora" class="form-control" value="<?php echo $hora;?>">
		</div>

				<div class="form-group">
				<label>Alumno</label>
				<input type="read" name="hora" class="form-control" value="<?php echo $est->nombre;?>" readonly>
		</div>
			 <div class="form-group">
				<label>Asistencia</label>
				<select  name="asistencia" class="form-control" required="true">
					<option value="">Seleccione</option>
					<option value="Si">Si</option>
					<option value="No">No</option>
					<option value="Atr">Atraso</option>
				</select>
				
			  </div>
				<div class="form-group">
				<input type="submit" name="Submit" value="Actualizar" class="btn btn-primary btn-block" name="update">
			
		
	</form>

</div>
</div>
</div>
</body>
</html>

