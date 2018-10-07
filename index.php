<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    
    include_once 'Controllers/ProdutoController.php';
    include_once 'Controllers/ClienteController.php';

    require './vendor/autoload.php';

    $app = new \Slim\App;

    $app->group('/produtos', function(){
        $this->get('', 'ProdutoController:listar');    
        $this->post('', 'ProdutoController:inserir');
        $this->get('/{id:[0-9]+}', 'ProdutoController:buscarPorId');
        $this->put('/{id:[0-9]+}', 'ProdutoController:atualizar');    
        $this->delete('/{id:[0-9]+}', 'ProdutoController:deletar');
    });

    $app->group('/clientes', function(){
        $this->get('', 'ClienteController:listar');    
        $this->post('', 'ClienteController:inserir');
        $this->get('/{id:[0-9]+}', 'ClienteController:buscarPorId');
        $this->put('/{id:[0-9]+}', 'ClienteController:atualizar');    
        $this->delete('/{id:[0-9]+}', 'ClienteController:deletar');
    });

    $app->run();
?>