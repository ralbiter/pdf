<?php



		$mysqli = new MySQLi("localhost", "root","12345", "biblioteca1");
		if ($mysqli -> connect_errno) {
			die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno()
				. ") " . $mysqli -> mysqli_connect_error());
		}
			//echo "Conexión exitossa!";

//	$link =mysqli_connect("localhost","root","");
//	if($link){
//		mysqli_select_db($link,"academ");
//	}



?>
