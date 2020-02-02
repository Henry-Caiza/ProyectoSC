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
			if(!!!filter_var($nombre,FILTER_VALIDATE_INT)){
				echo "<script> alert('Nombre no valido');</script>";
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
	<title>Editar Personal</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>MODIFICAR PERSONAL ARBITRARIO</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text" required>
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text" required>
			</div>
			<div class="form-group">
				<input type="text" name="cedula" value="<?php if($resultado) echo $resultado['cedula']; ?>" class="input__text" onchange = "validar()" required>
				<input type="text" name="email" value="<?php if($resultado) echo $resultado['email']; ?>" class="input__text" required>
			</div>
			<div class="form-group">
				<input type="text" name="telefono" value="<?php if($resultado) echo $resultado['telefono']; ?>" class="input__text" required>
                <input type="text" name="direccion" value="<?php if($resultado) echo $resultado['direccion']; ?>" class="input__text" required>
			</div>
            
            <div class="form-group">
			    <input type="text" name="cargo" value="<?php if($resultado) echo $resultado['cargo']; ?>" class="input__text" required>
                
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
    function validar(){
		var cedula = form.cedula.value;
  array = cedula.split( "" );
  num = array.length;
  if ( num == 10 )
  {
    total = 0;
    digito = (array[9]*1);
    for( i=0; i < (num-1); i++ ) { mult = 0; if ( ( i%2 ) != 0 ) { total = total + ( array[i] * 1 ); } else { mult = array[i] * 2; if ( mult > 9 )
          total = total + ( mult - 9 );
        else
          total = total + mult;
      }
    }
    decena = total / 10;
    decena = Math.floor( decena );
    decena = ( decena + 1 ) * 10;
    final = ( decena - total );
    if ( ( final == 10 && digito == 0 ) || ( final == digito ) ) {
      alert( "La c\xe9dula ES v\xe1lida!!!" );
      return true;
    }
    else
    {
      alert( "La c\xe9dula NO es v\xe1lida!!!" );
      return false;
    }
  }
  else
  {
    alert("La c\xe9dula no puede tener menos de 10 d\xedgitos");
    return false;
  }
	}
</script>
</body>
</html>