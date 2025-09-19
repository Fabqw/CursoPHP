<?php
    session_start();
    
    if (isset($_POST['submit'])) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $conn = mysqli_connect('localhost', 'root', '', 'bd_login');
        $conn->set_charset("utf8");
    
        if ($conn->connect_errno) {
            die('Hubo un problema en la conexión con el servidor' . $conn->connect_error);
        } else {
            $sql = "SELECT * FROM t_usuarios WHERE usuario = '$usuario'";
            $result = $conn->query($sql);
        
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['usuario_id'] = $row['id'];
                    $_SESSION['usuario'] = $row['usuario'];
                    header("Location: inicio.php");
                    exit();
                } else {
                    echo "<div class='alert alert-danger'>La contraseña ingresada es incorrecta.</div>";
                }
            } else {
                echo "<div class='alert alert-danger'>El usuario ingresado no existe.</div>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Iniciar sesión</h2>
        <form action="index.php" method="post">
            <div class="form-btn">
                <label for="usuario">Usuario:</label>
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="ejemplo: User01" required>
            </div>
            <div class="form-btn">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="contraseña" required>
            </div><br>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Ingresar" name="submit">
                <a href="registro_user.php" class="btn btn-primary">Registrate</a>
            </div>
        </form>        
    </div>    
</body>
</html>
<!-- 
Para visualizar este proyecto en Codespaces, necesitas iniciar un servidor web que apunte al directorio donde está tu archivo index.php. 
Puedes usar el servidor embebido de PHP. Ejecuta este comando en la terminal:

php -S 0.0.0.0:8080 -t /workspaces/CursoPHP/Tarea2

Luego, abre el navegador en la URL proporcionada por Codespaces (normalmente https://<tu-workspace>-8080.app.github.dev).

Si quieres abrirlo automáticamente en el navegador del host, puedes usar:
"$BROWSER" http://localhost:8080
-->

