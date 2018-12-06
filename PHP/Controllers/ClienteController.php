<?php
    //include_once __DIR__ . '../Models/Cliente.php';
    include_once './Models/Cliente.php';
    include_once './Dao/ClienteDao.php';
    
    class ClienteController{
        public function listar($request, $response){
            $dao = new ClienteDao;    
            $array_clientes = $dao->listar();        
            
            $response = $response->withJson($array_clientes);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, array $args){
            $id_cliente = $args['id'];
    
            $dao = new ClienteDao;    
            $cliente = $dao->buscarPorId($id_cliente);  
            
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir($request,  $response, array $args){
            $var = $request->getParsedBody();
            $cliente = new Cliente(0, $var['matricula'], $var['nome'], $var['telefone']);
    
            $dao = new ClienteDao;    
            $cliente = $dao->inserir($cliente);
    
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }

        public function atualizar($request, $response, array $args){
            $id_cliente = $args['id'];
            $var = $request->getParsedBody();

            $dao = new ClienteDao;  
            $busca = $dao->buscarPorId($id_cliente);

            $cliente = new Cliente($busca->id_cliente, $busca->matricula, $busca->nome, $busca->telefone);

            if($var['nome'] == null){
                 $var['nome'] = $cliente->nome; 
            }
            if($var['matricula'] == null){
                $var['matricula'] = $cliente->matricula; 
            }
            if($var['telefone'] == null){
                $var['telefone'] = $cliente->telefone; 
            }
            
            $cliente = new Cliente($id_cliente, $var['matricula'], $var['nome'], $var['telefone']);    
              
            $dao->atualizar($cliente);
            
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');

            if($cliente->matricula == null || $cliente->nome == null){
                $response = $response->withStatus(500);
            }else{
                $response = $response->withStatus(201);   
            }    

            return $response;
        }

        public function deletar($request, $response, array $args){
            $id_cliente = $args['id'];
            
            $dao = new ClienteDao; 
            $cliente = $dao->buscarPorId($id_cliente);   
           
            $dao->deletar($id_cliente);
    
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }
?>