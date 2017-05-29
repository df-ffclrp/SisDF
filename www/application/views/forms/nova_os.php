<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    <i class="fa <?= $secao_dest['icone'] ?> fa-fw"></i> 
                    Novo Chamado - <?= $secao_dest['nome_secao'] ?>
                </h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!--Form-->
        <div class="row">
            <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>

            <div class="col-lg-6">
                <form role="form" action="<?= base_url().'chamados/novo/'. $secao_dest['id_secao'] ?>" method="post">
                    <div class="form-group">
                        <label>Resumo:</label>
                        <input class="form-control" name="resumo" value="<?= set_value('resumo')?>" placeholder="<?= $ph['resumo'] ?>">
                        
                    </div>

                    <div class="form-group">

                        <label>Local do Atendimento:</label>
                        <select class="form-control" name="sala" id="sala">
                            <option value="" selected>Selecione uma sala </option>

                            <?php foreach ($salas as $sala): ?>

                                <option value="<?= $sala['id_sala'] ?>"> Sala Nº <?= $sala['num_sala'] ?></option>

                            <?php endforeach; ?>
                            
                            
                        </select>
                        <p id="nome_sala" class="label label-success"></p>
                    </div>
                    

                    <div class="form-group">
                        <label>Descrição:</label>
                        <textarea class="form-control" name="descricao" rows="3" placeholder="<?= $ph['descricao'] ?>"></textarea>
                    </div>

                    <button id="add_material" type="button" class="btn btn-warning">
                        Adicionar Material
                    </button>
                    <br>
                    <br>

                    <!-- Detalhes do Material -->
                    <div id="material" class="panel panel-primary" style="display: none;" >

                        <input id="has_material" name='has_material' type="hidden" value="false">

                        <div class="panel-heading">
                            <i class="fa fa-cubes fa-fw"></i> 
                            <strong>Detalhes do Material</strong>
                        </div>

                        
                        <div class="panel-body">

                            <div  class="form-group">
                                <label>Fornecimento do Material:</label>
                                <select class="form-control" name="forn_material">
                                    <option value="" selected>Selecione uma opção...</option>
                                    <option value="Departamento">Fornecido pelo Departamento </option>
                                    <option value="Solicitante">Fornecido pelo Solicitante </option>
                                </select>    
                            </div>

                            <div class="form-group">
                                <label>Descrição do material:</label>
                                <textarea class="form-control" rows="3" placeholder="<?= $ph['desc_material'] ?>"></textarea>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Abrir Chamado</button>
                    <button type="reset" class="btn btn-default pull-right">Limpar dados</button>

                </form>

            </div>

        </div>
    </div>
</div>

