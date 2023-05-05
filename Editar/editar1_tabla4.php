<?php
// including the database connection file
$cur=$_POST["curs"];
include_once("../config.php");
   
     $idu = $_POST['idu'];  
     $nombre=$_POST['nombre'];
     $curso=$_POST['curso'];
     $celularE=$_POST['celularE'];
     $correoE=$_POST['correoE'];
     $nombreR=$_POST['nombreR'];
     $celularR=$_POST['celularR'];
     $correoR=$_POST['correoR'];
     $direccion=$_POST['direccion'];
     $usuario=$_POST['usuario'];
     $cedula=$_POST['cedula'];
     $pass=$_POST['pass']; 
     $tipo=$_POST['tipo'];    
       
        $result = mysqli_query($connect, "UPDATE registro 
            SET nombre='$nombre',
            curso='$curso',
            celularE='$celularE',
            correoE='$correoE',
            nombreR='$nombreR',
            celularR='$celularR',
            correoR='$correoR',
            direccion='$direccion',
            usuario='$usuario',
            cedula='$cedula',
            pass='$pass',
            tipo='$tipo' 
            WHERE id='$idu'");
        //$result = mysqli_query($connect, "UPDATE registro SET nombre='$name',usuario='$age',pass='$email' WHERE id=$id");
        //='$pass',tipo='$tipo'
        //redirectig to the display page. In our case, it is index.php
        header("Location:../Ingreso-Sistema/IngresoSistema4.php?curs=".$cur);
    

?>