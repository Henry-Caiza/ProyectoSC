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
    

		if(!empty($nombre) ||!empty($nombre) || !empty($apellido) || !empty($fechaNac) || !empty($cedula)|| !empty($equipo)|| !empty($numAsig) ){
			if(!empty($id)){
                echo "no conecta";
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
            <div class="form-group">
                <input type="text" name="fechaNac" placeholder="Fecha de Nacimiento" class="input__text">
                
			</div>
			<div class="btn__group">
                <a href="../Carnets.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
            </div>
		</form>
	</div>
</body>
</html>
