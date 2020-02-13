<?php
    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'NAO') {
        header('Location: ../07_PAGINAS_PRINCIPAIS/login.php?login=erro2');
    }
?>