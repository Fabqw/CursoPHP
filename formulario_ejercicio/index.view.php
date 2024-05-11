<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Formulario de contacto</title>
	<link rel="stylesheet" href="estilos.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="wrap">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			
			<input type="text" class="form-control" name="producto" id="producto" placeholder="Nombre del producto:" value="<?php if(!$enviado && isset($producto)) echo $producto?>">
		
			<input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad del producto:" value="<?php if(!$enviado && isset($cantidad)) echo $cantidad?>">
            
            <input type="text" class="form-control" name="costo" id="costo" placeholder="Costo del producto:" value="<?php if(!$enviado && isset($costo)) echo $costo?>">

            <h2>Precio total:</h2>
            <textarea name="total" id="total" readonly><?php total($_POST['cantidad'], $_POST['costo'] ); ?></textarea>

            <h2>El valor del IVA es:</h2>
            <textarea name="iva" id="iva" readonly><?php iva($_POST['cantidad'], $_POST['costo']); ?></textarea>
		
			<?php if (!empty($errores)): ?>
				<div class="alert error" role="alert">
					<?php echo $errores; ?>
				</div>
			<?php elseif($enviado) : ?>
				<div class="alert success" role="alert">
					<?php echo 'Enviado Correctamente'; ?>
				</div>
			<?php endif; ?>
		
			<input type="submit" name="submit" class="btn btn-primary" value="Enviar Correo">
		</form>
	</div>
</body>