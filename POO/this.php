<?php
    class Persona{
        public $nombre, $edad, $pais;

        function __construct($nombre, $edad, $pais){
            $this -> nombre = $nombre;
            $this -> edad = $edad;
            $this -> pais = $pais;
        }

        function __construct2($nombre, $edad){
            $this -> nombre = $nombre;
            $this -> edad = $edad;
        }

        function __construct3($nombre){
            $this -> nombre = $nombre;
        }

        public function mostrarInfo(){            
            echo 'Hola '.$this->nombre.' mi edad '.$this->edad.' mi pais es: '.$this->pais;
        }
    }
    $persona1 = new Persona('Fabricio',23,'Bolivia');
    $persona1 -> mostrarInfo();

    $persona2 = new Persona('Gabriela',23,$pais);
    $persona2 -> pais = 'Bolivia';
    $persona2 -> mostrarInfo();
    
?>