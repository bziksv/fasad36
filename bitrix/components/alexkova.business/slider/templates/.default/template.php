<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin('...'); ?>
<?if (count($arResult["ITEMS"])<=0) return;?>
<?
if(isset($arParams['SLIDER_FULL_SCREEN']) && $arParams['SLIDER_FULL_SCREEN']=="N") {?>
  <div class="container" style="margin-top:20px;">
<?}
if($arParams['COLUMN_DESC']=="N") {
include_once "main_slider.php";
}else{
  if ($arParams['COLUMN_POSITION']=="left") {
    include_once "nav.php";
    include_once "main_slider.php";
  }else{
    include_once "main_slider.php";
    include_once "nav.php";
  }
}
if(isset($arParams['SLIDER_FULL_SCREEN']) && $arParams['SLIDER_FULL_SCREEN']=="N") {?>
  </div>
<?}?>
<div class="clearfix"></div>
    <script>
    window.BXReady.Business.SlickSliderTop = {
        init: function(){
            var Slidevar = 0;
            $('.bxr-slider').slick({
                // asNavFor: '.bxr-main-slider-nav',
                slidesToShow: 1,
                // asNavFor: '.bxr-main-slider-nav'
                dots: true,
                arrow:false,
                <?
                    $fade = "false";
                    if($arParams['SLIDER_FADE']=="Y")
                        $fade = "true";
                ?>
                fade: <?=$fade;?>,
                <?
                    $speed = 500;
                    if(isset($arParams['SLIDER_SPEED']) && is_numeric($arParams['SLIDER_SPEED']))
                        $speed = $arParams['SLIDER_SPEED'];
                ?>
                speed: <?=$speed;?>,
                <?
                    $autoplaySpeed = 1500;
                    if(isset($arParams['SLIDER_AUTOPLAY_SPEED']) && is_numeric($arParams['SLIDER_AUTOPLAY_SPEED']))
                        $autoplaySpeed = $arParams['SLIDER_AUTOPLAY_SPEED'];
                ?>
                autoplaySpeed: <?=$autoplaySpeed;?>,
                <?
                   $autoplay = "false";
                   if($arParams['SLIDER_AUTOPLAY']=="Y")
                        $autoplay = "true";
                ?>
                autoplay: <?=$autoplay;?>,
                nextArrow: '<button type="button" class="slick-next bxr-bg-hover-dark-flat"><i class="fa fa-angle-right"></i></button>',
                prevArrow: '<button type="button" class="slick-prev bxr-bg-hover-dark-flat"><i class="fa fa-angle-left"></i></button>',
            });
            // var Slidespeed = <?//= $speed;?>/2;
            var Slidespeed = 300;

            $('.bxr-slider').on('beforeChange', function(event, slick, currentSlide, nextSlide){
              var Item = $(".bxr-main-slider-nav li").eq(nextSlide),
              ItemPosition = Item.height() * nextSlide,
              ItemCount = slick.$slides.length - 1,
              ItemBottom = 340 - (Item.height() * (nextSlide + 2));
              if (nextSlide == ItemCount) {
                ItemBottom = 340 - (Item.height() * (nextSlide + 1));
              }
              if (ItemBottom < 0) {
                $(".bxr-main-slider-nav").animate({"top":ItemBottom},{duration: Slidespeed, specialEasing: {top: 'linear'}});
              }else{
                $(".bxr-main-slider-nav").animate({"top":0},{duration: Slidespeed, specialEasing: {top: 'linear'}});
              }
              Item.addClass("bxr-active");
              Item.siblings().removeClass("bxr-active");
              $(".bxr-line").animate({"top":ItemPosition}, {duration: Slidespeed, specialEasing: {top: 'linear'}});
            });
            $(".bxr-main-slider-nav li").on("click", function(event){
              var ItemIndex = $(this).index()-1;
              $('.bxr-slider').slick('slickGoTo', ItemIndex);
            });
            $('.bxr-slider').css("visibility", "visible");
        }
    }

    $(document).ready(function(){
        BXReady.Business.SlickSliderTop.init(
        );
    });
</script>
