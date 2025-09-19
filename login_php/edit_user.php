<?php
// Editar usuario por índice (id)
session_start();
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: index.php");
    exit;
}
$file = __DIR__ . '/usuarios.txt';
if (!file_exists($file)) {
    header("Location: configuracion.php");
    exit;
}
$lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = (int)$_POST["id"];
    $username = trim($_POST["username"]);
    $role = $_POST["role"];
    $password = $_POST["password"];
    if ($password !== "") {
        $password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        // Mantener el password anterior si no se cambia
        list(, $oldpass, ) = explode(',', $lines[$id]);
        $password = $oldpass;
    }
    $lines[$id] = "$username,$password,$role";
    file_put_contents($file, implode("\n", $lines) . "\n");
    header("Location: configuracion.php");
    exit;
} elseif (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    if (!isset($lines[$id])) {
        header("Location: configuracion.php");
        exit;
    }
    list($username, , $role) = explode(',', $lines[$id]);
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Editar usuario</title>
    </head>
    <body>
        <h2>Editar usuario</h2>
        <form method="post" action="edit_user.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label>Usuario:</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br>
            <label>Contraseña (dejar en blanco para no cambiar):</label>
            <input type="password" name="password"><br>
            <label>Rol:</label>
            <select name="role">
                <option value="user" <?php if($role=="user") echo "selected"; ?>>Usuario</option>
                <option value="admin" <?php if($role=="admin") echo "selected"; ?>>Admin</option>
            </select><br><br>
            <button type="submit">Guardar cambios</button>
        </form>
        <br>
        <a href="configuracion.php">Volver</a>
    </body>
    </html>
    <?php
    exit;
} else {
    header("Location: configuracion.php");
    exit;
}
?>

