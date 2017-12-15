$(document).ready(function(){


    format_date = function(datetime){
        var date_timeArr = datetime.split(' ');
        date = date_timeArr[0];
        // Splits again:
        date = date.split('-');
        // Reverses
        date.reverse();

        return date.join('/');

    }

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
                // console.log(results);

                $.each(results, function(indice, os){

                    var data_abrt = format_date(os.data_abertura);
                    console.log(data_abrt);

                    $('<tr>').append(
                        $('<td>').text(os.id_os),
                        $('<td>').text(data_abrt),
                        $('<td>').text(os.resumo),
                        $('<td>').text(' ' + os.nome_secao).prepend($('<i>').addClass('fa fa-fw ' + os.icone_secao)),
                        $('<td>').text(os.nome_status),
                        $('<td>').text(os.id_os),
                    ).appendTo('.table');

                });
            }
        });// Fim de Ajax

    });

});