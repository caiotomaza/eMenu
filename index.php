<?php
//require_once 'autoload.php';
require_once __DIR__ .  '/src/controllers/contorl_user/login_impl.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eMenu</title>
    <script>
        function openFormLogin() {
        document.getElementById("popupForm-login").style.display = "block";
        }

        function openFormCadast() {
        document.getElementById("popupForm-cadastrar").style.display = "block";
        }

        function closeFormLogin() {
        document.getElementById("popupForm-login").style.display = "none";
        }

        function closeFormCadast() {
        document.getElementById("popupForm-cadastrar").style.display = "none";
        }
    </script>
</head>
<body>
    <header name = 'Cabeçario'>

    <!-- Login -->
    <button onclick="openFormLogin()">Login</button>

    <div id="popupForm-login" style="display: none;">
    <form action="./src/controllers/contorl_user/login_impl.php" method="get"> 
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Senha:</label><br>
        <input type="password" id="password" name="senha" required><br><br>

        <button type="submit" name= "login">Entrar</button>
        <button type="button" onclick="closeFormLogin()">Voltar</button>
    </form>
    </div>


    <!-- Cadastrar-se -->
    <br>
    <button onclick="openFormCadast()">Cadastra-se</button>

    <div id="popupForm-cadastrar" style="display: none;">
    <form action="./src/controllers/contorl_user/cadastrar_impl.php" method="post">
        <label for="nome">Seu nome:</label><br>
        <input type="text" id="nome" name="nome" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Senha:</label><br>
        <input type="password" id="password" name="senha" required><br><br>

        <button type="submit" name= "cadastrar">Cadastrar-se</button>
        <button type="button" onclick="closeFormCadast()">Voltar</button>
    </form>
    </div>
    </header>
</body>
</html>