function get_controller_url(){
	var url = window.location.href;

	// Remove as duas partes finais do controller
	parts = url.split('/');
	parts.pop();
	parts.pop();
	url = parts.join('/') + '/';

	return url;
}



$(document).ready(function(){
    // Ao fechar o modal, limpa a caixa de texto
    $('#addNote').on('hidden.bs.modal', function () {
        $('#note').val('');
        //alert('fechou modal');
    })

    set_system_message = function( message, warn_level){
        $('#message').addClass('alert alert-'+ warn_level);
        $('#message').text(message);
    }


    var controller = get_controller_url();

    $('#add_note').bind('click', function(){
        var note = $('#note');

        if(!note.val()){
            $('#notify').addClass("alert alert-danger");
            $('#notify').text("Favor inserir sua anotação");

        } else {

            dados = $('form').serialize();
            test_ajax = "http://localhost/SisDF/www/ajax/add_note"


            $.ajax({
    			type: 'POST',
    			url: test_ajax,
    			data: dados,
    			success: function (results){
    				if(results == 'success'){
                        msg = "Anotação Cadastrada com Sucesso!"
                        // Jquery pra fechar a modal
                        $('#addNote').modal('toggle');
                        set_system_message(msg,'success');
                        //alert(msg);

                    }
    			}

    		});// Fim de Ajax
        }

    });// Fim de #add_note
});
