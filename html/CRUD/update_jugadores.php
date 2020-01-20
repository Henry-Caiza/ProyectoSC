<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM jugadores WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: ../registrar_jugadores.php');
	}


	if(isset($_POST['guardar'])){
        $cedula=$_POST['cedula'];
        $nombres=$_POST['nombres'];
		$apellidos=$_POST['apellidos'];
		$equipo=$_POST['equipo'];
		$numeroasig=$_POST['numeroasig'];
        $pais=$_POST['pais'];
        $provincia=$_POST['provincia'];
        $ciudad=$_POST['ciudad'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $posicion=$_POST['posicion'];
        $fechanac=$_POST['fechanac'];
        $instruccion=$_POST['instruccion'];
        $estadotransf=$_POST['estadotransf'];
		$id=(int) $_GET['id'];

		if(!empty($cedula) && !empty($nombres) && !empty($apellidos) && !empty($equipo) && !empty($numeroasig) && !empty($pais) && !empty($provincia) && !empty($ciudad) && !empty($direccion)  && !empty($telefono) && !empty($email) && !empty($posicion) && !empty($fechanac) && !empty($instruccion) && !empty($estadotransf) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_update=$con->prepare(' UPDATE jugadores SET  
					cedula=:cedula,
                    nombres=:nombres,
					apellidos=:apellidos,
                    equipo=:equipo,
					numeroasig=:numeroasig,
                    pais=:pais,
                    provincia=:provincia,
					ciudad=:ciudad,
                    direccion=:direccion,
                    telefono=:telefono,
                    email=:email,
                    posicion=:posicion,
                    fechanac=:fechanac,
                    instruccion=:instruccion,
					estadotransf=:estadotransf
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
                    ':cedula' =>$cedula,
                    ':nombres' =>$nombres,
                    ':apellidos' =>$apellidos,
                    ':equipo' =>$equipo,
                    ':numeroasig' =>$numeroasig,
                    ':pais' =>$pais,
                    ':provincia' =>$provincia,
                    ':ciudad' =>$ciudad,
                    ':direccion' =>$direccion,
					':telefono' =>$telefono,
                    ':email' =>$email,
                    ':posicion' =>$posicion,
                    ':fechanac' =>$fechanac,
                    ':instruccion' =>$instruccion,
					':estadotransf' =>$estadotransf,
					':id' =>$id
				));
				header('Location: ../registrar_jugadores.php');
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
	<title>Editar Jugadores</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>MODIFICAR JUGADORES</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="cedula" value="<?php if($resultado) echo $resultado['cedula']; ?>" class="input__text">
				<input type="text" name="nombres" value="<?php if($resultado) echo $resultado['nombres']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellidos" value="<?php if($resultado) echo $resultado['apellidos']; ?>" class="input__text">
				<input type="text" name="equipo" value="<?php if($resultado) echo $resultado['equipo']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="numeroasig" value="<?php if($resultado) echo $resultado['numeroasig']; ?>" class="input__text">
                <input type="text" name="pais" value="<?php if($resultado) echo $resultado['pais']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="provincia" value="<?php if($resultado) echo $resultado['provincia']; ?>" class="input__text">
                <input type="text" name="ciudad" value="<?php if($resultado) echo $resultado['ciudad']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
                <input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="email" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text">
                <input type="text" name="posicion" value="<?php if($resultado) echo $resultado['posicion']; ?>" class="input__text">
			</div>
            <div class="form-group">
				<input type="text" name="instruccion" value="<?php if($resultado) echo $resultado['instruccion']; ?>" class="input__text">
                <input type="text" name="estadotransf" value="<?php if($resultado) echo $resultado['estadotransf']; ?>" class="input__text">
			</div>

            <pre>Fecha Nacimiento  </pre>
            <div class="form-group">
				<p> <input type="date" name="fechanac" value="<?php if($resultado) echo $resultado['fechanac']; ?>" >
                </p>
                
			</div>

			<div class="btn__group">
				<a href="../registrar_jugadores.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>