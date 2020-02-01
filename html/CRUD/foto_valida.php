<?php
			include 'conexion.php';
			$foto=$_FILES["foto"]["name"];
			$ruta=$_FILES["foto"]["tmp_name"];
			$destino="img/escudos".$foto;
			copy($ruta,$destino);
			mysqli_query("insert into equipos(escudo) values('$destino')");
?>