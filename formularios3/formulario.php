<?php
$errores = '';
if(isset($_POST['submit'])){
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];

	//echo "Tu nombre es: $nombre <br>";
	//echo "Tu correo es: $correo <br>";

	if(!empty($nombre)){
        //elimina espacios
		$nombre = trim($nombre);
        //elimina codigo html
		$nombre = htmlspecialchars($nombre);
		$nombre = stripcslashes($nombre);

    $nombre = filter_var($nombre, /*FILTER_SANITIZE_STRING*/FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		echo "Nombre es: $nombre <br>";
	}
	else
	{
	    $errores .= 'Por favor agrega tu nombre <br>';
	}
	if(!empty($correo)){
		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

		if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
			$errores .= 'Por favor ingresa tu correo correcto';
		}
		else
			echo "Tu correo es: $correo";
	}
	else
	{
		$errores .= 'Por favor agrega un correo';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Documento</title>
		<style>
			.error{color:red;}
		</style>
	</head>
	<body>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<input type="text" placeholder="Nombre" name="nombre" id="nombre">
			<input type="text" placeholder="Correo" name="correo" id="correo">			
			<?php if(!empty($errores)): ?>
				<div class="error"><?php echo $errores; ?></div>
			<?php endif; ?>
			<input type="submit" value="Enviar" name="submit">
		</form>
	</body>
</html>