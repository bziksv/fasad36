<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock"))
	return;

if(COption::GetOptionString("alexkova.business", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

include("func/all.php");
installIblock('products_request', 'services');

include("func/event.php");
/*form event*/
IncludeTemplateLangFile(WIZARD_ABSOLUTE_PATH."/site/services/iblock/lang/".LANGUAGE_ID."/forms_phone.php"); 
$EVENT_TYPE =  getEventType("KZNC_NEW_FORM_RESULT_ORDER", "ru"); 
if($EVENT_TYPE == false) { 
    $description  = "#TRADE_ID_HIDDEN# - " . GetMessage("KZNC_NEW_FORM_RESULT_ORDER_TRADE_ID_HIDDEN") . "\n";
    $description .= "#TRADE_NAME_HIDDEN# - " . GetMessage("KZNC_NEW_FORM_RESULT_ORDER_TRADE_NAME_HIDDEN") . "\n";
    $description .= "#TRADE_LINK_HIDDEN# - " . GetMessage("KZNC_NEW_FORM_RESULT_ORDER_TRADE_LINK_HIDDEN") . "\n";
    $description .= "#OFFER_ID_HIDDEN# - " . GetMessage("KZNC_NEW_FORM_RESULT_ORDER_OFFER_ID_HIDDEN") . "\n";
    $description .= "#USER_NAME# - " . GetMessage("KZNC_NEW_FORM_RESULT_ORDER_USER_NAME") . "\n";
    $description .= "#USER_PHONE# - " . GetMessage("KZNC_NEW_FORM_RESULT_ORDER_USER_PHONE") . "\n";
    $description .= "#USER_MAIL# - " . GetMessage("KZNC_NEW_FORM_RESULT_ORDER_USER_MAIL") . "\n";
    $description .= "#USER_COMMENT_AREA# - " . GetMessage("KZNC_NEW_FORM_RESULT_ORDER_USER_COMMENT_AREA") . "\n";
    
    createEventType("KZNC_NEW_FORM_RESULT_ORDER", GetMessage("KZNC_NEW_FORM_RESULT_ORDER"), "ru", $description); 
} 

$EVENT_MESSAGE =  getEventMessage("KZNC_NEW_FORM_RESULT_ORDER", WIZARD_SITE_ID); 
if($EVENT_MESSAGE == false) { 
    createEventMessage("KZNC_NEW_FORM_RESULT_ORDER", WIZARD_SITE_ID, GetMessage("KZNC_NEW_FORM_RESULT_ORDER_SUBJECT"), GetMessage("KZNC_NEW_FORM_RESULT_ORDER_MESSAGE")); 
}
?>