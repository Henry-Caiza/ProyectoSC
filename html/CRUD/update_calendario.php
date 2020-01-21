<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM calendario WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: ../Registrar_calendario.php');
	}


	if(isset($_POST['guardar'])){
		$fechaJuego=$_POST['fechaJuego'];
        $horario=$_POST['horario'];
        $cancha=$_POST['cancha'];
        $nombreArbitro=$_POST['nombreArbitro'];
        $eqVocalia=$_POST['eqVocalia'];
        $equipo1=$_POST['equipo1'];
        $equipo2=$_POST['equipo2'];
		$id=(int) $_GET['id'];

		if(!empty($fechaJuego) && !empty($horario) && !empty($cancha) && !empty($nombreArbitro) && !empty($eqVocalia) && !empty($equipo1) && !empty($equipo2) ){
			//if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				//echo "<script> alert('Correo no valido');</script>";
			//}else{
				$consulta_update=$con->prepare(' UPDATE calendario SET  
					fechaJuego=:fechaJuego,
					horario=:horario,
                    cancha=:cancha,
					nombreArbitro=:nombreArbitro,
                    eqVocalia=:eqVocalia,
                    equipo1=:equipo1,
					equipo2=:equipo2
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
                    ':fechaJuego' =>$fechaJuego,
                    ':horario' =>$horario,
					':cancha' =>$cancha,
                    ':nombreArbitro' =>$nombreArbitro,
					':eqVocalia' =>$eqVocalia,
					':equipo1' =>$equipo1,
                    ':equipo2' =>$equipo2,
					':id' =>$id
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
	<title>Editar calendario</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>MODIFICAR CALENDARIO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="time" name="horario" value="<?php if($resultado) echo $resultado['horario']; ?>" class="input__text">
				<input type="text" name="cancha" value="<?php if($resultado) echo $resultado['cancha']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="nombreArbitro" value="<?php if($resultado) echo $resultado['nombreArbitro']; ?>" class="input__text">
				<input type="text" name="eqVocalia" value="<?php if($resultado) echo $resultado['eqVocalia']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="equipo1" value="<?php if($resultado) echo $resultado['equipo1']; ?>" class="input__text">
                <input type="text" name="equipo2" value="<?php if($resultado) echo $resultado['equipo2']; ?>" class="input__text">
			</div>
            <pre>Fecha Inicio  </pre>
            <div class="form-group">
				<p> <input type="date" name="fechaJuego" value="<?php if($resultado) echo $resultado['fechaJuego']; ?>" > </p>
			</div>
			<div class="btn__group">
				<a href="../registrar_campeonato.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>