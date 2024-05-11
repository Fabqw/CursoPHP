<?php
    $id = $_GET['id'];
    try {
        //variable de conxion con el host local 
        $conecction = new PDO(
            'mysql:host=localhost;
            dbname=bd_prueba' /*va el nombre de la base de datos*/,
            'root','');
        echo 'Conecction sucessfully';
        $statement = $conecction -> prepare(
            "SELECT *
            FROM t_materia
            where id=:id"
        );
        $statement -> execute(
            array(
                ':id' => $id
            )
        );
        $result = $statement->fetchAll();
        //$result = $statement->fetch();
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    } catch (PDOException  $exp) {
        echo 'Error'.$exp->getMessage();
    }
?>