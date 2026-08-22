<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if (!defined("WIZARD_SITE_ID") || !defined("WIZARD_SITE_DIR"))
	return;

function ___writeToAreasFile($path, $text)
{
	//if(file_exists($fn) && !is_writable($abs_path) && defined("BX_FILE_PERMISSIONS"))
	//	@chmod($abs_path, BX_FILE_PERMISSIONS);

	$fd = @fopen($path, "wb");
	if(!$fd)
		return false;

	if(false === fwrite($fd, $text))
	{
		fclose($fd);
		return false;
	}

	fclose($fd);

	if(defined("BX_FILE_PERMISSIONS"))
		@chmod($path, BX_FILE_PERMISSIONS);
}

if (COption::GetOptionString("main", "upload_dir") == "")
	COption::SetOptionString("main", "upload_dir", "upload");

if(COption::GetOptionString("alexkova.business", "wizard_installed", "N", WIZARD_SITE_ID) == "N" || WIZARD_INSTALL_DEMO_DATA)
{
	if(file_exists(WIZARD_ABSOLUTE_PATH."/site/public/".LANGUAGE_ID."/"))
	{
		CopyDirFiles(
			WIZARD_ABSOLUTE_PATH."/site/public/".LANGUAGE_ID."/",
			WIZARD_SITE_PATH,
			$rewrite = true,
			$recursive = true,
			$delete_after_copy = false
		);
	}
	COption::SetOptionString("alexkova.business", "template_converted", "Y", "", WIZARD_SITE_ID);
}

$wizard =& $this->GetWizard();

if(COption::GetOptionString("alexkova.business", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

WizardServices::PatchHtaccess(WIZARD_SITE_PATH);

$TID = $wizard->GetVar('TID');
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
        WIZARD_SITE_PATH.".section.php",
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


foreach ($arDirs as $val){
	WizardServices::ReplaceMacrosRecursive($val, Array("SITE_DIR" => WIZARD_SITE_DIR));
}

foreach ($arPages as $val){
	CWizardUtil::ReplaceMacros($val, Array("SITE_DIR" => WIZARD_SITE_DIR));
}

$arUrlRewrite = array();
if (file_exists(WIZARD_SITE_ROOT_PATH."/urlrewrite.php"))
{
	include(WIZARD_SITE_ROOT_PATH."/urlrewrite.php");
}

$arNewUrlRewrite = array(
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."company/partners_and_clients/partners/#",
		"RULE" => "",
		"ID" => "bxready2:block",
		"PATH" => WIZARD_SITE_DIR."company/partners_and_clients/partners/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."company/partners_and_clients/clients/#",
		"RULE" => "",
		"ID" => "bxready2:block",
		"PATH" => WIZARD_SITE_DIR."company/partners_and_clients/clients/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."company/vacancies/#",
		"RULE" => "",
		"ID" => "bxready2:block",
		"PATH" => WIZARD_SITE_DIR."company/vacancies/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."manufacturers/#",
		"RULE" => "",
		"ID" => "bxready2:block",
		"PATH" => WIZARD_SITE_DIR."manufacturers/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."services/#",
		"RULE" => "",
		"ID" => "bxready2:block",
		"PATH" => WIZARD_SITE_DIR."services/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."projects/#",
		"RULE" => "",
		"ID" => "bxready2:block",
		"PATH" => WIZARD_SITE_DIR."projects/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."articles/#",
		"RULE" => "",
		"ID" => "bxready2:block",
		"PATH" => WIZARD_SITE_DIR."articles/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."catalog/#",
		"RULE" => "",
		"ID" => "bxready2:catalog.lite",
		"PATH" => WIZARD_SITE_DIR."catalog/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."actions/#",
		"RULE" => "",
		"ID" => "bxready2:block",
		"PATH" => WIZARD_SITE_DIR."actions/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."news/#",
		"RULE" => "",
		"ID" => "bxready2:block",
		"PATH" => WIZARD_SITE_DIR."news/index.php",
	),
	array(
		"CONDITION" => "#^".WIZARD_SITE_DIR."faq/#",
		"RULE" => "",
		"ID" => "bxready2:news",
		"PATH" => WIZARD_SITE_DIR."faq/index.php",
	),
);

foreach ($arNewUrlRewrite as $arUrl)
{
	if (!in_array($arUrl, $arUrlRewrite))
	{
		CUrlRewriter::Add($arUrl);
	}
}
?>