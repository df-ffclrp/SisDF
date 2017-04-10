<?php
/*
Esta view ficou complexa para o atual sistema. Será implementada com AJAX posteriormente

*/


?>


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

                        <?php foreach ($secoes as $secao): ?>
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

                <?php
                
                foreach ($status_menu as $status):
                    if ($status['id_status'] == 1):
                        $active_tab = "class='active'";

                    else:
                        $active_tab = '';
                    endif;
                    ?>
                    <!-- Monta as tabs -->
                    <li <?= $active_tab ?>>
                        <a href="#<?= $status['alias'] ?>" data-toggle="tab">
                            <?= $status['nome_status'] ?>
                        </a>
                    </li>

                <?php endforeach ?>

            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="aberto">
                    <div class="table-responsive">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>Nº OS</th>
                                    <th>Resumo</th>
                                    <th>Data de Abertura</th>
                                    <th>Seção</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach ($os_abertas as $os): ?>
                                    <tr>
                                        <td><?= $os['id_os']?></td>
                                        <td><?= $os['resumo']?></td>
                                        <td>
                                            <?php
                                            // Formata data de datetime para data amigável
                                            $data = date_create($os['data_abertura']);
                                            echo date_format($data, 'd/m/Y');

                                            ?>
                                        </td>
                                        <td><?= $os['nome_secao']?></td>
                                        <td>
                                            <a class="btn btn-sm btn-default" href="#">
                                                <i class="fa fa-eye fa-fw"></i> Ver OS
                                            </a>
                                        </td>
                                    </tr>


                                <?php endforeach; ?>
                                
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="tab-pane fade" id="em_atendimento">
                    <div class="table-responsive">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>Nº OS</th>
                                    <th>Resumo</th>
                                    <th>Data de Abertura</th>
                                    <th>Seção</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="atendido">
                    <div class="table-responsive">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>Nº OS</th>
                                    <th>Resumo</th>
                                    <th>Data de Abertura</th>
                                    <th>Seção</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

                <div class="tab-pane fade" id="retorno">
                    <div class="table-responsive">
                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>Nº OS</th>
                                    <th>Resumo</th>
                                    <th>Data de Abertura</th>
                                    <th>Seção</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.row -->



