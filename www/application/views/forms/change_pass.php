<div id="wrapper">
<div id="page-wrapper">


    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header orange"><i class="fa fa-fw fa-lock"></i>
                    Alterar Senha
                </h1>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <?= form_open('user/mudar_senha'); ?>
                <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <!-- Old Pass-->
                <div class="form-group">
                    <label>Senha Atual</label>
                    <input name="senha_atual" placeholder="Digite sua senha atual" class="form-control input-md"  type="password">
                </div>

                <!-- New password input-->
                <div class="form-group">
                    <label>Nova Senha</label>
                    <input name="nova_senha" placeholder="Digite sua nova senha" class="form-control input-md"  type="password">
                </div>

                <!-- Password verify-->
                <div class="form-group">
                    <label>Verificação de Senha</label>
                    <input  name="verifica_senha" placeholder="Digite novamente" class="form-control input-md"  type="password">
                </div>

                <a href="<?php echo base_url() . 'user'; ?>" class="btn btn-default">
                    <i class="fa fa-arrow-circle-o-left"></i> 
                    Voltar
                </a>

                <button name="alterar_senha" type="submit" class="btn btn-warning pull-right" >
                    <i class="fa fa-fw fa-key"></i>
                    Alterar Senha
                </button>


                </form>
            </div><!-- fim de col-lg-4 -->

        </div><!-- fim de Row-->
    </div><!-- fim de Container Fluid-->
</div><!-- fim de Page Wrapper-->
</div><!-- fim de Wrapper-->