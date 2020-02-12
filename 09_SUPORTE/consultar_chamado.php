<html>
  <head>
    <meta charset="utf-8" />
      <title>Nubank - Consultar chamado</title>

      <link rel="stylesheet" href="../04_BOOTSTRAP_4/css/bootstrap.min.css">

      <!-- Icone do site -->
      <link rel="shortcut icon" href="../06_IMG/logo.ico" >

      <style>
          .card-consultar-chamado {
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
        require_once "../02_PHP/validador_acesso.php";// o require once é utilizado porque se o include once fosse utilizado ocorreria somente um warning, com isso a página que não era pra ser exibida será exibida
                                            // o require_once é utilizado porque a validação ocorreŕa somente uma vez, no contexto atual a possibilidade de validar mais de uma vez não faz sentido
      ?>

      <?php

        // r -> Abre somente para leitura; coloca o ponteiro do arquivo no começo do arquivo.
        $arquivo = fopen('../02_PHP/arquivo.txt', 'r'); // abre o arquivo

        //chamados
        $chamados = [];


        //enquanto houver registros (linhas) a serem recuperados
        while(!feof($arquivo)) { // percorre o arquivo até encontrar o seu final (eof)
            $registro = fgets($arquivo); //lê cada linha

            //Se o usuario que fez o login possuir o perfil 2 e se ele tiver aberto o chamado em questão,
            //o chamado será lido do arquivo e exibido posteriormente
            if($_SESSION['perfil_id'] == 2 && $_SESSION['id'] != $registro[0]){
                continue; // desconsidera a leitura desse chamado
            }
            $chamados[] = $registro;
        }

        fclose($arquivo); //fecha o arquivo

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
          </nav>
      </header><!-- Fim cabeçalho    -->

    <div class="container">
        <div class="row align-items-center justify-content-center mt-4 ml-1 mr-1" style="height: 90vh" >

        <div class="card-consultar-chamado">
          <div class="card">
            <div class="card-header">
              Consulta de chamado
            </div>
            
            <div class="card-body">

                <?php foreach ($chamados as $chamado){ ?>
                    <?php
                        $chamado_dados = explode('#', $chamado);

                        //Desconsidera a última linha do arquivo lido
                        if(count($chamado_dados) == 1 ){
                            continue; //desconsidera o chamado em branco
                        }
                    ?>

              <div class="card mb-3 bg-light">

                <div class="card-body">
                  <h5 class="card-title"><?=$chamado_dados[1] ?></h5>
                  <h6 class="card-subtitle mb-2 text-muted"><?= $chamado_dados[2] ?></h6>
                  <p class="card-text"><?= $chamado_dados[3] ?></p>
                </div>
              </div>

                <?php } ?>

              <div class="row mt-5">
                  <div class="col-6">
                      <a href="../07_PAGINAS_PRINCIPAIS/home.php" class="btn btn-lg btn-warning btn-block">Voltar</a>
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