<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();


if (!defined("WIZARD_TEMPLATE_ID"))
	return;

use Alexkova\Bxready2\Library;
use Alexkova\Business\Core;



$wizard =& $this->GetWizard();
$wizSettings = $wizard->GetVars();
/*$topMenu = $wizSettings["topMenu"];
$leftMenu = $wizSettings["leftMenu"];*/

$TID = $_SESSION['TID'];
$templateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/".$TID."/";

/*$wizSettings["wizTopMenu"]["MenuType"] = $wizSettings["wizTopMenu"]["MenuType"] == "only_catalog" ? 'v2' : 'v1';

switch ($wizSettings["wizLeftMenu"]["MenuType"]) {
        case "with_catalog": $wizSettings["wizLeftMenu"]["MenuType"] = 'v3'; break;
	case "only_catalog": $wizSettings["wizLeftMenu"]["MenuType"] = 'v2'; break;
	case "without_catalog": $wizSettings["wizLeftMenu"]["MenuType"] = 'v1'; break;
        default: $wizSettings["wizLeftMenu"]["MenuType"] = 'v1';
}*/

/*COption::SetOptionString('alexkova.bxready2', 'bxr_less_darken_'.$TID, $wizSettings["wizLESS"]["less_darken"]);
COption::SetOptionString('alexkova.bxready2', 'bxr_less_lighten_'.$TID, $wizSettings["wizLESS"]["less_lighten"]);
COption::SetOptionString('alexkova.bxready2', 'bxr_less_base_color_'.$TID, $wizSettings["wizLESS"]["color"]);*/

COption::SetOptionString('alexkova.bxready2', $TID.'_bxr_area_footer', $wizSettings["wizFooterID"]);
COption::SetOptionString('alexkova.bxready2', $TID.'_bxr_area_header', $wizSettings["wizHeaderID"]);
COption::SetOptionString('alexkova.bxready2', $TID.'_bxr_area_mobile_menu', "mobile_menu_v1");
COption::SetOptionString('alexkova.bxready2', $TID.'_bxr_area_top_fixed_panel', $wizSettings["wizTopFixPanelID"]);
COption::SetOptionString('alexkova.bxready2', $TID.'_bxr_area_top_menu', "menu_v1");
COption::SetOptionString('alexkova.bxready2', $TID.'_bxr_area_top_panel', $wizSettings["wizTopLineID"]);

COption::SetOptionString('alexkova.bxready2', 'managment_mode', "Y");
COption::SetOptionString('alexkova.bxready2', 'managment_mode_template_'.$TID, "Y");

COption::SetOptionString('main', 'new_user_registration', "Y");


 if (CModule::IncludeModule('alexkova.bxready2')){           
    $inFile = $_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".$TID."/library/less/css.less";
    $outFile = $_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".$TID."/library/less/less.css";
    
    if (file_exists($inFile)) {
        \Alexkova\Bxready2\Less::createLess($inFile, $outFile, array(
            "base"=> $wizSettings["wizLESS"]["color"],
            "steplight"=> $wizSettings["wizLESS"]["less_lighten"],
            "stepdark"=>  $wizSettings["wizLESS"]["less_darken"],
        ));
    } 
 }
 
$arSetTemplateOption = array();
$arSetTemplateOption["bxr_less_base_color"] = $wizSettings["wizLESS"]["color"];
$arSetTemplateOption["bxr_less_darken"] = $wizSettings["wizLESS"]["less_lighten"];
$arSetTemplateOption["bxr_less_lighten"] = $wizSettings["wizLESS"]["less_darken"];

if (CModule::IncludeModule('alexkova.business')){
    Core::getInstance()->setTemplateOption($TID, $arSetTemplateOption);
}


?>
