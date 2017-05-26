<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    <i class="fa fa-cog fa-fw"></i> 
                    Novo Chamado - Oficina Mecânica
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
                        <input class="form-control" placeholder="Exemplo: Engrenagem de Alumínio">
                        
                    </div>


                    <div class="form-group">
                        <label>Local solicitante:</label>
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
                        <textarea class="form-control" rows="3" placeholder="Exemplo: "></textarea>

                    </div>

                    <button type="submit" class="btn btn-primary">Abrir Chamado</button>
                    <button type="reset" class="btn btn-default pull-right">Limpar dados</button>

                </form>

            </div>
        </div>
        <!-- END Form-->
    </div>
</div>
