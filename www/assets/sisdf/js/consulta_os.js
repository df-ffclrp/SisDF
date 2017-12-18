$(document).ready(function(){

    make_icon = function(icon_name){

        var icon = document.createElement('i');
        icon.className = 'fa fa-fw ' + icon_name;

        return icon.outerHTML;
    }


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
                // console.log("enviando: " + dados);
            },
            
            success: function (results){
                // Limpa resultado anterior
                $("tbody").empty();

                // Array para armazenar a tabela de resultados
                var tbodyArr = [];

                for (var i=0; i<results.length; i++){
                    var os = results[i];
                    // console.log(os);
                    var data_abrt = format_date(os.data_abertura);

                    tbodyArr.push('<tr>');
                    tbodyArr.push('<td>' + os.id_os + '</td>');
                    tbodyArr.push('<td>' + data_abrt + '</td>');
                    tbodyArr.push('<td>' + os.resumo + '</td>');

                    var secao_icon = make_icon(os.icone_secao);
                    var status_icon = make_icon(os.icone_status);

                    tbodyArr.push('<td>' + secao_icon +' '+ os.nome_secao + '</td>');
                    tbodyArr.push('<td><label class="label label-' + os.bs_label +'">'+ status_icon+ os.nome_status + '</label></td>');

                    tbodyArr.push('<td>');

                        var link_os = document.createElement('a');

                        link_os.className = "btn btn-sm btn-default";
                        link_os.href = base_url + 'chamados/ver_os/' + os.id_os;

                        link_os.setAttribute('target', '_blank')

                        var eye_icon = make_icon('fa-eye');
                        link_os.innerHTML = eye_icon + " Ver OS";

                        tbodyArr.push(link_os.outerHTML);
                    tbodyArr.push('</td>');
                    tbodyArr.push('</tr>');
                }
                $('.table').append(tbodyArr.join(''));

            }
        });// Fim de Ajax

    });

});