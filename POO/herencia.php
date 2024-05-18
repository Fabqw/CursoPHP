<?php
    class Persona{
        public $nombre, $edad, $pais;

        function __construct($nombre, $edad, $pais){
            $this -> nombre = $nombre;
            $this -> edad = $edad;
            $this -> pais = $pais;
        }

        public function mostrarInfo(){            
            echo 'Hola '.$this->nombre.' mi edad '.$this->edad.' mi pais es: '.$this->pais;
        }
    }

    class Estudiante extends Persona{
        public $semestre;
        function __construct($nombre, $edad, $pais, $semestre){
            parent:: __construct($nombre, $edad, $pais);
            $this -> semestre = $semestre;
        }        
        
        public function mostrarInfo(){
            parent::mostrarInfo();    
            echo ' mi semestre es: '.$this->semestre;
        }
    }

    class Docente extends Persona{
        public $materia, $sueldo;
        function __construct($nombre, $edad, $pais,$materia,$sueldo){
            parent:: __construct($nombre, $edad, $pais);
            $this -> materia = $materia;
            $this -> sueldo = $sueldo;
        }
        function mostrarInfo(){
            parent::mostrarInfo();
            echo ' mi materia es: '.$this->materia.' mi sueldo es: '.$this ->sueldo;
        }
    }

    echo 'Persona<br>';
    $persona1 = new Persona('Fabricio',23,'Bolivia');
    $persona1 -> mostrarInfo();
    echo '<br>Estudiante<br>';
    $estudiante1 = new Estudiante('Fabricio',23,'Bolivia', '4 semestre');
    $estudiante1 -> mostrarInfo();
    echo '<br>Docente<br>';
    $docente1 = new Docente('Gabriela',35,'Bolivia', 'Estadistica', 4000);
    $docente1 -> mostrarInfo();
    
?>