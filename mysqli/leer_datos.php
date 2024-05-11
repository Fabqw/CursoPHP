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
        // $id = $_GET['id'];
        $sql = "SELECT * FROM t_materia";
        $resultado = $conecction->query($sql);
        if ($resultado->num_rows) {
            while($fila = $resultado->fetch_assoc()){
                echo 'ID: '.$fila['id'].'- NOMBRE: '.$fila['nombre'].'- SIGLA: '.$fila['sigla'].'<br>';
            }
        }
        else{
            echo 'no hay datos';
        }
    }
?>