<?php
// including the database connection file
include_once("config.php");
 
   
    echo $id_asi = $_POST['id_asi'];  
    echo $id=$_POST['id'];
    echo $fecha=$_POST['fecha'];
    echo $asis_conf=$_POST['asis_conf'];   
    
    
        $result = mysqli_query($connect, "UPDATE asi_alum SET id='$id',fecha='$fecha',asis_conf='$asis_conf' WHERE id_asi=$id_asi");
        //$result = mysqli_query($connect, "UPDATE registro SET nombre='$name',usuario='$age',pass='$email' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: IngresoSistema.php");
    

?>
