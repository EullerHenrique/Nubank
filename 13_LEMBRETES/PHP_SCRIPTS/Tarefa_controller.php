<?php

    require_once "Conexao.php";
    require_once "Tarefa.php";
    require_once "Tarefa_service.php";

    $tarefas_bd = null;

    //Criação do objeto responsável por estabelecer uma conexão com o banco de dados
    $conexao = new Conexao();

    //Criação do objeto responsável por manipular as informações da tarefa
    $tarefa = new Tarefa();

    //Criação do objeto responsável por manipular o banco de dados
    $tarefa_service = new Tarefa_service($conexao, $tarefa);

    $acao = isset($_GET['acao'])?$_GET['acao']: $acao;

    if($acao == 'inserir') {
        if(empty($_POST['tarefa'])){
            header('Location: ../PHP_PAGES/nova_tarefa.php');
        }else {
            $tarefa->__set('tarefa', $_POST['tarefa']); //Insere a tarefa no atributo tarefa
            $tarefa_service->inserir(); //Insere a tarefa no banco de dados
            header('Location: ../PHP_PAGES/nova_tarefa.php?inclusao=1');
        }
    }else if($acao == 'recuperar'){
        $tarefas_bd = $tarefa_service->recuperar(); //Reupera todas as tarefas do banco de dados
    }else if($acao == 'atualizar'){

        $tarefa->__set('id', $_POST['id']);
        $tarefa->__set('tarefa',$_POST['tarefa']);

        if($tarefa_service->atualizar()){ // Atualiza uma determinada tarefa presente no banco de dados
            if($_GET['pag'] == 'index'){
                header('Location: ../index.php');
            }else {
                header('Location: ../PHP_PAGES/todas_tarefas.php');
            }
        }
    }else if($acao == "remover"){

        $tarefa->__set('id',$_POST['id']);
        $tarefa_service->remover();
        if($_GET['pag'] == 'index'){
            header('Location: ../index.php');

        }else {
            header('Location: ../PHP_PAGES/todas_tarefas.php');
        }
    }else if($acao == "realizado"){
        $tarefa->__set('id',$_POST['id']);
        $tarefa->__set('id_status', 2);

        $tarefa_service->marcarRealizada();

        if($_GET['pag'] == 'index'){
            header('Location: ../index.php');
        }else {
            header('Location: ../PHP_PAGES/todas_tarefas.php');
        }
    }else if($acao == 'recuperarTarefasPendentes'){
        $tarefa->__set('id_status',1);
        $tarefas_bd = $tarefa_service->recuperarTarefasPendentes();
    }



?>