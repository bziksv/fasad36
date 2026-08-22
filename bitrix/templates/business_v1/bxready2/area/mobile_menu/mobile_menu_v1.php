<div class="_hidden-sm hidden-md hidden-lg">
	<?

	global $APPLICATION;

	$APPLICATION->IncludeComponent(
	"alexkova.business:menu",
	"bxr_mobile_v1", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPONENT_TEMPLATE" => "bxr_mobile_v1",
		"DELAY" => "N",
		"MAX_LEVEL" => "3",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top", //"bxr_mobile",
		"USE_EXT" => "Y",
		"BXR_MOBILE_SHOW_SEARCH_FORM" => "Y",
		"BXR_MOBILE_SHOW_ANSWER_FORM" => "Y",
		"BXR_MOBILE_SHOW_PHONE_FORM" => "Y",
		"BXR_MOBILE_SHOW_USER_FORM" => "Y"
	),
	false
);?>
</div>

