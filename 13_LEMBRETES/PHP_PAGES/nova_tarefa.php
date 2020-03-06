<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Nubank - Novo lembrete </title>

		<link rel="stylesheet" href="../CSS/estilo.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
              integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
              integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Icone do site -->
        <link rel="shortcut icon" href="../../06_IMG/logo.ico" >

        <!-- Estilo Customizado -->
        <link rel="stylesheet" type="text/css" href="../../03___CSS/header.css">

    </head>

	<body>

    <?php
    // import -> produz somente um warning caso o arquivo não exista, ou seja, o resto do programa é executado
    // requiere -> produz um fatal error caso o arquivo não exista, ou seja, o resto do programa não é executad

    // import_once -> se o script já tiver sido incluido não será incluido de novo
    // requiere_once -> se o script já tiver sido incluido não será incluido de novo
    require_once "../../02_ACESSOS__PHP/validador_acesso.php";// o require once é utilizado porque se o include once fosse utilizado ocorreria somente um warning, com isso a página que não era pra ser exibida será exibida
    // o require_once é utilizado porque a validação ocorreŕa somente uma vez, no contexto atual a possibilidade de validar mais de uma vez não faz sentido

    if(isset($_SESSION['autenticado']) && $_SESSION['perfil_id'] == 1) {
        header('Location: ../../07_LOGIN_&&_HOME/home.php');
    }

    ?>

    <!-- header -->
    <?php
        require_once "header.php";
    ?>

    <?php if(isset($_GET['inclusao']) && $_GET['inclusao'] == 1){ ?>

            <div class="pt-2  d-flex justify-content-center text-white" style="background-color: mediumpurple">
                <h5>Lembrete inserido com sucesso!</h5>
            </div>

    <?php } ?>

		<div class="container mt-4">
			<div class="row">
				<div class="col-md-3 mb-4">
					<ul class="list-group">
						<li class="list-group-item"><a href="../index.php">Pagamentos pendentes</a></li>
						<li class="list-group-item active"><a href="#">Novo lembrete</a></li>
						<li class="list-group-item"><a href="todas_tarefas.php">Todos lembretes</a></li>
					</ul>
				</div>

				<div class="col-md-9">
					<div id = "pagina_b" class="container">
								<h4 class="roxo">Novo lembrete de pagamento</h4>
								<hr>

								<form method="post" action="../PHP_SCRIPTS/Tarefa_controller.php?acao=inserir">
									<div class="form-group">
										<label>Descrição do lembrete:</label>
										<input type="text" name = "tarefa" class="form-control"  placeholder="Exemplo: Pagar Netflix">
									</div>
                                    <div class="row">
                                        <div class="col d-flex justify-content-center">
	    								    <button class="btn text-white" style="background-color: #8A05BE">Cadastrar</button>
                                        </div>
                                    </div>
                                </form>
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
    <script src="../../04_BOOTSTRAP_4/js/bootstrap.min.js"></script>

    </body>
</html>