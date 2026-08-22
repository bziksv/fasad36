<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/include/legal_page.php");
fasad36_render_legal_page(
	"legal-cookie.html",
	"Политика использования cookie-файлов",
	"Политика использования cookie-файлов — ТермоФасад"
);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
