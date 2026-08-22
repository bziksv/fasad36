if (window){
    window.elementEcommerceLiteV1 = {
        resizeVerticalBlock: function(){
            var $maxHeight = [];
            var $maxNameHeight = [];
            var $maxPriceHeight = [];
            var $maxInfoHeight = [];

            $('.bxr-element-ecommerce-lite-v1[data-resize=1]').each(function(){

                uid = $(this).data('uid');
                $nameContainer = $(this).children('.bxr-element-container').children('.bxr-element-name');
                $priceContainer = $(this).children('.bxr-element-container').children('.bxr-element-price');
                $infoContainer = $(this).children('.bxr-element-container').children('.bxr-element-info');

                if (!(uid in $maxNameHeight)) {
                    $maxNameHeight[uid] = 0;
                }
                
                if (!(uid in $maxPriceHeight)) {
                    $maxPriceHeight[uid] = 0;
                }
                
                if (!(uid in $maxInfoHeight)) {
                    $maxInfoHeight[uid] = 0;
                }

                if ($nameContainer.height() > $maxNameHeight[uid]) $maxNameHeight[uid] = $nameContainer.height();
                
                if ($priceContainer.height() > $maxPriceHeight[uid]) $maxPriceHeight[uid] = $priceContainer.height();
                
                if ($infoContainer.height() > $maxInfoHeight[uid]) $maxInfoHeight[uid] = $infoContainer.height();

            });

            $('.bxr-element-ecommerce-lite-v1[data-resize=1]').each(function(){

                uid = $(this).data('uid');
                $nameContainer = $(this).children('.bxr-element-container').children('.bxr-element-name');
                $priceContainer = $(this).children('.bxr-element-container').children('.bxr-element-price');
                $infoContainer = $(this).children('.bxr-element-container').children('.bxr-element-info');

                if ($nameContainer.height() <= $maxNameHeight[uid]) {
                    $nameContainer.height($maxNameHeight[uid]);
                }
                
                if ($priceContainer.height() <= $maxPriceHeight[uid]) {
                    $priceContainer.height($maxPriceHeight[uid]);
                }
                
                if ($infoContainer.height() <= $maxInfoHeight[uid]) {
                    $infoContainer.height($maxInfoHeight[uid]);
                }

            });

            $('.bxr-element-ecommerce-lite-v1[data-resize=1]').each(function(){

                uid = $(this).data('uid');
                if (!(uid in $maxHeight)) {
                    $maxHeight[uid] = 0;
                }
                if ($(this).height()>$maxHeight[uid]) $maxHeight[uid] = $(this).height();
            });

            $('.bxr-element-ecommerce-lite-v1[data-resize=1]').each(function(){

                uid = $(this).data('uid');
                if ($(this).height() <= $maxHeight[uid]) {
                    $(this).children('.bxr-element-container').height($maxHeight[uid]);
                    $(this).height($maxHeight[uid]);
                }
            });
        },
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
        elementEcommerceLiteV1.resizeVerticalBlock();
        elementEcommerceLiteV1.showHiddenElements();
    });
            
    if (typeof window.BXReady.loader != 'object')
        window.BXReady.loader = [];        
        
    BXReady.loader.push(elementEcommerceLiteV1.resizeVerticalBlock);

    $(window).resize(function(){
        elementEcommerceLiteV1.resizeVerticalBlock();
    });
    
    /*var current_offer_id;
    var trade_id;
    var trade_name;
    var trade_link;
    var formRequestMsg;
    
    $(document).on("mouseover", ".bxr-element-ecommerce-lite-v1 .bxr-trade-request", function() {
        current_offer_id = $(this).data('offer-id');
        trade_id = $(this).data('trade-id');
        trade_name = $(this).data('trade-name');
        trade_link = $(this).data('trade-link');
        
        strParams = "";
        $(this).closest('.bxr-element-ecommerce-lite-v1').find('li.bx_active').each(function() {
            strParams += $(this).data('prop-name')+': '+$(this).attr('title')+', ';
        });
        strParams = strParams.slice(0,-2);
        
        formRequestMsg = $(this).data('msg').replace("#PARAMS#",strParams);
    });*/
}