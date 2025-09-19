<?php
// Elimina un usuario por índice (id)
session_start();
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: index.php");
    exit;
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id"])) {
    $id = (int)$_POST["id"];
    $file = __DIR__ . '/usuarios.txt';
    if (file_exists($file)) {
        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (isset($lines[$id])) {
            unset($lines[$id]);
            file_put_contents($file, implode("\n", $lines) . "\n");
        }
    }
    header("Location: configuracion.php");
    exit;
} else {
    header("Location: configuracion.php");
    exit;
}
