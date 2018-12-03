<?php

  $id=$_POST["id"];
  $usuario=$_POST["usuario"];
  $email=$_POST["email"];
  $pass=$_POST["pass"];





include('connect_db.php');

$resul=mysqli_query($mysqli,"update users set usuario='$usuario',email='$email',pass='$pass' where id=$id");

  header("location:actualizar.php");



 ?>
