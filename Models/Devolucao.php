<?php
    class Devolucao {
        public $id_devolucao;
        public $verifica_atraso;

        function __construct($id_devolucao, $verifica_atraso){
            $this->id_devolucao = $id_devolucao;
            $this->verifica_atraso = $verifica_atraso;
        }
    }
?>