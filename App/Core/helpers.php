<?php

 function asset(){
   #var_dump($_SERVER);
   $server= $_SERVER['SCRIPT_NAME'] ;
   $rest = substr($server, 0, -9); // devuelve "d"
   return $rest;
 }
 function check()
 {

   session_start();

    if(!isset($_SESSION['id'])){
      header('location:'.asset().'Home');
    }

 }
 function midestroy()
 {

   session_start();
   if($_SESSION['id']){
   	session_destroy();
   	header("location:".asset().'Home');
   }
   else{
   	header("location:".asset().'Home');;
   }

 }
 function sesion(Users $user)
 {
    session_start();
   $_SESSION['id']=$user['id'];
   $_SESSION['usuario']=$user['usuario'];
   $_SESSION['rol']=$user['rol'];
 }









 ?>
