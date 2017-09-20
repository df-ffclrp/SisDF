

/*
Guardando view para ser utilizada em outra ocasião

*/

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

                        <?php
                            // reset($secoes);
                            foreach ($secoes as $secao): 
                        ?>
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
            <div class="table-responsive">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>Nº OS</th>
                            <th>Resumo</th>
                            <th>Data de Abertura</th>
                            <th>Seção</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($lista_os as $os): ?>
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
                                <td> <?= $os['nome_secao']?> </td>
                                <td>
                                    <span class="label label-<?= $os['bs_label']?>">
                                        <i class="fa fa-<?= $os['icone'] ?> fa-fw"></i>

                                        <?= $os ['nome_status'] ?>
                                    </span>

                                </td>
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
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
<!-- /.row -->



