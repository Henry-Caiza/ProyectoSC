<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$fechaJuego=$_POST['fechaJuego'];
        $horario=$_POST['horario'];
        $cancha=$_POST['cancha'];
        $valores=$_POST['nombreArbitro'];
        $eqVocalia=$_POST['eqVocalia'];
        $valores1=$_POST['equipo1'];
		$valores2=$_POST['equipo2'];
		$nombrecamp=$_POST['nombrecamp'];

		$fechaActual = date("Y-m-d");
		
		$mysqli = new mysqli('localhost', 'root', '', 'scf');
		$consultaFin = $mysqli -> query ("SELECT fechaFin FROM campeonato where nombre = '$nombrecamp'");
		$consultaInicio = $mysqli -> query ("SELECT fechaInicio FROM campeonato where nombre = '$nombrecamp'");
        while($filas=mysqli_fetch_assoc($consultaFin)){
		   	$fechaFin=$filas['fechaFin'];
	   	}
	   	while($filas=mysqli_fetch_assoc($consultaInicio)){
			$fechaInicio=$filas['fechaInicio'];
		}

		if(!empty($fechaJuego) && !empty($horario) && !empty($cancha) && !empty($valores) && !empty($eqVocalia) && !empty($valores1) && !empty($valores2) ){
			if($fechaJuego < $fechaActual){
				echo "<script> alert('La fecha ingresada es incorrecta');</script>";
			}
			if($fechaJuego > $fechaFin){
				echo "<script> alert('La fecha ingresada es mayor a la de finalización del campeonato');</script>";
			}
			else{
				if($fechaJuego < $fechaInicio){
					echo "<script> alert('La fecha ingresada es menor a la de inicio del campeonato');</script>";
				}else
				if($valores1==$valores2){
					echo "<script> alert('No se puede ingresar Equipos iguales. Intentelo de nuevo.');</script>";
				}
				else
					if($horario < "07:00" && $horario > "15:00"){
						echo "<script> alert('El horario ingresado es incorrecto');</script>";
					}else{
					$consulta_insert=$con->prepare('INSERT INTO tablaresultadoscopia(fechaJuego,horario,cancha,nombreArbitro,eqVocalia,equipo1,equipo2) VALUES(:fechaJuego,:horario,:cancha,:nombreArbitros,:eqVocalia,:equipos1,:equipos2)');
					$consulta_insert->execute(array(
                    ':fechaJuego' =>$fechaJuego,
                    ':horario' =>$horario,
					':cancha' =>$cancha,
                    ':nombreArbitros' =>$valores,
					':eqVocalia' =>$eqVocalia,
					':equipos1' =>$valores1,
                    ':equipos2' =>$valores2
					));
					header('Location: ../Registrar_calendario.php');
				}
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
	<link rel="icon" type="image/png" sizes="16x16" href="logo.png">
	<title>Nuevo Calendario</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR CALENDARIOS</h2>
		<form action="" method="post" onsubmit="return validar(this)">
		<div class="form-group">
		<select name="nombrecamp" id="nombrecamp" class="form-control" required>
                 <option selected="" disabled="" hidden="" value="">Escoja un Campeonato</option>
                 <?php  
                         $mysqli = new mysqli('localhost', 'root', '', 'scf');
                         $query = $mysqli -> query ("SELECT * FROM campeonato");
                         while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[nombre].'">'.$valores[nombre].'</option>';}
                 ?>
                 </select>

		</div>
		<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Horario&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; Cancha </h6>
			<div class="form-group">
				<input type="time" name="horario" placeholder="Horario" min="10:00" max="17:00"  class="input__text" required>
				<input type="text" name="cancha" placeholder="Cancha" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z0-9\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 3. Caracteres Especiales:No">
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fecha de Juego &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; Vocalía </h6>
            <div class="form-group">
                <input type="date" name="fechaJuego" placeholder="Fecha de Juego" min= "<?php $mysqli = new mysqli('localhost', 'root', '', 'scf'); $consultaInicio = $mysqli -> query ("SELECT fechaInicio FROM campeonato where nombre = 'camp1'"); while($filas=mysqli_fetch_assoc($consultaInicio)){ $fechaInicio=$filas['fechaInicio'];} echo $fechaInicio;?>" 
				max="<?php $mysqli = new mysqli('localhost', 'root', '', 'scf'); $consultaFin = $mysqli -> query ("SELECT fechaFin FROM campeonato where nombre = 'camp1'"); while($filas=mysqli_fetch_assoc($consultaFin)){ $fechaFin=$filas['fechaFin'];} echo $fechaFin;?>" class="input__text" required>
				<input type="text" name="eqVocalia" placeholder="Vocalía" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z0-9\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 3. Caracteres Especiales:No">
            </div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nombre de Árbitro</h6>
			<div class="form-group">
			<label for="select3"></label>
                 <select name="nombreArbitro" id="nombreArbitro" class="form-control" required>
                 <option selected="" disabled="" hidden="" value="">Escoja un Arbitro</option>
                 <?php  
                         $mysqli = new mysqli('localhost', 'root', '', 'scf');
                         $query = $mysqli -> query ("SELECT * FROM personal");
                         while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[nombre].'">'.$valores[nombre].'</option>';}
                 ?>
                 </select>
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Equipo 1</h6>
			<div class="form-group">
				<label for="select4"></label>
					<select name="equipo1" id="equipo1" class="form-control" required>
					<option selected="" disabled="" hidden="" value="">Escoja un Equipo</option>
					<?php  
							$mysqli = new mysqli('localhost', 'root', '', 'scf');
							$query = $mysqli -> query ("SELECT * FROM equipo");
							while ($valores1 = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores1[nombreClub].'">'.$valores1[nombreClub].'</option>';}
					?>

					</select>
            </div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Equipo 2</h6>
			<div class="form-group">
			<label for="select5"></label>
					<select name="equipo2" id="equipo2" class="form-control" required>
					<option selected="" disabled="" hidden="" value="">Escoja un Equipo</option>
					<?php  
							$mysqli = new mysqli('localhost', 'root', '', 'scf');
							$query = $mysqli -> query ("SELECT * FROM equipo");
							while ($valores2 = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores2[nombreClub].'">'.$valores2[nombreClub].'</option>';}
					?>
					</select>
            </div>
			<div class="btn__group">
				<a href="../Registrar_calendario.php" class="btn btn__danger">Cancelar</a>
				<input type="submit"  name="guardar" value="Guardar" class="btn btn__primary" >
			</div>
		</form>
	</div>

	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script type = "text/javascript" >
////////////////////funcion mensaje de datos guardados y validar si el fomulario esta lleno//////////////////////////////		
	function validar(f){
  var ok = true;
  var msg = "Debes escribir contenido en los campos:\n";
  if(f.elements[0].value == "")
  {
    ok = false;
  }

  if(f.elements[1].value == "")
  {
    ok = false;
  }

  if(f.elements[2].value == "")
  {
    ok = false;
  }
  if(f.elements[3].value == "")
  {
    ok = false;
  }
  if(f.elements[4].value == "Escoja un Arbitro")
  {
	alert("Escoja un Árbitro"); 
    ok = false;
  }else
  if(f.elements[5].value == "Escoja un Equipo")
  {
	alert("Escoja el equipo 1"); 
    ok = false;
  }else
  if(f.elements[6].value == "Escoja un Equipo")
  {
	alert("Escoja el equipo 2"); 
    ok = false;
  }else
  if(f.elements[5].value == f.elements[6].value)
    {
		alert("No se permiten equipos repetidos"); 
    ok = false;
  	}
  
  if(ok == true && confirm('¿Desea guardar los datos?') == true)
  alert('Datos guardados');
	else {alert("Datos no guardados");
		ok = false;
	}
  return ok;
}
////////////////////funcion mensaje de datos guardados y validar si el fomulario esta lleno////////////////
	</script>
	
</body>
</html>
