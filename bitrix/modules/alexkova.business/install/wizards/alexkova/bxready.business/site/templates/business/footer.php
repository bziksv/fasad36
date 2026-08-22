<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<? IncludeTemplateLangFile(__FILE__);?>
</div>
</div>
</div>
</div>
<div class="tb20-bottom">
<?$APPLICATION->IncludeComponent("bxready2:abmanager", 'full-static', array(
		"SHOW" => "BXR_BOTTOM",
		"BANTYPE" => "BXR_BOTTOM",
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
);?>
</div>
<?$APPLICATION->IncludeComponent(
	"alexkova.business:buttonUp", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"LOCATION_HORIZONTALLY" => "rigth",
		"BUTTON_UP_HORIZONTALLY_INDENT" => "65",
		"BUTTON_UP_VERTICAL_INDENT" => "85",
		"BUTTON_UP_TOP_SHOW" => "150",
		"BUTTON_UP_SPEED" => "150"
	),
	false
);?>
<?
    if (CModule::IncludeModule('alexkova.bxready2')){
            $bxready = \Alexkova\Bxready2\Bxready::getInstance();
            \Alexkova\Bxready2\Area::showArea('footer', $bxready::getAreaByCode('footer'));
    }
?>
</body>
</html>
