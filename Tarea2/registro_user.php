<?php
    $conn = mysqli_connect('localhost', 'root', '', 'bd_login');
    $conn->set_charset("utf8");
    if ($conn->connect_errno) {
        die('Hubo un problema en la conexión con el servidor' . $conn->connect_error);
    } else {
        if (isset($_POST["submit"])) {
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $usuario = $_POST["usuario"];
            $password = $_POST["password"];
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $password_rep = $_POST["repeat_password"];
            $errors = [];
            if (empty($nombre) || empty($apellido) || empty($usuario) || empty($password)) {
                array_push($errors, "Todos lo campos son requeridos");
            }
            if ($password != $password_rep) {
                array_push($errors, "Las contraseñas son diferentes");
            }        
            if (empty($errors)) {
                $sql = "INSERT INTO t_usuarios(nombre, apellido, usuario, password) 
                    VALUES('$nombre', '$apellido', '$usuario', '$password_hash')";
                if ($conn->query($sql) === TRUE) {
                    //echo "<div class='alert alert-success'>Se registró un nuevo usuario</div>";
                    header("Location: success.php");
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
    <title>Registro de usuarsio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Registra un nuevo usuario</h2>
        <form action="registro_user.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="nombre" placeholder="Nombre: ">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="apellido" placeholder="Apellido: ">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="usuario" placeholder="Usuario: ">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Contraseña: ">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repetir contraseña: ">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Registrar" name="submit">
            </div>
        </form>
    </div>
</body>

</html>