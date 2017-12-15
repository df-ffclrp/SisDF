<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                <i class='fa fa-fw fa-bar-chart'></i>
                    Atendimentos               
                </h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>


        <!--Painel de Chamados-->
        <div class="row">
            <form>
            <div class="form-inline">
                <div class="form-group">
                <!-- Select Seções -->
                <label for="secao">Seção: </label>
                    <select name="secao" id="secao" class="form-control input-sm">
                        <option value="">Todas</option>
                        <?php foreach($secoes as $secao): ?>
                            <option value="<?= $secao['id_secao'] ?>">
 
                            <?= $secao['nome_secao'] ?>
                            </option>

                        <?php endforeach; ?>
                    </select>

                </div>

                |
                <!-- Select Status  -->
                <div class="form-group">
                
                    <label for="secao">Status </label>
                    <select name="os_status" id="os_status" class="form-control input-sm">
                        <option value="">Todos</option>
                        <?php foreach($os_status as $status): ?>
                            <option value="<?= $status['id_status'] ?>">
 
                            <?= $status['nome_status'] ?>
                            </option>

                        <?php endforeach; ?>
                    </select>

                </div>
                <button id="busca_os" type="button" class="btn btn-primary">
                    <i class="fa fa-fw fa-search"></i> Buscar
                </button>
            </div>
            </form>
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="table-responsive">
                <table class="table">

                    <thead>
                        <tr>
                            <th>Nº OS</th>
                            <th>Data atendimento</th>
                            <th>Resumo OS</th>
                            <th>Seção</th>
                            <th>Staus</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 

                        # SILENCE
                        $report = array();

                        foreach ($report as $task): ?>
                            <tr>
                                <td><?= $task['id_os']?></td>
                                
                                <td>
                                    <?php
                                    // Formata data de datetime para data amigável
                                    $data = date_create($task['data_anot']);
                                    echo date_format($data, 'd/m/Y');
                                    ?>
                                </td>

                                <td><?= $task['resumo']?></td>
                                <td><?= $task['texto']?></td>
                                
                                
                                
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <!-- table responsive -->
        </div>
        <!-- /.row -->
    </div>
</div>

<script>
    var base_url = "<?php echo base_url() ?>";
</script>