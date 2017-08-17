<?php $this->load->view('common/header'); ?>

<div id="wrapper">

<?php $this->load->view('common/menus',$this->ui); ?>

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

        <!-- Dados do Chamado -->
        <div class="col-lg-6">

            <!--Dados do Solicitante-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong> <i class="fa fa-address-card fa-fw"></i> Dados do Relator</strong>
                </div>

                <div class="panel-body">
                    <p> <strong>Nome:</strong> <?= $os['relator'] ?> </p>
                    <p> <strong>Número USP:</strong> <?= $os['num_usp'] ?></p>
                    <p> <strong>Ramal:</strong> <?= $os['ramal'] ?> </p>
                    <p> <strong>Email:</strong> <?= $os['email'] ?> </p>
                </div>
            </div>

            <!--Detalhes do Pedido-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong> <i class="fa fa-list fa-fw"></i> Detalhes do Pedido</strong>
                </div>

                <div class="panel-body">
                    <p>
                        <strong>Data de Abertura:</strong> <?= $os['data_abertura'] ?> <br>
                        <strong>Finalidade:</strong> <?= $os['finalidade'] ?> <br>
                        <strong>Local:</strong> <?= $os['num_sala'].' - ' .$os['nome_sala'] ?> <br>
                        <strong>Responsável:</strong>  <?= $os['resp_sala'] ?>
                    </p>
                    <p> <strong>Resumo:</strong> <?= $os['resumo'] ?> </p>

                    <p> <strong>Descrição do Pedido:</strong> </p>
                    <p>
                        <?= $os['os_descricao'] ?>
                    </p>

                </div>
            </div>

            <!--Dados do Material-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong> <i class="fa fa-cubes fa-fw"></i> Dados do Material</strong>
                </div>

                <div class="panel-body">

                    <?php  if($os['descricao_mat'] == null): ?>
                        <div class="alert alert-warning">
                         <i class="fa fa-info-circle" aria-hidden="true"></i>
                         Não há material cadastrado para este chamado
                     </div>

                 <?php else: ?>

                    <p> <strong>Fornecimento: </strong> <?= $os['fornecimento'] ?> </p>
                    <p> <strong>Descrição do Material:</strong> </p>
                    <p>
                        <?= $os['descricao_mat'] ?>
                    </p>

                <?php endif; ?>

                </div>
            </div>
        </div>

        <!-- Andamento do Chamado -->
   <div class="col-lg-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <strong> <i class="fa fa-sticky-note-o fa-fw"></i> Andamento do Chamado</strong>

                <?php if($this->auth->in_secao($os['secao_os']) && $this->auth->in_role('tecnico')): ?>

                <button class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#addNote">
                    <i class="fa fa-pencil-square-o fa-fw"></i> adicionar anotação
                </button>

                <?php endif; ?>
            </div>
            <!-- Recuperando resultados do banco: -->

            <div class="panel-body">
                <ul class="chat">
                    <?php
                    if(empty($notes)):
                        echo "<p> Não há anotações para este chamado. </p>";
                    else:
                        foreach($notes as $note):
                    ?>
                        <li class="left clearfix">
                            <div class="clearfix">
                                <div class="header">
                                <strong class="primary-font"><?= $note['autor']?></strong>
                                <small class="pull-right text-muted">
                                    <i class="fa fa-clock-o fa-fw"></i>
                                    <?=  $note['data_anot'] ?>
                                </small>
                                <p>
                                    <?= $note['texto'] ?>
                                </p>
                                </div>
                            </div>
                        </li>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <a href="<?= base_url() . $this->ui['controller'];?>" class="btn btn-primary">Voltar</a>
            <button class="btn btn-default pull-right">
                <i class="fa fa-print fa-fw"></i>
                Imprimir
            </button>
        </div>


    <!-- Modal Add anotações -->
    <div id="addNote" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNoteLabel"
        aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                    <h4 class="modal-title" id="addNoteLabel">Adicionar Anotação</h4>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" rows="5"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times fa-fw"></i> Fechar
                    </button>
                    <button type="button" class="btn btn-primary">
                        <i class="fa fa-save fa-fw"></i> Salvar
                    </button>
                </div>
            </div> <!-- /.modal-content -->
        </div>
    </div>
    <!-- FIM do Modal -->

</div><!-- fim de row -->
</div><!-- fim de page-wrapper -->

<?php $this->load->view('common/footer'); ?>
