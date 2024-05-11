<?php
    // Realizar un programa que muestre los datos de un familia
    $padre = ['nombre'=>'Fabricio','edad'=>40, 'trabajo'=>'Programador', 'Hobbie'=>'Videojuegos'];
    $madre = ['nombre'=>'Gabriela','edad'=>41, 'trabajo'=>'Medico', 'Hobbies'=>'Ver series'];
    $hijos = [
        'Hijo1' =>['nombre' => 'Megan', 'curso'=>6, 'sexo'=>'mujer', 'edad'=>11],
        ['nombre' => 'Daniela', 'curso'=>5, 'sexo'=>'mujer', 'edad'=>10],
        ['nombre' => 'Jose', 'curso'=>4, 'sexo'=>'varon', 'edad'=>9],
        'Hijo4' =>['nombre' => 'Carlos', 'curso'=>3, 'sexo'=>'varon', 'edad'=>8],        
    ];
    function mostrar($padre, $hijos){
        echo "DATOS DEL PADRE: "."<br>";
        var_dump($padre);
        echo "<br>-------Hijo-------<br>";
        foreach($hijos as $hijo){
            if($hijo["sexo"] == "varon"){                
                foreach ($hijo as $dato){
                    echo $dato." ";
                }
                echo "<br>";
            }
        }
    }
    mostrar($padre, $hijos);

    $nombre = "Jose";
    function edad_hijo($nombre, $hijos){
        foreach ($hijos as $hijo){
            if($hijo["nombre"] == $nombre){
                return $hijo["edad"];
            }
        }
        return "Hijo no encongtrado";
    }
    echo "La edad del hijo ",$nombre," es: ",edad_hijo($nombre, $hijos);
?>