<?php

  include("../config.php");
  $id = $_GET["id"];
  $result = mysqli_query($connect, "DELETE FROM registro WHERE id=$id");
  header("location:../Ingreso-Sistema/IngresoSistema4.php");

?>