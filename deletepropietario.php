<?php 
if (isset($_GET['id'])){
	include('databasepropietario.php');
	$propietario = new Database1();
	$id=intval($_GET['id']);
	$res = $propietario->delete($id);
	if($res){
		header('location: index.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>