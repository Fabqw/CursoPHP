<?php
    //print_r($_GET)
    if (isset($_GET['terminos']) && $_GET['sexo']!=NULL)
    {
        $nombre = $_GET['nombre'];
    	$sexo = $_GET['sexo'];
    	$gestion = $_GET['gestion'];
    	$terminos = $_GET['terminos'];
    	echo 'Hola '.$nombre.' eres '.$sexo."<br>";
        echo htmlspecialchars('Hola '.$nombre.' eres '.$sexo);        
    }
    else{
    	header('Location: http://localhost/Clases/Clase_1/CursoPHP/formularios/indexget.php');
    }
?>