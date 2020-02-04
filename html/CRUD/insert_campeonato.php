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
		$fechaActual = date("Y-m-d");
		
		if(!empty($nombre) && !empty($fechaInicio) && !empty($fechaFin) && !empty($responsable) && !empty($lugar) && !empty($telefono) && !empty($direccion) && !empty($numeroEq) ){
			if($fechaInicio < $fechaActual || $fechaFin< $fechaActual  ){
				echo "<script> alert('La fecha ingresada es incorrecta');</script>";
			}else{
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
	<title>Nuevo Campeonato</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR CAMPEONATOS</h2>
		<form action="" method="post" onsubmit="return validar(this)">
		<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nombre de Campeonato&nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Responsable del Campeonato</h6>
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombre Campeonato" minlegth="5" maxlength="20" class="input__text" required pattern="[A-Za-z0-9\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 5. Caracteres Especiales: No Permitidos">
				<input type="text" name="responsable" placeholder="Responsable" minlegth="7" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{7,20}" title="Letras Mínimo: 7. Números: No permitidos">
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Lugar&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Teléfono</h6>
			<div class="form-group">
				<input type="text" name="lugar" placeholder="Lugar" minlegth="5" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{5,20}" title="Letras Mínimo: 5. Números: No permitidos">
                <input type="tel" name="telefono" placeholder="Teléfono" minlegth="9" maxlength="10" class="input__text" required pattern="[0-9]{9,10}" title="Letras : No. Cantidad Números Máximo: 10 Mínimo: 9">
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Dirección</h6>
			<div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" minlegth="3" maxlength="30" class="input__text" required pattern="[A-Za-z0-9\sáéíóú]{3,30}" title="Letras Mínimo: 3. Caracteres Especiales: No">
            </div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Número de Equipos</h6>
			<div class="form-group">
				<label for="select2" required></label>
				<select name="numeroEq"  class="form-control" required> 
					<option selected="" disabled="" hidden="" value="">Escoja número de equipos </option>
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
			<br><h6> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fecha de Inicio &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fecha de Finalización</h6>
			<div class="form-group">
                <input type="date" name="fechaInicio" placeholder="Fecha Inicio" min= "<?php $fechat=date("Y-m-d"); echo $fechat;?>" max="2030-12-31" class="input__text" required>
                <input type="date" name="fechaFin" placeholder="Fecha Fin" min= "<?php $fechat=date("Y-m-d"); echo date("Y-m-d",strtotime($fechat."+ 3 month"));?>" max="2031-12-31" class="input__text" required>
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
<script type = "text/javascript" >
		function preguntar(){	
    		if(confirm('Desea guardar los datos?')){
				return true;
   	 		}
    		else {
				alert("Datos no guardados");
    			return false;
    		}
		}
////////////////////funcion mensaje de datos guardados y validar si el fomulario esta lleno//////////////////////////////		
	function validar(f){
  var ok = true;
  var msg = "Debes escribir contenido en los campos:\n";

  if(f.elements[0].value == "")
  {
    ok = false;
  }else
  if(f.elements[1].value == "")
  {
    ok = false;
  }else
  if(f.elements[2].value == "")
  {
    ok = false;
  }else
  if((f.elements[3].value.length >=7 && f.elements[3].value.length <=8)|| (f.elements[3].value.length >=0 && f.elements[3].value.length <=7))
  {
	alert("Número de telefono incorrecto"); 
    ok = false;
  }else
  if(f.elements[4].value == "")
  {
	ok = false;
  }else
  if(f.elements[5].value == "Escoja un Equipo")
  {
	alert("Escoja un número de equipos"); 
    ok = false;
  }else
  if(f.elements[7].value <= f.elements[6].value)
  {
	alert('Fecha de fin debe ser mayor a la fecha de inicio');
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
