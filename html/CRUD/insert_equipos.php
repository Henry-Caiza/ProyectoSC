<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){;
		$imagen=addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
		$nombreClub = $_POST['nombreClub'];
		$nombrePresi = $_POST['nombrePresi'];
		$localidad = $_POST['localidad'];
		$telefono = $_POST['telefono'];
		$email = $_POST['email'];
		$numMaxjug = $_POST['numMaxjug'];

		$query="INSERT INTO equipo(escudo,nombreClub,nombrePresi,localidad,telefono,email,numMaxjug) VALUES('$imagen','$nombreClub','$nombrePresi','$localidad','$telefono','$email','$numMaxjug')";
		$resultado=$con->query($query);
		header('Location: ../registrarequipo.php');
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Equipo</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR EQUIPO</h2>
		<form action="" method="POST" onsubmit="return validar(this)" enctype="multipart/form-data">
		<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nombre de Equipo &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nombre de Presidente</h6>
			<div class="form-group">
				<input type="text" name="nombreClub" placeholder="Nombre del Club"  minlegth="5" maxlength="20" class="input__text" required pattern="[A-Za-z0-9\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 5. Caracteres Especiales: No Permitidos">
				<input type="text" name="nombrePresi" placeholder="Nombre del Presidente" minlegth="7" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{7,20}" title="Letras Mínimo: 7. Números: No permitidos">
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Localidad &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Teléfono</h6>
			<div class="form-group">
				<input type="text" name="localidad" placeholder="Localidad"  minlegth="5" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{5,20}" title="Letras Mínimo: 5. Números: No permitidos">
                <input type="text" name="telefono" placeholder="Teléfono" minlegth="9" maxlength="10" class="input__text" required pattern="[0-9]{9,10}" title="Letras : No. Cantidad Números Máximo: 10 Mínimo: 9">
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Correo Electrónico</h6>
			<div class="form-group">
                <input type="text" name="email" placeholder="Email" minlegth="10" maxlength="30" class="input__text" required pattern="[a-zA-Z0-9_-]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="No es un correo válidos">
            </div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Número de Equipos</h6>
			<div class="form-group">
			<label for="select2"></label>
				<select name="numMaxjug"  class="form-control" required>
					<option selected="" disabled="" hidden="" value="">Escoga número jugadores</option>
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
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Escudo del Equipo</h6>
			<div class="form-group">
                <input type="file" name="Imagen">
            </div>

			

			<div class="btn__group">
				<a href="../registrarequipo.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
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
  if((f.elements[3].value.length >=7 && f.elements[3].value.length <=8)|| (f.elements[3].value.length >=0 && f.elements[3].value.length <=7))
  {
	alert("Número de telefono incorrecto"); 
    ok = false;
  }
  if(f.elements[4].value == "")
  {
    ok = false;
  }
  if(f.elements[5].value == "")
  {
    ok = false;
  }
  if(f.elements[6].value == "")
  {
    ok = false;
  }
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
