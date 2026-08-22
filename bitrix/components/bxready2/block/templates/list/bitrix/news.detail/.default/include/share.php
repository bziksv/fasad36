<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>
<div class="bxr-share-block">
<div class="bxr-share-block-content pull-right">
    <?$APPLICATION->IncludeComponent(
	"bitrix:main.share", 
	"flat_business", 
	array(
		"HANDLERS" => array(
			0 => "vk",
		),
		"HIDE" => $arParams["HIDE_SHARE_PANEL"],
		"PAGE_TITLE" => "",
		"PAGE_URL" => $APPLICATION->GetCurPage(),
		"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
		"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
		"COMPONENT_TEMPLATE" => "flat_business",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
</div>
<div class="bxr-share-block-text pull-right"><?=$arParams["BXR_SHARE_BLOCK_TEXT"]?></div>
<div class="clearfix"></div>
