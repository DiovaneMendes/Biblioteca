<?php
    include_once './Models/Livro.php';
	include_once 'PDOFactory.php';

    class LivroDAO
    {
        public function inserir(Livro $livro){
            $qInserir = "INSERT INTO livros(isbn,nome,autor,editora,ano) VALUES (:isbn,:nome,:autor,:editora,:ano)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":isbn",$livro->isbn);
            $comando->bindParam(":nome",$livro->nome);
            $comando->bindParam(":autor",$livro->autor);
            $comando->bindParam(":editora",$livro->editora);
            $comando->bindParam(":ano",$livro->ano);
            $comando->execute();
            $livro->id_livro = $pdo->lastInsertId();
            return $livro;
        }

        public function deletar($id_livro){
            $qDeletar = "DELETE from livros WHERE id_livro=:id_livro";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qDeletar);
            $comando->bindParam(":id_livro",$id_livro);
            $comando->execute();
        }

        public function atualizar(Livro $livro){
            $qAtualizar = "UPDATE livros SET isbn=:isbn, nome=:nome, autor=:autor, editora=:editora, ano=:ano WHERE id_livro=:id_livro";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":isbn",$livro->isbn);
            $comando->bindParam(":nome",$livro->nome);
            $comando->bindParam(":autor",$livro->autor);
            $comando->bindParam(":editora",$livro->editora);
            $comando->bindParam(":ano",$livro->ano);           
            $comando->bindParam(":id_livro",$livro->id_livro);
            $comando->execute();        
        }

        public function listar(){
		    $query = 'SELECT * FROM livros';
    		$pdo = PDOFactory::getConexao();
	    	$comando = $pdo->prepare($query);
    		$comando->execute();
            $livros=array();	
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
			    $livros[] = new Livro($row->id_livro,$row->isbn,$row->nome,$row->autor,$row->editora,$row->ano);
            }
            return $livros;
        }

        public function buscarPorId($id_livro){
 		    $query = 'SELECT * FROM livros WHERE id_livro=:id_livro';		
            $pdo = PDOFactory::getConexao(); 
		    $comando = $pdo->prepare($query);
		    $comando->bindParam ('id_livro', $id_livro);
		    $comando->execute();
		    $result = $comando->fetch(PDO::FETCH_OBJ);
		    return new Livro($result->id_livro,$result->isbn,$result->nome,$result->autor,$result->editora,$result->ano);           
        }
    }
?>