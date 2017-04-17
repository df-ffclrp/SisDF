
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">
            <i class="fa fa-file-text-o fa-fw"></i> 
            OS Nº <?= $os['id_os'] . ' - ' . $os['nome_secao'] ?>
        </h2>
    </div>
    <!-- /.col-lg-12 -->
</div>

<!--Form-->
<div class="row">


    <div class="col-lg-8">

        <!--Dados do Solicitante-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong> <i class="fa fa-address-card fa-fw"></i> Dados do Relator</strong>
            </div>

            <div class="panel-body">
                <p> <strong>Nome:</strong> <?= $os['relator'] ?> </p>
                <p> <strong>Número USP:</strong> <?= $os['num_usp'] ?></p>
                <p> <strong>Ramal:</strong> <?= $os['ramal'] ?> </p>
                <p> <strong>Email:</strong> <?= $os['email'] ?> </p>
            </div>
        </div>

        <!--Detalhes do Pedido-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong> <i class="fa fa-list fa-fw"></i> Detalhes do Pedido</strong>
            </div>

            <div class="panel-body">
                <p> 
                    <strong>Data de Abertura:</strong> <?= $os['data_abertura'] ?> <br>
                    <strong>Finalidade:</strong> <?= $os['finalidade'] ?> <br>
                    <strong>Local:</strong> <?= $os['num_sala'].' - ' .$os['nome_sala'] ?> <br>
                    <strong>Responsável:</strong>  Prof. Belmiro Rosa

                </p>
                <p> <strong>Resumo:</strong> Troca de Lâmpada </p>

                <p> <strong>Descrição do Pedido:</strong> </p>
                <p>
                    <?= $os['os_descricao'] ?>
                </p>

            </div>
        </div>

        <!--Dados do Material-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong> <i class="fa fa-cubes fa-fw"></i> Dados do Material</strong>
            </div>

            <div class="panel-body">
                    <div class="alert alert-info">
                       <i class="fa fa-info-circle" aria-hidden="true"></i>
                        Não há material cadastrado para este chamado
                    </div>
                <p> <strong>Descrição do Material:</strong> </p>
                <p> <strong>Fornecimento: </strong> Solicitante</p> 
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do 
                    eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute 
                    irure dolor in reprehenderit in voluptate velit esse cillum 
                </p>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Voltar</button>
        <button class="btn btn-default pull-right">
            <i class="fa fa-print fa-fw"></i> 
            Imprimir
        </button>



    </div>
</div>
<!-- END Form-->