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

<!DOCTYPE html> <!--INICIO DE PANTALLA-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de control de asistencia</title>
    <link rel = "stylesheet" type = "text/css" href="Css/estilos.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1.0, minimun-scale=1.0">
</head>
<!--DISEÑO DE LA PANTALLA DE INICIO-->
<body>
   
<div>
    <img src="Css/Imagenes/sello1.png" width ="250px" height="250px"/> 
    <h1> INSTITUCIÓN EDUCATIVA FISCAL CUMBAYÁ </h1>
</div>
<div>
    <?php if($tipo!=0){ ?>
    <a href="Login.php" class="button-P">PROFESORES</a>
    <?php }else{  ?>
    <a href="Estudiantes.php" class="button-E">Confirmar Asistencia</a>

    <?php } ?>
</>

  
<br/>
<div>
    <h2> Sistema de control de asistencia de Estudiantes </h2>    
    <br />
    <h3> 2020 - 2021 </h3>
</div>
</body>
</html>