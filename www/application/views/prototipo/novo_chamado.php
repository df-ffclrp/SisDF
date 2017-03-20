    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SisDF - Painel do Gestor</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">

                <li> Gestor da Silva </li>
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
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i> Dashboard </a>
                        </li>
                        <li>
                            <a href="#2"><i class="fa fa-file-text-o fa-fw"></i> 
                                Abrir Chamado
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!--Conteudo-->
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">
                        <i class="fa fa-file-text-o fa-fw"></i> 
                        Novo Chamado - Informática
                    </h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!--Form-->
            <div class="row">

                <div class="col-lg-6">
                    <form role="form">
                        <div class="form-group">
                            <label>Resumo:</label>
                            <input class="form-control">
                            <p class="help-block">Exemplo: Computador não liga </p>
                        </div>
                        
                        <div class="form-group">
                            <label>Local do Atendimento:</label>
                            <select class="form-control">
                                <option> Sala X</option>
                                <option> Sala X</option>
                                <option> Sala X</option>
                                <option> Sala X</option>
                                <option> Sala X</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Descrição:</label>
                            <textarea class="form-control" rows="3" placeholder="Exemplo: Computador emite sons intermitentes ao ser ligado."></textarea>

                        </div>

                        <button type="submit" class="btn btn-primary">Enviar Chamado</button>
                        <button type="reset" class="btn btn-default pull-right">Limpar dados</button>

                    </form>

                </div>
            </div>
            <!-- END Form-->



        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


