<?php
    $conecction = new mysqli('localhost', 
    'root',//usuario
    '',//contraseña
    'bd_prueba'//base de datos
    );
    if($conecction -> connect_errno){
        die('hubo un problema en la conxion con el servidor');
    }else{
        echo "conexion exitosa";
    }
?>