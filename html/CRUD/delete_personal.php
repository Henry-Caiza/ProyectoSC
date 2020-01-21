<?php 

	include_once 'conexion.php';
	if(isset($_GET['id'])){
		$id=(int) $_GET['id'];
		$delete=$con->prepare('DELETE FROM personal WHERE id=:id');
		$delete->execute(array(
			':id'=>$id
		));
		header('Location: ../Registro_Personal.php');
	}else{
		header('Location: ../Regitro_Personal.php');
	}
 ?>