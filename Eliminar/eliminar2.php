<?php
  $cur=$_GET["curs"];
  $id = $_GET["mate_id"];

  include("../config.php");
  
  $result = mysqli_query($connect, "DELETE FROM materias WHERE mate_id='$id'");
  header("location:../Ingreso-Sistema/IngresoSistema2.php?curs=".$cur);

?>