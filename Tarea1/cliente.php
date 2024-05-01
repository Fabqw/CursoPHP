<?php
// Crear una lista de clientes y mostrar los primeros 5 clientes
    $clientes = [
        [
            'nombre' => 'Fabricio',
            'apellido' => 'Quispe',
            'CI' => '8400789 LP',
            'celular' => 64123459,
        ],
        [
            'nombre' => 'Gabriela',
            'apellido' => 'Lima',
            'CI' => '66489752 LP',
            'celular' => 78441692,
        ],
        [
            'nombre' => 'Daniel',
            'apellido' => 'Flores',
            'CI' => '12344897 CB',
            'celular' => 66908045,
        ],
        [
            'nombre' => 'Aurora',
            'apellido' => 'Vega',
            'CI' => '11984630 LP',
            'celular' => 66908045,
        ],
        [
            'nombre' => 'Carlos',
            'apellido' => 'Ramirez',
            'CI' => '65489710 SC',
            'celular' => 77102569,
        ],
    ];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Lista de clientes</h2>
    <div class="lista">        
        <?php if (!empty($clientes)): ?>
            <?php foreach ($clientes as $cliente): ?>
                <div class="cliente">
                    <dl>
                        <dt>Cliente</dt>
                        <dd>Nombre: <?php echo $cliente['nombre']; ?></dd>
                        <dd>Apellido: <?php echo $cliente['apellido']; ?></dd>
                        <dd>CI: <?php echo $cliente['CI']; ?></dd>
                        <dd>Celular: <?php echo $cliente['celular']; ?></dd>
                    </dl>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay clientes disponibles.</p>
        <?php endif; ?>
    </div>
</body>
</html>
