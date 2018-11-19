<?php

  if(isset($_GET["busqueda"])){



  $bus=$_GET["busqueda"];

  include('conexion.php');

  $cone=conectar();

  $resul=$cone->query("select *from pdf where Nombre like '%$bus%' or Autor like '%$bus%'");

  $resul->fetch_all(MYSQLI_ASSOC);

  }











 ?>
