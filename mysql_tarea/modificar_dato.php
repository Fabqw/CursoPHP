<?php
    $connection = new mysqli('localhost', 'root', '', 'bd_tienda');
    $connection->set_charset("utf8");
    if ($connection->connect_errno) {
        //problema?
        die('Hubo un problema en la conexión con el servidor');
    } else {
        $sql = "SELECT id, nombre, precio, codigo FROM t_producto WHERE precio = (SELECT MIN(precio) FROM t_producto);";
        $resultado = $connection->query($sql);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo 'ID: '.$fila['id'].' - NOMBRE: '.$fila['nombre'].' - PRECIO: '.$fila['precio'].
                ' - CODIGO: '.$fila['codigo'].'<br>';
                $sql_update = "UPDATE t_producto SET codigo = 'B-1' WHERE id = ".$fila['id'].";";
                $connection->query($sql_update);
            }
        } else {
            echo 'No hay datos';
        }
    }
?>
