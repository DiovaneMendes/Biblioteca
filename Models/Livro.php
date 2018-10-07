<?php
    class Livro {
        public $id_livro;
        public $isbn;
        public $nome;
        public $autor;
        public $editora;
        public $ano;

        function __construct($id_livro, $isbn, $nome, $autor, $editora, $ano){
            $this->id_livro = $id_livro;
            $this->isbn = $isbn;
            $this->nome = $nome;
            $this->autor = $autor;
            $this->editora = $editora;
            $this->ano = $ano;
        }
    }
?>