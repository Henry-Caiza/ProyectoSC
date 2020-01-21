<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM equipo WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../registrarequipo.php');
	}else{
		header('Location: ../registrarequipos.php');
	}
 ?>