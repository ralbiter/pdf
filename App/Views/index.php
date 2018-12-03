

<?php
session_start();
if(isset($_SESSION['id'])){
	header('location:index1.php');
}





 ?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap-responsive.css">
		<link rel="stylesheet" href="css/estilos.css">
	<title>biblioteca</title>
</head>
<body background="img/li.jpg" style="background-attachment: fixed" >
	<center><div class="tit"><h2 style="color:white ">Inicio de sesión</h2>
		<center><div class="Ingreso">
			<form action="validar.php" method="post">

			<table border="0">

			<tr><td><label style="font-size: 14pt"><b>Correo:  </b></label></td>
				<td width=80> <input required class="form-group has-success" style="border-radius:5px;" type="text" name="mail"></td></tr>
			<tr><td><label style="font-size: 14pt"><b>Contraseña: </b></label></td>
				<td witdh=80><input required style="border-radius:5px;" type="password" name="pass"></td></tr>
			<tr><td></td>

				<td width=80 align=center><input class="btn btn-primary" type="submit" value="Aceptar"></td>
				</tr></tr></table>




			</form><br>

			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" >Registrar</button>

	<table border="0" align="center" valign="middle">
		<tr>
		<td rowspan=2>

<br>
<!-- formulario registro -->

<!--<form method="post" action="registro.php" >
  <fieldset>
    <legend  style="font-size: 18pt"><b>Registro</b></legend>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Ingresa tu nombre</b></label>
      <input type="text" name="realname" class="form-control" placeholder="Ingresa tu nombre" required />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa tu email</b></label>
      <input type="text" name="nick" class="form-control"  required placeholder="Ingresa email" required/>
    </div>
    <div class="form-group">
      <label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa tu Contraseña</b></label>
      <input type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" required />
    </div>
    <div class="form-group">
      <label style="font-size: 14pt"><b>Repite tu contraseña</b></label>
      <input type="password" name="rpass" class="form-control" required placeholder="repite contraseña" required />
    </div>

    </div>

    <input  class="btn btn-danger" type="submit" name="submit" value="Registrarse"/>

  </fieldset>
</form>-->
</div>
<?php
		if(isset($_POST['submit'])){
			require("registro.php");
		}
	?>
<!--Fin formulario registro -->

		</td>
		</tr>
		</table>
	</div></center></div></center>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
					<form action="registro.php" method="post">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Registro</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">

					<div class="form-group">
			      <label style="font-size: 14pt"><b>Ingresa tu nombre</b></label>
			      <input type="text" name="realname" class="form-control" placeholder="Ingresa tu nombre" required />
			    </div>
			    <div class="form-group">
			      <label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa tu email</b></label>
			      <input type="text" name="nick" class="form-control"  required placeholder="Ingresa email" required/>
			    </div>
			    <div class="form-group">
			      <label style="font-size: 14pt; color: #FFFFFF;"><b>Ingresa tu Contraseña</b></label>
			      <input type="password" name="pass" class="form-control"  placeholder="Ingresa contraseña" required />
			    </div>
			    <div class="form-group">
			      <label style="font-size: 14pt"><b>Repite tu contraseña</b></label>
			      <input type="password" name="rpass" class="form-control" required placeholder="repite contraseña" required />
			    </div>



				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-primary">Registrar</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>




</body>
</html>
