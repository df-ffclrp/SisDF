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
            <!-- /.col-lg-12 -->
        </div>

        <!--Form-->
        <div class="row">


            <div class="col-lg-8">

                <!--Dados do Solicitante-->
                <div class="panel panel-default">
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
                <div class="panel panel-default">
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
                        <p> <strong>Resumo:</strong> <?= $os['resumo'] ?></p>

                        <p> <strong>Descrição do Pedido:</strong> </p>
                        <p>
                            <?= $os['os_descricao'] ?>
                        </p>

                    </div>
                </div>

                <!--Dados do Material-->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> <i class="fa fa-cubes fa-fw"></i> Dados do Material</strong>
                    </div>

                    <div class="panel-body">

                        <?php  if($os['descricao_mat'] == null): ?>
                            <div class="alert alert-info">
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


            <a href="<?= base_url() . $this->ui['controller'];?>" class="btn btn-primary">Voltar</a>
            <button class="btn btn-default pull-right">
                <i class="fa fa-print fa-fw"></i> 
                Imprimir
            </button>



        </div>
    </div>
    <!-- END Form-->
</div>
</div>

<?php $this->load->view('common/footer'); ?>