<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Ошибка 404. Страница не найдена.");
?>
<h1 class="h1-404">Страница не найдена</h1>
<hr class="hr-404">
<div class="image404"><img src="#SITE_DIR#images/404.jpg"></div>
<div class=""><p>Извините, но такой страницы не существует, либо произошла страшная, трагическая ошибка.</p>
    <p>Вы можете <a href="#SITE_DIR#">Перейти на главную</a>, <a href="#SITE_DIR#catalog/">Перейти в каталог</a> или
    <a href="javascript:history.go(-1)">Вернуться назад</a>, на страницу с которой вы пришли.</p>
</div>
<div class="clear"></div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
