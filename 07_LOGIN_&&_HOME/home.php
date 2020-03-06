<!DOCTYPE html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">

    <!-- IMPORTANT -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../04_BOOTSTRAP_4/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="../05_FONT_AWESOME/css/all.css">

    <!-- Icone do site -->
    <link rel="shortcut icon" href="../06_IMG/logo.ico" >

    <style>
        .card-home {
            width: 100%;
        }
    </style>

    <!-- Estilo Customizado -->
    <link rel="stylesheet" type="text/css" href="../03___CSS/header.css">

    <title>Nubank - Menu </title>

</head>

<body>

<?php
    // import -> produz somente um warning caso o arquivo não exista, ou seja, o resto do programa é executado
    // requiere -> produz um fatal error caso o arquivo não exista, ou seja, o resto do programa não é executad

    // import_once -> se o script já tiver sido incluido não será incluido de novo
    // requiere_once -> se o script já tiver sido incluido não será incluido de novo
    require_once "../02_ACESSOS__PHP/validador_acesso.php";// o require once é utilizado porque se o include once fosse utilizado ocorreria somente um warning, com isso a página que não era pra ser exibida será exibida
    // o require_once é utilizado porque a validação ocorreŕa somente uma vez, no contexto atual a possibilidade de validar mais de uma vez não faz sentido
?>

<!-- header -->

<!-- header -->
<?php
    require_once "../07_LOGIN_&&_HOME/header.php";
?>

<div class="container">
    <div class="row align-items-center justify-content-center mt-2 ml-1 mr-1">

        <!-- Inicio card menu -->
        <div class="card-home">

            <div class="card mb-3 mt-2">

                <div class="card-header d-flex justify-content-center">
                    Menu
                </div>

                <div class="card-body">

                    <!-- Se o usuario que fez o login possuir o perfil 2, exiba o card de pagamentos -->
                    <?php if($_SESSION['perfil_id'] == 2){?>
                        <!-- Inicio card lembretes-->

                        <div class="card mb-3">

                            <div class="card-header d-flex justify-content-center">
                                Lembretes de pagamentos
                            </div>

                            <div class="row">
                                <div class="card-body col ml-2 mr-2">

                                    <div class="card">

                                        <div class="card-header d-flex justify-content-center">
                                            Pagamentos pendentes
                                        </div>

                                        <div class="card-body">

                                            <div class="row mb-2">
                                                <div class="col d-flex justify-content-center">
                                                    <a href="../13_LEMBRETES/index.php" class="text-decoration-none">
                                                        <img src="../06_IMG/formulario_consultar_chamado.png" width="70" height="70">
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-body col-6 pr-2">

                                    <div class="card ml-2">

                                        <div class="card-header">
                                            <div class="text-center">
                                                Novo
                                            </div>
                                            <div class="text-center">
                                                Lembrete
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="row mb-2">
                                                <div class="col d-flex justify-content-center">
                                                    <a href="../13_LEMBRETES/PHP_PAGES/nova_tarefa.php" class="text-decoration-none">
                                                        <img src="../06_IMG/formulario_abrir_chamado.png" width="70" height="70">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body col-6 pl-2">

                                    <div class="card mr-2">

                                        <div class="card-header">
                                            <div class="text-center">
                                                Todos
                                            </div>
                                            <div class="text-center">
                                                Lembretes
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="row mb-2">
                                                <div class="col d-flex justify-content-center">
                                                    <a href="../13_LEMBRETES/PHP_PAGES/todas_tarefas.php" class="text-decoration-none">
                                                        <img src="../06_IMG/formulario_consultar_chamado.png" width="70" height="70">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim card lembretes-->
                    <?php } //fim do if ?>


                    <!-- Se o usuario que fez o login possuir o perfil 2, exiba o card de pagamentos -->
                    <?php if($_SESSION['perfil_id'] == 2){?>
                        <!-- Inicio card agendamento-->

                        <div class="card">

                            <div class="card-header d-flex justify-content-center">
                                Agendamento
                            </div>

                            <div class="row">
                                <div class="card-body col-6 pr-2">

                                    <div class="card ml-2 ">

                                        <div class="card-header p-3"  style="font-size: 13px; padding-bottom: 23px;">
                                            <div class="text-center">
                                                Agendar
                                            </div>
                                            <div class="text-center">
                                                Pagamento
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="row mb-2">
                                                <div class="col d-flex justify-content-center">
                                                    <a href="../08_AGENDAMENTO/agendamento.php" class="text-decoration-none">
                                                        <img src="../06_IMG/formulario_abrir_chamado.png" width="70" height="70">
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="card-body col-6 pl-2">

                                    <div class="card mr-2">

                                        <div class="card-header p-3" style="font-size: 13px; padding-bottom: 23px;">
                                            <div class="text-center">
                                                Consultar
                                            </div>
                                            <div class="text-center">
                                                Agendamento
                                            </div>
                                        </div>

                                        <div class="card-body">

                                            <div class="row mb-2">
                                                <div class="col d-flex justify-content-center">
                                                    <a href="../08_AGENDAMENTO/consulta.php" class="text-decoration-none">
                                                        <img src="../06_IMG/formulario_consultar_chamado.png" width="70" height="70">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim card agendamento-->
                    <?php } //fim do if ?>

                    <!-- Se o usuario que fez o login possuir o perfil 1, exiba o card de e-mail -->
                    <?php if($_SESSION['perfil_id'] == 1){?>
                        <!-- Inicio card e-mail-->

                            <div class="card mb-4 ml-2">

                                <div class="card-header d-flex justify-content-center">
                                    E-mail
                                </div>

                                <div class="card-body">

                                    <div class="row mb-2">
                                        <div class="col d-flex justify-content-center">
                                            <a href="../10_EMAIL/email.php" class="text-decoration-none">
                                                <img src="../06_IMG/email.png" width="70" height="70">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!--Fim card e-mail-->
                    <?php } //fim do if ?>

                    <!-- Inicio card suporte-->

                        <div class="card mt-3">

                            <div class="card-header d-flex justify-content-center">
                                Suporte
                            </div>

                            <div class="row">
                                <div class="card-body col-6 pr-2">

                                    <div class="card">

                                        <div class="card-header">
                                            <div class="text-center">
                                                Abrir
                                            </div>
                                            <div class="text-center">
                                                Chamado
                                            </div>
                                        </div>



                                        <div class="card-body">

                                            <div class="row mb-2">
                                                <div class="col d-flex justify-content-center">
                                                    <a href="../09_SUPORTE/abrir_chamado.php" class="text-decoration-none">
                                                        <img src="../06_IMG/formulario_abrir_chamado.png" width="70" height="70">
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                    <div class="card-body col-6 pl-2">

                                        <div class="card mr-2">

                                            <div class="card-header">
                                                <div class="text-center">
                                                    Consultar
                                                </div>
                                                <div class="text-center">
                                                    Chamado
                                                </div>
                                            </div>

                                            <div class="card-body">

                                                <div class="row mb-2">
                                                    <div class="col d-flex justify-content-center">
                                                        <a href="../09_SUPORTE/consultar_chamado.php" class="text-decoration-none">
                                                            <img src="../06_IMG/formulario_consultar_chamado.png" width="70" height="70">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  <!-- Fim card suporte-->
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