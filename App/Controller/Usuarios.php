<?php

class Usuarios extends Controller
{
  public function index()
  {

    check();
    #var_dump($_SESSION);die;

    $resul= Users::all();



    $this->view ('Usuarios',compact('resul'));
  }
  public function editar()
  {
    $id=$_POST["id"];
    $usuario=$_POST["usuario"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];

    $user=Users::find($id);

    $user->usuario=$usuario;
      $user->email=$email;
      $user->pass=$pass;
      $user->save();

  #$resul=mysqli_query($mysqli,"update users set usuario='$usuario',email='$email',pass='$pass' where id=$id");

      header("location:".asset()."Usuarios");
  }
  public function eliminar()
  {
    $id=$_POST["id"];
    Users::find($id)->delete();

    header("location:".asset()."Usuarios");


  }
  Public function generar()
  {
    
  }

}







 ?>
