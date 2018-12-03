<?php
//include("connect_db.php");

//$miconexion = new connect_db;


session_start();
	require("connect_db.php");

	$username=$_POST['mail'];
	$pass=$_POST['pass'];


	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
	$sql2=mysqli_query($mysqli,"SELECT * FROM users WHERE email='$username'and pass='$pass'");
  $f2=mysqli_fetch_assoc($sql2);

	#if($pass==1){

  if($f2){

    $_SESSION['id']=$f2['id'];
    $_SESSION['usuario']=$f2['usuario'];
    $_SESSION['rol']=$f2['rol'];

    if($f2['rol']=='admin')
    {

      echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='index1.php'</script>";
      return;
    }
    else{

      	header("Location: index1.php");

      }

      return;
  }

  		echo '<script>alert("ESTE USUARIO NO EXISTE O PASSWORD INCORRECTA, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';

  		echo "<script>location.href='index.php'</script>";
		#}else{


		#	echo '<script>alert("la contraseña no coiciden")</script> ';
		#	echo "<script>location.href='index.php'</script>";
			#return;
	#	}
