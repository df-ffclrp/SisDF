

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="fa <?= $header_icon ?> fa-fw"></i> 
            Lista de Chamados - <?= $header ?>
        </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!--Alert Box-->
<?php
if (isset($_SESSION['message'])):
    show_alert_box();
endif;
?>

<!--END Alert Box-->

<!--Painel de Chamados-->

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">


            <div class="panel-heading">


                <div class="btn-group">
                    <!--<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">-->
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        Escolha uma Seção: 
                        <span class="caret"></span>
                    </button>

                    <!--Menu de seleção de seções a mostrar-->
                    <ul class="dropdown-menu pull-right" role="menu">

                        <?php foreach ($secoes as $secao):?>
                            <li>
                                <a href="<?= base_url() . $controller ?>/index/1">
                                    <i class="fa <?= $secao['icone'] ?> fa-fw"></i> 
                                    <?= $secao['nome_secao'] ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= base_url() . $controller ?>">
                                <i class="fa fa-tasks fa-fw"></i> 
                                Todas as Seções
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">

            <?php foreach ($status_menu as $status):
                if($status['id_status'] == 1):
                    $active_tab = "class='active'";
                
                else:
                    $active_tab = '';
                endif;
            ?>
            <li <?= $active_tab ?>>
                <a href="#<?= $status['alias']?>" data-toggle="tab">
                    <?= $status['nome_status']?>
                </a>
            </li>

            <?php endforeach ?>
                    
                <li class="active">
                    <a href="#home" data-toggle="tab">Abertos</a>
                </li>
                <li>
                    <a href="#profile" data-toggle="tab">Em Atendimento</a>
                </li>
                <li>
                    <a href="#messages" data-toggle="tab">Atendidos</a>
                </li>
                <li>
                    <a href="#settings" data-toggle="tab">Não atendidos</a>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nº OS</th>
                                    <th>Resumo</th>
                                    <th>Data de Abertura</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                                <tr>
                                    <td>1</td>
                                    <td>Troca de Lâmpada</td>
                                    <td>27/03/2017</td>
                                    <td>
                                        <a class="btn btn-sm btn-default" href="#">
                                            <i class="fa fa-eye fa-fw"></i> Ver OS
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Troca de Lâmpada</td>
                                    <td>27/03/2017</td>
                                    <td>
                                        <a class="btn btn-sm btn-default" href="#">
                                            <i class="fa fa-eye fa-fw"></i> Ver OS
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Este é um resumo bem longo de se ter num chamado mega fucking bigger pra estragar a tela</td>
                                    <td>27/03/2017</td>
                                    <td>
                                        <a class="btn btn-sm btn-default" href="#">
                                            <i class="fa fa-eye fa-fw"></i> Ver OS
                                        </a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="profile">
                    <h4>Profile Tab</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="tab-pane fade" id="messages">
                    <h4>Messages Tab</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="tab-pane fade" id="settings">
                    <h4>Settings Tab</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.row -->



