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
        

        $query="INSERT INTO jugadores(foto,cedula,nombres,apellidos,equipo,numeroasig,pais,provincia,ciudad,direccion,telefono,posicion,fechanac,instruccion,estadotransf) VALUES('$imagen','$cedula','$nombres','$apellidos','$valores','$numeroasig','$pais','$provincia','$ciudad','$direccion','$telefono','$posicion','$fechanac','$instruccion','$estadotransf')";
		$resultado=$con->query($query);
		if($resultado)
		{
			echo "Se guardo la Imagen";
		}else
		{
			echo "No se guardó";
		}
		/*if(!empty($imagen) && !empty($cedula) && !empty($nombres) && !empty($apellidos)&& !empty($valores) && !empty($numeroasig) && !empty($pais) && !empty($provincia) && !empty($ciudad) && !empty($direccion) && !empty($telefono) && !empty($posicion) && !empty($fechanac) && !empty($instruccion) && !empty($estadotransf) ){
			if(!filter_var($cedula,FILTER_VALIDATE_INT)){
				echo "<script> alert('Cedula no valida');</script>";
			}else{
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
                ));*/
                
                header('Location: ../registrar_jugadores.php');
            } 
		/*} else {
			echo "<script> alert('Los campos estan vacios');</script>";
		}
	}*/
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
		<form action="" method="post" enctype="multipart/form-data">
        <br><h6>&nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Cédula  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   Nombres</h6>
			<div class="form-group">
				<input type="text" name="cedula" placeholder="Cédula" class="input__text" >
				<input type="text" name="nombres" placeholder="Nombres" class="input__text" >
			</div>
            <h6>&nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Apellidos</h6>
			<div class="form-group">
				<input type="text" name="apellidos" placeholder="Apellidos" class="input__text" >
            </div>
            <div class="form-group"> 
                <label for="select1"></label>
                 <select name="equipo" id="equipo" class="form-control">
                 <option selected="" disabled="" hidden="">Escoja un equipo</option>
                 <?php  
                         $mysqli = new mysqli('localhost', 'root', '', 'scf');
                         $query = $mysqli -> query ("SELECT * FROM equipo");
                         while ($valores = mysqli_fetch_array($query)) {
                        echo '<option value="'.$valores[nombreClub].'">'.$valores[nombreClub].'</option>';}
                 ?>
                 </select>
                 
            </div>
            <h6>&nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;   Número Asignado  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; País</h6>

			<div class="form-group">
                <input type="text" name="numeroasig" placeholder="Número Asignado" class="input__text" >
                <input type="text" name="pais" placeholder="País" class="input__text" >
            </div>
            <h6>&nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;   Provincia  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   Ciudad</h6>

            <div class="form-group">
                <input type="text" name="provincia" placeholder="Provincia" class="input__text" >
                <input type="text" name="ciudad" placeholder="Ciudad" class="input__text" >
            </div>
            <h6>&nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; Dirección  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   Télefono</h6>

            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" class="input__text" >
                <input type="text" name="telefono" placeholder="Teléfono" class="input__text" >
            </div>
            <h6>&nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Posición  &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;   Instrucción</h6>

            <div class="form-group">
                <input type="text" name="posicion" placeholder="Posición" class="input__text" >
                <input type="text" name="instruccion" placeholder="Instrucción" class="input__text" >
            </div>

            <div class="form-group">
			<label for="select3"></label>
				<select name="estadotransf"  class="form-control">
					<option value="0"> Escoga Estado Transferencia</option>
					<option value="Disponible">Disponible</option>
					<option value="No Disponibe">No Disponible</option>
				</select>
            </div>
            <h6>&nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Fecha de Nacimiento</h6>

            <div class="form-group">
                <input type="date" name="fechanac" placeholder="Fecha de Nacimiento" class="input__text" >
    
            </div>

            <div class="form-group">
                <input type="file" name="Imagen"/>
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
function preguntar(){
    alert('DATOS GUARDADOS');
}
</script>
</body>
</html>
