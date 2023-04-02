<?php
include_once("../modelo/conedit.php");
$id= $_POST['documento'];


$sentencia = $bd->prepare("DELETE FROM comensales WHERE documento=:documento;");
$sentencia->bindParam(':documento',$id);


if($sentencia->execute()){
	echo "<script> alert('Edicion Exitoso')
			location.href = '../index.php';</script>";
}
else{
	return "Error";
}

?>
