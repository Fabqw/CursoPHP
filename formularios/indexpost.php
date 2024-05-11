<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Documento</title>
	</head>
	<body>
		<form action="recibepost.php" method="post">
			<input type="text" placeholder="Nombre:" name="nombre" id="nombre">
			<br>
			<label for="hombre">Hombre</label>
			<input type="radio" name="sexo" value="hombre" id="hombre">
			<br>
			<label for="mujer">Mujer</label>
			<input type="radio" name="sexo" value="mujer" id="mujer">
			<br>
			<select name="gestion" id="gestion">
				<option value="2023">2023</option>
				<option value="2024">2024</option>
				<option value="2025">2025</option>
			</select>
			<br>
			<label for="terminos">Aceptas los Terminos?</label>
			<input type="checkbox" name="terminos" id="terminos" value="ok">
			<br>
			<input type="submit" value="Enviar">
		</form>
	</body>
</html>
