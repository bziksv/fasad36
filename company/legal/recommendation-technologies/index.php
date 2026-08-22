<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/include/legal_page.php");
fasad36_render_legal_page(
	"legal-recommendation.html",
	"Правила применения рекомендательных технологий",
	"Правила применения рекомендательных технологий — ТермоФасад"
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
