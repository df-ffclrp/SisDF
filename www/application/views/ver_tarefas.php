<?php $this->load->view('common/header'); ?>

<div id="wrapper">

<?php $this->load->view('common/menus', $this->menu_info); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                <i class="fa fa-file-text-o fa-fw"></i>
                OS Nº <?= $os['id_os'] . ' - ' . $os['nome_secao'] ?>
            </h2>
        </div>
    </div>

    <div class="row">

    <div class='col-lg-12'>
    <div class="panel panel-primary">
            <div class="panel-heading">
            <strong>
            <i class="fa fa-tasks fa-fw"></i> Tarefas Realizadas / Total: <span class="badge"><?= $num_notes ?></span>
            </strong>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th><i class="fa fa-calendar fa-fw"></i> Data</th>
                                <th><i class="fa fa-tasks fa-fw"></i> Tarefa</th>
                                <th><i class="fa fa-user-circle fa-fw"></i> Atendente</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($notes as $note): ?>
                            <tr>
                                <td>
                                    <?php
                                    // Formata data de datetime para data amigável
                                    $data = date_create($note['data_anot']);
                                    echo date_format($data, 'd/m/Y');
                                    ?>
                                </td>
                                <td><?= $note['texto']?></td>

                                <td class='col-lg-2'><?= $note['autor']?></td>
                            </tr>
                        <?php endforeach; ?>
                            
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        </div>
                


    </div><!-- fim de row -->
</div><!-- fim de page-wrapper -->



<?php $this->load->view('common/footer'); ?>
