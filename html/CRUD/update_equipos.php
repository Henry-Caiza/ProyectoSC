<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM equipo WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: ../registrarequipo.php');
	}


	if(isset($_POST['guardar'])){
		$nombreClub=$_POST['nombreClub'];
        $nombrePresi=$_POST['nombrePresi'];
        $localidad=$_POST['localidad'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $numMaxjug=$_POST['numMaxjug'];
		$id=(int) $_GET['id'];

		if(!empty($nombreClub) && !empty($nombrePresi) && !empty($localidad) && !empty($telefono) && !empty($email) && !empty($numMaxjug) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE equipo SET  
					nombreClub=:nombreClub,
					nombrePresi=:nombrePresi,
                    localidad=:localidad,
					telefono=:telefono,
                    email=:email,
					numMaxjug=:numMaxjug
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
                    ':nombreClub' =>$nombreClub,
					':nombrePresi' =>$nombrePresi,
					':localidad' =>$localidad,
					':telefono' =>$telefono,
					':email' =>$email,
					':numMaxjug'=>$numMaxjug,
					':id' =>$id
				));
				header('Location: ../registrarequipo.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar equipo</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>MODIFICAR EQUIPO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombreClub" value="<?php if($resultado) echo $resultado['nombreClub']; ?>" class="input__text">
				<input type="text" name="nombrePresi" value="<?php if($resultado) echo $resultado['nombrePresi']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="localidad" value="<?php if($resultado) echo $resultado['localidad']; ?>" class="input__text">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="email" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text">
                <input type="text" name="numMaxjug" value="<?php if($resultado) echo $resultado['numMaxjug']; ?>" class="input__text">
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