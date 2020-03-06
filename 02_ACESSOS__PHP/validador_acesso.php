<?php
    session_start();

    if(!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] == 'NAO') {
        header('Location: ../07_LOGIN_&&_HOME/login.php?login=erro2');
    }

?>

