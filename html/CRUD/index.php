<?php
	include 'conexion.php';
	$resultado=mysqli_query($conn,"SELECT * FROM  jugadores ");
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" sizes="16x16" href="logo.png">
	<title>Inicio</title>
	<link rel="stylesheet" href="../CRUD/css/tabla.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<div class="barra__buscador">
			<form action="" class="formulario" method="post">
				<input type="text" name="buscar" placeholder="buscar nombre o apellidos" 
				value="<?php if(isset($buscar_text)) echo $buscar_text; ?>" class="input__text">
				<input type="submit" class="btn" name="btn_buscar" value="Buscar">
				<a href="insert.php" class="btn btn__nuevo">Nuevo</a>
			</form>
		</div>
		<table> 
			<tr class="head">
			<td><font size = "2">  Cedula</font> </td>
            <td><font size = "2">  Nombres</font> </td>
            <td><font size = "2">  Apellidos</font> </td>	
            <td><font size = "2">  Equipo</font> </td>	
            <td><font size = "2">  Numero Asignado</font> </td>		
			<td><font size = "2">  Ciudad</font> </td>	
            <td><font size = "2">  Telefono</font> </td>	
            <td><font size = "2">  Direccion</font> </td>	
            <td><font size = "2">  Posicion</font> </td>	
            <td><font size = "2">  Fecha Nacimiento</font> </td>	
			<td><font size = "2">  Transferencia Estado</font> </td>
			<td colspan="2" >Accion  </td>
			
			</tr>

			
			<?php while($filas=mysqli_fetch_assoc($resultado)) {
                                        ?>
				<tr >
				 <td><?php echo $filas['cedula'] ?></td>
                  <td><?php echo $filas['nombres'] ?></td>
                  <td><?php echo $filas['apellidos'] ?></td>
                  <td><?php echo $filas['equipo'] ?></td>
                  <td><?php echo $filas['numeroasig'] ?></td>
				  <td><?php echo $filas['ciudad'] ?></td>
				  <td><?php echo $filas['telefono'] ?></td>
                  <td><?php echo $filas['direccion'] ?></td>
                  <td><?php echo $filas['posicion'] ?></td>
                  <td><?php echo $filas['fechanac'] ?></td>
                  <td><?php echo $filas['estadotransf'] ?></td>
					<td><a href="update.php?id= <?php echo $fila['id']; ?>"  class="btn__update" >Editar</a></td>
					<td><a href="delete.php?id=<?php echo $fila['id']; ?>" class="btn__delete">Eliminar</a></td>
				</tr>
				<?php } ?>

		</table>
	</div>
</body>
</html>