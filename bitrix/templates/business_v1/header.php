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
	"TYPE" => "with_catalog",
	"TEMPLATE" => "version_v1",
	"FULL_WIDTH" => "Y",
	"STYLE_MENU" => "light",
        "PICTURE_SECTION" => "N",
        "FONT_MENU" => "normal",
        "SEARCH_FORM" => "N",    
	"TEMPLATE_MENU_HOVER" => "classic",
    
	"STYLE_MENU_HOVER" => "colored_light",
        "PICTURE_SECTION_HOVER" => "N",
	"PICTURE_CATEGARIES" => "",    
	"HOVER_MENU_COL_LG" => "3",
	"HOVER_MENU_COL_MD" => "3",
    
        "ICO_TOP_MENU_COLOR_1" => "color",
        "ICO_TOP_MENU_COLOR_2" => "color",
        "ICO_TOP_MENU_HOVER_COLOR_1" => "color",
        "ICO_TOP_MENU_HOVER_COLOR_2" => "color",
        
);

$arLeftMenu = array (
	"TYPE" => "widthout_catalog",
	"LEFT_MENU_TEMPLATE" => "left_hover",
	"STYLE_MENU" => "colored_light",
	"PICTURE_SECTION" => "N",
	"SUBMENU" => "ACTIVE_SHOW",
        "HOVER_TEMPLATE" => "list",
        "STYLE_MENU_HOVER" => "colored_light",
        "PICTURE_SECTION_HOVER" => "N",
        "PICTURE_CATEGARIES" => "N",
        "HOVER_MENU_COL_LG" => "2",
        "HOVER_MENU_COL_MD" => "2",
    
        "ICO_LEFT_MENU_COLOR_1" => "color",
        "ICO_LEFT_MENU_COLOR_2" => "color",
        "ICO_LEFT_MENU_HOVER_COLOR_1" => "color",
        "ICO_LEFT_MENU_HOVER_COLOR_2" => "color",   
);

?>





<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.2">
	<link href="<?=SITE_TEMPLATE_PATH?>/fonts/open-sans/open-sans.css" rel="stylesheet">
        <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-2.1.4.js"></script>
	<meta name="yandex-verification" content="ac3e407bd2b12895" />
	 <meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET?>" />  
	<?$APPLICATION->ShowMeta("robots")?>
	<?$APPLICATION->ShowCSS()?>
	<?$APPLICATION->ShowHeadStrings()?>
	<?$APPLICATION->ShowHeadScripts()?>

	<?$APPLICATION->ShowMeta("description")?>  

	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.js');?>
	<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/js/fancybox/jquery.fancybox.css');?>
	
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery.maskinput.js');?>

	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js');?>
	
	<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/print.words.js');?>

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

<script src="<?=SITE_TEMPLATE_PATH?>/js/fancybox5/fancybox.umd.js"></script>
<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/js/fancybox5/fancybox.css"/>
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
//Подключение верхней панели 4 версии всего top_panel
//\Alexkova\Bxready2\Area::showArea('top_panel', $bxready::getAreaByCode('top_panel'));
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
	"left_hover", 
	array(
		"COMPONENT_TEMPLATE" => "left_hover",
		"ROOT_MENU_TYPE" => "left",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "N",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MAX_LEVEL" => "4",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "Y",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"SHOW_TREE" => "Y",
		"FULL_WIDTH" => "Y",
		"COMPACT_MODE_MENU" => "Y",
		"SEARCH_FORM" => "N",
		"STYLE_MENU_HOVER" => "colored_light",
		"ICO_TOP_MENU" => "N",
		"PICTURE_SECTION" => "N",
		"PICTURE_CATEGARIES" => isset($arTopMenu["PICTURE_CATEGARIES"])?$arTopMenu["PICTURE_CATEGARIES"]:"N",
		"VIEW_SUBSECTION" => "LINE",
		"MENU_HOVER_RESOLUTION_LG" => "",
		"MENU_HOVER_RESOLUTION_MD" => "",
		"MENU_HOVER_RESOLUTION_SM" => "",
		"MENU_HOVER_RESOLUTION_XS" => "",
		"PAGE" => "/search/",
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "5",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES" => "N",
		"SHOW_OTHERS" => "N",
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-input-menu-1",
		"CONTAINER_ID" => "title-search-menu-1",
		"PRICE_CODE" => "",
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "200",
		"SHOW_PREVIEW" => "Y",
		"CONVERT_CURRENCY" => "Y",
		"PREVIEW_WIDTH" => "54",
		"PREVIEW_HEIGHT" => "54",
		"BIG_MODE_MENU" => "N",
		"FULL_WIDTH_MENU_HOVER" => "N",
		"TEXT_MOBIL_MENU" => "",
		"TEMPLATE_MENU_HOVER" => "classic",
		"HOVER_MENU_COL_LG" => isset($arTopMenu["HOVER_MENU_COL_LG"])?$arTopMenu["HOVER_MENU_COL_LG"]:"3",
		"HOVER_MENU_COL_MD" => isset($arTopMenu["HOVER_MENU_COL_MD"])?$arTopMenu["HOVER_MENU_COL_MD"]:"2",
		"HOVER_MENU_COL_SM" => "1",
		"HOVER_MENU_COL_XS" => "1",
		"CATEGORY_0_TITLE" => "",
		"CATEGORY_0" => array(
			0 => "no",
		),
		"CATEGORY_0_iblock_catalog" => "",
		"COLOR_MENU" => "color",
		"FONT_MENU" => "normal",
		"INDENT_ITEMS_MENU" => "normal",
		"STRETCH_MENU" => "Y",
		"ICO_TOP_MENU_COLOR_1" => isset($arTopMenu["ICO_TOP_MENU_COLOR_1"])?$arTopMenu["ICO_TOP_MENU_COLOR_1"]:"light",
		"ICO_TOP_MENU_COLOR_2" => isset($arTopMenu["ICO_TOP_MENU_COLOR_2"])?$arTopMenu["ICO_TOP_MENU_COLOR_2"]:"light",
		"ICO_HOVER_MENU_COLOR_1" => isset($arTopMenu["ICO_TOP_MENU_HOVER_COLOR_1"])?$arTopMenu["ICO_TOP_MENU_HOVER_COLOR_1"]:"color",
		"ICO_HOVER_MENU_COLOR_2" => isset($arTopMenu["ICO_TOP_MENU_HOVER_COLOR_2"])?$arTopMenu["ICO_TOP_MENU_HOVER_COLOR_2"]:"light",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"TITLE_MENU" => "",
		"STYLE_MENU" => "colored_light",
		"SUBMENU" => "ACTIVE_SHOW",
		"HOVER_TEMPLATE" => "classic",
		"HOVER_SHOW_LEFT" => "N",
		"PICTURE_SECTION_HOVER" => "N",
		"ICO_LEFT_MENU_HOVER_COLOR_1" => "color",
		"ICO_LEFT_MENU_HOVER_COLOR_2" => "light"
	),
	false
);?>
                    <?/*$APPLICATION->IncludeComponent(
	"alexkova.business:menu", 
	".default", 
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
		"ROOT_MENU_TYPE" => "",
		"USE_EXT" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"TITLE_MENU" => "",
		"STYLE_MENU" => "colored_light",
		"SHOW_TREE" => "Y",
		"PICTURE_SECTION" => "N",
		"SUBMENU" => "ACTIVE_SHOW",
		"HOVER_TEMPLATE" => "classic",
		"STYLE_MENU_HOVER" => isset($arLeftMenu["STYLE_MENU_HOVER"])?$arLeftMenu["STYLE_MENU_HOVER"]:"colored_light",
		"PICTURE_SECTION_HOVER" => isset($arLeftMenu["PICTURE_SECTION_HOVER"])?$arLeftMenu["PICTURE_SECTION_HOVER"]:"N",
		"PICTURE_CATEGARIES" => isset($arLeftMenu["PICTURE_CATEGARIES"])?$arLeftMenu["PICTURE_CATEGARIES"]:"N",
		"HOVER_MENU_COL_LG" => isset($arLeftMenu["HOVER_MENU_COL_LG"])?$arLeftMenu["HOVER_MENU_COL_LG"]:2,
		"HOVER_MENU_COL_MD" => isset($arLeftMenu["HOVER_MENU_COL_MD"])?$arLeftMenu["HOVER_MENU_COL_MD"]:2,
		"ICO_LEFT_MENU_COLOR_1" => isset($arLeftMenu["ICO_LEFT_MENU_COLOR_1"])?$arLeftMenu["ICO_LEFT_MENU_COLOR_1"]:"color",
		"ICO_LEFT_MENU_COLOR_2" => isset($arLeftMenu["ICO_LEFT_MENU_COLOR_2"])?$arLeftMenu["ICO_LEFT_MENU_COLOR_2"]:"light",
		"ICO_LEFT_MENU_HOVER_COLOR_1" => isset($arLeftMenu["ICO_LEFT_MENU_HOVER_COLOR_1"])?$arLeftMenu["ICO_LEFT_MENU_HOVER_COLOR_1"]:"color",
		"ICO_LEFT_MENU_HOVER_COLOR_2" => isset($arLeftMenu["ICO_LEFT_MENU_HOVER_COLOR_2"])?$arLeftMenu["ICO_LEFT_MENU_HOVER_COLOR_2"]:"light",
		"HOVER_SHOW_LEFT" => "N",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "N"
	)
);*/?>

                    <?$APPLICATION->IncludeComponent(
	"bxready2:abmanager", 
	".default", 
	array(
		"SHOW" => "BXR_COLUMN",
		"BANTYPE" => "BXR_COLUMN",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "0",
		"USE_IN_LG_MODE" => "Y",
		"USE_IN_MD_MODE" => "Y",
		"USE_IN_SM_MODE" => "N",
		"USE_IN_XS_MODE" => "N",
		"COMPONENT_TEMPLATE" => ".default",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "N",
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