<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM calendario WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../Registrar_calendario.php');
	}else{
		header('Location: ../Registrar_calendario.php');
	}
 ?>