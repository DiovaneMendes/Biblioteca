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
            $livro = $dao->buscarPorId($id_livro);  
            
            $response = $response->withJson($livro);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir($request,  $response, array $args){
            $var = $request->getParsedBody();
            $livro = new Livro(0, $var['isbn'], $var['nome'], $var['autor'], $var['editora'], $var['ano']);
    
            $dao = new LivroDAO;    
            $livro = $dao->inserir($livro);
    
            $response = $response->withJson($livro);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }

        public function atualizar($request, $response, array $args){
            $id_livro = $args['id_livro'];
            $var = $request->getParsedBody();
            $livro = new Livro(0, $var['isbn'], $var['nome'], $var['autor'], $var['editora'], $var['ano']);
    
            $dao = new LivroDAO;    
            $dao->atualizar($livro);
    
            $response = $response->withJson($livro);
            $response = $response->withHeader('Content-type', 'application/json');
            
            if($livro->isbn == null || $livro->nome == null){
                $response = $response->withStatus(500);
            }else{
                $response = $response->withStatus(201);   
            } 
            
            return $response;
        }

        public function deletar($request, $response, array $args){
            $id_livro = $args['id_livro'];
            
            $dao = new LivroDao; 
            $livro = $dao->buscarPorId($id_livro);   
           
            $dao->deletar($id_livro);
    
            $response = $response->withJson($livro);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }
?>