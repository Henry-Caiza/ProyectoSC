<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$id=$_POST['id'];
		$fechaJuego=$_POST['fechaJuego'];
		$horario=$_POST['horario'];
		$cancha=$_POST['cancha'];
        $nombreArb=$_POST['nombreArbitro'];
        $vocalia=$_POST['eqVocalia'];
		$equipo1=$_POST['equipo1'];
		$equipo2=$_POST['equipo2'];

		if(!empty($id) && !empty($fechaJuego) && !empty($horario) && !empty($cancha) && !empty($nombreArb)  && !empty($vocalia) && !empty($equipo1) && !empty($equipo2)){
			$consulta_insert=$conn->prepare('INSERT INTO calendario(id,fechaJuego,horario,cancha,nombreArbitro,eqVocalia,equipo1,equipo2) VALUES(:id,:fechaJuego,:horario,:cancha,:nombreArbitro,:eqVocalia,:equipo1,:equipo2)');
				$consulta_insert->execute(array(
					':ide' =>$id,
					':fechaJuego' =>$fechaJuego,
					':horario' =>$horario,
                    ':cancha' =>$cancha,
                    ':nombreArbitro' =>$nombreArb,
					':eqVocalia' =>$vocalia,
					':equipo1' =>$equipo1,
					':equipo2' =>$equipo2
				));
			header('Location: index.php');
        }
        else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registrar Calendario</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>Registrar calendario</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="codigoPart" placeholder="Código de partido" class="input__text">
				<input type="date" name="fecha"  placeholder="Cancha" class="input__text">
			</div>
			<div class="form-group">
				<input type="time" name="horario" placeholder="Horario" class="input__text">
				<input type="text" name="cancha" placeholder="Cancha" class="input__text">
			</div>
			<div class="form-group">
                <input type="text" name="nombre_arb" placeholder="Nombre de Árbitro" class="input__text">
                <input type="text" name="vocalia" placeholder="Vocalía" class="input__text">
            </div>
            <div class="form-group">
                <input type="text" name="equipo1" placeholder="Equipo 1" class="input__text">
                <input type="text" name="equipo2" placeholder="Equipo 2" class="input__text">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
