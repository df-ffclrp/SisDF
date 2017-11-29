<?php $this->load->view('common/header'); ?>

<div id="wrapper">

<?php $this->load->view('common/menus',$this->menu_info); ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">
                <i class="fa fa-file-text-o fa-fw"></i>
                OS Nº <?= $os['id_os'] . ' - ' . $os['nome_secao'] ?>
            </h2>
        </div>
    </div>

    <!-- Mensagem para o usuário -->
    <div class="row">
        <div id="message"></div>
    </div>

    <div class="row">

        <!-- Dados do Chamado -->
        <div class="col-lg-6">
            <!--Detalhes do Pedido-->
            <div class="panel panel-info">
                <div class="panel-heading">
                    <strong> <i class="fa fa-list fa-fw"></i> Detalhes do Pedido</strong>

                <!-- botão para atender o chamado -->
                <?php
                // Se é técnico e está na seção, mostra configurações
                if($this->auth->in_role('tecnico') && $this->auth->in_secao($os['secao_os'])):
                    // Se não tem atendente, mostra o botão pra atender
                    if(!$os['id_atendente']):
                ?>
                    <button id="btn_atender" class="btn btn-success btn-xs pull-right" type="button" >
                        <i class="fa fa-bomb fa-fw"></i> Atender
                    </button>
                    
                    <?php else: ?>

                    <div class="pull-right">
                        <div class="btn-group">
                            <button class="btn btn-default btn-xs dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                mudar status <span class="caret"></span>
                            </button>

                            <ul id="change_status" class="dropdown-menu" role="menu">
                            <?php foreach($change_status_menu as $status): ?>
                                <li>
                                    <a href="<?= base_url().'ajax/change_os_status/'.$status['id_status']?>">
                                    <i class="fa <?= $status['icone'] ?> fa-fw"></i>
                                        <?= $status['nome_status'] ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>     
                            </ul>
                        </div>
                    </div>

                    <?php endif; ?>
                <?php endif; ?>
                </div><!-- fim do panel-heading -->

                <div class="panel-body">
                    <p>

                        <?php
                            if(!$os['atendente']):
                                $os['atendente'] = '<span class="txt-red">Não atribuído</span>';
                            endif;
                        ?>
                        <strong>Atendente:</strong> <?= $os['atendente'] ?> <br>
                        <strong>Status:</strong>
                        <span class="label label-<?= $os['bs_label']?>">
                            <i class="fa <?= $os['status_icone'] ?> fa-fw"></i><?= $os ['nome_status'] ?>
                        </span>
                        <br>
                        <br>
                        <?php $data_abert = date_create($os['data_abertura']); ?>

                        <strong>Data de Abertura:</strong>  <?= date_format($data_abert, ' d/m/Y à\s H:i') ?> <br>
                        <strong>Finalidade:</strong> <?= $os['finalidade'] ?> <br>
                        <strong>Local:</strong> <?= $os['num_sala'].' - ' .$os['nome_sala'] ?> <br>
                        <strong>Responsável:</strong>  <?= $os['resp_sala'] ?>
                    </p>
                    <p> <strong>Resumo:</strong> <?= $os['resumo'] ?> </p>

                    <p> <strong>Descrição do Pedido:</strong> </p>
                        <div class="panel panel-info panel-body">
                            <?= $os['os_descricao'] ?>
                        </div>
                        <input id="id_atendente" type="hidden" value="<?= $os['id_atendente']?>">
                </div>
            </div>

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
                <strong> <i class="fa fa-tasks fa-fw"></i> Andamento do Chamado</strong>

                <?php if($this->auth->in_secao($os['secao_os']) && $this->auth->in_role('tecnico')): ?>

                <button id="btn_addNote" class="btn btn-default btn-xs pull-right" data-toggle="modal" data-target="#addNote">
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
                                        <?php
                                            $data_anot = date_create($note['data_anot']);
                                            echo date_format($data_anot, ' d/m/Y à\s H:i')
                                        ?>
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

            <a href="<?= base_url() . $this->menu_info['controller'];?>" class="btn btn-primary">Voltar</a>
            
            <a href="<?= base_url() . 'chamados/imprimir_os/'. $os['id_os']  ;?>" target="_blank" class="btn btn-default pull-right">
                <i class="fa fa-print fa-fw"></i>
                Imprimir
            </a>
        </div>

<!-- Modal Add anotações -->
<form>
    <div id="addNote" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="addNoteLabel"
        aria-hidden="true">
        <!-- Envio AJAX -->
        <input type="hidden" name="id_os" value="<?= $os['id_os'] ?>">
        <input type="hidden" name="id_usuario" value="<?= $_SESSION['id_usuario'] ?>">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                    <h4 class="modal-title" id="addNoteLabel">
                        <i class="fa fa-pencil fa-fw"></i>
                        Adicionar Anotação
                    </h4>

                </div>
                <div class="modal-body">
                    <div id="notify"></div>
                    <textarea id="note" class="form-control" rows="5" name="anotacao"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times fa-fw"></i> Fechar
                    </button>
                    <button id="save_note" type="button" class="btn btn-primary">
                        <i class="fa fa-save fa-fw"></i> Salvar
                    </button>
                </div>
            </div> <!-- /.modal-content -->
        </div>
    </div>
</form>
    <!-- FIM do Modal -->

</div><!-- fim de row -->
</div><!-- fim de page-wrapper -->
<!-- Para enviar ao JS -->
<script>
    var base_url = "<?php echo base_url() ?>";
</script>

<?php $this->load->view('common/footer'); ?>
