<?php
    $id = $_GET['id'];
    try {
        //variable de conxion con el host local 
        $conecction = new PDO(
            'mysql:host=localhost;
            dbname=bd_prueba' /*va el nombre de la base de datos*/,
            'root','');
        echo 'Conecction sucessfully';
        $personas = $conecction->query(
            "SELECT *
            FROM t_materia
            where id=$id"
        );
        //http://localhost/Clases/Clase_1/CursoPHP/mysql/pdo.php?id=2
        echo '<br>'.'Lista de personas'.'<br>';
        foreach ($personas as $persona) {
            echo $persona['nombre'].'<br>';
        }
    } catch (PDOException  $exp) {
        echo 'Error'.$exp->getMessage();
    }
?>