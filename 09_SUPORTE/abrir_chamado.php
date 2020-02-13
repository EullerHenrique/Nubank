<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../04_BOOTSTRAP_4/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../05_FONT_AWESOME/css/all.css">

    <!-- Icone do site -->
    <link rel="shortcut icon" href="../06_IMG/logo.ico" >

    <!-- Script -->
    <script src="../01_JS/script_pagamento_consulta.js"></script>

    <style>
        .card-abrir-chamado {
            width: 100%;
        }
    </style>


    <title>Nubank - Agendar Pagamento</title>

</head>

<body>

<?php
// import -> produz somente um warning caso o arquivo não exista, ou seja, o resto do programa é executado
// requiere -> produz um fatal error caso o arquivo não exista, ou seja, o resto do programa não é executad

// import_once -> se o script já tiver sido incluido não será incluido de novo
// requiere_once -> se o script já tiver sido incluido não será incluido de novo
require_once "../02_PHP/validador_acesso.php";// o require once é utilizado porque se o include once fosse utilizado ocorreria somente um warning, com isso a página que não era pra ser exibida será exibida
// o require_once é utilizado porque a validação ocorreŕa somente uma vez, no contexto atual a possibilidade de validar mais de uma vez não faz sentido
?>

<header> <!-- Inicio cabeçalho -->
    <nav class="navbar navbar-expand-md navbar-light" style="background: #8A05BE;">

        <div class="container">
            <img src="../06_IMG/log.png" width="50px" height="30px">

            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ml-4" id="nav-principal">
                <!-- .collapse.navbar-collapse para agrupar e esconder conteúdos navbar, de acordo com o breakpoint do pai. -->
                <ul class="navbar-nav ml-auto">
                    <!-- Se o usuario que fez o login possuir o perfil 2, exiba o barra lateral de pagamentos -->
                    <?php if($_SESSION['perfil_id'] == 2){?>

                        <li class="nav-item">
                            <a href="../08_AGENDAMENTO/pagamento.php" class="nav-link">Agendamento de pagamentos</a>
                        </li>

                        <li class="nav-item">
                            <a href="../08_AGENDAMENTO/consulta.php" class="nav-link">Histórico de agendamentos</a>
                        </li>
                    <?php } //fecha o if?>
                    <li class="nav-item">
                        <a href="abrir_chamado.php" class="nav-link">Abrir chamado</a>
                    </li>

                    <li class="nav-item">
                        <a href="consultar_chamado.php" class="nav-link">Colsultar chamado</a>
                    </li>

                    <li class="nav-item">
                        <a href="../02_PHP/logoff.php" class="nav-link">Sair</a>
                    </li>
                </ul>
            </div>

</header><!-- Fim cabeçalho    -->

<div class="container">
    <div class="row align-items-center justify-content-center mt-4 mb-4 ml-1 mr-1" style="height: 85vh" >

        <div class="card-abrir-chamado">
            <div class="card">
                <div class="card-header">
                    Abertura de chamado
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">

                            <form method="post" action="../02_PHP/registra_chamado.php">
                                <div class="form-group">
                                    <label>Título</label>
                                    <input name = "titulo" type="text" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Categoria</label>
                                    <select name = "categoria" class="form-control">
                                        <option value=""></option>
                                        <option>NuConta</option>
                                        <option>Cartão de crédito</option>
                                        <option>Cartão de débito</option>
                                        <option>Empréstimo</option>
                                        <option>Outros</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Descrição</label>
                                    <!-- rows = quantidade de linhas -->
                                    <textarea name = "descricao" class="form-control" rows="3"></textarea>
                                </div>

                                <?php if(isset($_GET['acao']) && $_GET['acao'] == 'sim'){?>

                                    <div class="text-success">
                                        Chamado realizado com sucesso!
                                    </div>

                                <?php } //fecha o if ?>

                                <?php if(isset($_GET['acao']) && $_GET['acao'] == 'nao'){?>
                                    <div class="text-danger">
                                        Para realizar o chamado preencha todos os dados!
                                    </div>
                                <?php } //fecha o if ?>

                                <div class="row mt-2">
                                    <div class="col-6">
                                        <a href="../07_PAGINAS_PRINCIPAIS/home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
                                    </div>

                                    <div class="col-6">
                                        <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="../04_BOOTSTRAP_4/js/bootstrap.min.js"></script>

</body>
</html>