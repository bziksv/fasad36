$(document).ready(function(){

	$('span[data-text_script]').each(function(i, el){
		var span = $(el);
		console.log(span.data('text_script'));
		span.html(span.data('text_script'));
	});
});
