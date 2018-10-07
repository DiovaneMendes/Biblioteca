<?php
    include_once './Models/Cliente.php';
    include_once './Dao/ClienteDAO.php';
    
    class ClienteController{
        public function listar($request, $response){
            $dao = new ClienteDAO;    
            $array_clientes = $dao->listar();        
            
            $response = $response->withJson($array_clientes);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function buscarPorId($request, $response, array $args){
            $id_cliente = $args['id_cliente'];
    
            $dao = new ClienteDAO;    
            $cliente = $dao->buscarPorId($id_cliente);  
            
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function inserir($request,  $response, array $args){
            $var = $request->getParsedBody();
            $cliente = new Cliente(0, $var['matricula'], $var['nome'], $var['telefone']);
    
            $dao = new ClienteDAO;    
            $cliente = $dao->inserir($cliente);
    
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            $response = $response->withStatus(201);
            return $response;
        }

        public function atualizar($request, $response, array $args){
            $id_cliente = $args['id_cliente'];
            $var = $request->getParsedBody();
            $cliente = new Cliente($id_cliente, $var['matricula'], $var['nome'], $var['telefone']);
    
            $dao = new ClienteDAO;    
            $dao->atualizar($cliente);
    
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }

        public function deletar($request, $response, array $args){
            $id_cliente = $args['id_cliente'];
            
            $dao = new clienteDAO; 
            $cliente = $dao->buscarPorId($id_cliente);   
           
            $dao->deletar($id_cliente);
    
            $response = $response->withJson($cliente);
            $response = $response->withHeader('Content-type', 'application/json');    
            return $response;
        }
    }
?>