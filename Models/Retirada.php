<?php
    class Retirada {
        public $id_retirada;
        public $quantidade_vezes;
        public $calculo_data;
        public $cliente;

        function __construct($id_retirada, $quantidade_vezes, $calculo_data, $cliente){
            $this->id_retirada = $id_retirada;
            $this->quantidade_vezes = $quantidade_vezes;
            $this->calculo_data = $calculo_data;
            $this->cliente = $cliente;
        }
    }
?>