<?php

  function conectar() {

    $user="root";
    $pass="12345";
    $server="localhost";
    $db="biblioteca";
    $con=new mysqli($server,$user,$pass,$db) or die ("Error al conectar a la base de datos".mysql_error);


    return $con;


  }




 ?>
