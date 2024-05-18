<?php
    class Usuario{
        public $nombre, $correo;
        function __construct($nombre, $correo){
            $this->nombre = $nombre;
            $this->correo = $correo;
        }
        function mostrarNombre(){
            echo 'su nombre es: '.$this->nombre.'<br>';
            //return $this;
        }
        function mostrarCorreo(){
            echo 'su correo es: '.$this->correo.'<br>';
            //return $this;
        }
        function alv(){
            $this->mostrarNombre();
            $this->mostrarCorreo();
            return $this;
        }
    }

    $persona = new Usuario('Pedro', 'pp@gmial.com');
    //$persona->mostrarCorreo()->mostrarNombre();
    $persona -> alv();
?>