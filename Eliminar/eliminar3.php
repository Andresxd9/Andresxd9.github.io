<?php

  include("../config.php");
  $cur=$_GET["curs"];
  $id = $_GET["id_profe"];
  $result = mysqli_query($connect, "DELETE FROM profe_control WHERE id_profe='$id'");
  header("location:../Ingreso-Sistema/IngresoSistema3.php?curs=".$cur);

?>