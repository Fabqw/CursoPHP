<?php
session_start();
if (!isset($_SESSION["role"]) || $_SESSION["role"] != "admin") {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin</title>
</head>
<body>
    <div>
        <h1>Bienvenido, Admin <?php echo $_SESSION["username"]; ?></h1>
        <h2>Añadir nuevo usuario</h2>
    </div>
    <div>
        <form action="add_user.php" method="post">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <label for="role">Rol:</label>
            <select id="role" name="role">
            <option value="user">Usuario</option>
            <option value="admin">Admin</option>
            </select>
            <br>
            <button type="submit">Añadir usuario</button>
        </form>
        <br>
    </div>
    <div>
        <h2>Lista de usuarios</h2>
        <table border="1" cellpadding="5" style="margin: 0 auto;">
            <tr><th>Usuario</th><th>Rol</th><th>Acciones</th></tr>
            <?php
            $file = __DIR__ . '/usuarios.txt';
            if (file_exists($file)) {
                $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $i => $line) {
                    list($u, $p, $r) = explode(',', $line);
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($u) . "</td>";
                    echo "<td>" . ucfirst(htmlspecialchars($r)) . "</td>";
                    echo "<td style='text-align:center;'>";
                    echo '<form action="edit_user.php" method="get" style="display:inline; background:#2196F3;color:red;outline:none;box-shadow:none;border:0;padding:5px 10px;border-radius:4px;cursor:pointer; margin-right: 5px;">
                            <input type="hidden" name="id" value="' . $i . '">
                            <button type="submit" style="background:#2196F3;color:#fff;outline:none;box-shadow:none;border:0;padding:5px 10px;border-radius:4px;cursor:pointer;">Editar</button>
                          </form> ';

                    echo '<form action="delete_user.php" method="post" style="display:inline; background:#f44336;color:red;outline:none;box-shadow:none;border:0;padding:5px 10px;border-radius:4px;cursor:pointer;" onsubmit="return confirm(\'¿Seguro que deseas eliminar este usuario?\');">
                            <input type="hidden" name="id" value="' . $i . '">
                            <button type="submit" style="background:#f44336;color:#fff;outline:none;box-shadow:none;border:0;padding:5px 10px;border-radius:4px;cursor:pointer;">Eliminar</button>
                          </form>';
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
    </div>
    <br>
    <div>
        <a href="logout.php">Cerrar sesión</a>
    </div>    
    <style>
        div{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        form{
            display: flex;
            flex-direction: column;
            border: 1px solid black;
            padding: 20px;
            border-radius: 10px;
        }
        table{
            margin-top: 20px;
        }
        th, td{
            padding: 8px 12px;
        }
    </style>
</body>
</html>
