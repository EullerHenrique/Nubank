
<header> <!-- Inicio cabeçalho -->
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
                <!-- Se o usuario que fez o login possuir o perfil 2, exiba o barra de lembretes -->
                <?php if($_SESSION['perfil_id'] == 2){?>

                    <li class="nav-item border-top border-bottom" data-toggle="collapse" data-target="#lembrete" style="background-color:  #181c20">
                        <a href="#" class="text-white p-3" style="text-decoration: none; display: block">
                            <span style="font-size: 18px; margin-left: 5px;">Lembretes de pagamentos</span>
                            <span class="fa fa-angle-down" style="font-size: 25px; position: absolute; right: 22px"></span>
                        </a>
                    </li>

                    <div class="collapse submenu" id="lembrete">
                        <li class="nav-item " style="background-color: black">
                            <a href="../13_LEMBRETES/index.php" class="text-white p-3 pl-4" style="text-decoration: none; display: block">
                                <span class="fa fa-angle-right" style="font-size: 20px;"></span>
                                <span style="font-size: 14px; margin-left: 5px;">Pagamentos pendentes</span>
                            </a>
                        </li>

                        <li class="nav-item border-top" style="background-color: black">
                            <a href="../13_LEMBRETES/PHP_PAGES/nova_tarefa.php" class="text-white p-3 pl-4" style="text-decoration: none; display: block">
                                <span class="fa fa-angle-right" style="font-size: 20px;"></span> <span style="font-size: 14px; margin-left: 5px;">Novo lembrete</span>
                            </a>
                        </li>

                        <li class="nav-item border-top" style="background-color: black">
                            <a href="../13_LEMBRETES/PHP_PAGES/todas_tarefas.php" class="text-white p-3 pl-4" style="text-decoration: none; display: block">
                                <span class="fa fa-angle-right" style="font-size: 20px;"></span> <span style="font-size: 14px; margin-left: 5px;">Todos lembretes</span>
                            </a>
                        </li>
                    </div>

                <?php } //fecha o if?>

                <!-- Se o usuario que fez o login possuir o perfil 2, exiba o barra de agendamento-->
                <?php if($_SESSION['perfil_id'] == 2){?>

                    <li class="nav-item border-top border-bottom" data-toggle="collapse" data-target="#agendamento" style="background-color:  #181c20">
                        <a href="#" class="text-white p-3" style="text-decoration: none; display: block">
                            <span style="font-size: 18px; margin-left: 5px;">Agendamento</span>
                            <span class="fa fa-angle-down" style="font-size: 25px; position: absolute; right: 22px"></span>
                        </a>
                    </li>

                    <div class="collapse submenu" id="agendamento">
                        <li class="nav-item " style="background-color: black">
                            <a href="../08_AGENDAMENTO/agendamento.php" class="text-white p-3 pl-4" style="text-decoration: none; display: block">
                                <span class="fa fa-angle-right" style="font-size: 20px;"></span>
                                <span style="font-size: 14px; margin-left: 5px;">Agendar pagamento</span>
                            </a>
                        </li>

                        <li class="nav-item border-top" style="background-color: black">
                            <a href="../08_AGENDAMENTO/consulta.php" class="text-white p-3 pl-4" style="text-decoration: none; display: block">
                                <span class="fa fa-angle-right" style="font-size: 20px;"></span> <span style="font-size: 14px; margin-left: 5px;">Consultar agendamento</span>
                            </a>
                        </li>
                    </div>

                <?php } //fecha o if?>

                <!-- Se o usuario que fez o login possuir o perfil 1, exiba a barra de email -->
                <?php if($_SESSION['perfil_id'] == 1){?>

                    <li class="nav-item border-top border-bottom" style="background-color:  #181c20">
                        <a href="../10_EMAIL/email.php" class="text-white p-3" style="text-decoration: none; display: block">
                            <span style="font-size: 18px; margin-left: 5px;">Enviar E-mail</span>
                        </a>
                    </li>

                <?php } //fecha o if?>

                <li class="nav-item border-top border-bottom" data-toggle="collapse" data-target="#suporte" style="background-color:  #181c20">
                    <a href="#" class="text-white p-3" style="text-decoration: none; display: block">
                        <span style="font-size: 18px; margin-left: 5px;">Suporte</span>
                        <span class="fa fa-angle-down" style="font-size: 25px; position: absolute; right: 22px"></span>
                    </a>
                </li>

                <div class="collapse submenu" id="suporte">
                    <li class="nav-item " style="background-color: black">
                        <a href="../09_SUPORTE/abrir_chamado.php" class="text-white p-3 pl-4" style="text-decoration: none; display: block">
                            <span class="fa fa-angle-right" style="font-size: 20px;"></span>
                            <span style="font-size: 14px; margin-left: 5px;">Abrir chamado</span>
                        </a>
                    </li>

                    <li class="nav-item border-top" style="background-color: black">
                        <a href="../09_SUPORTE/consultar_chamado.php" class="text-white p-3 pl-4" style="text-decoration: none; display: block">
                            <span class="fa fa-angle-right" style="font-size: 20px;"></span> <span style="font-size: 14px; margin-left: 5px;">Consultar chamado</span>
                        </a>
                    </li>

                </div>

                <li class="nav-item border-top border-bottom" style="background-color:  #181c20">
                    <a href="../02_ACESSOS__PHP/logoff.php" class="text-white p-3" style="text-decoration: none; display: block">
                        <span style="font-size: 18px; margin-left: 5px;">Sair</span>
                    </a>
                </li>

            </ul>

        </div>

    </nav>
</header><!-- Fim cabeçalho    -->