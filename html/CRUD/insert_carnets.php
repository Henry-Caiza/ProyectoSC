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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR CARNET</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="id" placeholder="Código" class="input__text" required>
				<input type="text" name="cedula" placeholder="Cédula" class="input__text" required>
			</div>
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombres" class="input__text" required>
                <input type="text" name="equipo" placeholder="Equipo" class="input__text" required>
			</div>
			<div class="form-group">
                <input type="text" name="apellido" placeholder="Apellidos" class="input__text" required>
                <input type="text" name="numAsig" placeholder="Número Asignado" class="input__text" required>
            </div>
            <p>Fecha de nacimiento:</p>
			<div class="form-group">
                <input type="date" name="fechaNac" placeholder="Fecha Nacimiento" class="input__text" required>
            </div>
			<div class="btn__group">
                <a href="../Carnets.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
            </div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

