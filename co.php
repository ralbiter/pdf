
<?php


 function co(){

   $servidor="localhost";
   $usuario="root";
   $password="12345";
   $bd="pruebas3";
   $con=mysqli_connect($servidor,$usuario,$password,$bd);

   return $con;

 }

  if(co()){
    echo "conectado";
  }else{ echo "no conectado";}

 ?>
