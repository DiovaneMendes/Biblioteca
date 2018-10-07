<?php
    include_once './Models/Cliente.php';
	include_once 'PDOFactory.php';

    class ClienteDAO
    {
        public function inserir(Cliente $cliente)
        {
            $qInserir = "INSERT INTO clientes(matricula,nome,telefone) VALUES (:matricula,:nome,:telefone)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":matricula",$cliente->matricula);
            $comando->bindParam(":nome",$cliente->nome);
            $comando->bindParam(":telefone",$cliente->telefone);
            $comando->execute();
            $cliente->id_cliente = $pdo->lastInsertId();
            return $cliente;
        }

        public function deletar($id_cliente)
        {
            $qDeletar = "DELETE from clientes WHERE id_cliente=:id_cliente";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id_cliente",$id_cliente);
            $comando->execute();
        }

        public function atualizar(Cliente $cliente)
        {
            $qAtualizar = "UPDATE clientes SET matricula=:matricula, nome=:nome, telefone=:telefone WHERE id_cliente=:id_cliente";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":matricula",$cliente->matricula);
            $comando->bindParam(":nome",$cliente->nome);
            $comando->bindParam(":telefone",$cliente->telefone);
            $comando->bindParam(":id_cliente",$cliente->id_cliente);
            $comando->execute();        
        }

        public function listar()
        {
		    $query = 'SELECT * FROM clientes';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $clientes=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $clientes[] = new Cliente($row->id_cliente,$row->matricula,$row->nome,$row->telefone);
            }
            return $clientes;
        }

        public function buscarPorId($id_cliente)
        {
 		    $query = 'SELECT * FROM clientes WHERE id_cliente=:id_cliente';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam ('id_cliente', $id_cliente);
		    $comando->execute();
		    $result = $comando->fetch(PDO::FETCH_OBJ);
		    return new Cliente($result->id_cliente,$result->matricula,$result->nome,$result->telefone);           
        }
    }
?>