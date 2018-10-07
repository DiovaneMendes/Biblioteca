<?php
    class Cliente {
        public $id_cliente;
        public $matricula;
        public $nome;
        public $telefone;

        function __construct($id_cliente, $matricula, $nome, $telefone){
            $this->id_cliente = $id_cliente;
            $this->matricula = $matricula;
            $this->nome = $nome;
            $this->telefone = $telefone;
        }
    }
?>