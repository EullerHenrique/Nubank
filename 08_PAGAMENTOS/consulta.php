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

    <title>Nubank - Histórico de pagamento</title>

</head>

<!-- Onload -->
<!-- Executa um JavaScript imediatamente após o carregamento de uma página:
 onload é mais frequentemente usado no elemento <body> para executar um script depois que uma página da Web carrega completamente
 todo_ o conteúdo (incluindo imagens, arquivos de script, arquivos CSS, etc.)
 -->

<body  onload="inserirTodosPagamentos(1)">

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

                    <li class="nav-item">
                        <a href="pagamento.php" class="nav-link">Agendamento de pagamento</a>
                    </li>

                    <li class="nav-item">
                        <a href="consulta.php" class="nav-link">Histórico de pagamentos</a>
                    </li>

                    <li class="nav-item">
                        <a href="../09_SUPORTE/abrir_chamado.php" class="nav-link">Abrir chamado</a>
                    </li>

                    <li class="nav-item">
                        <a href="../09_SUPORTE/consultar_chamado.php" class="nav-link">Colsultar chamado</a>
                    </li>

                    <li class="nav-item">
                        <a href="../02_PHP/logoff.php" class="nav-link">Sair</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>
</header><!-- Fim cabeçalho    -->

<div class="container">
    <div class="row">
        <div class="col mt-5 mb-5 d-flex justify-content-center">
            <h1 class="display-5">Nova Consulta</h1>
        </div>
    </div>

    <div class="row mb-2 ml-2 mr-2">
        <div class="col-md-2 mb-2">
            <select class="form-control" id="dia">
                <option value="">Dia</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
        </div>

        <div class="col-md-2 mb-2">
            <select class="form-control" id="mes">
                <option value="">Mês</option>
                <option value="1">Janeiro</option>
                <option value="2">Fevereiro</option>
                <option value="3">Março</option>
                <option value="4">Abril</option>
                <option value="5">Maio</option>
                <option value="6">Junho</option>
                <option value="7">Julho</option>
                <option value="8">Agosto</option>
                <option value="9">Setembro</option>
                <option value="10">Outubro</option>
                <option value="11">Novembro</option>
                <option value="12">Dezembro</option>
            </select>
        </div>

        <div class="col-md-2 mb-2">
            <select class="form-control" id="ano">
                <option value="">Ano</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
                <option value="2028">2028</option>
                <option value="2029">2029</option>
                <option value="2030">2030</option>

            </select>
        </div>


        <div class="col-md-6 ">
            <select class="form-control" id="tipo">
                <option value="">Tipo</option>
                <option value="Alimentação">Alimentação</option>
                <option value="Educação">Educação</option>
                <option value="Lazer">Lazer</option>
                <option value="Saúde">Saúde</option>
                <option value="Transporte">Transporte</option>
            </select>
        </div>
    </div>

    <div class="row ml-2 mr-2">
        <div class="col-md-8 mb-2">
            <input type="text" class="form-control" maxlength="80"  placeholder="Descrição" id="descricao" />
        </div>

        <div class="col-md-2 mb-2">
            <input type="text" class="form-control" maxlength="14"  placeholder="Valor" id="valor" />
        </div>

        <div class="col-9">
            <a href="../07_PAGINAS_PRINCIPAIS/home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
        </div>


        <div class="col-3 mb-2 d-flex justify-content-end">
            <button type="button" class="btn btn-lg btn-block btn-primary" onclick="pesquisarPagamento()">
                <span class="fas fa-search"></span>
            </button>
        </div>
    </div>

    <div class="row ml-2 mr-2 mt-4">
        <div class="col">
            <table class="table" >
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Tipo</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody id = "historicoPagamentos">

                </tbody>
            </table>
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