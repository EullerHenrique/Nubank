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
    <script src="../01_AGENDAMENTO_&&_CONSULTA__JS/script.js"></script>

    <!-- Estilo Customizado -->
    <link rel="stylesheet" type="text/css" href="../03___CSS/header.css">

    <title>Nubank - Agendar Pagamento</title>

</head>

    <body>

    <?php
        // import -> produz somente um warning caso o arquivo não exista, ou seja, o resto do programa é executado
        // requiere -> produz um fatal error caso o arquivo não exista, ou seja, o resto do programa não é executad

        // import_once -> se o script já tiver sido incluido não será incluido de novo
        // requiere_once -> se o script já tiver sido incluido não será incluido de novo
        require_once "../02_ACESSOS__PHP/validador_acesso.php";// o require once é utilizado porque se o include once fosse utilizado ocorreria somente um warning, com isso a página que não era pra ser exibida será exibida
        // o require_once é utilizado porque a validação ocorreŕa somente uma vez, no contexto atual a possibilidade de validar mais de uma vez não faz sentido

        if(isset($_SESSION['autenticado']) && $_SESSION['perfil_id'] == 1) {
            header('Location: ../07_LOGIN_&&_HOME/home.php');
        }
    ?>


    <!-- header -->
    <?php
        require_once "../07_LOGIN_&&_HOME/header.php";
    ?>


        <div class="container">
            <div class="row">
                <div class="col mt-5 mb-5 d-flex justify-content-center">
                    <h1 class="display-5">Novo agendamento de pagamento </h1>
                </div>
            </div>

            <div class="row mb-2">
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

            <div class="row">
                <div class="col-md-8 mb-2">
                    <input type="text" class="form-control" maxlength="80" placeholder="Descrição" id="descricao" />
                </div>

                <div class="col-md-2 mb-2">
                    <input type="text" class="form-control" maxlength="14"  placeholder="Valor" id="valor" />
                </div>

                <div class="col-8">
                    <a href="../07_LOGIN_&&_HOME/home.php" class="btn btn-lg btn-block" style="background-color: mediumpurple;">Voltar</a>
                </div>

                <div class="col-4 d-flex justify-content-end mb-2">
                    <button type="button" class="btn btn-lg btn-block" style="background-color: cornflowerblue;" onclick="cadastrarPagamento()">
                        <span class="fas fa-plus"></span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Data Toogle-->
        <!-- O data-toggle é um atributo de dados do HTML5 que liga automaticamente o elemento ao tipo correspondente. -->

        <!-- Data Target -->
        <!-- O data-target geralmente utilizado no Bootstrap, está junto aos modais, mas não somente. Pelo próprio nome, subentende-se que irá fazer referência ao seu alvo,
         objetivo. Este atributo deve conter  um seletor CSS que aponte para o elemento HTML que irá participar do evento-->

        <!-- Data Dismiss -->
        <!-- O data-dismiss esconde, ou seja, fecha o que foi especificado -->

        <!--ACESSIBILIDADE -->

        <!-- ARIA -->
        <!-- O ARIA (aplicativos ricos da Internet acessíveis) define uma maneira de tornar o conteúdo e os aplicativos da Web mais acessíveis às pessoas com deficiência.-->
        <!-- aria-hidden =  A propriedade aria-hidden informa aos leitores de tela se eles devem ignorar o elemento -->
        <!-- aria-label = Indica ao leito de tela a função de determinado simbolo -->

        <!-- Role -->
        <!-- Esse atributo serve para dar mais semântica aos elementos de documentos baseados em marcação, a partir de 2013 a W3 passou a recomendar o seu uso.
        Em português Role significa Papel, num sentido de cargo/oficio daquele elemento. Com essa semântica os navegadores podem prover mais acessibilidade para alguns elementos,
         já que eles passam a conhecer o papel dos elementos no documento. -->
        <!-- role = dialog => A dialog função é usada para marcar um diálogo ou janela de aplicativo baseado em HTML que separa o conteúdo ou a interface do usuário do restante
        do aplicativo ou da web. As caixas de diálogo são geralmente colocadas sobre o restante do conteúdo da página usando uma sobreposição. As caixas de diálogo podem ser
         não modais (ainda é possível interagir com o conteúdo fora da caixa de diálogo) ou modal (somente o conteúdo da caixa de diálogo pode ser interagido).-->
        <!-- role = document => A documentfunção instrui as tecnologias assistivas com modos de leitura ou navegação a usar o modo de documento para ler o conteúdo contido nesse elemento.-->

        <!--Tabindex-->
        <!-- O tabindexatributo define explicitamente a ordem de navegação dos elementos focalizáveis ​​(geralmente links e controles de formulário) em uma página.
        Também pode ser usado para definir se os elementos devem ser focados ou não.
        Um tabindex="-1"valor remove o elemento do fluxo de navegação padrão (ou seja, um usuário não pode tabular para ele), mas permite que ele receba foco programático ,
        o que significa que o foco pode ser definido a partir de um link ou com script.
        ** Isso pode ser muito útil para elementos que não devem ser tabulados, mas que talvez precisem ter o foco definido para eles .
        Um bom exemplo é uma janela de diálogo modal - quando aberta, o foco deve ser definido na caixa de diálogo para que um leitor de tela comece a ler e o teclado comece
        a navegar dentro da caixa de diálogo. Como a caixa de diálogo (provavelmente apenas um <div>elemento) não é focalizável por padrão, atribuí-la tabindex="-1"permite
        que o foco seja definido com scripts quando é apresentado.-->

        <!-- Modal -->

        <div class="modal fade" id="modalRegistraDespesa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div id= "modal_titulo_div">
                        <h5 class="modal-title" id="modal_titulo"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id = "modal_conteudo">

                    </div>
                    <div class="modal-footer">
                        <button type="button" id = "modal_btn" data-dismiss="modal"></button>
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