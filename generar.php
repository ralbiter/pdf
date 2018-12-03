<?php


require_once 'dompdf_0-8-2/dompdf/autoload.inc.php';
/*require_once 'dompdf_0-8-2/dompdf/lib/html5lib/Parser.php';
require_once 'dompdf_0-8-2/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'dompdf_0-8-2/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'dompdf_0-8-2/dompdf/src/Autoloader.php';
Dompdf\Autoloader::register();*/
use Dompdf\Dompdf;



include('connect_db.php');
$resul=mysqli_query($mysqli,"select *from users");

$resul=mysqli_fetch_all($resul,MYSQLI_ASSOC);


$content='<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">';

$content .='<h1>Administracion de usuarios</h1>';

$content .='<h4>Reporte de Lista de Usuarios</h4>';


$content .=<<<EOF

<table class="table table-striped table-bordered  table-hover">
<thead>
<tr class="li">
<th scope="col">#id</th>
<th scope="col">rol</th>
<th scope="col">usuario</th>
<th scope="col">email</th>

</tr>

EOF;



 foreach ($resul as $key => $row) :

   $content .="
<tr class='li'>
<th scope='row'>{$row['id']}
</th>
<td>{$row['rol']}</td>
<td>{$row['usuario']}</td>
<td>{$row['email']}</td>



</tr>
";
 endforeach;




$content .=<<<EOF


</thead>


EOF;





$dompdf = new Dompdf();
$dompdf->loadHtml($content);
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream();












 ?>
