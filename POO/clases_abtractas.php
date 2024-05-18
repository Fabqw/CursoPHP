<?php
    abstract class Persona{
        function saludo(){
            return "hola";
        }
    }
    class Estudiantes extends Persona{        
    }
    $estudiante1 = new Estudiantes;
    echo $estudiante1->saludo();

?>