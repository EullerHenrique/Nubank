<html>
	<head>
		<meta charset="utf-8" />
    	<title>Nubank - E-mail</title>

        <!-- Viewport
        Browsers para dispositivos móveis renderizam as páginas em uma "janela" virtual (o viewport), que costuma
        ser maior que a tela, fazendo com que não seja necessário "espremer" todoo o layout da página para caber
         em uma janela pequena (o que faria "quebrar" muitos sites não otimizados para visualização em dispositivos móveis).
        A propriedade width controla o tamanho da viewport.
        A propriedade initial-scale controla o nível de amplificação quando a página é carregada pela primeira vez
        -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" type="text/css" href="../04_BOOTSTRAP_4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
              integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Icone do site -->
        <link rel="shortcut icon" href="../06_IMG/logo.ico" >

        <style>
            #nav-principal ul li a{
                color: white;
            }
        </style>

        <!-- Estilo Customizado -->
        <link rel="stylesheet" type="text/css" href="../03___CSS/header.css">
    </head>
	<body>

        <?php
        // import -> produz somente um warning caso o arquivo não exista, ou seja, o resto do programa é executado
        // requiere -> produz um fatal error caso o arquivo não exista, ou seja, o resto do programa não é executad
        // import_once -> se o script já tiver sido incluido não será incluido de novo
        // requiere_once -> se o script já tiver sido incluido não será incluido de novo
        require_once "../02_ACESSOS__PHP/validador_acesso.php";// o require once é utilizado porque se o include once fosse utilizado ocorreria somente um warning, com isso a página que não era pra ser exibida será exibida
        // o require_once é utilizado porque a validação ocorreŕa somente uma vez, no contexto atual a possibilidade de validar mais de uma vez não faz sentido

        if(isset($_SESSION['autenticado']) && $_SESSION['perfil_id'] == 2) {
            header('Location: ../07_LOGIN_&&_HOME/home.php');
        }

        ?>


        <!-- header -->
        <?php
          require_once "../07_LOGIN_&&_HOME/header.php";
        ?>



        <div class="container">
      		<div class="row">
      			<div class="col">
                    <div class="card mt-5">
                        <div class="card-body font-weight-bold">
                            <form action="processa_envio.php" method="post">
                                <div class="form-group">
                                    <label for="para">Para</label>
                                    <input name="para" type="text" class="form-control" id="para" placeholder="joao@dominio.com">
                                </div>

                                <div class="form-group">
                                    <label for="assunto">Assunto</label>
                                    <input name="assunto" type="text" class="form-control" id="assunto">
                                </div>

                                <div class="form-group">
                                    <label for="mensagem">Mensagem</label>
                                    <textarea name="mensagem"class="form-control" id="mensagem"></textarea>
                                </div>

                                <div class="row mt-5">
                                    <div class="col">
                                        <a href="../07_LOGIN_&&_HOME/home.php" class="btn btn-lg btn-block text-white" style="background-color: mediumpurple;">Voltar</a>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col">
                                        <button type="submit" class="btn btn-lg btn-block mt-2 text-white" style="background-color: cornflowerblue;">Enviar E-mail</button>
                                    </div>
                                </div>
                            </form>
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