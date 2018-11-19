<?php

  $id=$_POST["id"];
  $nombre=$_POST["Nombre"];
  $autor=$_POST["Autor"];





include('conexion.php');
$mysql=conectar();
  #var_dump($id,$nombre,$autor,$mysql);die;
     $mysql->query("update pdf set Nombre='$nombre',Autor='$autor' where identificador=$id");

  header("location:index1.php");



 ?>
