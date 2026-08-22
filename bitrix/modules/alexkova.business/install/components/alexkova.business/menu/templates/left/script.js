$(document).ready(function(){

    window.BXReady.Business.MenuLeft =  {

        slideAnimation: 300,

        init: function(){

            $(".bxr-left-menu  .fa-angle-right, .bxr-left-menu  .fa-angle-down").on('click', function(){
                window.BXReady.Business.MenuLeft.showMenuUl(this);
                return false;
            });

        },

        showMenuUl: function(e) {
            console.info($(e));
            ul = $(e).parents("li").find("ul");
            if(ul.is(".show")) {
                $(e).parents("li").find("ul").slideUp(window.BXReady.Business.MenuLeft.slideAnimation, function(){
                    $(this).removeClass("show");
                }).parent("li").find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-right");
            }
            else {
                $(e).parents("li").find("ul").slideDown(window.BXReady.Business.MenuLeft.slideAnimation, function(){
                    $(this).addClass("show");
                }).parent("li").find(".fa-angle-right").removeClass("fa-angle-right").addClass("fa-angle-down");
            }
        }
    };

    $(document).ready(function(){
        window.BXReady.Business.MenuLeft.init();
    });
});