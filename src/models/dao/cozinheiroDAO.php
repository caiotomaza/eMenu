<?php 
require_once __DIR__ . '/../database/conexao.php';
use Caio\eMenu\classes\cozinheiro; //Solicita o namespace do codigo da pasta especifica necessaria (pode usar o "require_once'';" mais eu opinei por namespace pra ser mais POO e psr);

class cozinheiroDAO{
    //Função para cadastra um novo cliente.
    public function criar(Cozinheiro $cozinheiro){
        $sql = 'INSERT INTO usuario.cozinheiro (nome, email, senha) VALUES (?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cozinheiro->getId());
        $stmt->bindValue(2, $cozinheiro->getNome());
        $stmt->bindValue(3, $cozinheiro->getEmail());
        $stmt->execute();
    }

    /* // Faze de testes!
    //Função para consultar os pedidos do cliente.
    public function ler($userId){
        $sql = 'SELECT DISTINCT usuario.endereco.* FROM usuario.endereco INNER JOIN usuario.cliente ON usuario.endereco.id_cliente = usuario.cliente.id WHERE usuario.cozinheiro.id = :user_id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    */

    //Função para atualizar os endereços cadastrados.
    public function atualizar($id, $nome, $email, $senha){
        $sql = 'UPDATE usuario.cozinheiro SET nome = :nome, email = :email, senha = :senha WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //Função para excluir o usuario cadastrado.
    public function deletar($id){
        $sql = 'DELETE FROM usuario.cozinheiro WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>