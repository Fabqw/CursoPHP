<?php
    class Usuario{
        private $nombre;
        protected $correo;
        function __construct($nombre, $correo){            
            $this->nombre = $nombre;
            $this->correo = $correo;
        }
        function mostrarInfo(){
            return $this->correo;
        }
    }
    
    class Miembro extends Usuario{
        function __construct($nombre, $correo){
            parent::__construct($nombre, $correo);
        }
        public function mostrarCorreo(){
            return 'El correo: '.$this->correo;
        }
    }
    
    echo 'Miembro<br>';
    $persona1 = new Miembro('Fabricio','asdf@gmail.com');
    echo $persona1 -> mostrarCorreo();


?>