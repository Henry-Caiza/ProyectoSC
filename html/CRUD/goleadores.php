<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){;
		$nombreClub = $_POST['equipo'];
		$nombrejug = $_POST['nombrejug'];
		$goles = $_POST['goles'];
		$query="INSERT INTO goleadores(nombreClub,nombrejug,goles) VALUES('$nombreClub','$nombrejug','$goles')";
		$resultado=$con->query($query);
		header('Location: ../Reportes.php');
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" sizes="16x16" href="logo.png">
	<title>Goleadores</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>Goleadores</h2>
		<form action="" method="POST" onsubmit="return validar(this)" enctype="multipart/form-data">

        <div class="form-group"> 
                <label for="select1"></label>
                 <select name="equipo" id="equipo" class="form-control" required>
                 <option selected="" disabled="" hidden="" value="">Escoja un equipo</option>
                 <?php  
                         $mysqli = new mysqli('localhost', 'root', '', 'scf');
                         $query = $mysqli -> query ("SELECT * FROM equipo");
                         while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[nombreClub].'">'.$valores[nombreClub].'</option>';}
                 ?>
                 </select>
                 
            </div>


            <div class="form-group"> 
                <label for="select1"></label>
                 <select name="nombrejug" id="equipo" class="form-control" required>
                 <option selected="" disabled="" hidden="" value="">Jugador</option>
                 <?php  
                        
                         $mysqli = new mysqli('localhost', 'root', '', 'scf');
                         $query = $mysqli -> query ("SELECT * FROM jugadores ");
                         while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[nombres].'">'.$valores[nombres].'</option>';}
                 ?>
                 </select>
            </div>

            <div class="form-group">
				<input type="text" name="goles" placeholder="goles" class="input__text >
            </div>

			<div class="btn__group">
				<a href="../Reportes.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
