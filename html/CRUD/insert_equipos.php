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
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR EQUIPO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombreClub" placeholder="Nombre del Club" class="input__text">
				<input type="text" name="nombrePresi" placeholder="Nombre del Presidente" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="localidad" placeholder="Localidad" class="input__text">
                <input type="text" name="telefono" placeholder="Teléfono" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="email" placeholder="Email" class="input__text">
                <input type="text" name="numMaxjug" placeholder="Número Máximo Jugadores" class="input__text">
            </div>
           
			<div class="btn__group">
				<a href="../registrarequipo.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
