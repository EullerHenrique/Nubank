<html>
  <head>
    <meta charset="utf-8" />
      <title>Nubank - Menu</title>

      <link rel="stylesheet" href="../04_BOOTSTRAP_4/css/bootstrap.min.css">

      <!-- Icone do site -->
      <link rel="shortcut icon" href="../06_IMG/logo.ico" >

      <style>
          .card-home {
              width: 100%;
          }
      </style>

  </head>

  <body>
    <?php

        // import -> produz somente um warning caso o arquivo não exista, ou seja, o resto do programa é executado
        // requiere -> produz um fatal error caso o arquivo não exista, ou seja, o resto do programa não é executad

        // import_once -> se o script já tiver sido incluido não será incluido de novo
        // requiere_once -> se o script já tiver sido incluido não será incluido de novo

        require_once "../02_PHP/validador_acesso.php";// o require é utilizado porque se o include once fosse utilizado ocorreria somente um warning, com isso a página que não era pra ser exibida será exibida
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
                                <a href="../08_PAGAMENTOS/pagamento.php" class="nav-link">Agendar pagamento</a>
                            </li>

                            <li class="nav-item">
                                <a href="../08_PAGAMENTOS/consulta.php" class="nav-link">Histórico de pagamentos</a>
                            </li>
                        <?php } //fecha o if?>
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
        <div class="d-flex align-items-center justify-content-center" style="height: 90vh" >

            <!-- Inicio card menu -->
            <div class="card-home">

              <div class="card">

                <div class="card-header d-flex justify-content-center">
                  Menu
                </div>

                <div class="card-body">
                    <!-- Se o usuario que fez o login possuir o perfil 2, exiba o card de pagamentos -->
                    <?php if($_SESSION['perfil_id'] == 2){?>
                        <!-- Inicio card pagamentos-->
                        <div class="card-home">

                            <div class="card mb-4">

                                <div class="card-header d-flex justify-content-center">
                                    Pagamentos
                                </div>

                                <div class="card-body">

                                    <div class="row mb-2">
                                        <div class="col-6 d-flex justify-content-center">
                                            <a href="../08_PAGAMENTOS/pagamento.php" class="text-decoration-none">
                                                <img src="../06_IMG/formulario_abrir_chamado.png" style="margin-left: 40px" width="70" height="70">
                                                <div class="text-center" style="color: #8A05BE">Agendar pagamento</div>
                                            </a>
                                        </div>

                                        <div class="col-6 d-flex justify-content-center">
                                            <a href="../08_PAGAMENTOS/consulta.php" class="text-decoration-none">
                                                <img src="../06_IMG/formulario_consultar_chamado.png" style="margin-left: 50px" width="70" height="70">
                                                <div class="text-center" style="color: #8A05BE">Histórico de pagamentos</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Fim card pagamentos-->
                        <?php } //fim do if ?>

                        <!-- Inicio card suporte-->
                        <div class="card-home">

                            <div class="card">

                                <div class="card-header d-flex justify-content-center">
                                    Suporte
                                </div>

                                <div class="card-body">

                                    <div class="row mb-2">
                                        <div class="col-6 d-flex justify-content-center">
                                            <a href="../09_SUPORTE/abrir_chamado.php" class="text-decoration-none">
                                                <img src="../06_IMG/formulario_abrir_chamado.png" class="ml-3" width="70" height="70">
                                                <div class="text-center" style="color: #8A05BE">Abrir chamado</div>
                                            </a>
                                        </div>

                                        <div class="col-6 d-flex justify-content-center">
                                            <a href="../09_SUPORTE/consultar_chamado.php" class="text-decoration-none">
                                                <img src="../06_IMG/formulario_consultar_chamado.png" style="margin-left: 30px" width="70" height="70">
                                                <div class="text-center" style="color: #8A05BE">Consultar chamado</div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                        <!-- Fim card suporte-->
                  </div>
              </div>
            </div>
            <!-- Fim card menu -->

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
            <script src="../04_BOOTSTRAP_4/js/bootstrap.min.js"></script>
  </body>
</html>