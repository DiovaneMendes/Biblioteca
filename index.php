<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    include_once 'Models/Produto.php';
    include_once 'ProdutoDAO.php';
    include_once 'Controller/ProdutoController.php';

    require './vendor/autoload.php';

    $app = new \Slim\App;

    $app->get('/produtos', 'ProdutoController:listar');

    $app->get('/produtos/{id}', 'ProdutoController:buscarPorId');

    $app->post('/produtos', 'ProdutoController:inserir');

    $app->put('/produtos/{id}', 'ProdutoController:atualizar');

    $app->delete('/produtos/{id}', 'ProdutoController:deletar');


    $app->run();
?>