<!-- Top Menu-->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">
            Serviço de Atendimento Técnico - Departamento de Física
        </a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <li> <?= $_SESSION['nome'] ?> </li>
        <!-- .dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <!-- .dropdown-user -->
            <ul class="dropdown-menu dropdown-user">
                <li><a href="<?= base_url() . 'user'; ?>"><i class="fa fa-user fa-fw"></i> Meus Dados</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                </li>
                <li class="divider"></li>

                <li><a href="<?= base_url();?>sair"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->
</nav>

    <!--SIDEBAR-->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="<?= base_url() . 'painel'; ?>">
                        <i class="fa fa-arrow-circle-o-left fa-fw"></i> 
                        Voltar ao Painel
                    </a>
                </li>

                <li>
                    <a href="<?= base_url() . $this->router->class .'' ?>">
                    <i class="fa fa-address-card fa-fw"></i>
                        Meus dados
                    </a>
                </li>
                       
                <li>
                    <a href="<?= base_url() . $this->router->class .'/mudar_senha' ?>">
                    <i class="fa fa-lock fa-fw"></i>
                        Alterar Senha
                    </a>    
                </li>
               
            </ul>
        </div>
            <!-- /.sidebar-collapse -->
    </div>
        <!-- /.navbar-static-side -->
