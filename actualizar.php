<!DOCTYPE html>


<?php
session_start();

if(!isset($_SESSION['id'])){
	header('location:index.php');
}
?>

<?php
include('connect_db.php');
$resul=mysqli_query($mysqli,"select *from users");

$resul=mysqli_fetch_all($resul,MYSQLI_ASSOC);

?>

<html lang="en">
<head>
<link rel="stylesheet" href="css/act.css">
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>

    <meta charset="utf-8">
    <title>biblioteca</title>

    <body background="img/muj.jpg" style="background-attachment: fixed" >
      <h1 class="span">Administracion de usuarios</h1>
      <h4 class="mor">Tabla de Usuarios</h4>

			<li>
				<a class="cl" href="desconectar.php" > Cerrar sesión administrador</a>

			</li>







      <table class="table table-striped table-bordered  table-hover">
  <thead>
  <tr class="li">
    <th scope="col">#id</th>
    <th scope="col">rol</th>
    <th scope="col">usuario</th>
    <th scope="col">email</th>
		<th scope="col">editar</th>
    <th scope="col">eliminar</th>

  </tr>

	<?php foreach ($resul as $key => $row) : ?>
		<tr class="li">
			<th scope="row"><?php echo $row['id']; ?>
			</th>
			<td><?php echo $row['rol']; ?></td>
			<td><?php echo $row['usuario']; ?></td>
			<td><?php echo $row['email']; ?></td>
			<td>
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row['usuario']; ?>" data-email="<?php echo $row['email']; ?>" data-id="<?php echo $row['id']; ?>"  data-pass="<?php echo $row['pass']; ?>"  >Editar</button>

				</td>




			<td>
				<form action="eliminar1.php" method="POST">

					<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
					<?php

					if($row ['rol']!='admin'):


					 ?>

<button type="submit" name="button" class="btn btn-danger">Eliminar</button>


						<?php endif; ?>







				</form>
				<!--<a href="<?php echo $row['Url']; ?>" class="btn btn-danger">Eliminar</a>-->

			</td>
		</tr>
	<?php endforeach; ?>







  </thead>
  <tbody>



		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
					<form action="usuario.php" method="post">
		      <div class="modal-body">
						<input type="hidden" name="id" value="" id="recipient-id">
		          <div class="form-group">
		            <label for="recipient-name" class="col-form-label">usuario:</label>
		            <input type="text" name="usuario" class="form-control" id="recipient-name"required>
		          </div>
							<div class="form-group">
		            <label for="recipient-email" class="col-form-label">email:</label>
		            <input type="text"name="email" class="form-control" id="recipient-email"required>
		          </div>
							<div class="form-group">
								<label for="recipient-pass" class="col-form-label">pass:</label>
								<input type="password"name="pass" class="form-control" id="recipient-pass"required>
							</div>


		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-primary">actualizar</button>
		      </div>
					</form>
		    </div>
		  </div>
		</div>
		<script>
		$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var recipient = button.data('whatever')
	var email = button.data('email')
	var id = button.data('id')
	var pass = button.data('pass')
  var modal = $(this)
  modal.find('.modal-title').text('Actualizar a ' + recipient)
  modal.find('.modal-body input#recipient-name').val(recipient)

	modal.find('.modal-body input#recipient-email').val(email)
	modal.find('.modal-body input#recipient-id').val(id)
	modal.find('.modal-body input#recipient-pass').val(pass)
})


		</script>



		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/jquery/jquery.min.js"></script>




    </body>
  </head>
