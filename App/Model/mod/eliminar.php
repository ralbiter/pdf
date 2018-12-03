<?php

  $id=$_POST["id"];

  $urls=$_POST["Url"];

  var_dump($id,$urls,$_POST);



include('conexion.php');

$con=conectar();



if(unlink($urls)){

  $con->query("Delete from pdf where identificador=$id");
  header("location:index.php");
}
else {
  echo "no se borro correctamente";
}



 ?>
