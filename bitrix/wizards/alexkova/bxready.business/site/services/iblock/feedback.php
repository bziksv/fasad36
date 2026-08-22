<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock"))
	return;

if(COption::GetOptionString("alexkova.business", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

include("func/all.php");
installIblock('feedback', 'services');

include("func/event.php");
/*form event*/
IncludeTemplateLangFile(WIZARD_ABSOLUTE_PATH."/site/services/iblock/lang/".LANGUAGE_ID."/forms_phone.php"); 
$EVENT_TYPE =  getEventType("KZNC_NEW_FORM_RESULT_FEEDBACK", "ru"); 
if($EVENT_TYPE == false) { 
    $description  = "#FIO# - " . GetMessage("KZNC_NEW_FORM_RESULT_FEEDBACK_FIO") . "\n";
    $description .= "#EMAIL# - " . GetMessage("KZNC_NEW_FORM_RESULT_FEEDBACK_EMAIL") . "\n";
    $description .= "#PHONE# - " . GetMessage("KZNC_NEW_FORM_RESULT_FEEDBACK_PHONE") . "\n";
    $description .= "#ANSWER# - " . GetMessage("KZNC_NEW_FORM_RESULT_FEEDBACK_ANSWER") . "\n";
    
    createEventType("KZNC_NEW_FORM_RESULT_FEEDBACK", GetMessage("KZNC_NEW_FORM_RESULT_FEEDBACK"), "ru", $description); 
} 

$EVENT_MESSAGE =  getEventMessage("KZNC_NEW_FORM_RESULT_FEEDBACK", WIZARD_SITE_ID); 
if($EVENT_MESSAGE == false) { 
    createEventMessage("KZNC_NEW_FORM_RESULT_FEEDBACK", WIZARD_SITE_ID, GetMessage("KZNC_NEW_FORM_RESULT_FEEDBACK_SUBJECT"), GetMessage("KZNC_NEW_FORM_RESULT_FEEDBACK_MESSAGE")); 
}
?>