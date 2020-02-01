<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$cedula=$_POST['cedula'];
		$email=$_POST['email'];
		$telefono=$_POST['telefono'];
		$direccion=$_POST['direccion'];
		$cargo=$_POST['cargo'];

		if(!empty($nombre) && !empty($apellido) && !empty($cedula) && !empty($email) && !empty($telefono) && !empty($direccion)  && !empty($cargo) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}
			if( !filter_var($cedula,FILTER_VALIDATE_INT)){
				$cedula2=validarCI($cedula);
				if($cedula2=="Cedula Cedula Incorrecta" ){
					echo "<script> alert('Cédula no valida');</script>";
				}
			}
			
			else{
				$consulta_insert=$con->prepare('INSERT INTO personal(nombre,apellido,cedula,email,telefono,direccion,cargo) VALUES(:nombre,:apellido,:cedula,:email,:telefono,:direccion,:cargo)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':cedula' =>$cedula,
					':email' =>$email,
					':telefono' =>$telefono,
					':direccion' =>$direccion,
					':cargo'=>$cargo
				));
				header('Location: ../Registro_Personal.php');
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
	<title>Nuevo Personal</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR PERSONAL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="Nombres" class="input__text" required>
				<input type="text" name="apellido" placeholder="Apellidos" class="input__text" required>
			</div>
			<div class="form-group">
				<input type="text" name="cedula" placeholder="Cédula" class="input__text" required>
                <input type="text" name="email" placeholder="Correo electrónico" class="input__text" required>
			</div>
			<div class="form-group">
                <input type="text" name="telefono" placeholder="Teléfono" class="input__text" required>
                <input type="text" name="direccion" placeholder="Dirección" class="input__text" required>
            </div>
			<div class="form-group">
                <input type="text" name="cargo" placeholder="Cargo" class="input__text" required>
                
            </div>
			<div class="btn__group">
				<a href="../Registro_Personal.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<?php function validarCI($strCedula)
{

if(is_null($strCedula) || empty($strCedula)){//compruebo si que el numero enviado es vacio o null
echo "Por Favor Ingrese la Cedula";
}else{//caso contrario sigo el proceso
if(is_numeric($strCedula)){
$total_caracteres=strlen($strCedula);// se suma el total de caracteres
if($total_caracteres==10){//compruebo que tenga 10 digitos la cedula
$nro_region=substr($strCedula, 0,2);//extraigo los dos primeros caracteres de izq a der
if($nro_region>=1 && $nro_region<=24){// compruebo a que region pertenece esta cedula//
$ult_digito=substr($strCedula, -1,1);//extraigo el ultimo digito de la cedula
//extraigo los valores pares//
$valor2=substr($strCedula, 1, 1);
$valor4=substr($strCedula, 3, 1);
$valor6=substr($strCedula, 5, 1);
$valor8=substr($strCedula, 7, 1);
$suma_pares=($valor2 + $valor4 + $valor6 + $valor8);
//extraigo los valores impares//
$valor1=substr($strCedula, 0, 1);
$valor1=($valor1 * 2);
if($valor1>9){ $valor1=($valor1 - 9); }else{ }
$valor3=substr($strCedula, 2, 1);
$valor3=($valor3 * 2);
if($valor3>9){ $valor3=($valor3 - 9); }else{ }
$valor5=substr($strCedula, 4, 1);
$valor5=($valor5 * 2);
if($valor5>9){ $valor5=($valor5 - 9); }else{ }
$valor7=substr($strCedula, 6, 1);
$valor7=($valor7 * 2);
if($valor7>9){ $valor7=($valor7 - 9); }else{ }
$valor9=substr($strCedula, 8, 1);
$valor9=($valor9 * 2);
if($valor9>9){ $valor9=($valor9 - 9); }else{ }

$suma_impares=($valor1 + $valor3 + $valor5 + $valor7 + $valor9);
$suma=($suma_pares + $suma_impares);
$dis=substr($suma, 0,1);//extraigo el primer numero de la suma
$dis=(($dis + 1)* 10);//luego ese numero lo multiplico x 10, consiguiendo asi la decena inmediata superior
$digito=($dis - $suma);
if($digito==10){ $digito='0'; }else{ }//si la suma nos resulta 10, el decimo digito es cero
if ($digito==$ult_digito){//comparo los digitos final y ultimo
echo "Cedula Correcta";
}else{
echo "Cedula Incorrecta";
}
}else{
echo "Este Nro de Cedula no corresponde a ninguna provincia del ecuador";
}


}else{
echo "Es un Numero y tiene solo".$total_caracteres;
}
}else{
echo "Esta Cedula no corresponde a un Nro de Cedula de Ecuador";
}
}
} ?>
</body>
</html>