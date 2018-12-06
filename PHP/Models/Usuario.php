<?php
    class Usuario {
        public $id_usuario;
        public $senha;

        function __construct($id_usuario, $senha){
            $this->id_usuario = $id_usuario;
            $this->senha = $senha;
        }
    }
?>