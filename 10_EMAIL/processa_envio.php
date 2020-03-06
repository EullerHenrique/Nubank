<?php

    require_once "../11_PHP_MAILER/src/Exception.php";
    require_once "../11_PHP_MAILER/src/OAuth.php";
    require_once "../11_PHP_MAILER/src/PHPMailer.php";
    require_once "../11_PHP_MAILER/src/POP3.php";
    require_once "../11_PHP_MAILER/src/SMTP.php";

    //       namespace     \classe
    use  PHPMailer\PHPMailer\PHPMailer ;
    use  PHPMailer\PHPMailer\Exception ;

    class Mensagem{
        private $para;
        private $assunto;
        private $mensagem;
        public $status = ['codigo_status' => null, 'descricao_status' => ''];

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }

        public function mensagemValida(){
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
                return false;
            }
            return true;
        }
    }

    $mensagem = new Mensagem();
    $mensagem->__set('para', $_POST['para']);
    $mensagem->__set('assunto', $_POST['assunto']);
    $mensagem->__set('mensagem', $_POST['mensagem']);
    if(!$mensagem->mensagemValida()){
        //echo 'Mensagem não é válida';
        //die(); // interrompe a execução do script php
        header('Location: email.php');
    }

    //-------------------------------------11_PHP_MAILER-------------------------------------------------------------------
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = false;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'testeuseremail123@gmail.com';             // SMTP username
        $mail->Password = 'testeUserEmail12345';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';

        //Recipients
        $mail->setFrom('testeuseremail123@gmail.com', 'E-mail');
        $mail->addAddress($mensagem->__get('para'));     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to PHP_PAGES
        $mail->Subject = $mensagem->__get('assunto');
        $mail->Body    = $mensagem->__get('mensagem');
        $mail->AltBody = 'É necessário utilizar um client que suporte PHP_PAGES para ter acesso total ao conteúdo dessa mensagem';

        $mail->send();
        $mensagem->status['codigo_status'] = 1;
        $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso';
    } catch (Exception $e) {
        $mensagem->status['codigo_status'] = 2;
        $mensagem->status['descricao_status'] = 'Não foi possível enviar este e-mail! Por favor tente novamente mais tarde.'.'<br>'.'Detalhes do erro: '. $mail->ErrorInfo;
    }
//----------------------------------------------------------------------------------------------------------------------
    ?>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Nubank - E-mail</title>

        <link rel="stylesheet" type="text/css" href="../04_BOOTSTRAP_4/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
              integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

        <!-- Icone do site -->
        <link rel="shortcut icon" href="../06_IMG/logo.ico" >

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
    ?>

    <!-- header -->
    <?php
        require_once "../07_LOGIN_&&_HOME/header.php";
    ?>



    <div class="container">

            <div class="row mt-5">
                <div class="col">
                    <?php if($mensagem->status['codigo_status'] == 1 ){?>

                        <div class="container">
                            <h1 class="display-4 text-center"style="color: mediumpurple">Sucesso</h1>
                            <p class="text-center"><?= $mensagem->status['descricao_status']?></p>
                            <a href="email.php" class="btn btn-lg mt-5 text-white btn-block" style="background-color: mediumpurple;">Voltar</a>
                        </div>



                    <?php }//fecha o if ?>

                    <?php if($mensagem->status['codigo_status'] == 2 ){?>

                        <div class="container">
                            <h1 class="display-4 text-danger text-center">Ops!</h1>
                            <p class="text-center"><?= $mensagem->status['descricao_status']?></p>
                            <a href="email.php" class="btn btn-success btn-lg mt-5 text-white btn-block">Voltar</a>
                        </div>

                    <?php }//fecha o if ?>
                </div>
            </div>


        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="../04_BOOTSTRAP_4/js/bootstrap.min.js"></script>

    </body>


    </body>

</html>