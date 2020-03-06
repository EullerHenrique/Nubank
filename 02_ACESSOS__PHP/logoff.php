<?php
    session_start();

    //remove índices do array sessão
    //unset(); //remove o valor presente no indice apenas se existir

    //destroi a o array sessão
    session_destroy();

    //redireciona para a pagina principal
    header('Location: ../07_LOGIN_&&_HOME/login.php');
?>