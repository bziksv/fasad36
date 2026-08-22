<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();


WizardServices::IncludeServiceLang("menu.php", LANGUAGE_ID);


$arMenuSite = array (
        'bxr_mobile' => GetMessage('bxr_mobile_menu_title'),
        'footer_1' => GetMessage('footer_1_menu_title'),
        'footer_2' => GetMessage('footer_2_menu_title'),
        'footer_3' => GetMessage('footer_3_menu_title'),
    
	'left' => GetMessage('left_menu_title'),
    
	'top' => GetMessage('top_menu_title'),
	'service' => GetMessage('service_menu_title'),
    
	'top_line' => GetMessage('topline_menu_title'),

);

	CModule::IncludeModule('fileman');
	$arMenuTypes = GetMenuTypes(WIZARD_SITE_ID);

foreach ($arMenuSite as $cell=>$val){
	if (!isset($arMenuTypes[$cell])){
		$arMenuTypes[$cell] = $val;
	}
}
	
	SetMenuTypes($arMenuTypes, WIZARD_SITE_ID);
	COption::SetOptionInt("fileman", "num_menu_param", 2, false ,WIZARD_SITE_ID);

?>