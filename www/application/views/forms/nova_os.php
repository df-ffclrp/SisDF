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

            <div class="col-lg-6">
                <form role="form">
                    <div class="form-group">
                        <label>Resumo:</label>
                        <input class="form-control" placeholder="Exemplo: Troca de Lâmpada">
                        
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
                        <textarea class="form-control" rows="3" placeholder="Exemplo: Lâmpada localizada próxima ao bebedouro do bloco 5."></textarea>
                    </div>

                    <button id="add_material" type="button" class="btn btn-warning">
                        
                        Adicionar Material
                    </button>
                    <br>
                    <br>

                    <!-- Detalhes do Material -->
                    <div id="material" class="panel panel-primary" style="display: none;">

                        <input id="has_material" type="hidden" value="false">
                        <div class="panel-heading">
                            <i class="fa fa-cubes fa-fw"></i> 
                            <strong>Detalhes do Material</strong>
                        </div>

                        
                        <div class="panel-body">

                            <div  class="form-group">

                                <label>Fornecimento do Material:</label>
                                <div class="radio">
                                    <label>
                                        <input name="optionsRadios" id="optionsRadios1" value="option1" checked="" type="radio">Departamento
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input name="optionsRadios" id="optionsRadios2" value="option2" type="radio">Solicitante
                                    </label>
                                </div>
                            </div>


                            <div class="form-group">
                                <label>Descrição do material:</label>
                                <textarea class="form-control" rows="3" placeholder="Exemplo: Conjunto de 3 reatores."></textarea>
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

