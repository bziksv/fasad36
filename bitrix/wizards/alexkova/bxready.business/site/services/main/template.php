<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();


if (!defined("WIZARD_TEMPLATE_ID"))
	return;

$wizard =& $this->GetWizard();
$wizSettings = $wizard->GetVars();
$topMenu = $wizSettings["topMenu"];
$leftMenu = $wizSettings["leftMenu"];

$arReplaceSettings = array(
	"TOP_MENU_TYPE" => strlen($topMenu["TYPE"])>0 ? $topMenu["TYPE"] : 'with_catalog',
	"TOP_MENU_TEMPLATE" => strlen($topMenu["TEMPLATE"])>0 ? $topMenu["TEMPLATE"] : 'version_v1',
	"TOP_MENU_FULL_WIDTH" => $topMenu["FULL_WIDTH"],
	"TOP_MENU_STYLE_MENU" => strlen($topMenu["STYLE_MENU"])>0 ? $topMenu["STYLE_MENU"] : 'colored_color',
	"TOP_MENU_TEMPLATE_MENU_HOVER" => strlen($topMenu["TEMPLATE_MENU_HOVER"])>0 ? $topMenu["TEMPLATE_MENU_HOVER"] : 'classic',
	"TOP_MENU_STYLE_MENU_HOVER" => strlen($topMenu["STYLE_MENU_HOVER"])>0 ? $topMenu["STYLE_MENU_HOVER"] : 'classic',
	"TOP_MENU_PICTURE_SECTION" => $topMenu["PICTURE_SECTION"],
	"TOP_MENU_PICTURE_CATEGARIES" => $topMenu["PICTURE_CATEGARIES"],
	"TOP_MENU_HOVER_MENU_COL_LG" => $topMenu["HOVER_MENU_COL_LG"]>0 ? $topMenu["HOVER_MENU_COL_LG"] : '3',
	"TOP_MENU_HOVER_MENU_COL_MD" => $topMenu["HOVER_MENU_COL_MD"]>0 ? $topMenu["HOVER_MENU_COL_MD"] : '3',
        "TOP_MENU_SEARCH_FORM" => strlen($topMenu["SEARCH_FORM"])>0 ? $topMenu["SEARCH_FORM"] : 'N',
        "TOP_MENU_FONT_MENU" => strlen($topMenu["FONT_MENU"])>0 ? $topMenu["FONT_MENU"] : 'normal',
        "TOP_MENU_PICTURE_SECTION_HOVER" => strlen($topMenu["PICTURE_SECTION_HOVER"])>0 ? $topMenu["PICTURE_SECTION_HOVER"] : 'N',
        "TOP_MENU_ICO_TOP_MENU_COLOR_1" => strlen($topMenu["ICO_TOP_MENU_COLOR_1"])>0 ? $topMenu["ICO_TOP_MENU_COLOR_1"] : 'color',
        "TOP_MENU_ICO_TOP_MENU_COLOR_2" => strlen($topMenu["ICO_TOP_MENU_COLOR_2"])>0 ? $topMenu["ICO_TOP_MENU_COLOR_2"] : 'color',
        "TOP_MENU_ICO_TOP_MENU_HOVER_COLOR_1" => strlen($topMenu["ICO_TOP_MENU_HOVER_COLOR_1"])>0 ? $topMenu["ICO_TOP_MENU_HOVER_COLOR_1"] : 'color',
        "TOP_MENU_ICO_TOP_MENU_HOVER_COLOR_2" => strlen($topMenu["ICO_TOP_MENU_HOVER_COLOR_2"])>0 ? $topMenu["ICO_TOP_MENU_HOVER_COLOR_2"] : 'color',
        

	"LEFT_MENU_TYPE" => strlen($leftMenu["TYPE"])>0 ? $leftMenu["TYPE"] : 'only_catalog',
	"LEFT_MENU_TEMPLATE" => strlen($leftMenu["TEMPLATE"])>0 ? $leftMenu["TEMPLATE"] : 'left_hover',
	"LEFT_MENU_STYLE_MENU" => strlen($leftMenu["STYLE_MENU"])>0 ? $leftMenu["STYLE_MENU"] : 'colored_light',
	"LEFT_MENU_PICTURE_SECTION" => $leftMenu["PICTURE_SECTION"],
	"LEFT_MENU_SUBMENU" => strlen($leftMenu["SUBMENU"])>0 ? $leftMenu["SUBMENU"] : 'ACTIVE_SHOW',    
        "LEFT_MENU_HOVER_TEMPLATE" => strlen($leftMenu["HOVER_TEMPLATE"])>0 ? $leftMenu["HOVER_TEMPLATE"] : 'list',
	"LEFT_MENU_STYLE_MENU_HOVER" => strlen($leftMenu["STYLE_MENU_HOVER"])>0 ? $leftMenu["STYLE_MENU_HOVER"] : 'colored_light',
	"LEFT_MENU_PICTURE_SECTION_HOVER" => strlen($leftMenu["SECTION_HOVER"])>0 ? $leftMenu["SECTION_HOVER"] : 'N',
	"LEFT_MENU_PICTURE_CATEGARIES" => strlen($leftMenu["PICTURE_CATEGARIES"])>0 ? $leftMenu["PICTURE_CATEGARIES"] : 'N',
	"LEFT_MENU_HOVER_MENU_COL_LG" => strlen($leftMenu["HOVER_MENU_COL_LG"])>0 ? $leftMenu["HOVER_MENU_COL_LG"] : '2',
        "LEFT_MENU_HOVER_MENU_COL_MD" => strlen($leftMenu["HOVER_MENU_COL_MD"])>0 ? $leftMenu["HOVER_MENU_COL_MD"] : '2',
    
        "LEFT_MENU_ICO_LEFT_MENU_COLOR_1" => strlen($leftMenu["ICO_LEFT_MENU_COLOR_1"])>0 ? $leftMenu["ICO_LEFT_MENU_COLOR_1"] : 'color',
        "LEFT_MENU_ICO_LEFT_MENU_COLOR_2" => strlen($leftMenu["ICO_LEFT_MENU_COLOR_2"])>0 ? $leftMenu["ICO_LEFT_MENU_COLOR_2"] : 'color',
        "LEFT_MENU_ICO_LEFT_MENU_HOVER_COLOR_1" => strlen($leftMenu["ICO_LEFT_MENU_HOVER_COLOR_1"])>0 ? $leftMenu["ICO_LEFT_MENU_HOVER_COLOR_1"] : 'color',
        "LEFT_MENU_ICO_LEFT_MENU_HOVER_COLOR_2" => strlen($leftMenu["ICO_LEFT_MENU_HOVER_COLOR_2"])>0 ? $leftMenu["ICO_LEFT_MENU_HOVER_COLOR_2"] : 'color',
    
    	"BXR_TEMPLATE_TYPE" => $wizSettings["templateID"] == "column" ? 'two_col' : 'one_col',

);

$pr_wiz = "v1";

$bitrixTemplateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/business_".$pr_wiz;
$bitrixTemplateID = 'business_'.$pr_wiz;

if (file_exists($_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/business_".$pr_wiz."/header.php")){
	$counter = 1;
	while (file_exists($_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/business_".$pr_wiz."_".$counter."/header.php")){
		$counter ++;
	}
	$bitrixTemplateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/business_".$pr_wiz."_".$counter;
	$bitrixTemplateID = 'business_'.$pr_wiz."_".$counter;
	$wizard->setVar('TID', $bitrixTemplateID);
}
$_SESSION['TID'] = $bitrixTemplateID;
$wizardTemplateDir = $_SERVER["DOCUMENT_ROOT"].WizardServices::GetTemplatesPath(WIZARD_RELATIVE_PATH."/site")."/business";


CopyDirFiles(
	$wizardTemplateDir,
	$bitrixTemplateDir,
	$rewrite = true,
	$recursive = true, 
	$delete_after_copy = false,
	$exclude = "themes"
);

CopyDirFiles(
	$bitrixTemplateDir."/lang/".LANGUAGE_ID."/includes",
	$bitrixTemplateDir."/include/",
	$rewrite = true,
	$recursive = true,
	$delete_after_copy = false
);

//Attach template to default site
$obSite = CSite::GetList($by = "def", $order = "desc", Array("LID" => WIZARD_SITE_ID));
if ($arSite = $obSite->Fetch())
{
	$arTemplates = Array();
	$found = false;
	$foundEmpty = false;
	$obTemplate = CSite::GetTemplateList($arSite["LID"]);
	while($arTemplate = $obTemplate->Fetch())
	{
		if(!$found && strlen(trim($arTemplate["CONDITION"]))<=0)
		{
			$arTemplate["TEMPLATE"] = $bitrixTemplateID;
			$found = true;
		}
		if($arTemplate["TEMPLATE"] == "empty")
		{
			$foundEmpty = true;
			continue;
		}
		$arTemplates[]= $arTemplate;
	}

	if (!$found)
		$arTemplates[]= Array("CONDITION" => "", "SORT" => 150, "TEMPLATE" => $bitrixTemplateID);

	$arFields = Array(
		"TEMPLATE" => $arTemplates,
		"NAME" => $arSite["NAME"],
	);

	$obSite = new CSite();
	$obSite->Update($arSite["LID"], $arFields);
}

$arPages = array(
	$bitrixTemplateDir."/header.php",
	$bitrixTemplateDir."/footer.php",
);

foreach ($arPages as $val){
	CWizardUtil::ReplaceMacros($val, $arReplaceSettings);
}
?>
