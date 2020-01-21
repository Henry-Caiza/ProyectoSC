<?php 
	include_once 'conexion.php';

	if(isset($_POST['guardar'])){
		$id=$_POST['id'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$fechaNac=$_POST['fechaNac'];
        $cedula=$_POST['cedula'];
        $equipo=$_POST['equipo'];
        $numAsig=$_POST['numAsig'];
    
		if(!empty($id)&&!empty($nombre) && !empty($apellido) && !empty($fechaNac) && !empty($cedula)&& !empty($equipo)&&!empty($numAsig) ){
			if(!filter_var($cedula,FILTER_VALIDATE_INT)){
				echo "<script> alert('Cedula no aceptada');</script>";
			}else{
                echo " conecta";
				$consulta_insert=$con->prepare('INSERT INTO carnet(id,nombre,apellido,fechaNac,cedula,equipo,numAsig) VALUES(:id,:nombre,:apellido,:fechaNac,:cedula,:equipo,:numAsig)');
				$consulta_insert->execute(array(
					':id' =>$id,
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':fechaNac' =>$fechaNac,
                    ':cedula' =>$cedula,
                    ':equipo' =>$equipo,
					':numAsig' =>$numAsig
				));
				header('Location: ../Carnets.php');
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
	<title>Nuevo Carnet</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR CARNET</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id" placeholder="Código" class="input__text">
				<input type="text" name="cedula" placeholder="Cédula" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombres" class="input__text">
                <input type="text" name="equipo" placeholder="Equipo" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="apellido" placeholder="Apellidos" class="input__text">
                <input type="text" name="numAsig" placeholder="Número Asignado" class="input__text">
            </div>
            <p>Fecha de nacimiento: <input type="date" name="fechaNac"></p>
			<div class="btn__group">
                <a href="../Carnets.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
            </div>
		</form>
	</div>
</body>
</html>

