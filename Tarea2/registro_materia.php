<?php
    session_start();

    $conn = mysqli_connect('localhost', 'root', '', 'bd_login');
    $conn->set_charset("utf8");

    if ($conn->connect_errno) {
        die('Hubo un problema en la conexión con el servidor' . $conn->connect_error);
    } else {
        if (isset($_POST["submit"])) {
            $nombre_materia = $_POST["nombre_materia"];
            $nota = $_POST["nota"];
            $usuario_id = $_SESSION['usuario_id'];

            $errors = [];

            if (empty($nombre_materia) || empty($nota)) {
                array_push($errors, "Todos los campos son requeridos");
            }

            if ($nota < 0 || $nota > 100) {
                array_push($errors, "La nota debe estar en el rango de 0 a 100");
            }

            if (empty($errors)) {
                $sql = "INSERT INTO t_materias(nombre_materia, nota, usuario_id) 
                        VALUES('$nombre_materia', '$nota', '$usuario_id')";
                
                if ($conn->query($sql) === TRUE) {                    
                    header("Location: success_materia.php");
                    exit();
                } else {
                    die ("Error al ejecutar la consulta: ". $conn->error);
                }
            } else {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de materia</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Registra la nueva materia:</h2>
        <form action="registro_materia.php" method="post">
            <div class="form-group">
                <input type="hidden" name="usuario_id" value="<?php print_r($_SESSION['usuario_id']); ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="nombre_materia" placeholder="Nombre de la materia: ">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" name="nota" placeholder="Nota (de 0 a 100): " min="0" max="100">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Registrar" name="submit">
                <a href="inicio.php" class="btn btn-primary">Ir a ver las materias</a>
            </div>
        </form>
    </div>
</body>

</html>
