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
            $id_livro = $args['id'];
    
            $dao = new LivroDAO;    
            $livro = $dao->buscarPorId($id_livro);  
            
            $response = $response->withJson($livro);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir($request,  $response, array $args){
            $var = $request->getParsedBody();
            $livro = new Livro(0, $var['isbn'], $var['nome'],[], $var['editora'], $var['ano']);
    
            $dao = new LivroDAO;    
            $livro = $dao->inserir($livro);
    
            $response = $response->withJson($livro);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }

        public function atualizar($request, $response, array $args){
            $id_livro = $args['id'];
            $var = $request->getParsedBody();
            $dao = new LivroDAO;  

            $busca = $dao->buscarPorId($id_livro);
            
            $livro = new Livro($busca->id_livro, $busca->isbn, $busca->nome, $busca->autor, $busca->editora, $busca->ano);

            if($var['isbn'] == null){
                $var['isbn'] = $livro->isbn; 
            }
            if($var['nome'] == null){
                $var['nome'] = $livro->nome; 
            }
            if($var['autor'] == null){
                $var['autor'] = $livro->autor; 
            }
            if($var['editora'] == null){
               $var['editora'] = $livro->editora; 
            }
            if($var['ano'] == null){
                $var['ano'] = $livro->ano; 
            }           
            
            $livro = new Livro(0, $var['isbn'], $var['nome'], $var['autor'], $var['editora'], $var['ano']);    
              
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
            $id_livro = $args['id'];
            
            $dao = new LivroDao; 
            $livro = $dao->buscarPorId($id_livro);   
           
            $dao->deletar($id_livro);
    
            $response = $response->withJson($livro);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarAutores($request, $response){
            $dao = new LivroDao;    
            $array_autores = $dao->buscarAutores(5);
            $response = $response->withJson($array_autores);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }
?>