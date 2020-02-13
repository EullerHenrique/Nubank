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
        .card-login {
            width: 350px;
        }
    </style>

    <title>Nubank - Agendar Pagamento</title>



</head>

<body>


<header> <!-- Inicio cabeçalho -->
    <nav class="navbar navbar-expand-md navbar-light" style="background: #8A05BE;">

        <div class="container">
            <img src="../06_IMG/log.png" width="50px" height="30px" class="ml-3">

            <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse ml-4" id="nav-principal">
                <!-- .collapse.navbar-collapse para agrupar e esconder conteúdos navbar, de acordo com o breakpoint do pai. -->
                <ul class="navbar-nav ml-auto ">

                    <li class="nav-item">
                        <a href="../07_PAGINAS_PRINCIPAIS/index.html" class="nav-link">Sair</a>
                    </li>

                </ul>

            </div>

        </div>

    </nav>
</header><!-- Fim cabeçalho    -->
<div class="container">
    <div class="row align-items-center justify-content-center" style="height: 90vh" >

        <div class="card-login">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="valida_login.php" method="post">
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <input name="senha" type="password" class="form-control" placeholder="Senha">
                        </div>

                        <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){?>

                            <div class="text-danger">
                                Usuário ou senha inválido(s)
                            </div>

                        <?php } //fecha o if ?>

                        <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2'){?>

                            <div class="text-danger">
                                Por favor, faça login antes de acessar as páginas protegidas
                            </div>

                        <?php } //fecha o if ?>

                        <button class="btn btn-lg btn-block text-white" style="background: #8A05BE" type="submit">Entrar</button>
                    </form>
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