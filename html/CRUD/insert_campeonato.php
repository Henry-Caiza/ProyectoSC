<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
        $fechaInicio=$_POST['fechaInicio'];
        $fechaFin=$_POST['fechaFin'];
        $responsable=$_POST['responsable'];
        $lugar=$_POST['lugar'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $numeroEq=$_POST['numeroEq'];

		if(!empty($nombre) && !empty($fechaInicio) && !empty($fechaFin) && !empty($responsable) && !empty($lugar) && !empty($telefono) && !empty($direccion) && !empty($numeroEq) ){
			//if(!filter_var($telefono,FILTER_VALIDATE_EMAIL)){
				//echo "<script> alert('Correo no valido');</script>";
			//}else{
				$consulta_insert=$con->prepare('INSERT INTO campeonato(nombre,fechaInicio,fechaFin,responsable,lugar,telefono,direccion,numeroEq) VALUES(:nombre,:fechaInicio,:fechaFin,:responsable,:lugar,:telefono,:direccion,:numeroEq)');
				$consulta_insert->execute(array(
                    ':nombre' =>$nombre,
                    ':fechaInicio' =>$fechaInicio,
					':fechaFin' =>$fechaFin,
                    ':responsable' =>$responsable,
                    ':lugar' =>$lugar,
					':telefono' =>$telefono,
					':direccion' =>$direccion,
                    ':numeroEq' =>$numeroEq
				));
				header('Location: ../registrar_campeonato.php');
			//}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Campeonato</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR CAMPEONATOS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre Campeonato" class="input__text">
				<input type="text" name="responsable" placeholder="Responsable" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="lugar" placeholder="Lugar" class="input__text">
                <input type="text" name="telefono" placeholder="Teléfono" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" class="input__text">
                <input type="text" name="numeroEq" placeholder="Numero de Equipos" class="input__text">
            </div>
            <p>Fecha Inicio: <input type="date" name="fechaInicio"></p>
            <p>Fecha Fin: <input type="date" name="fechaFin"></p>
           
			<div class="btn__group">
				<a href="../registrar_campeonato.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
