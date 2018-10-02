<?php
    include_once 'Produto.php';
    include_once 'ProdutoDAO.php';
    
    class ProdutoController{
        public function listar(Request $request, Response $response){
            $dao = new ProdutoDAO;    
            $array_produtos = $dao->listar();        
            
            $response = $response->withJson($array_produtos);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId(){
            
        }

        public function inserir(){
            
        }

        public function deletar(){
            
        }
    }
?>