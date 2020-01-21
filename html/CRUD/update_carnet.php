<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM carnet WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: ../Carnets.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$fechaNac=$_POST['fechaNac'];
        $cedula=$_POST['cedula'];
        $equipo=$_POST['equipo'];
        $numAsig=$_POST['numAsig'];
        $id=(int) $_GET['id'];
		if(!empty($id) &&!empty($nombre) && !empty($apellido) && !empty($fechaNac) && !empty($cedula)&& !empty($equipo)&&!empty($numAsig) ){
				$consulta_update=$con->prepare(' UPDATE carnet SET 
                    id=:id, 
					nombre=:nombre,
					apellido=:apellido,
                    fechaNac=:fechaNac,
					cedula=:cedula,
					equipo=:equipo,
                    numAsig=:numAsig,
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
                    ':id' =>$id,
                    ':nombre' =>$nombre,
                    ':apellido' =>$apellido,
                    ':fechaNac' =>$fechaNac,
                    ':cedula' =>$cedula,
                    ':equipo' =>$equipo,
					':numAsig' =>$numAsig
				));
				header('Location: ../Carnets.php');
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editar Carnets</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>MODIFICAR CARNETS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id" value="<?php if($resultado) echo $resultado['id']; ?>" class="input__text">
				<input type="text" name="cedula" value="<?php if($resultado) echo $resultado['cedula']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="equipo" value="<?php if($resultado) echo $resultado['equipo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
                <input type="text" name="numAsig" value="<?php if($resultado) echo $resultado['numAsig']; ?>" class="input__text">
            </div>
            <div class="form-group">
				<input type="text" name="fechaNac" value="<?php if($resultado) echo $resultado['fechaNac']; ?>" class="input__text">
                
			</div>
			<div class="btn__group">
				<a href="../Carnets.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>