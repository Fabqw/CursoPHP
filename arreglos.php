<?php 
    //arreglos 
    echo "<br> ---- Arreglo indexados -----"."<br>"; 
    $semana = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'); 
    echo $semana[0]. "<br>"; 
    echo $semana[1]. "<br>"; 
    echo $semana[2]. "<br>"; 
    echo $semana[3]. "<br>"; 
    echo $semana[4]. "<br>"; 
    echo $semana[5]. "<br>"; 
    echo $semana[6]. "<br>"; 
 
    echo "<br> ---- Asignacion -----"."<br>"; 
    $semana[0] = "Domingo"; 
    echo $semana[0]."<br>"; 
 
    echo "<br> ---------"."<br>"; 
    $estudiantes = array('nombre'=> 'Juan', 'edad' => 25); 
    echo $estudiantes['nombre']; 
 
    echo "<br> ---- Arreglo asociativos -----"."<br>"; 
    $mascota = [ 
        'nombre'=>'Rocky',  
        'edad'=>2, 
        'raza' => 'Golden' 
    ]; 
    //var_dump($mascota); 
    echo $mascota["nombre"]."<br>"; 
    echo $mascota["edad"]."<br>"; 
    echo $mascota["raza"]."<br>"; 
 
    //concatenar es echo ""."" 
    echo "<br> ---- Arreglo multidimensionales -----"."<br>"; 
    $amigos = [ 
        [ 
        'nombre' => 'Gustabo', 
        'telefon' => 6457878 
        ], 
        [ 
            'nombre' => 'Keyla', 
            'telefono' => 123456789 
        ] 
    ]; 
    echo "Tengo: ".count($amigos)." amigos<br>";  
    var_dump($amigos); 
 
    echo "<br> ---- Arreglo multidimensionales matrerias ----- <br> <br>"; 
 
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
    /*foreach($materias as $materia) 
    { 
        foreach($materia as $docente) 
        { 
         echo " $docente "; 
        } 
     echo "<br>"; 
    };*/ 
 
    echo $materias[0]['nombre']."<br>"; 
    echo $materias[1]['docente']."<br>"; 
    echo $materias[2]['nota']."<br>"; 
    echo $materias[0]['semestre']."<br>"; 
    echo "Hay ".count($materias)." matreias<br>"; 
    //imprimir el ultimo 
    echo $materias[count($materias)-1]['nombre']; 
?>