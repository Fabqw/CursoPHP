<?php
    $conecction = new mysqli('localhost','root','','bd_tienda');
    $conecction -> set_charset("utf8");
    if($conecction -> connect_errno){
        die('hubo un problema en la conxion con el servidor');
    }else{
        $sql = "SELECT *
        FROM t_producto
        ORDER BY precio DESC
        LIMIT 3";
        $resultado = $conecction->query($sql);
        if ($resultado->num_rows) {
            while($fila = $resultado->fetch_assoc()){
                echo 'ID: '.$fila['id'].'- NOMBRE: '.$fila['nombre'].'- PRECIO: '.$fila['precio'].
                '- CODIGO: '.$fila['codigo'].'<br>';
            }
        }
        else{
            echo 'no hay datos';
        }
    }
?>