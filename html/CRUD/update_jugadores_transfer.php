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
		$valores=$_POST['equipo'];
        $estadotransf=$_POST['estadotransf'];
		$id=(int) $_GET['id'];

		if(!empty($estadotransf) ){
				$consulta_update=$con->prepare(' UPDATE jugadores SET  
					
                    equipo=:equipos,
					estadotransf=:estadotransf
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
                   ':equipos' =>$valores,
					':estadotransf' =>$estadotransf,
					':id' =>$id
				));
				header('Location: ../registrar_jugadores.php');
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Transferir Jugadores</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>TRANSFERENCIA DE JUGADORES</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="cedula" value="<?php if($resultado) echo $resultado['cedula']; ?>" class="input__text" required disabled=»disabled»>
				<input type="text" name="nombres" value="<?php if($resultado) echo $resultado['nombres']; ?>" class="input__text" required disabled=»disabled»>
			</div>
			<div class="form-group">
				<input type="text" name="apellidos" value="<?php if($resultado) echo $resultado['apellidos']; ?>" class="input__text" required disabled=»disabled»>
			
			</div>
			<div class="form-group"> 
                <label for="select1"></label>
                 <select name="equipo" id="equipo" class="form-control">
				 <option selected="" disabled="" hidden=""><?php if($resultado) echo $resultado['equipo']; ?></option>
				 
                 <?php  
                         $mysqli = new mysqli('localhost', 'root', '', 'scf');
                         $query = $mysqli -> query ("SELECT * FROM equipo");
                         while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores[nombreClub].'">'.$valores[nombreClub].'</option>';}
                        //echo '<option value="'.$valores[nombreClub].'">'.$valores[nombreClub].'</option>';}
                 ?>
                 </select>
                 
            </div>
			<div class="form-group">
				<input type="text" name="numeroasig" value="<?php if($resultado) echo $resultado['numeroasig']; ?>" class="input__text" required disabled=»disabled»>
                <input type="text" name="pais" value="<?php if($resultado) echo $resultado['pais']; ?>" class="input__text" required disabled=»disabled»>
			</div>
            <div class="form-group">
				<input type="text" name="provincia" value="<?php if($resultado) echo $resultado['provincia']; ?>" class="input__text" required disabled=»disabled»>
                <input type="text" name="ciudad" value="<?php if($resultado) echo $resultado['ciudad']; ?>" class="input__text" required disabled=»disabled»>
			</div>
            <div class="form-group">
				<input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text" required disabled=»disabled»>
                <input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text" required disabled=»disabled»>
			</div>
            <div class="form-group">
				<input type="text" name="posicion" value="<?php if($resultado) echo $resultado['posicion']; ?>" class="input__text" required disabled=»disabled»>
				<input type="text" name="instruccion" value="<?php if($resultado) echo $resultado['instruccion']; ?>" class="input__text" required disabled=»disabled»>
			</div>
            <div class="form-group">
			<label for="select3"></label>
				<select name="estadotransf" value="<?php if($resultado) echo $resultado['estadotransf']; ?>"  class="form-control">
					<option value="0"> Escoga Estado Transferencia</option>
					<option value="Dis">Disponible</option>
					<option value="NoDis">No Disponible</option>
				</select>
			</div>

          <p>Fecha Nacimiento  </p>
            <div class="form-group">
				<input type="date" name="fechanac" value="<?php if($resultado) echo $resultado['fechanac']; ?>" class="input_text" required disabled=»disabled» >
			</div>

			<div class="btn__group">
				<a href="../registrar_jugadores.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>