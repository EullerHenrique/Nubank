<?php
    session_start();

    //_SESSION -> array global entre qualquer script php da mesma sessão, ou seja, do mesmo cliente
    // O id da seção é armazenada em um cookie ("memoria cache do navegador"), desta maneira os dados são preservados
    // no navegador por um determinado tempo sem que precise-se fazer o login novamente
    // Cada sessão php dura 3 horas

    //get = exibe os dados na url
    //post = não exibe os dados na url

    //variavel utilizada para verificar se a autenticacao foi realizada
    $usuario_autenticado = false;

    //variavel utilizada para armazenar o id do usuario que fez o login
    $usuario_id = null;

    //variavel utilizada para armazenar o perfil do usuario que fez o login
    $usuario_perfil_id = null;

    //array utilizado para armazenar os dois tipos de perfil
    $perfis = [1 => 'administrativo' , 2 => 'usuario'];

    //Usuarios do sistema
    $usuarios = [
        ['id' => 1, 'email' => 'adm@outlook.com', 'senha' => '1234', 'perfil_id' => 1],
        ['id' => 2, 'email' => 'user@outlook.com', 'senha' => '1234', 'perfil_id' => 1],
        ['id' => 3, 'email' => 'jose@outlook.com', 'senha' => '1234','perfil_id' => 2],
        ['id' => 4, 'email' => 'maria@outlook.com', 'senha' => '1234', 'perfil_id' => 2],

    ];

    //Valida usuario e senha
    foreach ($usuarios as $user){
        if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']){
            $usuario_autenticado = true;
            $usuario_id = $user['id'];
            $usuario_perfil_id = $user['perfil_id'];
        }
    }

    if($usuario_autenticado){
        echo 'Usúario autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $usuario_id;
        $_SESSION['perfil_id'] = $usuario_perfil_id;
        header('Location: ../07_LOGIN_&&_HOME/home.php');
    }else{
        $_SESSION['autenticado'] = 'NAO';
        header('Location: ../07_LOGIN_&&_HOME/login.php?login=erro'); //redirecionamento com parametro
    }
?>