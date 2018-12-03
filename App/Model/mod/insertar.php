<?php

   //var_dump($_POST);
   var_dump($_FILES);
   $nombre= $_POST["nombre_libro"];
   $autor= $_POST["autor_libro"];

   include('conexion.php');
   $mysql=conectar();

   //$mysql->query("insert into pdf (Nombre,Autor,Url) values('$nombre', '$autor',)")

   $date= (new \DateTime())->format('Y-m-d_H-i-s');

   $fil= $_FILES['file'];

   $name_file=$fil['name'];



   $nombre_file ="$nombre-$autor-$date-$name_file";

   //var_dump($nombre_file,__DIR__);

   $fichero_subido=__DIR__.'\archivos\\'.$nombre_file;

   var_dump($nombre_file,__DIR__,$fichero_subido);

      $nombrearch="archivos/$nombre_file";

   if (copy($fil['tmp_name'],"archivos/$nombre_file")) {
     $mysql->query("insert into pdf (Nombre,Autor,Url) values('$nombre','$autor','$nombrearch')");



    header("location:index1.php");
          } else {
    echo "¡Posible ataque de subida de ficheros!\n";
}












 ?>
