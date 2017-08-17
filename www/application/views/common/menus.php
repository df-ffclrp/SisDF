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
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Meus Dados</a>
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
                    <a href="<?= base_url() . $controller; ?>"><i class="fa fa-home fa-fw"></i>
                        Início
                    </a>
                </li>
                <!-- DROPDOWN CHAMADOS -->
                <li>
                    <a href="<?= base_url() . 'chamados'; ?>"><i class="fa fa-filter fa-fw"></i>
                        Filtrar Chamados
                        <span class="fa arrow"></span>
                    </a>
                    <!-- Listar por status -->
                    <ul class="nav nav-second-level">
                        <?php foreach ($os_menu as $item): ?>
                            <li>
                                <a href="<?= base_url() . $controller .'/os_status/'. $item['id_status'] ?> ">
                                    <i class="fa <?= $item['icone']; ?> fa-fw"></i>
                                    <?= $item['nome_status'];?>
                                </a>
                            </li>

                        <?php endforeach; ?>
                    </ul>
                </li>


                <!-- Abrir Chamado -->
                <li>
                    <a href="#"><i class="fa fa-file-text-o fa-fw"></i>
                        Abrir Chamado
                        <span class="fa arrow"></span>
                    </a>
                    <!-- Submenu com seções -->
                    <ul class="nav nav-second-level">
                        <?php foreach ($secoes_menu as $secao): ?>
                            <li>
                                <a href="<?= base_url() .'chamados/novo/'. $secao['id_secao'] ?> ">
                                    <i class="fa <?= $secao['icone']; ?> fa-fw"></i>
                                    <?= $secao['nome_secao'];?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                 </li>
                 <!-- fim de abrir chamado -->

                 <?php if(!$this->auth->in_role('relator')): ?>
                     <li>
                         <a href="<?= base_url() . $controller.'/meus_chamados'; ?>"><i class="fa fa-tasks fa-fw"></i>
                             Meus Chamados
                         </a>
                     </li>

                 <?php endif;?>
            </ul>
        </div>
            <!-- /.sidebar-collapse -->
    </div>
        <!-- /.navbar-static-side -->
