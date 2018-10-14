<?php
    include_once './Models/Livro.php';
    include_once './Models/Autor.php';
	include_once 'PDOFactory.php';

    class LivroDAO{
        public function inserir(Livro $livro){
            $qInserir = "INSERT INTO livros(isbn,nome,editora,ano) VALUES (:isbn,:nome,:editora,:ano)";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qInserir);
            $comando->bindParam(":isbn",$livro->isbn);
            $comando->bindParam(":nome",$livro->nome);
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
            $qAtualizar = "UPDATE livros SET isbn=:isbn, nome=:nome, editora=:editora, ano=:ano WHERE id_livro=:id_livro";            
            $pdo = PDOFactory::getConexao();
            $comando = $pdo->prepare($qAtualizar);
            $comando->bindParam(":isbn",$livro->isbn);
            $comando->bindParam(":nome",$livro->nome);
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
            $livros = array();
		    while($row = $comando->fetch(PDO::FETCH_OBJ)){
                $autores = $this->buscarAutores($row->id_livro);                
                $livros[] = new Livro($row->id_livro,$row->isbn,$row->nome,$autores,$row->editora,$row->ano);
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
            $autores = $this->buscarAutores($id_livro);            
		    return new Livro($result->id_livro,$result->isbn,$result->nome,$autores,$result->editora,$result->ano);           
        }
        
        public function buscarAutores($id_livro){
            $query = "SELECT autores.id_autor, autores.nome, autores.pais 
                      FROM livro_autor
                      JOIN autores ON(livro_autor.id_autor = autores.id_autor)
                      WHERE autores.id_autor=:id_livro";
            $pdo = PDOFactory::getConexao(); 
            $comando = $pdo->prepare($query);
            $comando->bindParam (':id_livro', $id_livro);
            $comando->execute();
            $autores = array();
            while($row=$comando->fetch(PDO::FETCH_OBJ)){
                $autores[] = new Autor($row->id_autor,$row->nome, $row->pais);
            }
            return $autores;
        }
    }
?>