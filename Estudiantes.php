<?php
session_start(); //varibel que me perimite navegar con el usuario
$idu   = $_SESSION['usr_id'];
include 'dataLyR.php';

$filas=$conn->query("SELECT * FROM registro WHERE id='$idu' ")->fetchAll(PDO::FETCH_OBJ);
if ($filas) {	
$quien=$filas[0];
$donde=$quien->nombre;	
$idu=$quien->id;//
$tipo=$quien->tipo;	// avriguo el tipo si es profe o alumno
}
$verif=$conn->query("SELECT * FROM `asi_alum` WHERE id='$idu' and fecha = curdate()")->fetchAll(PDO::FETCH_OBJ);
?>

<?php
date_default_timezone_set("America/Bogota");
$hor= date("H:i:s", time());
$dat= date("Y-m-d");
$datime=$dat.' '.$hor;

    if(isset($_POST["Submit"]))
    {
    	include("config.php");
    	//post all value
    	$m=extract($_POST);
    	var_dump($m);
    	$query = "INSERT INTO asi_alum ( id, fecha, hora, asis_conf) 
		VALUES ('".$idus."', '".$fecha."', '".$hora."', '".$asis_conf."');";

    	mysqli_query($connect,$query);
		echo '<script language="javascript">alert("Te asistencia ha sido registrada correctamente");window.location.href="Ingreso-Sistema/IngresoSistema.php"</script>';
    	//header("location:IngresoSistema.php");
    }else{
    	//echo "la falla";
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registrar Asistencia</title>
	<link rel = "stylesheet" type = "text/css" href="Css/Estudiantes.css">
    <link rel="shortcut icon" type="image/x-icon" href="Css/Imagenes/icono.png">
</head>
<body>
	<a href="cerrarsesion.php" class="button-E">Cerrar Sesión</a><br><br>

	<div class="estilo">

			<div class = "Bienvenido"><?php echo "Bienvenido  ",$donde=$quien->nombre,",  presiona el botón de 'Confirmar mi Asistencia' y tu asistencia estará resgistrada."; ?>
		</div>
    		
    <br><br>

     <form action="" method="post" name="form1">

    	<div class="form-group" style="display: none;">
			<label>id</label>
			<input value="<?php echo $idu; ?>" type="hidden" name="idus" class="form-control" required="true">				
		</div>

    	<div class="form-group" style="display: none;">
			<label>fecha</label>
			<input value="<?php echo $dat; ?>" type="hidden" name="fecha" class="form-control" required="true">				
		</div>

		<div class="form-group" style="display: none;"> 
			<label>hora</label>
			<input value="<?php echo $hor; ?>" type="hidden" name="hora" class="form-control" required="true">
		</div>
        
		<div class="form-group" style="display: none;">
			<label>asistencia</label>
    	 	<input value="1" type="hidden" name="asis_conf" class="form-control" required="true">	
    	</div>
        <?php
        if (!$verif) { ?>
         	<input type="submit" name="Submit" value="Confirmar mi Asistencia" class="btn btn-primary btn-block">
        <?php }else {
        	echo "<h1 style = 'color:#FFFF00; text-align: center; font-family: Arial;'>!Tu Asistencia ya fue registrada!</h1>";
        } ?>
    	
	 </form>
	 </div>
</body>
</html>