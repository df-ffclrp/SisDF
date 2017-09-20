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