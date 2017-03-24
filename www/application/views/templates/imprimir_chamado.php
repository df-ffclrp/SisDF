<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" >
        <title>Departamento de Física - FFCLRP</title>
        <meta name="keywords" content="" >
        <meta name="description" content="" >

        <!-- CSS -->
        <link href="<?= base_url() ?>assets/custom/imprimir.css" rel="stylesheet" type="text/css" >

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Timbre -->
        <div id="a4">
            <div id="header">
                <img src="<?= base_url() ?>assets/custom/img/logo_print.png" alt="DF logo" >


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

            <h2 id="titulo">Ordem de Serviço Nº 368 - Oficina Mecânica </h2>

            <!-- Solicitante -->
            <div class="box_dados">
                <h3>Dados do solicitante</h3>

                <p><span class="label">Nome: </span> Lucas Andrade </p>
                <p><span class="label">Numero USP: </span> 654897 </p>
                <p><span class="label">Ramal: </span> 0500 </p> 
                <span class="label">Email: </span> lucas@meeplemaniacs.com <br>

            </div>

            <!-- Pedido -->				
            <div class="box_dados">
                <h3>Detalhes do Pedido</h3>
                <p><span class="label">Data de Abertura: </span> <?= date('d/m/Y'); ?> 	</p>
                <p><span class="label">Finalidade: </span> Projetos Didáticos </p>
                <p><span class="label">Local: </span> Sala 29 - Board Game Design </p>
                <p><span class="label">Responsável: </span> Jack Explicador </p>

                <br>

                <p><span class="label">Resumo:</span>  Usinagem de Meeples</p>

                <br>

                <p><span class="label">Descrição do Pedido:</span></p>

                <div class="box_descricao">
                    Mussum Ipsum, cacilds vidis litro abertis. Nec orci ornare consequat. 
                    Praesent lacinia ultrices consectetur. Sed non ipsum felis. 
                    Interagi no mé, cursus quis, vehicula ac nisi. 
                    Viva Forevis aptent taciti sociosqu ad litora torquent 
                    Mé faiz elementum girarzis, nisi eros vermeio. 
                </div>
            </div>


            <div class="box_dados">
                <h3>Dados do Material:</h3>

                <p><span class="label" >Fornecimento: </span> Departamento</p>
                <p><span class="label">Descrição do Material:</span></p>

                <div class="box_descricao">
                    Mussum Ipsum, cacilds vidis litro abertis. Nec orci ornare consequat. 
                    Praesent lacinia ultrices consectetur. Sed non ipsum felis. 
                    Interagi no mé, cursus quis, vehicula ac nisi. 
                    Viva Forevis aptent taciti sociosqu ad litora torquent 
                    Mé faiz elementum girarzis, nisi eros vermeio.
                </div>
            </div>

            <!-- Assinaturas -->		
            <div class="container_assinaturas">
                <div class="assinaturas">

                    <div class="idf_solicitante">
                        Lucas Andrade<br>
                        <strong>Solicitante</strong>
                    </div>

                    <div class="idf_responsavel">	
                        Esse é um nome muito grande de um responsável <br>
                        <strong> Responsáveis </strong>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
