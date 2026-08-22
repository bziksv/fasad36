<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock"))
	return;

if(COption::GetOptionString("alexkova.business", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

include("func/all.php");
installIblock('forms_phone', 'services');

include("func/event.php");
/*form event*/
IncludeTemplateLangFile(WIZARD_ABSOLUTE_PATH."/site/services/iblock/lang/".LANGUAGE_ID."/forms_phone.php"); 
$EVENT_TYPE =  getEventType("KZNC_NEW_FORM_RESULT_PHONE", "ru"); 
if($EVENT_TYPE == false) { 
    $description  = "#FIO# - " . GetMessage("KZNC_NEW_FORM_RESULT_PHONE_FIO") . "\n";
    $description .= "#PHONE# - " . GetMessage("KZNC_NEW_FORM_RESULT_PHONE_PHONE") . "\n";
    $description .= "#COMMENT# - " . GetMessage("KZNC_NEW_FORM_RESULT_PHONE_COMMENT") . "\n";

    
    createEventType("KZNC_NEW_FORM_RESULT_PHONE", GetMessage("KZNC_NEW_FORM_RESULT_PHONE"), "ru", $description); 
} 

$EVENT_MESSAGE =  getEventMessage("KZNC_NEW_FORM_RESULT_PHONE", WIZARD_SITE_ID); 
if($EVENT_MESSAGE == false) { 
    createEventMessage("KZNC_NEW_FORM_RESULT_PHONE", WIZARD_SITE_ID, GetMessage("KZNC_NEW_FORM_RESULT_PHONE_SUBJECT"), GetMessage("KZNC_NEW_FORM_RESULT_PHONE_MESSAGE")); 
}
?>