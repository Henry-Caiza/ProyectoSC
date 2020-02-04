<?php 
	include_once 'conexion.php';

	
	if(isset($_POST['guardar'])){
        $goles_equipo1=$_POST['goles_equipo1'];
        $tarj_ama_eq1=$_POST['tarj_ama_eq1'];
        $tarj_roj_eq1=$_POST['tarj_roj_eq1'];  
		$goles_equipo2=$_POST['goles_equipo2'];
		$tarj_ama_eq2=$_POST['tarj_ama_eq2'];
        $tarj_roj_eq2=$_POST['tarj_roj_eq2'];
		if(!empty($goles_equipo1) && !empty($tarj_ama_eq1) && !empty($tarj_roj_eq1) && !empty($goles_equipo2) && !empty($tarj_ama_eq2) && !empty($tarj_roj_eq2) ){
			if(!filter_var($goles_equipo1,FILTER_VALIDATE_INT)){
				echo "<script> alert('Goles');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO tablaresultados(goles_equipo1,tarj_ama_eq1,tarj_roj_eq1,goles_equipo2,tarj_ama_eq2,tarj_roj_eq2) VALUES(:goles_equipo1,:tarj_ama_eq1,:tarj_roj_eq1,:goles_equipo2,:tarj_ama_eq2,:tarj_roj_eq2)');
				$consulta_insert->execute(array(
                    ':goles_equipo1' =>$goles_equipo1,
					':tarj_ama_eq1' =>$tarj_ama_eq1,
                    ':tarj_roj_eq1' =>$tarj_roj_eq1,
                    ':goles_equipo2' =>$goles_equipo2,
                    ':tarj_ama_eq2' =>$tarj_ama_eq2,
                    ':tarj_roj_eq2' =>$tarj_roj_eq2
                ));
                
                header('Location: ../registrar_resultados.php');
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
	<link rel="icon" type="image/png" sizes="16x16" href="logo.png">
	<title>Nuevo Resultado</title>
    <link rel="stylesheet" href="../CRUD/css/tabla.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>REGISTRAR RESULTADOS</h2>
		<form action="" method="post">
			<div class="form-group">
			    <input type="text" name="goles_equipo1" placeholder="Goles Marcados" class="input__text" >
                <input type="text" name="tarj_ama_eq1" placeholder="Tarjetas Amarillas" class="input__text" >
			</div>
			<div class="form-group">
				<input type="text" name="tarj_roj_eq1" placeholder="Tarjetas Rojas" class="input__text" >
            </div>

			<div class="form-group">
                <input type="text" name="goles_equipo2" placeholder="Goles Marcados" class="input__text" >
                <input type="text" name="tarj_ama_eq2" placeholder="Tarjetas Amarillas" class="input__text" >
            </div>
			<div class="form-group">
				<input type="text" name="tarj_roj_eq2" placeholder="Tarjetas Rojas" class="input__text" >
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
<script type = "text/javascript" >
</script>
</body>
</html>