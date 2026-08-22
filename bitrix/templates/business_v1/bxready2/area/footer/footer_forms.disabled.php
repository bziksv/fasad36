<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;?>
<?$APPLICATION->IncludeComponent(
	"alexkova.business:form.iblock", 
	"popup", 
	array(
		"BUTTON_TEXT" => "",
		"BXR_FORM_SUBMIT_CAPTION" => GetMessage("BXR_FORM_SUBMIT_CAPTION_1"),
		"BXR_FORM_SUBMIT_ICON" => "",
		"COMPONENT_TEMPLATE" => "popup",
		"EVENT_CLASS" => "open-form",
		"GROUPS" => array(
			0 => "2",
		),
		"RESIZE_IMAGES" => "N",
		"SEND_EVENT" => "KZNC_NEW_FORM_RESULT_PHONE",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => GetMessage("USER_MESSAGE_ADD_1"),
		"USE_CAPTCHA" => "Y",
		"BXR_FORM_ID" => "bxr-phone-popup",
		"FORM_TITLE" => GetMessage("FORM_TITLE_1"),
		"IBLOCK_ID" => "18",
		"IBLOCK_TYPE" => "services",
		"MAX_FILE_SIZE" => "0",
		"MODE" => "link",
		"NAME_FROM_PROPERTY" => "106",
		"POPUP_TITLE" => GetMessage("POPUP_TITLE_1"),
		"PROPERTY_CODES" => array(
			0 => "106",
			1 => "107",
			2 => "108",
			3 => "113",
		),
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	$false
);?>
<?$APPLICATION->IncludeComponent(
	"alexkova.business:form.iblock", 
	"popup", 
	array(
		"BUTTON_TEXT" => "",
		"BXR_FORM_SUBMIT_CAPTION" => GetMessage("BXR_FORM_SUBMIT_CAPTION_2"),
		"BXR_FORM_SUBMIT_ICON" => "",
		"COMPONENT_TEMPLATE" => "popup",
		"EVENT_CLASS" => "open-form",
		"GROUPS" => array(
			0 => "2",
		),
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "services",
		"MAX_FILE_SIZE" => "0",
		"MODE" => "link",
		"NAME_FROM_PROPERTY" => "109",
		"POPUP_TITLE" => GetMessage("POPUP_TITLE_2"),
		"PROPERTY_CODES" => array(
			0 => "109",
			1 => "110",
			2 => "111",
			3 => "112",
			4 => "114",
		),
		"RESIZE_IMAGES" => "N",
		"SEND_EVENT" => "KZNC_NEW_FORM_RESULT_FEEDBACK",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => GetMessage("USER_MESSAGE_ADD_2"),
		"USE_CAPTCHA" => "Y",
		"BXR_FORM_ID" => "bxr-feedback-popup",
		"FORM_TITLE" => GetMessage("FORM_TITLE_2"),
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	$false
);?>

<?$APPLICATION->IncludeComponent(
	"alexkova.business:form.iblock", 
	"popup", 
	array(
		"BUTTON_TEXT" => "",
		"BXR_FORM_ID" => "bxr-sale-popup",
		"BXR_FORM_SUBMIT_CAPTION" => GetMessage("BXR_FORM_SUBMIT_CAPTION_1"),
		"BXR_FORM_SUBMIT_ICON" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"FORM_TITLE" => "Получить скидку",
		"GROUPS" => array(
			0 => "2",
		),
		"IBLOCK_ID" => "23",
		"IBLOCK_TYPE" => "services",
		"MAX_FILE_SIZE" => "0",
		"NAME_FROM_PROPERTY" => "116",
		"PROPERTY_CODES" => array(
			0 => "116",
			1 => "117",
			2 => "118",
			3 => "119",
			4 => "120",
		),
		"RESIZE_IMAGES" => "N",
		"SEND_EVENT" => "KZNC_NEW_FORM_RESULT_SALE",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => GetMessage("USER_MESSAGE_ADD_1"),
		"USE_CAPTCHA" => "Y",
		"COMPONENT_TEMPLATE" => "popup"
	),
	false
);?>


