<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock"))
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
	"clients",
	'partners',
	'related'
);

$TID = $_SESSION['TID'];
$templateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".$TID."/";

$arDirs = array(
        WIZARD_SITE_PATH."actions/",
        WIZARD_SITE_PATH."articles/",
        WIZARD_SITE_PATH."catalog/",
        WIZARD_SITE_PATH."company/",
        WIZARD_SITE_PATH."faq/",
        WIZARD_SITE_PATH."include/",
        WIZARD_SITE_PATH."manufacturers/",
        WIZARD_SITE_PATH."news/",
        WIZARD_SITE_PATH."projects/",
        WIZARD_SITE_PATH."reviews/",
        WIZARD_SITE_PATH."search/",
        WIZARD_SITE_PATH."services/",    

	$templateDir."include/",
        $templateDir."bxready2/area/",
);

$arPages = array(
	WIZARD_SITE_PATH."_index.php",
        WIZARD_SITE_PATH.".bxr_mobile.menu.php",
        WIZARD_SITE_PATH.".footer_1.menu.php",
        WIZARD_SITE_PATH.".footer_2.menu.php",
        WIZARD_SITE_PATH.".footer_3.menu.php",    
        WIZARD_SITE_PATH.".left.menu.php",
        WIZARD_SITE_PATH.".service.menu.php",
        WIZARD_SITE_PATH.".top.menu.php",
        WIZARD_SITE_PATH.".top_line.menu.php",
        WIZARD_SITE_PATH."404.php",

	$templateDir."header.php",
	$templateDir."footer.php"
);

foreach ($arIblocks as $val){
	$iblockID = readyCatalogIblock($val, WIZARD_SITE_ID);
	if ($iblockID > 0 ){
		foreach($arDirs as $valDir){
			WizardServices::ReplaceMacrosRecursive($valDir, Array("BXR_IBLOCK_".strtoupper($val)."_ID" => $iblockID));
		};

		foreach($arPages as $valDir){
			str_replace("//", "/", $valDir);
			CWizardUtil::ReplaceMacros($valDir, Array("BXR_IBLOCK_".strtoupper($val)."_ID" => $iblockID));
		};
	}
}
?>