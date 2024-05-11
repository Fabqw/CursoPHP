<?php
//print_r($_POST);
if($_POST)
{
	$nombre = $_POST['nombre'];
	$sexo = $_POST['sexo'];
	$gestion = $_POST['gestion'];
	$terminos = $_POST['terminos'];


	echo 'Hola '.$nombre.' eres '.$sexo;
}
else{
	header('Location: http://localhost/clase2/formularios/');
}


?>