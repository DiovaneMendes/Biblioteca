<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    include_once 'Controllers/ClienteController.php';
    include_once 'Controllers/AutorController.php';
    include_once 'Controllers/LivroController.php';

    require './vendor/autoload.php';

    $app = new \Slim\App;

    $app->group('/clientes', function(){
        $this->get('', 'ClienteController:listar');    
        $this->post('', 'ClienteController:inserir');
        $this->get('/{id:[0-9]+}', 'ClienteController:buscarPorId');
        $this->put('/{id:[0-9]+}', 'ClienteController:atualizar');    
        $this->delete('/{id:[0-9]+}', 'ClienteController:deletar');
    });

    $app->group('/autores', function(){
        $this->get('', 'AutorController:listar');    
        $this->post('', 'AutorController:inserir');
        $this->get('/{id:[0-9]+}', 'AutorController:buscarPorId');
        $this->put('/{id:[0-9]+}', 'AutorController:atualizar');    
        $this->delete('/{id:[0-9]+}', 'AutorController:deletar');
    });

    $app->group('/livros', function(){
        $this->get('', 'LivroController:listar');    
        $this->post('', 'LivroController:inserir');
        $this->get('/{id:[0-9]+}', 'LivroController:buscarPorId');
        $this->put('/{id:[0-9]+}', 'LivroController:atualizar');    
        $this->delete('/{id:[0-9]+}', 'LivroController:deletar');

        //$this->get('/a', 'LivroController:listarTudo');
    });

    $app->run();
?>