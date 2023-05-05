<?php
// including the database connection file
$cur=$_POST["curs"];
include_once("../config.php");
 
   
    echo $id_profe = $_POST['id_profe'];  
    echo $id_asi=$_POST['id_asi'];
    echo $mate_id=$_POST['mate_id'];
    echo $fecha=$_POST['fecha'];
    echo $hora=$_POST['hora']; 
    echo $asistencia=$_POST['asistencia'];    
    
    
        $result = mysqli_query($connect, "UPDATE profe_control SET id_asi='$id_asi',mate_id='$mate_id',fecha='$fecha',hora='$hora',asistencia='$asistencia' WHERE id_profe=$id_profe");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location:../Ingreso-Sistema/IngresoSistema3.php?curs=".$cur);
    

?>