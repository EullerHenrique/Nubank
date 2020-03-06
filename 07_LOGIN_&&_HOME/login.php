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

    <!-- Estilo Customizado -->
    <link rel="stylesheet" type="text/css" href="../03___CSS/header.css">

    <style>
        .card-login {
            width: 350px;
        }
    </style>

    <title>Nubank - Login</title>

</head>

<body>


<header> <!-- Inicio cabeçalho 1 -->
    <nav class="navbar navbar-dark text-white pt-2" style="background: #23282e; margin: 0; padding: 0;">

        <a href="../07_LOGIN_&&_HOME/home.php" class="navbar-brand pb-3" style="margin-left: 20px; font-size: 14px;">
            <img src="../06_IMG/log.png" width="50px" height="30px">
        </a>

        <a data-toggle="collapse" data-target="#nav-principal" style="margin-right: 20px;">
            <span class="fa fa-bars fa-2x toggle-btn"></span>
        </a>

        <div class="collapse navbar-collapse"  id="nav-principal">
            <!-- .collapse navbar-collapse para agrupar e esconder conteúdos navbar, de acordo com o breakpoint do pai. -->
            <ul class="navbar-nav ml-auto menu">

                <li class="nav-item border-top border-bottom" style="background-color:  #181c20">
                    <a href="../index.html" class="text-white p-3" style="text-decoration: none; display: block">
                        <span style="font-size: 18px; margin-left: 5px;">Sair</span>
                    </a>
                </li>

            </ul>

        </div>

    </nav>
</header><!-- Fim cabeçalho    -->
<div class="container">
    <div class="row align-items-center justify-content-center" style="height: 90vh" >

        <div class="card-login">
            <div class="card ml-2 mr-2">
                <div class="card-header text-center">
                    Login
                </div>
                <div class="card-body">
                    <form action="../02_ACESSOS__PHP/valida_login.php" method="post">
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