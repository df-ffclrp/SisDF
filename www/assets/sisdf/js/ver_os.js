$(document).ready(function(){
    // === GLOBALS ====
    // Seta mensagem dentro da modal
    set_modal_notification = function( message, warn_level){
        $('#notify').removeClass();
        $('#notify').addClass('alert alert-'+ warn_level);
        $('#notify').text(message);
    }
    // Recarrega a página
    reload_page = function(tempo){
        setTimeout(function(){
            location.reload();
        }, tempo);
    }
    /*
    Seta mensagem de notificação no meio da página
    Redundante, porém legível
    */
    set_main_notification = function( message, warn_level){
        $('#message').removeClass();
        $('#message').addClass('col-lg-12');
        $('#message').addClass('alert alert-'+ warn_level);
        $('#message').text(message);
    }

    // Checa se tem atendente. Se não tem, desativa as anotações
    if(!$("#id_atendente").val()){
        $('#btn_addNote').prop('disabled', true);
    }

    // Menu dropdown de mudar o status ao lado dos detalhes do pedido
    $('#change_status').find('a').on('click',function(e){
        e.preventDefault();
        
        id_os = $('form [name="id_os"]').val();
        link = $(this).attr('href');

        url_ajax = link + '/' + id_os;

        alert("a url é: "+url_ajax);

        $.ajax({
            type: 'GET',
            url: url_ajax,
            success: function (server_response){
               
                if(server_response != 'success'){
                    msg = "Ocorreu um erro. Contacte o Administrador do Sistema." 
                    warn_level = 'danger';
                } else {
                    msg = "Status alterado com sucesso! Recarregando Página...";
                    warn_level = 'success';
                    set_main_notification( msg , warn_level );
                    reload_page(1500);
                }
                
                set_main_notification( msg , warn_level );

                

            }
        });
    });

    // Atribui um chamado a um técnico
    $("#btn_atender").bind('click',function(){
        id_os = $('form [name="id_os"]');
        dados = id_os.serialize();

        ajax_controller = base_url + "ajax/add_atendente_os";

        $.ajax({
            type: 'POST',
            url: ajax_controller,
            data: dados,
            success: function (server_response){
                if(server_response == 'success'){
                    msg = "Atribuído com Sucesso! Recarregando Página...";
                    warn_level = 'success';
                } else {
                    msg = "Ocorreu um erro. Contacte o Administrador do Sistema." 
                    warn_level = 'danger';
                }
                
                set_main_notification( msg , warn_level );

                // Fecha a caixa de notificação
                setTimeout(function(){
                    location.reload();
                }, 2000);

            }
        });// Fim de Ajax
    });

    // Ao fechar o modal, limpa a caixa de texto
    $('#addNote').on('hidden.bs.modal', function () {
        $('#note').val('');
        $('#notify').removeClass();
        $('#notify').text('');
        if(reload_notes){
            //alert('teve ajax...');
            location.reload();
        }

    });

    // Botão para salvar a nota...
    $('#save_note').bind('click', function(){
        var note = $('#note');

        if(!note.val()){
            $('#notify').addClass("alert alert-danger");
            $('#notify').text("Favor inserir sua anotação");
            return;
        }

        dados = $('form').serialize();
        // base_url inicializada na view - escopo global
        ajax_controller = base_url+"ajax/add_note";

        $.ajax({
            type: 'POST',
            url: ajax_controller,
            data: dados,
            success: function (results){
                if(results == 'success'){
                    msg = "Anotação Cadastrada com Sucesso!";
                    set_modal_notification(msg,'success');
                    // Limpa User Interface
                    $('#note').val('');
                    $('#save_note').removeClass();
                    $('#save_note').addClass('btn btn-warning');
                    $('#save_note').html('Adicionar Outra');

                    // Fecha a caixa de notificação
                    setTimeout(function(){
                        $('#notify').removeClass();
                        $('#notify').text('');
                    }, 2000);

                } else {
                    msg = "Ocorreu um erro. Contacte o administrador do sistema";
                    set_modal_notification(msg,'danger');
                }
                reload_notes = true;
            }

        });// Fim de Ajax

    });// Fim de #add_note
});
