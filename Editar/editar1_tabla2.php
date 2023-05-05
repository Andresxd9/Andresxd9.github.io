<?php
// including the database connection file
$cur=$_POST["curs"];

include_once("../config.php");
 
    echo $mate_id = $_POST['mate_id'];  
    echo $mate_nombre=$_POST['mate_nombre'];
    /*echo $fecha=$_POST['fecha'];
    echo $asis_conf=$_POST['asis_conf']; */ 
    
    
        $result = mysqli_query($connect, "UPDATE materias SET mate_nombre='$mate_nombre' WHERE mate_id=$mate_id");
        //$result = mysqli_query($connect, "UPDATE registro SET nombre='$name',usuario='$age',pass='$email' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location:../Ingreso-Sistema/IngresoSistema2.php?curs=".$cur);
    

?>