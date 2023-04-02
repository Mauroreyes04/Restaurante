<?php
include_once("../modelo/conedit.php");
$documento = $_POST['documento'];
$Nombre = $_POST['Nombre'];
$telefono = $_POST['telefono'];
$Id_programa = $_POST['Id_programa'];


$sentencia = $bd->prepare("UPDATE comensales SET documento= ?, Nombre= ?, telefono= ?, Id_programa= ?");
$resultado = $sentencia->execute([$documento, $Nombre, $telefono, $Id_programa]); 

if($resultado){
	echo "<script> alert('Edicion Exitoso')
			location.href = '../index.php';</script>";
}
else{
	return "Error";
}

?>

