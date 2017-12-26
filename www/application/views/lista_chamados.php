
<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <i class="fa <?= $header_icon ?> fa-fw"></i>
                    <?= $header ?>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>


        <!--Painel de Chamados-->

        <div class="row">
            <div class="col-lg-12">
                <!--Alert Box-->
                <?php
                if (isset($_SESSION['message'])):
                    show_alert_box();
                endif;
                ?>

                <!--END Alert Box-->

            <div class="table-responsive">
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <th>Nº OS</th>
                            <th>Data de Abertura</th>
                            <th>Resumo</th>
                            <th>Seção</th>
                            <th>Status</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                        <?php foreach ($lista_os as $os): ?>
                            <tr>
                                <td><?= $os['id_os']?></td>
                                
                                <td>
                                    <?php
                                    // Formata data de datetime para data amigável
                                    $data = date_create($os['data_abertura']);
                                    echo date_format($data, 'd/m/Y');
                                    ?>
                                </td>

                                <td><?= $os['resumo']?></td>
                                
                                <td>
                                    <i class="fa fa-fw <?= $os['icone_secao'] ?>"></i>
                                    <?= $os['nome_secao']?> 
                                </td>
                                
                                <td>
                                    <span class="label label-<?= $os['bs_label']?>">
                                        <i class="fa <?= $os['icone'] ?> fa-fw"></i>

                                        <?= $os ['nome_status'] ?>
                                    </span>

                                </td>
                                
                                <td>
                                    <a class="btn btn-sm btn-default" href="<?= base_url() . 'chamados/ver_os/' . $os['id_os']?>">
                                        <i class="fa fa-eye fa-fw"></i> Ver OS
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <!-- table responsive -->
            <div class="col-lg-12">
                <nav>
                    <?= $this->pagination->create_links();?>
                </nav>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>
