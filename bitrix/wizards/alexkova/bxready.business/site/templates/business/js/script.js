(function (window) {
    jQuery.easing['jswing'] = jQuery.easing['swing'];

    jQuery.extend( jQuery.easing,
    {
       easeOutBounce: function (x, t, b, c, d) {
            if ((t/=d) < (1/2.75)) {
                return c*(7.5625*t*t) + b;
            } else if (t < (2/2.75)) {
                return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;
            } else if (t < (2.5/2.75)) {
                return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;
            } else {
                return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;
            }
        },
        easeOutElastic: function (x, t, b, c, d) {
            var s=1.70158;var p=0;var a=c;
            if (t==0) return b;  if ((t/=d)==1) return b+c;  if (!p) p=d*.3;
            if (a < Math.abs(c)) { a=c; var s=p/4; }
            else var s = p/(2*Math.PI) * Math.asin (c/a);
            return a*Math.pow(2,-10*t) * Math.sin( (t*d-s)*(2*Math.PI)/p ) + c + b;
        },
        easeOutExpo: function (x, t, b, c, d) {
            return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;
        }
    });

    if (typeof window.BXReady != 'object') {
        window.BXReady = {};
    }
    
    if (typeof window.BXReady.loader != 'object')
        window.BXReady.loader = [];

    window.BXReady.showAjaxShadow = function(element, idArea, localeShadow){
        if (localeShadow == true){
            $(element).addClass('ajax-shadow');
            $(element).addClass('ajax-shadow-r');
        }
        else{
            if ($('div').is('#'+idArea)){

            }
            else
            {
                $('<div id="'+idArea+'" class="ajax-shadow"></div>').appendTo('body');
            }

            $('#'+idArea).show();
            $('#'+idArea).width($(element).width());
            $('#'+idArea).height($(element).outerHeight());
            $('#'+idArea).css('top', $(element).offset().top+'px');
            $('#'+idArea).css('left', $(element).offset().left+'px');
        }

    };

    window.BXReady.closeAjaxShadow = function(idArea, localShadow){
        if (localShadow == true){
            $(idArea).removeClass('ajax-shadow-r');
            $(idArea).removeClass('ajax-shadow');
        }
        else{
            $('#'+idArea).hide();
        }
    };
    
    window.BXReady.scrollTo = function(targetElement){
        $("html, body").animate({
            scrollTop: $(targetElement).offset().top + "px"
        }, {
            duration: 500
        });
    };

    window.BXReady.autosizeVertical = function(){
        maxHeight = 0;
        $('div.bxr-v-autosize').each(function(){
            if ($(this).height()> maxHeight){
                maxHeight = $(this).height();
            };
        });
        $('div.bxr-v-autosize').each(function(){

                delta = Math.round((maxHeight - $(this).height())/2);
                $(this).css({'padding-top': delta+'px', 'padding-bottom': delta+'px'});
        });
    }; 
    
    window.BXReady.Business = {
        setPriceCents: function(){

            $('.bxr-format-price').each(function(){
                price = $(this).html();

                newPrice = price.replace(/(\.\d\d)/g, '<sup>$1</sup>');
                newPrice = newPrice.replace(/(\.)/g, '');

                $(this).html(newPrice);
            });
        }
    };

    window.BXReady.init = function(){

        $('a.bxr-fancy').fancybox();

    }

    $(document).ready(function(){
        window.BXReady.init();

    });

})(window);
$(document).on('click', '.mobile-footer-menu-tumbl', function() {
    $(this).next().toggle();
    var Item = $(this).children("i");
    if (Item.hasClass("fa-chevron-down")) {
      Item.removeClass("fa-chevron-down").addClass("fa-chevron-up");
    }else{
      Item.removeClass("fa-chevron-up").addClass("fa-chevron-down");
    }
});


