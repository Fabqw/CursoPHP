<?php
    $conecction = new mysqli('localhost', 
    'root',//usuario
    '',//contraseña
    'bd_prueba'//base de datos
    );
    $conecction -> set_charset("utf8");
    if($conecction -> connect_errno){
        die('hubo un problema en la conxion con el servidor');
    }else{
        $sql = "INSERT INTO t_materia(nombre, sigla) 
        VALUE('Sistemas Operatrivos 2', 'INF-145'),
        ('WEB1', 'INF-113')";
        $conecction->query($sql);
        if ($conecction->affected_rows>=1) {
            echo 'Filas  Agregadas <br>'.$conecction -> affected_rows;
        }
        else{
            echo 'no hay datos';
        }
    }
?>