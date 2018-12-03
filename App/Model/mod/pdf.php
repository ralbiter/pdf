<?php

  $id=$_POST["id"];
  $nombre=$_POST["Nombre"];
  $autor=$_POST["Autor"];
  $fil= $_FILES['files'];
  $name_file=$fil['name'];


#var_dump($_SERVER,parse_url($_SERVER['HTTP_REFERER']));die;


$size=$fil['size'];





include('conexion.php');
$mysql=conectar();
  #var_dump($id,$nombre,$autor,$mysql);die;

  if($size==0)
     $mysql->query("update pdf set Nombre='$nombre',Autor='$autor' where identificador=$id");
     else{

          $date= (new \DateTime())->format('Y-m-d_H-i-s');
          $nombre_file ="$nombre-$autor-$date-$name_file";
          $fichero_subido=__DIR__.'\archivos\\'.$nombre_file;
          $nombrearch="archivos/$nombre_file";

             if (copy($fil['tmp_name'],"archivos/$nombre_file")) {

           $mysql->query("update pdf set Nombre='$nombre',Autor='$autor',Url='$nombrearch' where identificador=$id");

         }
     }
     $SER=parse_url($_SERVER['HTTP_REFERER']);
     $Q=$SER['query'];
  header("location:index1.php?$Q#about");



 ?>
