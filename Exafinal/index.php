<?php
    $connection = new mysqli('localhost', 'root', '', 'bd_dentista');
    $connection->set_charset("utf8");

    if ($connection->connect_error) {
        die('Hubo un problema en la conexión con el servidor');
    }

    // Valor de la página actual
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

    // Cuántos artículos se van a mostrar por página
    $postPorPagina = 5;

    // Calcular el inicio de los artículos a mostrar
    $ini = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0;

    // Consulta para obtener los artículos de la página actual
    $sql = "SELECT * FROM t_paciente
            WHERE fecha_nacimiento < '2006-12-31' 
            LIMIT $ini, $postPorPagina";
    $pacientes = $connection->query($sql);

    if (!$pacientes) {
        // Redirigir a una página de error si la consulta falla
        header('Location: http://localhost/Clases/Clase_1/CursoPHP/Exafinal/');
        exit();
    }

    // Consulta para obtener el total de artículos
    $totalArticulosQuery = "SELECT count(*) AS total FROM t_paciente";
    $resultTotal = $connection->query($totalArticulosQuery);
    $rowTotal = $resultTotal->fetch_assoc();
    $totalArticulos = $rowTotal['total'];

    // Calcular el número de páginas
    $numeroPaginas = ceil($totalArticulos / $postPorPagina);

    // Cerrar la conexión
    $connection->close();

    // Requerir la vista para mostrar los artículos paginados
    require 'index.view.php';

?>