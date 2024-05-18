<?php
    class Persona{
        public $nombre, $edad, $pais;
        function __construct(){
        }
        
        public function mostrarInfo(){            
            echo 'Hola '.$this->nombre.' mi edad '.$this->edad.' mi pais es: '.$this->pais;
        }
    }
    $personal = new Persona;
    $personal -> nombre = 'Fabricio';
    $personal -> edad = 23;
    $personal -> pais = 'Bolivia';

    $personal -> mostrarInfo();

    echo "<br>";
    $persona2 = new Persona;
    $persona2 -> nombre = 'Gabriela';
    $persona2 -> edad = 24;
    $persona2 -> pais = 'Bolivia';
    $persona2 -> mostrarInfo();
?>