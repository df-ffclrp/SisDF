<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SisDF - FFCLRP</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?= base_url() ?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url() ?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?= base_url() ?>assets/vendor/morrisjs/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

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

                <!--SIDEBAR-->
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="<?= base_url(); ?>prototipo/painel"><i class="fa fa-tasks fa-fw"></i> 
                                    Chamados 
                                </a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-file-text-o fa-fw"></i> 
                                    Abrir Chamado
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-building fa-fw"></i> 
                                            Manutenção Predial
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-cog fa-fw"></i> 
                                            Mecânica
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-microchip fa-fw"></i> 
                                            Eletrônica</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-desktop fa-fw"></i> 
                                            Informática
                                        </a>
                                    </li>
                                </ul>

                            </li>

                            <li>
                                <a href="<?= base_url(); ?>prototipo/novo_manut"><i class="fa fa-file-text-o fa-fw"></i> 
                                    Abrir Chamado Manutenção
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>prototipo/ponto_rede"><i class="fa fa-file-text-o fa-fw"></i> 
                                    Cadastrar Ponto
                                </a>
                            </li>
                            <li>
                                <a href="<?= base_url(); ?>prototipo/ver_chamado"><i class="fa fa-file-text-o fa-fw"></i> 
                                    Chamado Individual
                                </a>
                            </li>

                            <li>
                                <a href="<?= base_url(); ?>prototipo/imprimir_chamado"><i class="fa fa-print fa-fw"></i> 
                                    Imprimir
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

                {conteudo}

            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?= base_url() ?>assets/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?= base_url() ?>assets/vendor/raphael/raphael.min.js"></script>
        <script src="<?= base_url() ?>assets/vendor/morrisjs/morris.min.js"></script>
        <script src="<?= base_url() ?>assets/data/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?= base_url() ?>assets/dist/js/sb-admin-2.js"></script>

    </body>

</html>



