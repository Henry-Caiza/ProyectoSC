<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
        $imagen=addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
		$cedula=$_POST['cedula'];
        $nombres=$_POST['nombres'];
        $apellidos=$_POST['apellidos'];
        $valores=$_POST['equipo'];
        $numeroasig=$_POST['numeroasig'];
        $pais=$_POST['pais'];   
        $provincia=$_POST['provincia'];
        $ciudad=$_POST['ciudad'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $posicion=$_POST['posicion'];
		$fechanac=$_POST['fechanac'];
        $instruccion=$_POST['instruccion'];
        $estadotransf=$_POST['estadotransf'];
        $fechaMinima= '1980-01-01';
        $fechaMaxima= '2002-01-01';
        //$fechaActual = date("Y-m-d");
        $query="INSERT INTO jugadores(foto,cedula,nombres,apellidos,equipo,numeroasig,pais,provincia,ciudad,direccion,telefono,posicion,fechanac,instruccion,estadotransf) VALUES('$imagen','$cedula','$nombres','$apellidos','$valores','$numeroasig','$pais','$provincia','$ciudad','$direccion','$telefono','$posicion','$fechanac','$instruccion','$estadotransf')";
		$resultado=$con->query($query);
		if(!empty($imagen) && !empty($cedula) && !empty($nombres) && !empty($apellidos)&& !empty($valores) && !empty($numeroasig) && !empty($pais) && !empty($provincia) && !empty($ciudad) && !empty($direccion) && !empty($telefono) && !empty($posicion) && !empty($fechanac) && !empty($instruccion) && !empty($estadotransf) ){
			if(!filter_var($cedula,FILTER_VALIDATE_INT)){
				echo "<script> alert('Cedula no valida');</script>";
            }
            if($fechanac<$fechaMinima || $fechanac>$fechaMaxima){
                echo "<script> alert('Fecha fuera de rango');</script>";
            }
            else{
				$consulta_insert=$con->prepare('INSERT INTO jugadores(foto,cedula,nombres,apellidos,equipo,numeroasig,pais,provincia,ciudad,direccion,telefono,posicion,fechanac,instruccion,estadotransf) VALUES(:Imagen,:cedula,:nombres,:apellidos,:equipos,:numeroasig,:pais,:provincia,:ciudad,:direccion,:telefono,:posicion,:fechanac,:instruccion,:estadotransf)');
				$consulta_insert->execute(array(
                    ':foto' =>$imagen,
                    ':cedula' =>$cedula,
                    ':nombres' =>$nombres,
					':apellidos' =>$apellidos,
                    ':equipos' =>$valores,
                    ':numeroasig' =>$numeroasig,
                    ':pais' =>$pais,
                    ':provincia' =>$provincia,
                    ':ciudad' =>$ciudad,
                    ':direccion' =>$direccion,
					':telefono' =>$telefono,
                    ':posicion'=>$posicion,
                    ':fechanac' =>$fechanac,
                    ':instruccion' =>$instruccion,
                    ':estadotransf' =>$estadotransf
                ));
                
                header('Location: ../registrar_jugadores.php');
            } 
		} else {
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo Jugador</title>
    <link rel="stylesheet" href="../CRUD/css/tabla.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>REGISTRAR JUGADORES</h2>
		<form action="" method="post" onsubmit="return validar(this)" enctype="multipart/form-data">
        <br><h6>&nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Cédula  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   Nombres</h6>

			<div class="form-group">
				<input type="text" name="cedula" placeholder="Cédula" minlegth="10" maxlength="10" class="input__text" required pattern="[0-9]{10}" title="Letras: No. Cantidad Números: 10">
				<input type="text" name="nombres" placeholder="Nombres" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 3. Números: No permitidos">
			</div>
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Apellidos</h6>
			<div class="form-group">
				<input type="text" name="apellidos" placeholder="Apellidos" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 3. Números: No permitidos">
            </div>
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Equipo </h6>
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
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Número Asignado &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; País</h6>
			<div class="form-group">
                <input type="text" name="numeroasig" placeholder="Número Asignado" minlegth="1" maxlength="3" class="input__text" required pattern="[0-9]{1,3}" title="Letras : No. Cantidad Números Máximo: 3">
                <input type="text" name="pais" placeholder="País" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 3. Números: No permitidos">
            </div>
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Provincia &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Ciudad</h6>
            <div class="form-group">
                <input type="text" name="provincia" placeholder="Provincia" minlegth="4" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{4,20}" title="Letras Mínimo: 3. Números: No permitidos">
                <input type="text" name="ciudad" placeholder="Ciudad" minlegth="4" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{4,20}" title="Letras Mínimo: 3. Números: No permitidos">
            </div>
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Dirección &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Teléfono</h6>
            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" minlegth="3" maxlength="30" class="input__text" required pattern="[A-Za-z0-9\sáéíóúÁÉÍÓÚ]{3,30}" title="Letras Mínimo: 3. Caracteres Especiales: No">
                <input type="text" name="telefono" placeholder="Teléfono" minlegth="7" maxlength="10" class=	"input__text" required pattern="[0-9]{7,10}" title="Letras : No. Cantidad Números Máximo: 10">
            </div>
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Posición &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Instrucción</h6>
            <div class="form-group">
                <input type="text" name="posicion" placeholder="Posición" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z\s]{3,20}" title="Letras Mínimo: 3. Números: No permitidos">
                <input type="text" name="instruccion" placeholder="Instrucción" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z\s]{3,20}" title="Letras Mínimo: 3. Números: No permitidos">
            </div>
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Estado de Transferencia</h6>
            <div class="form-group">
			<label for="select3"></label>
				<select name="estadotransf"  class="form-control" required>
					<option selected="" disabled="" hidden="" value=""> Escoga Estado Transferencia</option>
					<option value="Disponible">Disponible</option>
					<option value="No Disponibe">No Disponible</option>
				</select>
            </div>
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Fecha de Nacimiento</h6>
            <div class="form-group">
                <input type="date" name="fechanac" placeholder="Fecha de Nacimiento" min= "<?php $fechat=date("Y-m-d"); echo date("Y-m-d",strtotime($fechat."- 35 years"));?>" max="<?php $fechat=date("Y-m-d"); echo date("Y-m-d",strtotime($fechat."- 18 years"));?>" class="input__text" required>
    
            </div>
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Foto de Jugador</h6>
            <div class="form-group">
                <input type="file" name="Imagen">
            </div>
          
			<div class="btn__group">
				<a href="../registrar_jugadores.php" class="btn btn__danger">Cancelar</a>
                <input type="submit" name="guardar" value="Guardar" class="btn btn__primary"  >
                
            </div>

		</form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript">
     
	  ////////////////////funcion mensaje de datos guardados y validar si el fomulario esta lleno//////////////////////////////		
	function validar(f){
  var ok = true;
  var msg = "Debes escribir contenido en los campos:\n";
  var cedula=f.elements[0].value;
	 var ult_digito=Number(cedula.substr(-1,1));//extraigo el ultimo digito de la cedula
					var valor2=Number(cedula.substr(1, 1));
					var valor4=Number(cedula.substr(3, 1));
					var valor6=Number(cedula.substr(5, 1));
					var valor8=Number(cedula.substr(7, 1));
					var suma_pares=(valor2 + valor4 + valor6 + valor8);
					var valor1=Number(cedula.substr(0, 1));
					 valor1=(valor1 * 2);
					if(valor1>9){ valor1=(valor1 - 9); }
					var valor3=Number(cedula.substr(2, 1));
					 valor3=(valor3 * 2);
					if(valor3>9){ valor3=(valor3 - 9); }
					var valor5=Number(cedula.substr(4, 1));
					 valor5=(valor5 * 2);
					if(valor5>9){ valor5=(valor5 - 9); }
					var valor7=Number(cedula.substr(6, 1));
					 valor7=(valor7 * 2);
					if(valor7>9){ valor7=(valor7 - 9); }
					var valor9=Number(cedula.substr(8, 1));
					 valor9=(valor9 * 2);
					if(valor9>9){ valor9=(valor9 - 9); }
					var suma_impares=(valor1 + valor3 + valor5 + valor7 + valor9);
					 suma=(suma_pares + suma_impares);
					 var p=String(suma);
					var dis=Number(p.substr(0,1));//extraigo el primer numero de la suma
					dis=((dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
					var digito=(dis - suma);
					if(digito==10){ digito=0; }//si la suma nos resulta 10, el decimo digito es cero
					if (digito!=ult_digito){//comparo los digitos final y ultimo
						alert("Cédula Incorrecta"); 
						ok = false;
					}
  if(f.elements[0].value == "")
  {
	alert("Campo no ingresado"); 
    ok = false;
  }

  if(f.elements[2].value == "")
  {
	alert("Campo no ingresado"); 
    ok = false;
  }

  if(f.elements[3].value == "")
  {
	alert("Campo no ingresado"); 
    ok = false;
  }
  if(f.elements[4].value == "")
  {
	alert("Campo no ingresado"); 
    ok = false;
  }
  if(f.elements[5].value == "")
  {
	alert("Campo no ingresado"); 
    ok = false;
  }
  if((f.elements[6].value.length >=7 && f.elements[6].value.length <=8)|| (f.elements[6].value.length >=0 && f.elements[6].value.length <=7))
  {
	alert("Número de telefono incorrecto"); 
    ok = false;
  }

  if(ok == true && confirm('¿Desea guardar los datos?') == true)
  alert('Datos guardados');
	else {alert("Datos no guardados");
		ok = false;
	}
  return ok;
}
////////////////////funcion mensaje de datos guardados y validar si el fomulario esta lleno/////////////
    </script>
</body>
</html>
