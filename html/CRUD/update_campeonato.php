<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM campeonato WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: ../registrar_campeonato.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$fechaInicio=$_POST['fechaInicio'];
		$fechaFin=$_POST['fechaFin'];
		$responsable=$_POST['responsable'];
        $lugar=$_POST['lugar'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $numeroEq=$_POST['numeroEq'];
		$id=(int) $_GET['id'];

		if(!empty($nombre) && !empty($fechaInicio) && !empty($fechaFin) && !empty($responsable) && !empty($lugar) && !empty($telefono) && !empty($direccion) && !empty($numeroEq) ){
			//if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
				//echo "<script> alert('Correo no valido');</script>";
			//}else{
				$consulta_update=$con->prepare(' UPDATE campeonato SET  
					nombre=:nombre,
					fechaInicio=:fechaInicio,
                    fechaFin=:fechaFin,
					responsable=:responsable,
					lugar=:lugar,
                    telefono=:telefono,
                    direccion=:direccion,
					numeroEq=:numeroEq
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
                    ':nombre' =>$nombre,
                    ':fechaInicio' =>$fechaInicio,
                    ':fechaFin' =>$fechaFin,
                    ':responsable' =>$responsable,
                    ':lugar' =>$lugar,
					':telefono' =>$telefono,
					':direccion' =>$direccion,
					':numeroEq' =>$numeroEq,
					':id' =>$id
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
	<title>Editar Campeonato</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>MODIFICAR CAMPEONATO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="responsable" value="<?php if($resultado) echo $resultado['responsable']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="lugar" value="<?php if($resultado) echo $resultado['lugar']; ?>" class="input__text">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text">
                <input type="text" name="numeroEq" value="<?php if($resultado) echo $resultado['numeroEq']; ?>" class="input__text">
			</div>
            <pre>Fecha Inicio  </pre>
            <div class="form-group">
				<p> <input type="date" name="fechaInicio" value="<?php if($resultado) echo $resultado['fechaInicio']; ?>" >
                </p>
                
			</div>
            <pre> Fecha Fin   </pre>
            
            <div class="form-group">
				
                <input type="date" name="fechaFin" value="<?php if($resultado) echo $resultado['fechaFin']; ?>" >
			</div>

			<div class="btn__group">
				<a href="../registrar_campeonato.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>