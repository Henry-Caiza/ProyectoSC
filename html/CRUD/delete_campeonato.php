<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM campeonato WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../registrar_campeonato.php');
	}else{
		header('Location: ../registrar_campeonato.php');
	}
 ?>