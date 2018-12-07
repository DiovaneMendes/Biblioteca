<?php
    include_once './Models/Autor.php';
	include_once 'PDOFactory.php';

    class AutorDAO{
        public function inserir(Autor $autor){
            $qInserir = "INSERT INTO autores(nome,pais) VALUES (:nome,:pais)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":nome",$autor->nome);
            $comando->bindParam(":pais",$autor->pais);
            $comando->execute();
            $autor->id_autor = $pdo->lastInsertId();
            return $autor;
        }

        public function deletar($id_autor){
            $qDeletar = "DELETE from autores WHERE id_autor=:id_autor";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id_autor",$id_autor);
            $comando->execute();
        }

        public function atualizar(Autor $autor){
            $qAtualizar = "UPDATE autores SET nome=:nome, pais=:pais WHERE id_autor=:id_autor";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":nome",$autor->nome);
            $comando->bindParam(":pais",$autor->pais);
            $comando->bindParam(":id_autor",$autor->id_autor);
            $comando->execute();        
        }

        public function listar(){
		    $query = 'SELECT * FROM autores';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $autores=array();
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $autores[] = new Autor($row->id_autor,$row->nome,$row->pais);
            }
            return $autores;
        }

        public function buscarPorId($id_autor){
 		    $query = 'SELECT * FROM autores WHERE id_autor=:id_autor';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam ('id_autor', $id_autor);
		    $comando->execute();
		    $result = $comando->fetch(PDO::FETCH_OBJ);
		    return new Autor($result->id_autor,$result->nome,$result->pais);           
        }
    }
?>