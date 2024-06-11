<?php
use Caio\eMenu\classes\cliente;
require_once __DIR__ . "/../../models/dao/clienteDAO.php";
//require_once __DIR__ . "/../../models/classes/cliente.php";

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (!empty($nome) && !empty($email) && !empty($senha)) {
        $cliente = new cliente(null, $nome, $email, $senha);
        $clienteDAO = new clienteDAO();
        $clienteDAO->criar($cliente);
        //header('Location: /eMenu/src/views/home.php');
    } else {
        echo "Por favor, preencha todos os campos do formulário.";
    }

    //Fazer uma função que não deixe o usuario cadastra o mesmo email.

    if($clienteDAO){
        $clienteId = $clienteDAO->autenticar($email, $senha);
    
        if ($clienteId) {
            $_SESSION['user_id'] = $clienteId;
            echo $clienteId;
        }
    }
}
?>