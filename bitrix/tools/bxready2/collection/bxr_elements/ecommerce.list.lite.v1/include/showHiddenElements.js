if (window){
    window.catalogEcommerceV1List = {        
				showHiddenElements : function() {
					setTimeout(function() {	
						$('.js-availability').each(function(){	
							if($(this).hasClass('is-js-visible') === false) {
								$(this).addClass('is-js-visible');
								
								let $xml = $(this).data('xml');
								let $value = $(this).data('value');
								
								$(this).html('<span class="xml-availability-'+$xml+'">'+$value+'</span>');
							}
						});
						$('.js-buy-button').each(function(){
							if($(this).hasClass('is-js-visible') === false) {
								$(this).addClass('is-js-visible');
								
								let $linkhref = $(this).data('linkhref');
								let $linkid = $(this).data('linkid');
								let $linkname = $(this).data('linkname');
								
								$(this).html('<a href="'+$linkhref+'" class="bxr-color-button" id="'+$linkid+'">'+$linkname+'</a>');
							}
						});
					}, 100);
					
					
				}
    }
		$(document).ready(function(){			
			catalogEcommerceV1List.showHiddenElements();
		});
}	