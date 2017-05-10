/*
	Remove a última parte da URL para enviar via AJAX
*/

function get_controller_url(){
	var url = window.location.href;

	parts = url.split('/');
	parts.pop();
	url = parts.join('/') + '/';

	return url;
}


$(document).ready(function(){
	console.log('Rodando...');

	var controller = get_controller_url();

	console.log("O controller é: "+controller)

	$('#sala').bind('change', function(){
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
	
});