<?php
    $conecction = new mysqli('localhost', 'root','','bd_tienda');
    $conecction -> set_charset("utf8");
    if($conecction -> connect_errno){
        die('hubo un problema en la conxion con el servidor');
    }else{
        $sql = "INSERT INTO t_protucto(nombre, precio, codigo)
        VALUES
            ('Meremelada', 7.50, 'prod-6'),
            ('Gaseosa', 11.00, 'prod-7'),
            ('Margarina', 5.50, 'prod-8'),
            ('Harina', 0.50, 'prod-9'),
            ('Dulce de leche', 8.50, 'prod-10');";
        $conecction->query($sql);
        if ($conecction->affected_rows>=1) {
            echo 'Filas  Agregadas <br>'.$conecction -> affected_rows;
        }
        else{
            echo 'no hay datos';
        }
    }
?>