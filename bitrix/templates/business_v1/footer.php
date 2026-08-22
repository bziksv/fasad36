<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>













<? IncludeTemplateLangFile(__FILE__);?>
</div>
</div>
</div>
</div>
<div class="tb20-bottom">
<?$APPLICATION->IncludeComponent("bxready2:abmanager", 'full-static', array(
		"SHOW" => "BXR_BOTTOM",
		"BANTYPE" => "BXR_BOTTOM",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0",
		"USE_IN_LG_MODE" => "Y",
		"USE_IN_MD_MODE" => "Y",
		"USE_IN_SM_MODE" => "N",
		"USE_IN_XS_MODE" => "N"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y",
		"HIDE_ICONS" => "N"
	)
);?>

</div>




<?$APPLICATION->IncludeComponent(
	"alexkova.business:buttonUp", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"LOCATION_HORIZONTALLY" => "rigth",
		"BUTTON_UP_HORIZONTALLY_INDENT" => "65",
		"BUTTON_UP_VERTICAL_INDENT" => "85",
		"BUTTON_UP_TOP_SHOW" => "150",
		"BUTTON_UP_SPEED" => "150"
	),
	false
);?>
<?
    if (CModule::IncludeModule('alexkova.bxready2')){
            $bxready = \Alexkova\Bxready2\Bxready::getInstance();
            \Alexkova\Bxready2\Area::showArea('footer', $bxready::getAreaByCode('footer'));
    }
?>


	<div style="background: #f6f6f7; padding-bottom: 15px;">
		<div style="max-width: 1170px; width: 100%; margin: 0 auto; border-top: 2px solid #eee; padding-top: 15px; font-size: 13px;">Наш сайт использует <a href="/company/legal/cookie-policy/">cookie-файлы</a> для корректной работы и сбора статистических данных. Они помогают анализировать действия пользователей, улучшать функциональность сайта и показывать более подходящую рекламу. Продолжая пользоваться сайтом, вы даёте <a href="/company/legal/personal-data-consent/">согласие</a> на обработку <a href="/company/legal/personal-data-processing/">персональных данных</a>. При необходимости вы можете отключить cookies в настройках браузера. Также на сайте используются <a href="/company/legal/recommendation-technologies/">рекомендательные технологии</a>.
</div>
</div>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter29715730 = new Ya.Metrika({
                    id:29715730,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true,
                    webvisor:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/29715730" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->



<script>

$(document).ready(function() {
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '70%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});

</script>

</body>
</html>
<?
$geoDescription = $APPLICATION->GetProperty("description_in");
if($geoDescription){
	$APPLICATION->SetPageProperty("description", $geoDescription);
}
$geoTitle = $APPLICATION->GetProperty("title_in");
if($geoTitle){
	$APPLICATION->SetPageProperty("title", $geoTitle);
}
?>