<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);

if (!CModule::IncludeModule('alexkova.bxready2')){
	return ;
}else{

	$bxready = \Alexkova\Bxready2\Bxready::getInstance();

	$arDefaultArea = array(
		'header' => 'header_v2',
		'promo' => 'dev_promo',
		'top_menu' => 'v1',
		'mobile_menu' => 'mobile_menu_v1',
		'bxr_top_menu' => array(
			'color'=>''
		)
	);

	$addContentType = '';

	$contentMode = 'column';
        if ($APPLICATION->GetDirProperty("sitebar") == "N" || $APPLICATION->GetDirProperty("sitebar") == $APPLICATION->GetCurDir()  /*|| substr($APPLICATION->GetCurDir(), 0,9) == '/catalog/'*/){
		$contentMode = '';
	}

	$bxready::setArea($arDefaultArea);
}

global $arTopMenu, $arLeftMenu;

$arTopMenu = array (
	"TYPE" => "#TOP_MENU_TYPE#",
	"TEMPLATE" => "#TOP_MENU_TEMPLATE#",
	"FULL_WIDTH" => "#TOP_MENU_FULL_WIDTH#",
	"STYLE_MENU" => "#TOP_MENU_STYLE_MENU#",
        "PICTURE_SECTION" => "#TOP_MENU_PICTURE_SECTION#",
        "FONT_MENU" => "#TOP_MENU_FONT_MENU#",
        "SEARCH_FORM" => "#TOP_MENU_SEARCH_FORM#",    
	"TEMPLATE_MENU_HOVER" => "#TOP_MENU_TEMPLATE_MENU_HOVER#",
    
	"STYLE_MENU_HOVER" => "#TOP_MENU_STYLE_MENU_HOVER#",
        "PICTURE_SECTION_HOVER" => "#TOP_MENU_PICTURE_SECTION_HOVER#",
	"PICTURE_CATEGARIES" => "#TOP_MENU_PICTURE_CATEGARIES#",    
	"HOVER_MENU_COL_LG" => "#TOP_MENU_HOVER_MENU_COL_LG#",
	"HOVER_MENU_COL_MD" => "#TOP_MENU_HOVER_MENU_COL_MD#",
    
        "ICO_TOP_MENU_COLOR_1" => "#TOP_MENU_ICO_TOP_MENU_COLOR_1#",
        "ICO_TOP_MENU_COLOR_2" => "#TOP_MENU_ICO_TOP_MENU_COLOR_2#",
        "ICO_TOP_MENU_HOVER_COLOR_1" => "#TOP_MENU_ICO_TOP_MENU_HOVER_COLOR_1#",
        "ICO_TOP_MENU_HOVER_COLOR_2" => "#TOP_MENU_ICO_TOP_MENU_HOVER_COLOR_2#",
        
);

$arLeftMenu = array (
	"TYPE" => "#LEFT_MENU_TYPE#",
	"LEFT_MENU_TEMPLATE" => "#LEFT_MENU_TEMPLATE#",
	"STYLE_MENU" => "#LEFT_MENU_STYLE_MENU#",
	"PICTURE_SECTION" => "#LEFT_MENU_PICTURE_SECTION#",
	"SUBMENU" => "#LEFT_MENU_SUBMENU#",
        "HOVER_TEMPLATE" => "#LEFT_MENU_HOVER_TEMPLATE#",
        "STYLE_MENU_HOVER" => "#LEFT_MENU_STYLE_MENU_HOVER#",
        "PICTURE_SECTION_HOVER" => "#LEFT_MENU_PICTURE_SECTION_HOVER#",
        "PICTURE_CATEGARIES" => "#LEFT_MENU_PICTURE_CATEGARIES#",
        "HOVER_MENU_COL_LG" => "#LEFT_MENU_HOVER_MENU_COL_LG#",
        "HOVER_MENU_COL_MD" => "#LEFT_MENU_HOVER_MENU_COL_MD#",
    
        "ICO_LEFT_MENU_COLOR_1" => "#LEFT_MENU_ICO_LEFT_MENU_COLOR_1#",
        "ICO_LEFT_MENU_COLOR_2" => "#LEFT_MENU_ICO_LEFT_MENU_COLOR_2#",
        "ICO_LEFT_MENU_HOVER_COLOR_1" => "#LEFT_MENU_ICO_LEFT_MENU_HOVER_COLOR_1#",
        "ICO_LEFT_MENU_HOVER_COLOR_2" => "#LEFT_MENU_ICO_LEFT_MENU_HOVER_COLOR_2#",   
);

?>
<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&subset=cyrillic" rel="stylesheet">
        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-2.1.4.js"></script>
	<?$APPLICATION->ShowHead();?>
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.js');?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.css');?>

	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');?>

	<?
	$APPLICATION->SetAdditionalCSS("/bitrix/css/main/bootstrap.css");
	$APPLICATION->SetAdditionalCSS("/bitrix/css/main/font-awesome.css");

	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/library/bootstrap/js/bootstrap.js');
	?>
	<?
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/library/bootstrap/css/grid10_column.css', true);
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/library/bootstrap/css/bootstrap_add.css', true);
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/library/less/less.css", true);
	?>
	<title><?$APPLICATION->ShowTitle()?></title>
</head>

<body>
<?$APPLICATION->ShowPanel()?>
<?

/*
 * View mobile_menu width BXready Core Support
 */
\Alexkova\Bxready2\Area::showArea('mobile_menu', $bxready::getAreaByCode('mobile_menu'));

/*
 * View top_panel width BXready Core Support
 */
$APPLICATION->IncludeComponent("bxready2:abmanager", 'full-static', array(
		"SHOW" => "BXR_TOP",
		"BANTYPE" => "BXR_TOP",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0",
		"USE_IN_LG_MODE" => "Y",
		"USE_IN_MD_MODE" => "Y",
		"USE_IN_SM_MODE" => "N",
		"USE_IN_XS_MODE" => "N"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "Y",
		"HIDE_ICONS" => "N"
	)
);

\Alexkova\Bxready2\Area::showArea('top_panel', $bxready::getAreaByCode('top_panel'));
?>
<?\Alexkova\Bxready2\Area::showArea('header', $bxready::getAreaByCode('header'));?>
<?$APPLICATION->IncludeComponent(
	"alexkova.business:panel.top.fixed.ajax", 
	".default", 
	array(
		"USE_FIXED_MODE" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"USE_FIXED_PANEL" => "Y",
		"MAX_WIDTH" => "960"
	),
	false
);?>
<?if($APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'):?>
    <div class="bxr-full-width bxr-gray-ribbon">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:breadcrumb", 
                        "bxr_business", 
                        array(
                            "COMPONENT_TEMPLATE" => "bxr_business",
                            "PATH" => "",
                            "SITE_ID" => "s1",
                            "START_FROM" => "0"
                        ),
                        false
                    );?>
                    <h1><?$APPLICATION->ShowTitle();?></h1>
                </div>
            </div>
        </div>
    </div>
<?endif;?>
<?if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php'):?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "named_area",
        Array(
            "AREA_FILE_SHOW" => "file",
            "AREA_FILE_SUFFIX" => "inc",
            "EDIT_TEMPLATE" => "",
            "PATH" => SITE_DIR."include/main_page_promo.php",
        ),
        false
    );?>
<?endif;?>
<div class="bxr-content tb20-bottom">
    <div class="container">
        <div class="row">
            <?if ($contentMode == 'column'):?>
                <div class="col-xs-12 col-sm-12 col-md-3<?=$addContentType?>">
                    <?$APPLICATION->IncludeComponent(
                        "alexkova.business:menu",
                        isset($arLeftMenu["LEFT_MENU_TEMPLATE"]) ? $arLeftMenu["LEFT_MENU_TEMPLATE"] : "left", 
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left", 
                            "DELAY" => "N",
                            "MAX_LEVEL" => "2",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MENU_CACHE_TIME" => "36000",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "left",
                            "USE_EXT" => "Y",
                            "COMPONENT_TEMPLATE" => isset($arLeftMenu["LEFT_MENU_TEMPLATE"]) ? $arLeftMenu["LEFT_MENU_TEMPLATE"] : "left", 
                            "TITLE_MENU" => "",
                            "STYLE_MENU" => isset($arLeftMenu["STYLE_MENU"]) ? $arLeftMenu["STYLE_MENU"] : "colored_light",
                            "SHOW_TREE" => "Y",
                            "PICTURE_SECTION" => isset($arLeftMenu["PICTURE_SECTION"]) ? $arLeftMenu["PICTURE_SECTION"] : "N",
                            "SUBMENU" => isset($arLeftMenu["SUBMENU"]) ? $arLeftMenu["SUBMENU"] : "ACTIVE_SHOW",
                            "HOVER_TEMPLATE" => isset($arLeftMenu["HOVER_TEMPLATE"]) ? $arLeftMenu["HOVER_TEMPLATE"] : "classic", 
                            "STYLE_MENU_HOVER" => isset($arLeftMenu["STYLE_MENU_HOVER"]) ? $arLeftMenu["STYLE_MENU_HOVER"] : "colored_light",
                            "PICTURE_SECTION_HOVER" => isset($arLeftMenu["PICTURE_SECTION_HOVER"]) ? $arLeftMenu["PICTURE_SECTION_HOVER"] : "N",
                            "PICTURE_CATEGARIES" => isset($arLeftMenu["PICTURE_CATEGARIES"]) ? $arLeftMenu["PICTURE_CATEGARIES"] : "N",
                            "HOVER_MENU_COL_LG" => isset($arLeftMenu["HOVER_MENU_COL_LG"]) ? $arLeftMenu["HOVER_MENU_COL_LG"] : 2,
                            "HOVER_MENU_COL_MD" => isset($arLeftMenu["HOVER_MENU_COL_MD"]) ? $arLeftMenu["HOVER_MENU_COL_MD"] : 2,
                            
                            "ICO_LEFT_MENU_COLOR_1" => isset($arLeftMenu["ICO_LEFT_MENU_COLOR_1"]) ? $arLeftMenu["ICO_LEFT_MENU_COLOR_1"] : "color",
                            "ICO_LEFT_MENU_COLOR_2" => isset($arLeftMenu["ICO_LEFT_MENU_COLOR_2"]) ? $arLeftMenu["ICO_LEFT_MENU_COLOR_2"] : "light",
                            
                            "ICO_LEFT_MENU_HOVER_COLOR_1" => isset($arLeftMenu["ICO_LEFT_MENU_HOVER_COLOR_1"]) ? $arLeftMenu["ICO_LEFT_MENU_HOVER_COLOR_1"] : "color",
                            "ICO_LEFT_MENU_HOVER_COLOR_2" => isset($arLeftMenu["ICO_LEFT_MENU_HOVER_COLOR_2"]) ? $arLeftMenu["ICO_LEFT_MENU_HOVER_COLOR_2"] : "light",
                            "HOVER_SHOW_LEFT" => "N"
                        ),
                        false
                    );?>
                    <?$APPLICATION->IncludeComponent(
                            "bxready2:abmanager", 
                            "full-static", 
                            array(
                                    "SHOW" => "BXR_COLUMN",
                                    "BANTYPE" => "BXR_COLUMN",
                                    "CACHE_TYPE" => "A",
                                    "CACHE_TIME" => "0",
                                    "USE_IN_LG_MODE" => "Y",
                                    "USE_IN_MD_MODE" => "Y",
                                    "USE_IN_SM_MODE" => "N",
                                    "USE_IN_XS_MODE" => "N",
                                    "COMPONENT_TEMPLATE" => "full-static"
                            ),
                            false,
                            array(
                                    "ACTIVE_COMPONENT" => "Y",
                                    "HIDE_ICONS" => "N"
                            )
                        );
                    ?>
                    <div class="clearfix"></div>
                        <?$APPLICATION->IncludeComponent(
                            "bxready2:buffer.content",
                            "",
                            array(
                                "BUFFER_NAME" => "sidebar"
                            ),
                            false,
                            array('HIDE_ICONS' => 'Y')
                        );?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9">
            <?else:?>
                <div class="col-xs-12">
            <?endif;?>