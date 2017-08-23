/*
	Remove a última parte da URL para enviar via AJAX
*/

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
	console.log('Rodando...');


	// Busca via ajax o nome da sala
	$('#sala').bind('change', function(){

		var controller = get_controller_url();
		console.log("O controller é: "+controller)

		//var id_sala = $(this).find(':selected').serialize().val();
		var id_sala = $(this).serialize();

		console.log(id_sala);

		$.ajax({
			type: 'POST',
			url: controller+'aj_get_nome_sala',
			data: id_sala,
			success: function (results){
				$('#nome_sala').html(results);
			}

		});

	});

	// Adiciona ou remove o painel de materiais
	$('#add_material').bind('click', function(){

		$('#material').slideToggle('400', function(){

			var botao = $('#add_material');

			if(botao.hasClass('btn-warning')){

				botao.toggleClass('btn-warning btn-danger');
				botao.text("Remover Material");
				$('#has_material').val('true');
				$('#forn_material').prop('disabled', false)
				$('#desc_material').prop('disabled', false)

				} else {

				botao.toggleClass('btn-danger btn-warning');
				botao.text("Adicionar Material");
				$('#has_material').val('false');
				$('#forn_material').prop('disabled', true)
				$('#desc_material').prop('disabled', true)
			}
		});

	});

});
