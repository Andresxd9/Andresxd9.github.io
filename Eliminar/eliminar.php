<?php

  include("config.php");
  $id = $_GET["id_asi"];
  $result = mysqli_query($connect, "DELETE FROM asi_alum WHERE id_asi=$id");
  header("location: IngresoSistema.php");

?>