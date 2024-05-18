<?php 

    /*// Nos conectamos a la base de datos
    try {
      $conexion = new PDO('mysql:host=localhost;dbname=bd_tienda', 'root', '');
    } catch (PDOException $e) {
      echo 'ERROR: '. $e->getMessage();
      die();
    }

    // Establecemos el numero de pagina en la que el usuario se encuentra.
    # Esto lo hacemos por el metodo GET, si no hay ningun valor entonces le asignamos la pagina 1.
    $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

    // Establecemos cuantos post por pagina queremos cargar.
    $postPorPagina = 5;

    // Revisamos desde que articulo vamos a cargar, dependiendo de la pagina en la que se encuentre el usuario.
    # Comprobamos si la pagina en la que esta es mayor a 1, sino entonces cargamos desde el articulo 0.
    # Si la pagina es mayor a 1 entonces hacemos un calculo para saber desde que post cargaremos.
    $inicio = ($pagina > 1) ? ($pagina * $postPorPagina - $postPorPagina) : 0 ;

    // Preparamos la consulta SQL
    $articulos = $conexion->prepare("
      SELECT SQL_CALC_FOUND_ROWS * FROM t_articulos
      LIMIT $inicio, $postPorPagina
    ");

    // Ejecutamos la consulta
    $articulos->execute();
    $articulos = $articulos->fetchAll();

    // Comprobamos que haya articulos, sino entonces redirigimos.
    if (!$articulos) {
      header('Location: http://localhost/Clases/Clase_1/CursoPHP/paginacion/');
    }

    // Calculamos el total de articulos, para despues conocer el numero de paginas de la paginacion.
    $totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
    $totalArticulos = $totalArticulos->fetch()['total'];

    // Calculamos el numero de paginas que tendra la paginacion.
    # Para esto dividimos el total de articulos entre los post por pagina
    $numeroPaginas = ceil($totalArticulos / $postPorPagina);

    require 'index.view.php';*/

    $connection = new mysqli('localhost', 'root', '', 'bd_tienda');
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
    $sql = "SELECT * FROM t_articulos LIMIT $ini, $postPorPagina";
    $articulos = $connection->query($sql);

    if (!$articulos) {
        // Redirigir a una página de error si la consulta falla
        header('Location: http://localhost/Clases/Clase_1/CursoPHP/paginacion/');
        exit();
    }

    // Consulta para obtener el total de artículos
    $totalArticulosQuery = "SELECT count(*) AS total FROM t_articulos";
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