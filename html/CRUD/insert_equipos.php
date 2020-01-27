<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombreClub=$_POST['nombreClub'];
		$nombrePresi=$_POST['nombrePresi'];
		$localidad=$_POST['localidad'];
		$telefono=$_POST['telefono'];
		$email=$_POST['email'];
		$numMaxjug=$_POST['numMaxjug'];

		if(!empty($nombreClub) && !empty($nombrePresi) && !empty($localidad) && !empty($telefono) && !empty($email) && !empty($numMaxjug) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Datos no validos');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO equipo(nombreClub,nombrePresi,localidad,telefono,email,numMaxjug) VALUES(:nombreClub,:nombrePresi,:localidad,:telefono,:email,:numMaxjug)');
				$consulta_insert->execute(array(
					':nombreClub' =>$nombreClub,
					':nombrePresi' =>$nombrePresi,
					':localidad' =>$localidad,
					':telefono' =>$telefono,
					':email' =>$email,
					':numMaxjug'=>$numMaxjug
				));
				header('Location: ../registrarequipo.php');
			}
		}else{
			echo '<script> alert("Los campos estan vacios"); windows.location.href="../Carnets.php";</script>';
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Equipo</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR EQUIPO</h2>
		<p> 
		</p>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombreClub" placeholder="Nombre del Club" class="input__text" required>
				<input type="text" name="nombrePresi" placeholder="Nombre del Presidente" class="input__text" required>
			</div>
			<div class="form-group">
				<input type="text" name="localidad" placeholder="Localidad" class="input__text" required>
                <input type="text" name="telefono" placeholder="Teléfono" class="input__text" required>
			</div>
			<div class="form-group">
                <input type="text" name="email" placeholder="Email" class="input__text" required>
            </div>

			<div class="form-group">
			<label for="select2"></label>
				<select name="numMaxjug"  class="form-control">
					<option value="0">Escoga número jugadores</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
				</select>
            </div>
           
			<div class="btn__group">
				<a href="../registrarequipo.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
