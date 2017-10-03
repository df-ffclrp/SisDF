$(document).ready(function(){

	// Busca via ajax o nome da sala
	$('#sala').bind('change', function(){

		var id_sala = $(this).serialize();

		$.ajax({
			type: 'POST',
			url: base_url+'ajax/get_resp_sala',
			data: id_sala,
			success: function (results){
				$('#nome_sala').html("Responsável: "+ results);
			}

		});

	});

	// Adiciona ou remove o painel de materiais
	$('#add_material').bind('click', function(){

		$('#material').slideToggle('400', function(){

			var btn_add_mat = $('#add_material');

			if(btn_add_mat.hasClass('btn-warning')){

				btn_add_mat.toggleClass('btn-warning btn-danger');
				btn_add_mat.text("Remover Material");
				$('#has_material').val('true');
				$('#forn_material').prop('disabled', false);
				$('#desc_material').prop('disabled', false);

			} else {

				btn_add_mat.toggleClass('btn-danger btn-warning');
				btn_add_mat.text("Adicionar Material");

				$('#has_material').val('false'); // input hidden
				// Inputs de material
				$('#forn_material').prop('disabled', true);
				$('#desc_material').prop('disabled', true);
			}
		});

	});

});
