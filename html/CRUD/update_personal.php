<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM personal WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: ../Registro_Personal.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$cedula=$_POST['cedula'];
		$email=$_POST['email'];
        $telefono=$_POST['telefono'];
        $direccion=$_POST['direccion'];
        $cargo=$_POST['cargo'];
		$id=(int) $_GET['id'];
		$total_caracteres=strlen($cedula);// se suma el total de caracteres
		if(!empty($nombre) && !empty($apellido) && !empty($cedula) && !empty($email) && !empty($telefono) && !empty($direccion)  ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Email no valido');</script>";
				}
			//else{
				/*if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
					echo "<script> alert('Correo no valido');</script>";
					}*/
			//	}
			else{
			if($total_caracteres!==10){//compruebo que tenga 10 digitos la cedula
				echo "<script> alert('Solo debe contener 10 digitos');</script>";
			}else{
				$nro_region=substr($cedula, 0,2);//extraigo los dos primeros caracteres de izq a der
				if($nro_region<=1 && $nro_region>=24){// compruebo a que region pertenece esta cedula//
					echo "<script> alert('Cedula incorrecta');</script>";
				}else{
					$ult_digito=substr($cedula, -1,1);//extraigo el ultimo digito de la cedula
					//extraigo los valores pares//
					$valor2=substr($cedula, 1, 1);
					$valor4=substr($cedula, 3, 1);
					$valor6=substr($cedula, 5, 1);
					$valor8=substr($cedula, 7, 1);
					$suma_pares=($valor2 + $valor4 + $valor6 + $valor8);
					//extraigo los valores impares//
					$valor1=substr($cedula, 0, 1);
					$valor1=($valor1 * 2);
					if($valor1>9){ $valor1=($valor1 - 9); }else{ }
					$valor3=substr($cedula, 2, 1);
					$valor3=($valor3 * 2);
					if($valor3>9){ $valor3=($valor3 - 9); }else{ }
					$valor5=substr($cedula, 4, 1);
					$valor5=($valor5 * 2);
					if($valor5>9){ $valor5=($valor5 - 9); }else{ }
					$valor7=substr($cedula, 6, 1);
					$valor7=($valor7 * 2);
					if($valor7>9){ $valor7=($valor7 - 9); }else{ }
					$valor9=substr($cedula, 8, 1);
					$valor9=($valor9 * 2);
					if($valor9>9){ $valor9=($valor9 - 9); }else{ }
					$suma_impares=($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
					
					$suma=($suma_pares + $suma_impares);
					$dis=substr($suma, 0,1);//extraigo el primer numero de la suma
					$dis=(($dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
					$digito=($dis - $suma);
					if($digito==10){ $digito='0'; }else{ }//si la suma nos resulta 10, el decimo digito es cero
					if ($digito!=$ult_digito){//comparo los digitos final y ultimo
						echo "<script> alert('Cédula Incorrecta');</script>";
					}else{
				
					$consulta_update=$con->prepare(' UPDATE personal SET  
						nombre=:nombre,
						apellido=:apellido,
                    	cedula=:cedula,
						email=:email,
    	                telefono=:telefono,
        	            direccion=:direccion,
						cargo=:cargo
						WHERE id=:id;'
					);
					$consulta_update->execute(array(
	                    ':nombre' =>$nombre,
    	                ':apellido' =>$apellido,
        	            ':cedula' =>$cedula,
            	        ':email' =>$email,
						':telefono' =>$telefono,
						':direccion' =>$direccion,
						':cargo' =>$cargo,
						':id' =>$id
					));
					header('Location: ../Registro_Personal.php');
				}
			}
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
	<title>Editar Personal</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>MODIFICAR PERSONAL ARBITRARIO</h2>
		<form action="" method="post" onsubmit="return validar(this)">
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Nombres &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Apellidos</h6>
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 3. Números: No permitidos">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" minlegth="3" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{3,20}" title="Letras Mínimo: 3. Números: No permitidos">
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Cédula &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Correo Electrónico</h6>
			<div class="form-group">
				<input type="text" name="cedula" value="<?php if($resultado) echo $resultado['cedula']; ?>" minlegth="10" maxlength="10" class="input__text" required pattern="[0-9]{10}" title="Letras: No. Cantidad Números: 10">
				<input type="text" name="email" value="<?php if($resultado) echo $resultado['email']; ?>"  minlegth="10" maxlength="30" class="input__text" required pattern="[a-zA-Z0-9_-]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" title="No es un correo válidos">
			</div>
			<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Teléfono &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Dirección</h6>
			<div class="form-group">
				<input type="tel" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" minlegth="9" maxlength="10" class=	"input__text" required pattern="[0-9]{9,10}" title="Letras : No. Cantidad Números Máximo: 10">
                <input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" minlegth="3" maxlength="30" class="input__text" required pattern="[A-Za-z0-9\sáéíóúÁÉÍÓÚ]{3,30}" title="Letras Mínimo: 3. Caracteres Especiales: No">
			</div>
            <br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Tipo de Árbitro</h6>
            <div class="form-group">
			    <input type="text" name="cargo" value="<?php if($resultado) echo $resultado['cargo']; ?>"  minlegth="5" maxlength="20" class="input__text" required pattern="[A-Za-z\sáéíóúÁÉÍÓÚ]{5,20}" title="Letras Mínimo: 5. Números: No permitidos">
                
			</div>
			<div class="btn__group">
				<a href="../Registro_Personal.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary" onclick="validar()">
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
  var cedula=f.elements[2].value;
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
  if((f.elements[4].value.length >=7 && f.elements[4].value.length <=8)|| (f.elements[4].value.length >=0 && f.elements[4].value.length <=7))
  {
	alert("Número de telefono incorrecto"); 
    ok = false;
  }
  if(f.elements[5].value == "")
  {
	alert("Campo no ingresado"); 
    ok = false;
  }
  if(f.elements[6].value == "")
  {
	alert("Campo no ingresado"); 
    ok = false;
  }

  if(ok == true && confirm('¿Desea modificar los datos?') == true)
  alert('Datos modificados');
	else {alert("Datos no modificados");
		ok = false;
	}
  return ok;
}
////////////////////funcion mensaje de datos guardados y validar si el fomulario esta lleno/////////////
    </script>
</body>
</html>