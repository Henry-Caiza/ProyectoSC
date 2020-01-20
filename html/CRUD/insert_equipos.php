<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$telefono=$_POST['telefono'];
		$ciudad=$_POST['ciudad'];
		$correo=$_POST['correo'];

		if(!empty($nombre) && !empty($apellidos) && !empty($telefono) && !empty($ciudad) && !empty($correo) ){
			if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO clientes(nombre,apellidos,telefono,ciudad,correo) VALUES(:nombre,:apellidos,:telefono,:ciudad,:correo)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellidos' =>$apellidos,
					':telefono' =>$telefono,
					':ciudad' =>$ciudad,
					':correo' =>$correo
				));
				header('Location: index.php');
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
	<title>Nuevo Equipo</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR EQUIPO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Codigo" class="input__text">
				<input type="text" name="apellidos" placeholder="Telefonoe" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="telefono" placeholder="Nombre Club" class="input__text">
                <input type="text" name="ciudad" placeholder="Email" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="correo" placeholder="Nombre Presidente" class="input__text">
                <input type="text" name="ciudad" placeholder="Numero Maximo Jugadores" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="correo" placeholder="Loacalidad" class="input__text">
			</div>
			<div class="btn__group">
				<a href="../registrarequipo.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
