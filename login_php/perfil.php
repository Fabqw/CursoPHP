<?php
session_start();
if (!isset($_SESSION["role"]) || strtolower($_SESSION["role"]) != "user") {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Usuario</title>
</head>
<body>
    <h1>Bienvenido, Usuario <?php echo $_SESSION["username"]; ?></h1>
    <?php
    // Procesar formulario de venta
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["producto"]) && isset($_POST["cantidad"]) && isset($_POST["precio"])) {
        $producto = htmlspecialchars(trim($_POST["producto"]));
        $cantidad = intval($_POST["cantidad"]);
        $precio = floatval($_POST["precio"]);
        $usuario = $_SESSION["username"];
        $fecha = date("Y-m-d H:i:s");
        $registro = "$fecha | Usuario: $usuario | Producto: $producto | Cantidad: $cantidad | Precio: $precio\n";
        file_put_contents("ventas.txt", $registro, FILE_APPEND);
        echo "<p style='color:green;'>Venta registrada correctamente.</p>";
    }
    ?>

    <h2>Registrar venta</h2>
    <form method="post">
        <label>Producto: <input type="text" name="producto" required></label><br>
        <label>Cantidad: <input type="number" name="cantidad" min="1" required></label><br>
        <label>Precio: <input type="number" name="precio" min="0" step="0.01" required></label><br>
        <button type="submit">Vender</button>
    </form>

    <h2>Ventas registradas</h2>
    <pre style="background:#eee;padding:10px;">
    <?php
    if (file_exists("ventas.txt")) {
        echo htmlspecialchars(file_get_contents("ventas.txt"));
    } else {
        echo "No hay ventas registradas.";
    }
    ?>
    </pre>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
