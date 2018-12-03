<?php



class Home extends Controller
{

  protected $user;

  public function __construct()
  {
    $this->user = $this->model('Users');
  }
  public function index($name = '')
  {
    #$user =  $this->model('Users');
    #$user->name= $name;

    $this->view('login');



    #$this->view('home/index', ['name' => $user->name]);


  }


  public function registro()
  {
    	$realname=$_POST['realname'];
    	$mail=$_POST['nick'];
    	$pass= $_POST['pass'];
    	$rpass=$_POST['rpass'];

      $check_mail=Users::where('email',$mail)->first();
    		if($pass==$rpass){
    			if($check_mail>0){
    				echo ' <script language="javascript">alert("Atencion, ya existe el email designado para un usuario, verifique sus datos");</script> ';
    			}else{

            $User=new Users;
            $User->usuario=$realname;
            $User->pass=$pass;
            $User->email=$mail;
            $User->save();

    				//require("connect_db.php");
    //la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
    				#mysqli_query($mysqli,"INSERT INTO users(usuario,pass,email) VALUES('$realname','$pass','$mail')");
    				//echo 'Se ha registrado con exito';
    				echo ' <script language="javascript">alert("Usuario registrado ");</script> ';

    			}
          echo "<script>location.href='".asset()."/Home'</script>";
          return;
    		}else{


          echo '<script>alert("la contraseña no coiciden")</script> ';
          echo "<script>location.href='".asset()."/Home'</script>";
          return;
    		}
  }
  public function login()
  {
    $username=$_POST['mail'];
    $pass=$_POST['pass'];

  $usuario=Users::where('email',$username)->where('pass',$pass)->first();

  if($usuario){
    sesion($usuario);
    if($usuario['rol']=='admin')
    {

      echo '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
			echo "<script>location.href='".asset()."/Biblioteca'</script>";
      return;
    }
    else{

      	header("Location:".asset()."/Biblioteca");

      }

      return;


  }else{
    echo '<script>alert("ESTE USUARIO NO EXISTE O PASSWORD INCORRECTA, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';

    echo "<script>location.href='".asset()."/Home'</script>";
  }





  }
  public function closer(){
    midestroy();
  }

}







 ?>
