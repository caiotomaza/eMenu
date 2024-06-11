<?php 
use Caio\eMenu\classes\cliente; //Solicita o namespace do codigo da pasta especifica necessaria (pode usar o "require_once'';" mais eu opinei por namespace pra ser mais POO e psr);
require_once __DIR__ . '/../database/conexao.php';

class clienteDAO{
    //Função para cadastra um novo cliente.
    public function criar(Cliente $cliente){
        $sql = 'INSERT INTO usuario.cliente (nome, email, senha) VALUES (?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getNome());
        $stmt->bindValue(2, $cliente->getEmail());
        $stmt->bindValue(3, $cliente->getSenha());
        $stmt->execute();
    }

    //Função para autenticar (logar) no sistema.
    public function autenticar($email, $senha) {
        $sql = 'SELECT * FROM usuario.cliente WHERE email = :email AND senha = :senha';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($row) {
            return $id_user = $row['id'];
        }
        return null;
    }

    //Função para realizar um novo pedido.
    public function criar_pedido(Cliente $cliente){
        $sql = 'INSERT INTO usuario.cliente (nome, email, senha) VALUES (?, ?, ?)';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(1, $cliente->getId());
        $stmt->bindValue(2, $cliente->getNome());
        $stmt->bindValue(3, $cliente->getEmail());
        $stmt->execute();
    }

    //Função para atualizar os pedidos cadastrados.
    public function atualizar_pedido($id, $nome, $email, $senha){
        $sql = 'UPDATE usuario.cliente SET nome = :nome, email = :email, senha = :senha WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    /* // Faze de testes!
    //Função para consultar os pedidos do cliente.
    public function ler($userId){
        $sql = 'SELECT DISTINCT usuario.endereco.* FROM usuario.endereco INNER JOIN usuario.cliente ON usuario.endereco.id_cliente = usuario.cliente.id WHERE usuario.cliente.id = :user_id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }
    */

    //Função para atualizar os endereços cadastrados.
    public function atualizar($id, $nome, $email, $senha){
        $sql = 'UPDATE usuario.cliente SET nome = :nome, email = :email, senha = :senha WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':nome', $nome, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':senha', $senha, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    //Função para excluir o usuario cadastrado.
    public function deletar($id){
        $sql = 'DELETE FROM usuario.cliente WHERE id = :id';
        $stmt = Conexao::getConn()->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>