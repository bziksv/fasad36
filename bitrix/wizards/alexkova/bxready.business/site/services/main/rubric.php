<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule('subscribe'))
	return;

WizardServices::IncludeServiceLang("menu.php", LANGUAGE_ID);

$rsRubric = CRubric::GetList(array(), array(
    "NAME" => GetMessage("SUBSCR_1"),
    "LID" => WIZARD_SITE_ID,
));

if(!$rsRubric->Fetch())
{
        //Database actions
        $arFields = Array(
                "ACTIVE"	=> "Y",
                "NAME"		=> GetMessage("SUBSCR_1"),
                "SORT"		=> 100,
                "DESCRIPTION"	=> GetMessage("SUBSCR_2"),
                "LID"		=> WIZARD_SITE_ID,
                "AUTO"		=> "N",
                /*"DAYS_OF_MONTH"	=> "1",
                "TIMES_OF_DAY"	=> "13:00",
                "TEMPLATE"	=> substr($template, strlen($_SERVER["DOCUMENT_ROOT"]."/")),*/
                "VISIBLE"	=> "Y",
                /*"FROM_FIELD"	=> COption::GetOptionString("main", "email_from", "info@ourtestsite.com"),*/
                /*"LAST_EXECUTED"	=> ConvertTimeStamp(false, "FULL"), */
        );
        $obRubric = new CRubric;
        $ID = $obRubric->Add($arFields);
}
COption::SetOptionString('subscribe', 'subscribe_section', '#SITE_DIR#profile/subscribe/');

?>
