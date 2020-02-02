<?php
    /*include_once 'conexion.php';
    $mysqli = new mysqli('localhost', 'root', '', 'scf');
    $query = $mysqli -> query ("SELECT cedula FROM personal where nombre = 'jose' ");
    while($filas=mysqli_fetch_assoc($query)){
        $cedula = $filas['cedula'];
    }*/
    $cedula='1727667220';
    echo $cedula;
    $total_caracteres=strlen($cedula);// se suma el total de caracteres
			if($total_caracteres!==10){//compruebo que tenga 10 digitos la cedula
				echo "<script> alert('Solo debe contener 10 digitos');</script>";
			}else{
                $nro_region=substr($cedula, 0,2);//extraigo los dos primeros caracteres de izq a der
                //echo $nro_region;
				if($nro_region<=1 && $nro_region>=24){// compruebo a que region pertenece esta cedula//
					echo "<script> alert('Cedula incorrecta');</script>";
				}else{
                    $ult_digito=substr($cedula, -1,1);
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
					if ($digito==$ult_digito){//comparo los digitos final y ultimo
						echo "<script> alert('Cedula Correcta');</script>";
					}else{
						echo "<script> alert('Cedula Incorrecta');</script>";
                    }
                }
            }
?>