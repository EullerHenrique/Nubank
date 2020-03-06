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

    <style>
        .card-consultar-chamado {
            width: 100%;
        }

    </style>

    <!-- Estilo Customizado -->
    <link rel="stylesheet" type="text/css" href="../03___CSS/header.css">

    <title>Nubank -Consultar chamado </title>

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

<?php

    // r -> Abre somente para leitura; coloca o ponteiro do arquivo no começo do arquivo.
    $arquivo = fopen('../12_ARQUIVO_TXT/arquivo.txt', 'r'); // abre o arquivo

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

<!-- header -->
<?php
    require_once "../07_LOGIN_&&_HOME/header.php";
?>

<div class="container">
    <div class="row align-items-center justify-content-center mt-4 ml-1 mr-1 mb-4" >

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
                        <div class="col">
                            <a href="../07_LOGIN_&&_HOME/home.php" class="btn btn-lg btn-block text-white" style="background-color: mediumpurple;">Voltar</a>
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