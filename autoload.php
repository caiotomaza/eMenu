<?php
/*
//Este código serve para reduzir os “require_once” lá no index.php (quer a será o nosso arquivo principal) para apenas um.
spl_autoload_register(
    function (string $nomeCompletoDaClasse){
        $caminhoCompleto = str_replace('Caio\\eMenu', 'src', $nomeCompletoDaClasse); //Tem que alterar o “ ‘Caio\\eMenu', 'src' ” para os seguintes nome: Caio = pelo autor ou instituição o eMenu = pelo nome do projeto e o src = para a pasta que estar todos os script’s.
        $caminhoArquivo = str_replace('\\', DIRECTORY_SEPARATOR, $caminhoCompleto);
        $caminhoArquivo .= '.php';
        if (file_exists($caminhoArquivo)){
            require_once $caminhoArquivo;
        }
    }
);
*/
?>