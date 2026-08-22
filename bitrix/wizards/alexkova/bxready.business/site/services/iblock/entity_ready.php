<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock") || !CModule::IncludeModule("catalog"))
	return;



include("func/catalog.php");
include("func/all.php");

$arIblocks = array(
	"types",
	"brands",
	"catalog",
	"offers",
	"employees",
	"corporate_licenses",
	"vacancies",
	"reviews",
	"triggers",
	"news",
	"articles",
	"services",
	"project",
	"slider_slick",
	"actions",
	"faq",
	"market_promo",
	"products_request",
	"forms_phone",
	"feedback",
	"clients",
	'partners',
	'related'
);

$AllCreatedBlock = array(
	"CATALOG"=>array(
		"XML_CODE" => "bxr_catalog",
		"IBLOCK_TYPE" => "catalog"
	),
	"OFFERS"=>array(
		"XML_CODE" => "bxr_offers",
		"IBLOCK_TYPE" => "offers"
	),
	"NEWS"=>array(
		"XML_CODE" => "bxr_news",
		"IBLOCK_TYPE" => "content"
	),
	"SLIDER_SLICK"=>array(
		"XML_CODE" => "bxr_slider_slick",
		"IBLOCK_TYPE" => "content"
	),
        "MARKET_PROMO"=>array(
		"XML_CODE" => "bxr_market_promo",
		"IBLOCK_TYPE" => "content"
	),
        "FAQ"=>array(
		"XML_CODE" => "bxr_faq",
		"IBLOCK_TYPE" => "content"
	),
	"ACTIONS"=>array(
		"XML_CODE" => "bxr_actions",
		"IBLOCK_TYPE" => "content"
	),
	"ARTICLES"=>array(
		"XML_CODE" => "bxr_articles",
		"IBLOCK_TYPE" => "content"
	),
	"SERVICES"=>array(
		"XML_CODE" => "bxr_services",
		"IBLOCK_TYPE" => "content"
	),
	"BESTSELLERS"=>array(
		"XML_CODE" => "bxr_bestsellers",
		"IBLOCK_TYPE" => "content"
	),
	"ADVANTAGES"=>array(
		"XML_CODE" => "bxr_advantages",
		"IBLOCK_TYPE" => "content"
	),
	"FORMS_PHONE"=>array(
		"XML_CODE" => "bxr_forms_phone",
		"IBLOCK_TYPE" => "forms"
	),
	"FORMS_ORDER"=>array(
		"XML_CODE" => "bxr_forms_order",
		"IBLOCK_TYPE" => "forms"
	),
	"FORMS_REQUEST"=>array(
		"XML_CODE" => "bxr_forms_request",
		"IBLOCK_TYPE" => "forms"
	),
);

$TID = $_SESSION['TID'];
$templateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".$TID."/";

$arDirs = array(
	WIZARD_SITE_PATH."ajax/",
	WIZARD_SITE_PATH."articles/",
	WIZARD_SITE_PATH."auth/",
	WIZARD_SITE_PATH."benefits/",
	WIZARD_SITE_PATH."brands/",
	WIZARD_SITE_PATH."catalog/",
	WIZARD_SITE_PATH."company/",
	WIZARD_SITE_PATH."delivery/",
	WIZARD_SITE_PATH."guarantee/",
	WIZARD_SITE_PATH."include/",
	WIZARD_SITE_PATH."payment/",
	WIZARD_SITE_PATH."personal/",
	WIZARD_SITE_PATH."faq/",
	WIZARD_SITE_PATH."search/",
	WIZARD_SITE_PATH."services/",

	$templateDir."include/",
);

$arPages = array(
	WIZARD_SITE_PATH."_index.php",
	WIZARD_SITE_PATH.".bottom_catalog.menu_ext.php",
	WIZARD_SITE_PATH.".footer.menu.php",
	WIZARD_SITE_PATH.".left.menu.php",
	WIZARD_SITE_PATH.".left.menu_ext.php",
	WIZARD_SITE_PATH.".service.menu.php",
	WIZARD_SITE_PATH.".top.menu.php",
	WIZARD_SITE_PATH.".topline.menu.php",
	WIZARD_SITE_PATH.".top_catalog.menu_ext.php",
	WIZARD_SITE_PATH."sect_inc.php",

	$templateDir."header.php",
	$templateDir."footer.php"
);

foreach ($AllCreatedBlock as $cell=>$val){
        if(COption::GetOptionString("alexkova.business", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
                $val["XML_CODE"] = $val["XML_CODE"] . "_" . WIZARD_SITE_ID;
        
	$IBLOCK_CATALOG_ID = getIblockID($val["XML_CODE"], $val["IBLOCK_TYPE"]);
	if ($IBLOCK_CATALOG_ID){
                if(WIZARD_INSTALL_DEMO_DATA) {
                   readyCatalogIblock($IBLOCK_CATALOG_ID, $val["XML_CODE"]."_".WIZARD_SITE_ID);
                   CIBlock::SetPermission($IBLOCK_CATALOG_ID, Array("2"=>"R"));
                }

		//$templateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".WIZARD_TEMPLATE_ID."_".WIZARD_THEME_ID."/";

		foreach($arDirs as $valDir){
			WizardServices::ReplaceMacrosRecursive($valDir, Array("BXR_IBLOCK_".$cell."_ID" => $IBLOCK_CATALOG_ID));
		};

		foreach($arPages as $valDir){
                        str_replace("//", "/", $valDir);
			CWizardUtil::ReplaceMacros($valDir, Array("BXR_IBLOCK_".$cell."_ID" => $IBLOCK_CATALOG_ID));
		};
	}
}

/* forms*/

$arForms = array (
	"phone" => "bxr_forms_phone_".WIZARD_SITE_ID,
	"order" => "bxr_forms_order_".WIZARD_SITE_ID,
	"request" => "bxr_forms_request_".WIZARD_SITE_ID,
);

foreach ($arForms as $cell => $val){
	$IBLOCK_CATALOG_ID = getIblockID($val, 'forms');
	if ($IBLOCK_CATALOG_ID>0){
		$arReplace = array();
		$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$IBLOCK_CATALOG_ID));
		while ($prop_fields = $properties->GetNext())
		{
			$arReplace["PROPERTY_".strtoupper($cell)."_".$prop_fields["CODE"]] = $prop_fields["ID"];
		}
		if (count($arReplace) > 0){
			CWizardUtil::ReplaceMacros($templateDir."footer.php", $arReplace);
		}
	}
}

/* Lang for CUserTypeEntity */
/*if(!empty($IBLOCK_CATALOG_ID)) {
    IncludeTemplateLangFile(WIZARD_ABSOLUTE_PATH."/site/services/iblock/lang/".LANGUAGE_ID."/catalog_ready.php"); 
    
    $langUserTypeEntity = GetMessage("UserTypeEntity");
    
    $rsData = CUserTypeEntity::GetList( array(), array("ENTITY_ID" => "IBLOCK_".$IBLOCK_CATALOG_ID."_SECTION", "LANG" => "ru" ));
    while($arRes = $rsData->Fetch())
    {           
        if(array_key_exists($arRes["FIELD_NAME"], $langUserTypeEntity)) {
            $arFields = array(
                "EDIT_FORM_LABEL" => array(
                    'ru'  => $langUserTypeEntity[$arRes["FIELD_NAME"]]
                )
            );

            $entity = new CUserTypeEntity;
            $obg = $entity->Update($arRes["ID"], $arFields);
        }
    } 
}*/

?>