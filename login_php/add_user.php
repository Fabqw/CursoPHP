<?php
// Script para añadir usuarios al archivo usuarios.txt
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $role = $_POST["role"];

    $line = "$username,$password,$role\n";
    file_put_contents("usuarios.txt", $line, FILE_APPEND);
    header("Location: configuracion.php?success=1");
    exit;
} else {
    header("Location: configuracion.php");
    exit;
}
?>
