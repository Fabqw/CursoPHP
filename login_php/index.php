<?php
session_start();


// Leer usuarios desde usuarios.txt
$users = [];
$file = __DIR__ . '/usuarios.txt';
if (file_exists($file)) {
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        list($u, $p, $r) = explode(',', $line);
        $users[$u] = ["password" => $p, "role" => $r];
    }
}

// Si se envía el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    // Verificar credenciales
    if (isset($users[$username]) && password_verify($password, $users[$username]["password"])) {
        $_SESSION["username"] = $username;
        $_SESSION["role"] = $users[$username]["role"];
        // Redirigir según el rol
        if ($_SESSION["role"] == "admin") {
            header("Location: configuracion.php");
            exit;
        } else {
            if (strtolower($_SESSION["role"]) == "user") {
                header("Location: perfil.php");
                exit;
            }
        }
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <form method="POST" action="">
        <label>Usuario:</label><br>
        <input type="text" name="username" required><br><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Entrar</button>
    </form>
    <p style="color:red;">
        <?php echo $error ?? ""; ?>
    </p>
</body>
</html>
