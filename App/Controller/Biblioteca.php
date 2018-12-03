<?php

class Biblioteca extends Controller
{

  protected $user;

  public function __construct()
  {
    $this->user = $this->model('Users');
  }
  public function index($name = '')
  {
    check();
    $resul=[];
    if(isset($_GET["busqueda"])){



    $bus=$_GET["busqueda"];

    #$resul=$cone->query("select *from pdf where Nombre like '%$bus%' or Autor like '%$bus%'");
    $resul =Pdf::where('Nombre','like',"%$bus%")->orWhere('Nombre','like',"%$bus%")->get();
    #$resul->fetch_all(MYSQLI_ASSOC);

    }

    $this->view('Biblioteca',['resul'=>$resul]);
  }
  public function news()
  {


    $nombre= $_POST["nombre_libro"];
    $autor= $_POST["autor_libro"];

    $date= (new \DateTime())->format('Y-m-d_H-i-s');

    $fil= $_FILES['file'];

    $name_file=$fil['name'];



    $nombre_file ="$nombre-$autor-$date-$name_file";

    //var_dump($nombre_file,__DIR__);

    $fichero_subido=__DIR__.'\..\..\Public\archivos\\'.$nombre_file;


    var_dump($nombre_file,__DIR__,$fichero_subido);

       $nombrearch="archivos/$nombre_file";

    if (copy($fil['tmp_name'],"archivos/$nombre_file")) {
      #$mysql->query("insert into pdf (Nombre,Autor,Url) values('$nombre','$autor','$nombrearch')");
      Pdf::create([
        'Nombre'=>$nombre,'Autor'=>$autor,'Url'=>$nombrearch
      ]);


     header("location:".asset().'Biblioteca');
           } else {
     echo "¡Posible ataque de subida de ficheros!\n";
 }
  }

  public function eliminar()
  {
    $id=$_POST["id"];

    $urls=$_POST["Url"];

    var_dump($id,$urls,$_POST);

  if(unlink($urls)){

    Pdf::find($id)->delete();
    $SER=parse_url($_SERVER['HTTP_REFERER']);
    $Q=$SER['query'];


    #$con->query("Delete from pdf where identificador=$id");
    header("location:".asset()."Biblioteca?$Q#about");
  }
  else {
    echo "no se borro correctamente";
  }

  }
  public function editar()
  {
    $id=$_POST["id"];
    $nombre=$_POST["Nombre"];
    $autor=$_POST["Autor"];
    $fil= $_FILES['files'];
    $name_file=$fil['name'];


  #var_dump($_SERVER,parse_url($_SERVER['HTTP_REFERER']));die;


  $size=$fil['size'];

    #var_dump($id,$nombre,$autor,$mysql);die;

    $pdf=Pdf::find($id);

    if($size==0)
    {
      $pdf->Nombre=$nombre;
        $pdf->Autor=$autor;
        $pdf->save();
    }
       #$mysql->query("update pdf set Nombre='$nombre',Autor='$autor' where identificador=$id");
       else{

            $date= (new \DateTime())->format('Y-m-d_H-i-s');
            $nombre_file ="$nombre-$autor-$date-$name_file";
            $fichero_subido=__DIR__.'\archivos\\'.$nombre_file;
            $nombrearch="archivos/$nombre_file";

               if (copy($fil['tmp_name'],"archivos/$nombre_file")) {

             #$mysql->query("update pdf set Nombre='$nombre',Autor='$autor',Url='$nombrearch' where identificador=$id");
             $pdf->Nombre=$nombre;
               $pdf->Autor=$autor;
               $pdf->Url=$nombrearch;
               $pdf->save();
           }
       }
       $SER=parse_url($_SERVER['HTTP_REFERER']);
       $Q=$SER['query'];
    header("location:".asset()."Biblioteca?$Q#about");



  }



}

 ?>
