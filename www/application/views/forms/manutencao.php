<?php $this->load->view('common/header'); ?>

<div id="wrapper">

    <?php $this->load->view('common/menus', $this->ui); ?>

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                    <i class="fa fa-file-text-o fa-fw"></i> 
                    Novo Chamado - Manutenção
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
                        <p class="help-block"></p>
                    </div>

                    <div class="form-group">
                        <label>Local do Atendimento:</label>
                        <select class="form-control">
                            <option> Sala X</option>
                            <option> Sala X</option>
                            <option> Sala X</option>
                            <option> Sala X</option>
                            <option> Sala X</option>
                        </select>
                        <p class="help-block">Sala X</p>
                    </div>

                    <div class="form-group">
                        <label>Descrição:</label>
                        <textarea class="form-control" rows="3" placeholder="Exemplo: Lâmpada localizada próxima ao bebedouro do bloco 5."></textarea>
                    </div>

                    <div class="form-group">
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
                        <label>Material:</label>
                        <textarea class="form-control" rows="3" placeholder="Exemplo: Conjunto de 3 reatores."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar Chamado</button>
                    <button type="reset" class="btn btn-default pull-right">Limpar dados</button>

                </form>

            </div>

        </div>
    </div>
</div>



<?php $this->load->view('common/footer'); ?>