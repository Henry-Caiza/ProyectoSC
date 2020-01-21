<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$fechaJuego=$_POST['fechaJuego'];
        $horario=$_POST['horario'];
        $cancha=$_POST['cancha'];
        $nombreArbitro=$_POST['nombreArbitro'];
        $eqVocalia=$_POST['eqVocalia'];
        $equipo1=$_POST['equipo1'];
        $equipo2=$_POST['equipo2'];

		if(!empty($fechaJuego) && !empty($horario) && !empty($cancha) && !empty($nombreArbitro) && !empty($eqVocalia) && !empty($equipo1) && !empty($equipo2) ){
			//if(!filter_var($telefono,FILTER_VALIDATE_EMAIL)){
				//echo "<script> alert('Correo no valido');</script>";
			//}else{
				$consulta_insert=$con->prepare('INSERT INTO calendario(fechaJuego,horario,cancha,nombreArbitro,eqVocalia,equipo1,equipo2) VALUES(:fechaJuego,:horario,:cancha,:nombreArbitro,:eqVocalia,:equipo1,:equipo2)');
				$consulta_insert->execute(array(
                    ':fechaJuego' =>$fechaJuego,
                    ':horario' =>$horario,
					':cancha' =>$cancha,
                    ':nombreArbitro' =>$nombreArbitro,
					':eqVocalia' =>$eqVocalia,
					':equipo1' =>$equipo1,
                    ':equipo2' =>$equipo2
				));
				header('Location: ../Registrar_calendario.php');
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
	<title>Nuevo Calendario</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR CALENDARIOS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="time" name="horario" placeholder="Horario" class="input__text">
				<input type="text" name="cancha" placeholder="Cancha" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="nombreArbitro" placeholder="Nombre de Árbitro" class="input__text">
                <input type="text" name="eqVocalia" placeholder="Vocalía" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="equipo1" placeholder="Equipo 1" class="input__text">
                <input type="text" name="equipo2" placeholder="Equipo 2" class="input__text">
            </div>
            <p>Fecha de juego: <input type="date" name="fechaJuego"></p>
           
			<div class="btn__group">
				<a href="../Registrar_calendario.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
