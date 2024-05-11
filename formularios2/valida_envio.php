<?php

    /*if($_SERVER['REQUEST_METHOD'] == 'GET'){
    	echo 'se enviaron por GET';
    }
    else{
        echo 'se enviaron por POST';
    }*/
    if(isset($_POST['submit'])){
    	echo "Se han enviado los datos correctamente<br>";
    	print_r($_POST['submit']);
    }
?>