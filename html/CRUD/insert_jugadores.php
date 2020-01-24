<?php 
	include_once 'conexion.php';
	
	if(isset($_POST['guardar'])){
		$cedula=$_POST['cedula'];
        $nombres=$_POST['nombres'];
        $apellidos=$_POST['apellidos'];
        $equipo=$_POST['equipo'];
        $numeroasig=$_POST['numeroasig'];
        $pais=$_POST['pais'];
        $provincia=$_POST['provincia'];
        $ciudad=$_POST['ciudad'];
        $direccion=$_POST['direccion'];
        $telefono=$_POST['telefono'];
        $email=$_POST['email'];
        $posicion=$_POST['posicion'];
		$fechanac=$_POST['fechanac'];
        $instruccion=$_POST['instruccion'];
        $estadotransf=$_POST['estadotransf'];

		if(!empty($cedula) && !empty($nombres) && !empty($apellidos) && !empty($equipo) && !empty($numeroasig) && !empty($pais) && !empty($provincia) && !empty($ciudad) && !empty($direccion) && !empty($telefono) && !empty($email) && !empty($posicion) && !empty($fechanac) && !empty($instruccion) && !empty($estadotransf) ){
			if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
				echo "<script> alert('Correo no valido');</script>";
			}else{
				$consulta_insert=$con->prepare('INSERT INTO jugadores(cedula,nombres,apellidos,equipo,numeroasig,pais,provincia,ciudad,direccion,telefono,email,posicion,fechanac,instruccion,estadotransf) VALUES(:cedula,:nombres,:apellidos,:equipo,:numeroasig,:pais,:provincia,:ciudad,:direccion,:telefono,:email,:posicion,:fechanac,:instruccion,:estadotransf)');
				$consulta_insert->execute(array(
                    ':cedula' =>$cedula,
                    ':nombres' =>$nombres,
					':apellidos' =>$apellidos,
                    ':equipo' =>$equipo,
                    ':numeroasig' =>$numeroasig,
                    ':pais' =>$pais,
                    ':provincia' =>$provincia,
                    ':ciudad' =>$ciudad,
                    ':direccion' =>$direccion,
					':telefono' =>$telefono,
					':email' =>$email,
                    ':posicion'=>$posicion,
                    ':fechanac' =>$fechanac,
                    ':instruccion' =>$instruccion,
                    ':estadotransf' =>$estadotransf
				));
				header('Location: ../registrar_jugadores.php');
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
	<title>Nuevo Jugador</title>
    <link rel="stylesheet" href="../CRUD/css/tabla.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
	<div class="contenedor">
		<h2>INGRESAR JUGADORES</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="cedula" placeholder="Cédula" class="input__text">
				<input type="text" name="nombres" placeholder="Nombres" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="apellidos" placeholder="Apellidos" class="input__text">
            </div>
            <div class="form-group"> 
                <label for="select1"></label>
                 <select name="select1" id="select1" class="form-control">
                 <option value="">Selecione Equipo</option>
                 
                 <?php  
                         $mysqli = new mysqli('localhost', 'root', '', 'scf');
                         $query = $mysqli -> query ("SELECT * FROM equipo");
                         while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="">'.$valores[nombreClub].'</option>';}
                 ?>
                 </select>
            </div>

			<div class="form-group">
                <input type="text" name="numeroasig" placeholder="Número Asignado" class="input__text">
                <input type="text" name="pais" placeholder="País" class="input__text">
            </div>

            <div class="form-group">
                <input type="text" name="provincia" placeholder="Provincia" class="input__text">
                <input type="text" name="ciudad" placeholder="Ciudad" class="input__text">
            </div>

            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" class="input__text">
                <input type="text" name="telefono" placeholder="Teléfono" class="input__text">
            </div>

            <div class="form-group">
                <input type="text" name="email" placeholder="Email" class="input__text">
                <input type="text" name="posicion" placeholder="Posición" class="input__text">
            </div>

            <div class="form-group">
                <input type="text" name="estadotransf" placeholder=" Transferencia Estado" class="input__text">
                <input type="text" name="instruccion" placeholder="Instrucción" class="input__text">
            </div>
            <p>Fecha de Nacimiento</p>
            <div class="form-group">
                <input type="date" name="fechanac" placeholder="Fecha de Nacimiento" class="input__text">
    
            </div>
            
                
			<div class="btn__group">
				<a href="../registrar_jugadores.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
