<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" >
        <title>Departamento de Física - FFCLRP</title>
        <meta name="keywords" content="" >
        <meta name="description" content="" >

        <!-- CSS -->
        <link href="<?= base_url() ?>assets/sisdf/css/imprimir_os.css" rel="stylesheet" type="text/css" >

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>
    
        <!-- Timbre -->
        <div id="a4">
            <div id="header">
                <img src="<?= base_url() ?>assets/sisdf/img/logo_print.png" alt="DF logo" >


                <div id="timbre">
                    <h1>Departamento de Física</h1>
                    <h2>Faculdade de Filosofia Ciências e Letras de Ribeirão Preto</h2>
                </div>


            </div>
            <div class="print">
                <a href="#" onClick="window.print();return false">
                    <i id="botao_imprmir" class="fa fa-print fa-fw"></i><br>
                    imprimir
                </a>
            </div>
            <br>

            <!-- Cabeçalho -->

            <h2 id="titulo">Ordem de Serviço Nº <?= "{$os['id_os']} - {$os['nome_secao']}" ?></h2>

            <!-- Solicitante -->
            <div class="box_dados">
                <h3>Dados do solicitante</h3>

                <p><span class="label">Nome: </span> <?= $os['relator'] ?></p>
                <p><span class="label">Numero USP: </span> <?= $os['num_usp'] ?></p>
                <p><span class="label">Ramal: </span> <?= $os['ramal'] ?> </p> 
                <span class="label">Email: </span> <?= $os['email'] ?> <br>

            </div>

            <!-- Pedido -->				
            <div class="box_dados">
                <h3>Detalhes do Pedido</h3>
                <?php
                    $data_abertura = date_create($os['data_abertura']);
                ?>


                <p><span class="label">Data de Abertura: </span> <?= date_format($data_abertura, ' d/m/Y à\s H:i') ?> </p>
                <p><span class="label">Finalidade: </span> <?= $os['finalidade'] ?> </p>
                <p><span class="label">Local: </span> Sala <?= "{$os['num_sala']} - {$os['nome_sala']}" ?> </p>
                <p><span class="label">Responsável: </span> <?= $os['resp_sala'] ?> </p>

                <br>

                <p><span class="label">Resumo:</span>  <?= $os['resumo'] ?></p>

                <br>

                <p><span class="label">Descrição do Pedido:</span></p>

                <div class="box_descricao">
                    <?= $os['os_descricao'] ?>
                </div>
            </div>

            <?php if($os['descricao_mat']): ?>
            <div class="box_dados">
                <h3>Dados do Material:</h3>

                <p><span class="label" >Fornecimento: </span> <?= $os['fornecimento']; ?></p>
                <p><span class="label">Descrição do Material:</span></p>

                <div class="box_descricao">
                    <?= $os['descricao_mat']; ?>
                </div>
            </div>
            <?php endif;?>

            <!-- Assinaturas -->		
            <div class="container_assinaturas">
                <div class="assinaturas">

                    <div class="idf_solicitante">
                        <?= $os['relator'] ?><br>
                        <strong>Solicitante</strong>
                    </div>

                    <div class="idf_responsavel">	
                    <?= $os['resp_secao'] ?><br>
                        <strong> Responsável da Seção </strong>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
