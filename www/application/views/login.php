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

        <!-- Custom Fonts -->
        <link href="<?= base_url() ?>assets/custom/sisdf.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <img src="<?= base_url() ?>assets/custom/img/logo_site.png" alt="Logo USP" class="center-block" width="100" height="100">

                    <h2 class="text-center">
                        Departamento de Física - FFCLRP
                    </h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-md-4 col-md-offset-4">

                    <?php
                    echo validation_errors('<div class="alert alert-danger" role="alert">'
                            . '<i class="fa fa-exclamation-circle"></i> ', '</div>');
                    ?>
                </div>

            </div>
            <div class="row">


                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-primary">
                        <div class="panel-heading">
                            <h2 class="panel-title">
                                <i class="fa fa-wrench fa-fw"></i> 
                                Serviço de Atendimento Técnico
                            </h2>
                        </div>

                        <div class="panel-body">
                            <?php if (isset($erro)): ?>
                                <div class="alert alert-danger" role="alert">
                                    <i class="fa fa-exclamation-triangle"></i>  
                                <?= $erro ?>
                                </div>
                            <?php endif; ?>


                            <form action="<?= base_url() ?>" method="post" role="form" >
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Número USP" name="num_usp" type="text" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                                    </div>
                                    <!--
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox" value="Lembre-me">Lembre-me
                                        </label>
                                    </div>
                                    -->
                                    <button type="submit" class="btn btn-lg btn-primary btn-block">Login
                                        <i class="fa fa-sign-in fa-fw"></i>
                                    </button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?= base_url() ?>assets/vendor/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?= base_url() ?>assets/vendor/metisMenu/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?= base_url() ?>assets/dist/js/sb-admin-2.js"></script>

    </body>

</html>
