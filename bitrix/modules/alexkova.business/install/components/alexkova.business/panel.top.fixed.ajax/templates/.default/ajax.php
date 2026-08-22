<?
$params = json_decode($_REQUEST["inv"], true);
define(SITE_ID, $params["site"]);
define(SITE_DIR, $params["siteDir"]);
define(SITE_TEMPLATE_ID, $params["template"]);
define(SITE_TEMPLATE_PATH, $params["templatePath"]);
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

	global $ajaxReferer,$APPLICATION;

	$ajaxReferer = $_SERVER["HTTP_REFERER"];       
        $arHost = explode(":", $_SERVER["HTTP_HOST"]);
        $host = $arHost[0];
        $pos = stripos($_SERVER["HTTP_REFERER"], $host);
        if($pos !== false) {
            $APPLICATION->SetCurPage(substr($_SERVER["HTTP_REFERER"], ($pos+strlen($host)) ));           
        }
	if (CModule::IncludeModule('alexkova.bxready2')){
            \Alexkova\Bxready2\Area::showArea('top_fixed_panel', 'top_fixed_panel_v1', false, $params["site"], $params["template"], $params["templatePath"]);
	}
}

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>


