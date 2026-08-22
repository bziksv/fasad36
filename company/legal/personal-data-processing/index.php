<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/include/legal_page.php");
fasad36_render_legal_page(
	"legal-personal-data.html",
	"Политика обработки персональных данных",
	"Политика обработки персональных данных — ТермоФасад"
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
