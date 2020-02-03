<?php
	include_once 'conexion.php';

	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];

		$buscar_id=$con->prepare('SELECT * FROM tablaresultadoscopia WHERE id=:id LIMIT 1');
		$buscar_id->execute(array(
			':id'=>$id
		));
		$resultado=$buscar_id->fetch();
	}else{
		header('Location: ../registrar_resultados.php');
	}


	if(isset($_POST['guardar'])){
        $fechaJuego=$_POST['fechaJuego'];
        $horario=$_POST['horario'];
        //$idcalendario=$_POST['idcalendario'];
        $equipo1=$_POST['equipo1'];
        $goles_equipo1=$_POST['goles_equipo1'];
        $tarj_ama_eq1=$_POST['tarj_ama_eq1'];
        $tarj_roj_eq1=$_POST['tarj_roj_eq1'];  
        $equipo2=$_POST['equipo2'];
        $goles_equipo2=$_POST['goles_equipo2'];
        $tarj_ama_eq2=$_POST['tarj_ama_eq2'];
        $tarj_roj_eq2=$_POST['tarj_roj_eq2'];
		$id=(int) $_GET['id'];

        if( !empty($fechaJuego) &&!empty($horario)  && !empty($equipo1)   && !empty($equipo2)   ){
			if(!filter_var($goles_equipo1,FILTER_VALIDATE_INT)){
				echo "<script> alert('Goles');</script>";
			}
			if($goles_equipo1<0 || $goles_equipo2<0 || $tarj_ama_eq1<0 || $tarj_roj_eq1<0 || $tarj_ama_eq2<0 || $tarj_roj_eq2<0){
				echo "<script> alert('No se permiten valores negativos');</script>";
			}
			else
			if($goles_equipo1>50 || $goles_equipo2>50 || $tarj_ama_eq1>15 || $tarj_roj_eq1>5 || $tarj_ama_eq2>15 || $tarj_roj_eq2>5){
				echo "<script> alert('Valores fuera de rango');</script>";
			}
			else{
				$consulta_update=$con->prepare(' UPDATE tablaresultadoscopia SET  
                    fechaJuego=:fechaJuego,
                    horario=:horario,
                  --  idcalendario=:idcalendario,
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
				header('Location: ../registrar_resultados.php');
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
	<title>Editar Resultados</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>MODIFICAR RESULTADOS</h2>
		<form action="" method="post" onsubmit="return validar(this)">
		<br><h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fecha de Juego&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Horario &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Código de Partido</h6>
            <div class="form-group">
				<input type="text" name="fechaJuego" value="<?php if($resultado) echo $resultado['fechaJuego']; ?>" class="input__text" readonly="readonly">
                <input type="text" name="horario" value="<?php if($resultado) echo $resultado['horario']; ?>" class="input__text" readonly="readonly">
                <input type="text" name="idcalendario" value="<?php if($resultado) echo $resultado['id']; ?>" class="input__text" readonly="readonly">
			</div>
			<h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Equipo 1</h6>
            <div class="form-group">
				<input type="text" name="equipo1" value="<?php if($resultado) echo $resultado['equipo1']; ?>" class="input__text" readonly="readonly">
			</div>
			<h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Goles Anotados &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tarjetas Amarillas &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tarjetas Rojas</h6>
			<div class="form-group">
				<input type="number" name="goles_equipo1" value="<?php if($resultado) echo $resultado['goles_equipo1']; ?>" min="0" max="50"  class="input__text" >
				<input type="number" name="tarj_ama_eq1" value="<?php if($resultado) echo $resultado['tarj_ama_eq1']; ?>" min="0" max="11"  class="input__text" >
                <input type="number" name="tarj_roj_eq1" value="<?php if($resultado) echo $resultado['tarj_roj_eq1']; ?>" min="0" max="4"  class="input__text" >
			</div>
			<h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Equipo 2</h6>
			<div class="form-group">
				<input type="text" name="equipo2" value="<?php if($resultado) echo $resultado['equipo2']; ?>" class="input__text" readonly="readonly">
			</div>
			<h6>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Goles Anotados &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tarjetas Amarillas &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tarjetas Rojas</h6>
			<div class="form-group">
				<input type="number" name="goles_equipo2" value="<?php if($resultado) echo $resultado['goles_equipo2']; ?>"  min="0" max="50"  class="input__text" >
                <input type="number" name="tarj_ama_eq2" value="<?php if($resultado) echo $resultado['tarj_ama_eq2']; ?>"  min="0" max="11"  class="input__text" >
                <input type="number" name="tarj_roj_eq2" value="<?php if($resultado) echo $resultado['tarj_roj_eq2']; ?>"  min="0" max="4"  class="input__text" >
			</div>
			<?php 
			function verificar($a){
             if( !empty($a)){
				echo "<script> alert('datos guardados');</script>";
			 }
			}
			
			?>
			<div class="btn__group">
				<a href="../registrar_resultados.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary" onclick=" varificar($goles_equipo1)"
				
				>
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
	alert("Campos no ingresado");
    ok = false;
  }else
  if(f.elements[1].value == "")
  {
	alert("Campos no ingresado");
    ok = false;
  }else
  if(f.elements[2].value == "")
  {
	alert("Campos no ingresado");
    ok = false;
  }else
  if(f.elements[3].value == "")
  {
	alert("Campos no ingresado");
    ok = false;
  }else
  if(f.elements[4].value <0 && f.elements[4].value >50)
  {
	alert("Campo goles fuera del rango");
    ok = false;
  }else
  if(f.elements[5].value <0 && f.elements[5].value >11)
  {
	alert("Campo tarjetas amarillas fuera del rango");
    ok = false;
  }else
  if(f.elements[6].value <0 && f.elements[6].value >4)
  {
	alert("Campo tarjetas rojas fuera del rango");
    ok = false;
  }else
  if(f.elements[7].value == "")
  {
	alert("Campo equipo 2 no ingresado"); 
    ok = false;
  }else
  if(f.elements[8].value <0 && f.elements[8].value >50)
  {
	alert("Campo goles fuera del rango");
    ok = false;
  }else
  if(f.elements[9].value <0 && f.elements[9].value >11)
  {
	alert("Campo tarjetas amarillas fuera del rango");
    ok = false;
  }else
  if(f.elements[10].value <0 && f.elements[10].value >4)
  {
	alert("Campo tarjetas rojas fuera del rango");
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