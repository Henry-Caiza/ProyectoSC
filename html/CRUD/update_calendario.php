<?php
	include_once 'conexion.php';

	if(isset($_GET['id']) ){
		$id=(int) $_GET['id'];
		$buscar_id=$con->prepare('SELECT * FROM tablaresultadoscopia WHERE id=:id LIMIT 1');
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
        $valores=$_POST['nombreArbitro'];
        $eqVocalia=$_POST['eqVocalia'];
		$equipo1=$_POST['equipo1'];
		$goles_equipo1=$_POST['goles_equipo1'];
        $tarj_ama_eq1=$_POST['tarj_ama_eq1'];
        $tarj_roj_eq1=$_POST['tarj_roj_eq1']; 
	/*	$goles_equipo1=(int) $_GET['goles_equipo1'];
        $tarj_ama_eq1=(int) $_GET['tarj_ama_eq1'];
		$tarj_roj_eq1=(int) $_GET['tarj_roj_eq1'];
		$equipo2=$_POST['equipo2'];
		$goles_equipo2=(int) $_GET['goles_equipo2'];
        $tarj_ama_eq2=(int) $_GET['tarj_ama_eq2'];
		$tarj_roj_eq2=(int) $_GET['tarj_roj_eq2']; */
		$equipo2=$_POST['equipo2'];
		$goles_equipo2=$_POST['goles_equipo2'];
        $tarj_ama_eq2=$_POST['tarj_ama_eq2'];
        $tarj_roj_eq2=$_POST['tarj_roj_eq2'];
		$id=(int) $_GET['id'];
		
		$hora_inicial = '10:00';
		$hora_final = '17:00';

		$fechaActual = date("Y-m-d");
		$mysqli = new mysqli('localhost', 'root', '', 'scf');
		$consultaFin = $mysqli -> query ("SELECT fechaFin FROM campeonato where nombre = 'camp1'");
		$consultaInicio = $mysqli -> query ("SELECT fechaInicio FROM campeonato where nombre = 'camp1'");
        while($filas=mysqli_fetch_assoc($consultaFin)){
		   $fechaFin=$filas['fechaFin'];
	   	}
	   	while($filas=mysqli_fetch_assoc($consultaInicio)){
		$fechaInicio=$filas['fechaInicio'];
	}
	//	$datos = mysql_query($fechaFin);
		if(!empty($fechaJuego) && !empty($horario) && !empty($cancha) ){
			if($fechaJuego < $fechaActual){
				echo "<script> alert('La fecha ingresada es pasada, debe ingresar una fecha actual');</script>";
			}
			else
				if($fechaJuego > $fechaFin){
					echo "<script> alert('La fecha ingresada es mayor a la de finalización del campeonato');</script>";
				}
				else
					if($fechaJuego < $fechaInicio){
						echo "<script> alert('La fecha ingresada es menor a la de inicio del campeonato');</script>";
					}
					else
						if($equipo1==$equipo2){
							echo "<script> alert('No se puede ingresar Equipos iguales. Intentelo de nuevo.');</script>";
						}
						else///////////////////////////////////////////VALIDAR LA HORA///////////////////////////////////
						if($horario < $hora_inicial && $horario > $hora_final){
							echo "<script> alert('El horario ingresado es incorrecto');</script>";
						}///////////////////////////////////////////VALIDAR LA HORA///////////////////////////////////
						else{
				$consulta_update=$con->prepare(' UPDATE tablaresultadoscopia SET  
					fechaJuego=:fechaJuego,
					horario=:horario,
                    cancha=:cancha,
					nombreArbitro=:nombreArbitro,
                    eqVocalia=:eqVocalia,
                    equipo1=:equipo1,
					goles_equipo1=:goles_equipo1,
                    tarj_ama_eq1=:tarj_ama_eq1,
					tarj_roj_eq1=:tarj_roj_eq1,
					equipo2=:equipo2,
					goles_equipo2=:goles_equipo2,
					tarj_ama_eq2=:tarj_ama_eq2,
                    tarj_roj_eq2=:tarj_roj_eq2
					WHERE id=:id;'
				);
				$consulta_update->execute(array(
                    ':fechaJuego' =>$fechaJuego,
                    ':horario' =>$horario,
					':cancha' =>$cancha,
                    ':nombreArbitro' =>$valores,
					':eqVocalia' =>$eqVocalia,
					':equipo1' =>$equipo1,
					':goles_equipo1' =>$goles_equipo1,
                    ':tarj_ama_eq1' =>$tarj_ama_eq1,
                    ':tarj_roj_eq1' =>$tarj_roj_eq1,
					':equipo2' =>$equipo2,
					':goles_equipo2' =>$goles_equipo2,
					':tarj_ama_eq2' =>$tarj_ama_eq2,
                    ':tarj_roj_eq2' =>$tarj_roj_eq2,
					':id' =>$id
				));
				header('Location: ../Registrar_calendario.php');
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
	<title>Editar calendario</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>MODIFICAR CALENDARIO</h2>
		<form action="" method="post" onsubmit="return validar(this)">
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Horario&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; Cancha </h6>
			<div class="form-group">
				<input type="time" name="horario" value="<?php if($resultado) echo $resultado['horario']; ?>"  min="10:00" max="17:00" class="input__text" required>
				<input type="text" name="cancha" value="<?php if($resultado) echo $resultado['cancha']; ?>" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z0-9\sáéíóú]{3,20}" title="Letras Mínimo: 3. Caracteres Especiales:No">
				
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fecha de Juego &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; Vocalía </h6>
			<div class="form-group">
				<input type="date" name="fechaJuego" value="<?php if($resultado) echo $resultado['fechaJuego']; ?>" min= "<?php $mysqli = new mysqli('localhost', 'root', '', 'scf'); $consultaInicio = $mysqli -> query ("SELECT fechaInicio FROM campeonato where nombre = 'camp1'"); while($filas=mysqli_fetch_assoc($consultaInicio)){ $fechaInicio=$filas['fechaInicio'];} echo $fechaInicio;?>" 
				max="<?php $mysqli = new mysqli('localhost', 'root', '', 'scf'); $consultaFin = $mysqli -> query ("SELECT fechaFin FROM campeonato where nombre = 'camp1'"); while($filas=mysqli_fetch_assoc($consultaFin)){ $fechaFin=$filas['fechaFin'];} echo $fechaFin;?>" class="input__text" required>
				<input type="text" name="eqVocalia" value="<?php if($resultado) echo $resultado['eqVocalia']; ?>" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z0-9\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 3. Caracteres Especiales:No">
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Nombre de Árbitro</h6>
			<div class="form-group">
				<label for="select1"></label>
				<select autofocus name="nombreArbitro" id="nombreArbitro" class="form-control">
					<option selected=""  hidden=""value="<?php if($resultado) echo $resultado['nombreArbitro']; ?>" ><?php if($resultado) echo $resultado['nombreArbitro']; ?></option>
					<?php  
                        $mysqli = new mysqli('localhost', 'root', '', 'scf');
                        $query = $mysqli -> query ("SELECT * FROM personal");
                        while ($valores = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores[nombre].'">'.$valores[nombre].'</option>';
						}
                 	?>
                </select>
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Equipo 1</h6>
			<div class="form-group">
				<label for="select2"></label>
				<select autofocus name="equipo1" id="equipo1" class="form-control">
					<option selected=""  hidden="" value="<?php if($resultado) echo $resultado['equipo1']; ?>" ><?php if($resultado) echo $resultado['equipo1']; ?></option>
					<?php  
                        $mysqli = new mysqli('localhost', 'root', '', 'scf');
                        $query = $mysqli -> query ("SELECT * FROM equipo");
                        while ($valores1 = mysqli_fetch_array($query)) {
							echo '<option value="'.$valores1[nombreClub].'">'.$valores1[nombreClub].'</option>';
						}
                 	?>
                </select>
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Equipo 2</h6>
			<div class="form-group">
				<label for="select3"></label>
				<select autofocus name="equipo2" id="equipo2" class="form-control">
					<option selected="" hidden="" value="<?php if($resultado) echo $resultado['equipo2']; ?>" ><?php if($resultado) echo $resultado['equipo2']; ?></option>
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
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary" >
			</div>
			
				<input style="visibility: hidden" type="text" name="goles_equipo1" value="<?php if($resultado) echo $resultado['goles_equipo1']; ?>" class="input__text" readonly="readonly">
                <input style="visibility: hidden" type="text" name="tarj_ama_eq1" value="<?php if($resultado) echo $resultado['tarj_ama_eq1']; ?>" class="input__text" readonly="readonly">
                <input style="visibility: hidden" type="text" name="tarj_roj_eq1" value="<?php if($resultado) echo $resultado['tarj_roj_eq1']; ?>" class="input__text" readonly="readonly">
				<input style="visibility: hidden" type="text" name="goles_equipo2" value="<?php if($resultado) echo $resultado['goles_equipo2']; ?>" class="input__text" readonly="readonly">
                <input style="visibility: hidden" type="text" name="tarj_ama_eq2" value="<?php if($resultado) echo $resultado['tarj_ama_eq2']; ?>" class="input__text" readonly="readonly">
                <input style="visibility: hidden" type="text" name="tarj_roj_eq2" value="<?php if($resultado) echo $resultado['tarj_roj_eq2']; ?>" class="input__text" readonly="readonly">
			
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
	alert("Campo horario incorrecto"); 
    ok = false;
  }else
  if(f.elements[1].value == "")
  {
	alert("Campo cancha incorrecto"); 
    ok = false;
  }else
  if(f.elements[2].value == "")
  {
	alert("Campo fecha de juego incorrecto"); 
    ok = false;
  }else
  if(f.elements[3].value == "")
  {
	alert("Campo vocalia incorrecto"); 
    ok = false;
  }else
  if(f.elements[4].value == "")
  {
	alert("Campo árbitro no ingresado");
    ok = false;
  }else
  if(f.elements[5].value == "")
  {
	alert("Campo equipo 1 no ingresado");
    ok = false;
  }else
  if(f.elements[6].value == "")
  {
	alert("Campo equipo 2 no ingresado"); 
    ok = false;
  }else
  if(f.elements[5].value == f.elements[6].value)
    {
		alert("No se permiten equipos repetidos"); 
    ok = false;
  	}
  
  if(ok == true && confirm('¿Desea modificar los datos?') == true)
  alert('Datos modificados');
	else {alert("Datos no modificados");
		ok = false;
	}
  return ok;
}
////////////////////funcion mensaje de datos guardados y validar si el fomulario esta lleno////////////////
	</script>
</body>
</html>