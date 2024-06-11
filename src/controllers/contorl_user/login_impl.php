<?php
require_once __DIR__ . '/../../models/dao/clienteDAO.php';

session_start();

if (isset($_GET['login'])){
    $email = $_GET['email'];
    $senha = $_GET['senha'];

    $clienteDAO = new clienteDAO();
    $clienteId = $clienteDAO->autenticar($email, $senha);

    /*
    $administradorDAO = new AdiminDAO();
    $administradorId = $administradorDAO->autenticar($email, $senha);
    */

    if ($clienteId) {
        $_SESSION['user_id'] = $clienteId;
        header('Location: /eMenu/src/views/home.php');
        exit();
    /*
    } elseif ($administradorId) {
        $_SESSION['admin_id'] = $administradorId;
        //header('location: dashboard_adm.php');
        exit();
    */
    } else {
        echo 'Não';
        //header('Location: index.php');
        exit();
    }
}
?>