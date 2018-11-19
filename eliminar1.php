<?php

  $id=$_POST["id"];





include('connect_db.php');

$resul=mysqli_query($mysqli,"delete from users where id=$id");

  header("location:actualizar.php");



 ?>
