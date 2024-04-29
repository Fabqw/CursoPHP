<?php 
    $materias = [ 
        [ 
            'nombre' => 'Algebra 1', 
            'docente' => 'Lic. Tellez', 
            'nota' => '100', 
            'semestre' => '1 semestre' 
        ], 
        [ 
            'nombre' => 'Calculo 1', 
            'docente' => 'Lic. Gonzalez', 
            'nota' => '80', 
            'semestre' => '2 semestre' 
        ], 
        [ 
            'nombre' => 'Ecuciones diferenciales', 
            'docente' => 'Lic. Zenon', 
            'nota' => '70', 
            'semestre' => '3 semestre' 
        ], 
    ]; 
    foreach($materias as $materia) 
    { 
        echo "Nombre de la materia:".$materia['nombre']." "; 
        echo "Nota de la materia:".$materia['nota']."<br>"; 
    }; 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <title>Recorrido arreglo</title> 
</head> 
<body> 
    <h1>Lista de Materias</h1> 
    <ul> 
        <?php 
            foreach($materias as $materia) 
            { 
                echo "<li> Nombre del docente: ".$materia['docente']."<br>". 
                "Semestre: ".$materia['semestre']."<br> </li>"; 
            }; 
 
            foreach($materias as $materia) 
            { 
                echo "<li> Notas: ".$materia['nota']."<br> </li>"; 
            }; 
 
            //recordar ver sort() 
        ?> 
    </ul> 
</body> 
</html>