<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
        $Id=$_POST['Id'];
		$nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $cedula=$_POST['cedula'];
        $email=$_POST['email'];
		$telefono=$_POST['telefono'];
		$direccion=$_POST['direccion'];
		$cargo=$_POST['cargo'];

		if(!empty($Id) && !empty($nombre) && !empty($apellido) && !empty($cedula) && !empty($email) && !empty($telefono) && !empty($direccion) && !empty($cargo) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$conn->prepare('INSERT INTO personal VALUES(Id,nombre,apellido,cedula,email,telefono,direccion,cargo) VALUES(:Id,:nombre,:apellido,:cedula,:email,:telefono,:direccion,:cargo)');
                $consulta_insert->bindValue('Id',$Id);
                $consulta_insert->bindValue('nombre' ,$nombre);
                $consulta_insert->bindValue('apellido' ,$apellido);
                $consulta_insert->bindValue('cedula' ,$cedula);
                $consulta_insert->bindValue('email' ,$email);
                $consulta_insert->bindValue('telefono' ,$telefono);
                $consulta_insert->bindValue('direccion' ,$direccion);
                $consulta_insert->bindValue('cargo' ,$cargo);
                $consulta_insert->is_executable();
				header('Location: insert_personal.php');
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
	<title>Nuevo Personal</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>REGISTRAR PERSONAL </h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="Id" placeholder="Id" class="input__text">
				<input type="text" name="nombre" placeholder="Nombres" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellido" placeholder="Apellidos" class="input__text">
				<input type="text" name="cedula" placeholder="Cédula" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="email" placeholder="Correo electrónico" class="input__text">
                <input type="text" name="telefono" placeholder="Teléfono" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" class="input__text">
                <input type="text" name="cargo" placeholder="Cargo" class="input__text">
			</div>
			<div class="btn__group">
				<a href="../Registro_Personal.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
