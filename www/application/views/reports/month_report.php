<!DOCTYPE html>
<html lang="pt-br">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>SisDF - FFCLRP</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        
        <!-- CSS SisDF -->
        <link href="<?= base_url() ?>assets/sisdf/css/sisdf.css" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
<body>

<div id="wrapper">
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">
                <i class='fa fa-fw fa-desktop'></i>
                    Atendimentos / Informática - Novembro 2017                    
                </h2>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!--END Alert Box-->

        <!--Painel de Chamados-->

        <div class="row">
            <div class="col-lg-12">

               <div class="table-responsive">
                <table class="table">

                    <thead>
                        <tr>
                            <th>Nº OS</th>
                            <th>Data atendimento</th>
                            <th>Resumo OS</th>
                            <th>Atendimento</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($report as $task): ?>
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
