<?php
    include_once './Models/Livro.php';
    include_once './Dao/LivroDAO.php';
    
    class LivroController{
        public function listar($request, $response){
            $dao = new LivroDAO;    
            $array_livros = $dao->listar();        
            
            $response = $response->withJson($array_livros);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, array $args){
            $id_livro = $args['id_livro'];
    
            $dao = new LivroDAO;    
            $livro = $dao->buscarPorId($id);  
            
            $response = $response->withJson($livro);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir($request,  $response, array $args){
            $var = $request->getParsedBody();
            $livro = new Livro(0, $var['nome'], $var['preco']);
    
            $dao = new LivroDAO;    
            $livro = $dao->inserir($livro);
    
            $response = $response->withJson($produto);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }

        public function atualizar($request, $response, array $args){
            $id = $args['id'];
            $var = $request->getParsedBody();
            $produto = new Produto($id, $var['nome'], $var['preco']);
    
            $dao = new ProdutoDAO;    
            $dao->atualizar($produto);
    
            $response = $response->withJson($produto);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function deletar($request, $response, array $args){
            $id = $args['id'];
            
            $dao = new ProdutoDAO; 
            $produto = $dao->buscarPorId($id);   
           
            $dao->deletar($id);
    
            $response = $response->withJson($produto);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }
?>