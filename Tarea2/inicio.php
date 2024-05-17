<?php
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: index.html");
        exit();
    }
    $usuario_id = $_SESSION['usuario_id'];
    $conn = mysqli_connect('localhost', 'root', '', 'bd_login');
    $conn->set_charset("utf8");

    if ($conn->connect_errno) {
        die('Hubo un problema en la conexión con el servidor' . $conn->connect_error);
    } else {
        $sql = "SELECT * FROM t_materias WHERE usuario_id = $usuario_id";
        $result = $conn->query($sql);
        $sql_nombre_usuario = "SELECT nombre FROM t_usuarios WHERE id = $usuario_id";
        $resultado_nombre_usuario = $conn->query($sql_nombre_usuario);
        if ($resultado_nombre_usuario->num_rows == 1) {
            $row_nombre_usuario = $resultado_nombre_usuario->fetch_assoc();
            $nombre_usuario = $row_nombre_usuario["nombre"];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis materias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-3">Bienvenido, <?php echo $nombre_usuario; ?></h2>
        <h2 class="mt-3">Tus materias son:</h2>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row["nombre_materia"]; ?></h5>
                                <p class="card-text">Nota: <?php echo $row["nota"]; ?></p>
                            </div>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo "<p>No tienes materias registradas</p>";
            }
            ?>
        </div><br>
        <div class="form-btn" style="display: flex; flex-direction: row; justify-content: space-between;">
            <a href="registro_materia.php" class="btn btn-primary">Registrar Materia</a>
            <a href="logout.php" class="btn btn-primary">Cerrar sesión</a>
        </div>
    </div>
</body>
</html>
