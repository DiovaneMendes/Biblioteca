<?php
    use \Psr\Http\Message\ServerRequestInterface as Request;
    use \Psr\Http\Message\ResponseInterface as Response;

    include_once 'Produto.php';
    include_once 'ProdutoDAO.php';

    require './vendor/autoload.php';

    $app = new \Slim\App;

    $app->get('/produtos', function(){
        
    });

    $app->get('/produtos/{id}', function(){
        
    });

    $app->post('/produtos', function(){
        
    });

    $app->put('/produtos/{id}', function(Request $request, Response $response, array $args){
        $id = $args['id'];
        $var = $request->getParsedBody();
        $produto = new Produto($id, $var['nome'], $var['preco']);

        $dao = new ProdutoDAO;    
        $dao->atualizar($produto);

        $response = $response->withJson($produto);
        $response = $response->withHeader('Content-type', 'application/json');    
        return $response;
    });

    $app->delete('/produtos/{id}', function(){
        
    });


    $app->run();
?>