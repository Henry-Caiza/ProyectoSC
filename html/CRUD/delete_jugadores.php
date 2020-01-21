<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM jugadores WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../registrar_jugadores.php');
	}else{
		header('Location: ../registrar_jugadores.php');
	}
 ?>