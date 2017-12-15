$(document).ready(function(){

    $('#busca_os').bind('click', function(){

        dados = $('form').serialize();
        
        ajax_controller = base_url+"ajax/get_os_by";

        $.ajax({
            type: 'POST',
            url: ajax_controller,
            data: dados,
            dataType: 'json',
            beforeSend: function(){
                console.log("enviando: " + dados);
            },
            
            success: function (results){
                // Limpa resultado anterior
                $("tbody").empty();

                console.log('deu certo');
                console.log(results);

                $.each(results, function(indice, os){

                    $('<tr>').append(
                        $('<td>').text(os.id_os),
                        $('<td>').text(os.data_abertura),
                        $('<td>').text(os.resumo),
                        $('<td>').text(os.nome_secao),
                        $('<td>').text(os.nome_status),
                        $('<td>').text(os.id_os),
                    ).appendTo('.table');

                });
            }
        });// Fim de Ajax

    });

});