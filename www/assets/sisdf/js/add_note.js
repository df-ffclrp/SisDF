$(document).ready(function(){

    // Ao fechar o modal, limpa a caixa de texto
    $('#addNote').on('hidden.bs.modal', function () {
        $('#note').val('');
        $('#notify').removeClass();
        $('#notify').text('');
        if(reload_notes){
            //alert('teve ajax...');
            location.reload();
        }

    })

    // Seta mensagem dentro da modal
    set_notification = function( message, warn_level){
        $('#notify').removeClass();
        $('#notify').addClass('alert alert-'+ warn_level);
        $('#notify').text(message);
    }


    // Botão para salvar a nota...
    $('#save_note').bind('click', function(){
        var note = $('#note');

        if(!note.val()){
            $('#notify').addClass("alert alert-danger");
            $('#notify').text("Favor inserir sua anotação");

        } else {

            dados = $('form').serialize();
            // base_url inicializada na view - escopo global
            test_ajax = base_url+"ajax/add_note";


            $.ajax({
    			type: 'POST',
    			url: test_ajax,
    			data: dados,
    			success: function (results){
    				if(results == 'success'){
                        msg = "Anotação Cadastrada com Sucesso!";
                        set_notification(msg,'success');
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
                        set_notification(msg,'danger');
                    }
                    reload_notes = true;
    			}

    		});// Fim de Ajax
        }

    });// Fim de #add_note
});
