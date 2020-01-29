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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR CAMPEONATOS</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre Campeonato" class="input__text" required>
				<input type="text" name="responsable" placeholder="Responsable" class="input__text" required>
			</div>
			<div class="form-group">
				<input type="text" name="lugar" placeholder="Lugar" class="input__text" required>
                <input type="text" name="telefono" placeholder="Teléfono" class="input__text" required>
			</div>
			
			<div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" class="input__text" required>
                <label for="select2"></label>
				<select name="numeroEq"  class="form-control">
					<option value="0">Escoga número de equipos</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
				</select>
				
            </div>
			
			<p>Inicio:</p>
			<div class="form-group">
                <input type="date" name="fechaInicio" placeholder="Fecha Inicio" class="input__text" required>
				<p> Fin:</p>
                <input type="date" name="fechaFin" placeholder="Fecha Fin" class="input__text" required>
            </div>
           
			<div class="btn__group">
				<a href="../registrar_campeonato.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
