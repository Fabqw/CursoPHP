<?php
    class Persona{
        public static $dia = '7  de septiembre';
        public static function saludo($nombre=null){
            if($nombre){
                return 'Hola, bunen dia '.$nombre;
            }else{
                return 'Hola, bunen dia ';
            }
        }
    }

    $estudiante1 = new Persona;
    echo $estudiante1::saludo('Fabricio');
    
    $estudiante2 = new Persona;
    echo $estudiante2::saludo();

?>