<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
$aMenuLinksExt = $APPLICATION->IncludeComponent(
	"alexkova.business:menu.sections",
	"",
	Array(
		"IS_SEF" => "Y",
		"ID" => $_REQUEST["ID"],
		"IBLOCK_TYPE" => "content",
		"IBLOCK_ID" => "11",
		"SECTION_URL" => "",
		"DEPTH_LEVEL" => "3",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"SEF_BASE_URL" => "/services/",
		"SECTION_PAGE_URL" => "#SECTION_CODE#/",
		"DETAIL_PAGE_URL" => "#SECTION_CODE#/#ELEMENT_CODE#/"
	),
        false,
        array("HIDE_ICONS" => "Y")
);

foreach ($aMenuLinksExt as &$val){
	$val["DEPTH_LEVEL"]++;
}

//$aMenuLinks = array_merge($aMenuLinks, $aMenuLinksExt);
$aMenuLinks = $aMenuLinksExt;
?>