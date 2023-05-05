<?php
date_default_timezone_set("America/Bogota");
session_start(); //varibel que me perimite navegar con el usuario
$idu   = $_SESSION['usr_id'];
include '../dataLyR.php';
$cur=$_GET["curs"];

$hor= date("H:i:s", time());
$dat= date("Y-m-d");
$datime=$dat.' '.$hor;

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
   
    	$query = "INSERT INTO profe_control (id_asi, mate_id, fecha, hora, asistencia) 
		VALUES ('".$txtalum."', '".$txtmate."', '".$fecha."', '".$hora."', '".$asistencia."');";

    	mysqli_query($connect,$query);
    	header("location: ../Ingreso-Sistema/IngresoSistema3.php?curs=".$cur);
    }

?>


<html>
<head>
	<title>Registro de la Asistencia</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel = "stylesheet" type = "text/css" href="../Css/Profes.css">
</head>

<body>
	<a href="../cerrarsesion.php" class="button-S">Cerrar Sesión</a>
	<div class="container" style="width: 800px; margin-top: 100px;">
		<div class="row">
    <h3>Registro de la Asistencia del Estudiante</h3>
    <h4><b style="color: red;">Ingrese los datos para agregarlo en la tabla</b></h4><hr>
			<div class="col-sm-6"> 
	  <!--<a href="IngresoSistema3.php?=data-list" class="btn btn-info">Volver a la tabla</a>-->
	  <a href="../Ingreso-Sistema/IngresoSistema3.php?curs=<?php echo $cur;?>" class="btn btn-info">Volver a la tabla</a><br><br>
	
<!--FORMULARIO DE AGREGAR ESTUDIANTE A LA TABLA DE ALUMNOS-->

	  <form action="" method="post" name="form1">

	  			<div class="form-group">
				    <label>Asignatura</label>
				       	<?php 
				    		$mat=$conn->query("SELECT * FROM materias")->fetchAll(PDO::FETCH_OBJ);   	?>
				      <select name="txtmate" class="form-control" required="true">
				      	<option value="">Selecione la Asignatura</option>
				      	<?php foreach ($mat as $fi): ?>
				      		<option value="<?php echo $fi->mate_id; ?>"><?php echo $fi->mate_nombre?></option>
				      	<?php endforeach ?>
				      </select>
				    
				  </div>

	  	 		<div class="form-group">
				    <label>Alumno</label>
				       	<?php 
				    		$alu=$conn->query("SELECT asi_alum.id_asi as alum, nombre 
							FROM asi_alum, registro 
							WHERE asi_alum.id=registro.id 
							and registro.tipo=0 and curso='$cur' and asi_alum.fecha = curdate() GROUP BY asi_alum.id")->fetchAll(PDO::FETCH_OBJ);
				    	?>

				      <select name="txtalum" class="form-control">
				      	<option value="">Selecione alumno</option>
				      	<?php foreach ($alu as $fila): ?>
				      		<option value="<?php echo $fila->alum; ?>"><?php echo $fila->nombre?></option>
				      	<?php endforeach ?>
				      </select>
				    
				  </div>

			<div class="form-group" style="display: none;">
						<label>fecha</label>
						<input value="<?php echo $dat; ?>" type="hidden" name="fecha" class="form-control" required="true">
					
				</div>
			<div class="form-group" style="display: none;">
				<label>hora</label>
				<input value="<?php echo $hor; ?>" type="hidden" name="hora" class="form-control" required="true">
			</div>
			 <div class="form-group">
				<label>Asistencia</label>
				<select  name="asistencia" class="form-control" required="true">
					<option value="">Seleccione</option>
					<option value="si">Si</option>
					<option value="no">No</option>
					<option value="Atr">Atraso</option>
				</select>
				
			  </div>
				<div class="form-group">
				<input type="submit" name="Submit" value="Registrar Asistencia" class="btn btn-primary btn-block">
			  </div>
	</form>

</div>
</div>
</div>
</body>
</html>

