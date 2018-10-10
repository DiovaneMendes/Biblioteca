<?php
    include_once './Models/Autor.php';
    include_once './Dao/AutorDAO.php';
    
    class AutorController{
        public function listar($request, $response){
            $dao = new AutorDAO;    
            $array_autores = $dao->listar();        
            
            $response = $response->withJson($array_autores);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, array $args){
            $id_autor = $args['id'];
    
            $dao = new AutorDAO;    
            $autor = $dao->buscarPorId($id_autor);  
            
            $response = $response->withJson($autor);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir($request,  $response, array $args){
            $var = $request->getParsedBody();
            $autor = new Autor(0, $var['nome'], $var['pais']);
    
            $dao = new AutorDAO;    
            $autor = $dao->inserir($autor);
    
            $response = $response->withJson($autor);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }

        public function atualizar($request, $response, array $args){
            $id_autor = $args['id'];
            $var = $request->getParsedBody();
            $dao = new AutorDAO;
            $busca = $dao->buscarPorId($id_autor);
            $autor = new Autor($busca->id_autor, $busca->nome, $busca->pais);

            if($var['nome'] == null){
                 $var['nome'] = $autor->nome; 
            }
            if($var['pais'] == null){
                $var['pais'] = $autor->pais; 
            }

            $autor = new Autor($id_autor, $var['nome'], $var['pais']);    
                
            $dao->atualizar($autor);
            
            $response = $response->withJson($autor);
            $response = $response->withHeader('Content-type', 'application/json');    

            if($autor->nome == null || $autor->pais == null){
                $response = $response->withStatus(500);
            }else{
                $response = $response->withStatus(201);   
            }
            return $response;
        }

        public function deletar($request, $response, array $args){
            $id_autor = $args['id'];
            
            $dao = new AutorDAO; 
            $autor = $dao->buscarPorId($id_autor);   
           
            $dao->deletar($id_autor);
    
            $response = $response->withJson($autor);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }
?>