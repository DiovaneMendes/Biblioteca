<?php
    class Autor {
        public $id_autor;
        public $nome;
        public $pais;

        function __construct($id_autor, $nome, $pais){
            $this->id_autor = $id_autor;
            $this->nome = $nome;
            $this->pais = $pais;
        }
    }
?>