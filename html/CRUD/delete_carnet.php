<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM carnet WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../carnets.php');
	}else{
		header('Location: ../carnets.php');
	}
 ?>