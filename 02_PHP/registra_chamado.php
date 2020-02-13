<?php

    //corrige possível bug caso o usuário utilize cerquilhas,
    // pois as cerquilhas são usadas como as divisões dos valores no arquivo.txt,
    // as divisões são usadas para a extração de tais informações ser possível

    //str_replace substui as cerquilhas de cada valor por '-'
    //str_replace retorna o novo array
    //implode percorre o array inserindo # no final de cada valor
    //PHP_EOL = '\n';

    session_start();

    $texto = $_SESSION['id'];
    $texto = $texto.'#'.implode('#', str_replace('#', '-', $_POST)).PHP_EOL;

    // Valida se tem dados em branco para o cadastro
    if (!empty($_POST['titulo']) && !empty($_POST['categoria'])  && !empty($_POST['descricao'])) {

        //'a' -> Abre somente para escrita; coloca o ponteiro do arquivo no final
        // do arquivo. Se o arquivo não existir, tenta criá-lo.

        $arquivo = fopen('arquivo.txt', 'a'); //abre o arquivo

        fwrite($arquivo, $texto); // salva os dados no arquivo

        fclose($arquivo); // fecha o arquivo

        header('Location: ../09_SUPORTE/abrir_chamado.php?acao=sim');
    }else{
        header('Location: ../09_SUPORTE/abrir_chamado.php?acao=nao');
    }


    ?>