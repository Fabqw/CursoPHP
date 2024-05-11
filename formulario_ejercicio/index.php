<?php
$errores = '';
$enviado = '';

// Comprobamos que el formulario haya sido enviado.
if (isset($_POST['submit'])) {
	$producto = $_POST['producto'];
	$cantidad = $_POST['cantidad'];
	$costo = $_POST['costo'];

// Comprobamos que el nombre no este vacio.
	if (!empty($producto)) {
		// Saneamos el nombre para eliminar caracteres que no deberian estar.
		$producto = trim($producto);
		$producto = filter_var($producto, FILTER_SANITIZE_STRING);

		if ($producto == "") {
			$errores.= 'Por favor ingresa un producto.<br />';
		}
	} else {
		$errores.= 'Por favor ingresa un producto.<br />';
	}


    if (!empty($cantidad)) {
        $cantidad = intval($cantidad);
	} else {
		$errores.= 'Por favor ingresa una cantidad.<br />';
	}

    // Calcular el precio total (cantidad * costo)
    

    // Calcular el IVA (por ejemplo, suponiendo un 16%)

    

// Comprobamos si hay errores, si no hay entonces enviamos.
}

function total($a, $b){
    $t = $a* $b;
    echo $t;
}
function iva($a, $b){
    $t = $a* $b *0.13;
    echo $t;
}
require 'index.view.php';

?>