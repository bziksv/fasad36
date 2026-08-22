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
                "IBLOCK_ID" => "#BXR_IBLOCK_FORMS_PHONE_ID#",
		"IBLOCK_TYPE" => "services",
		"MAX_FILE_SIZE" => "0",
		"MODE" => "link",
		"NAME_FROM_PROPERTY" => "#BXR_PROPERTY_FORMS_PHONE_FIO#",
		"POPUP_TITLE" => GetMessage("POPUP_TITLE_1"),
		"PROPERTY_CODES" => array(
			0 => "#BXR_PROPERTY_FORMS_PHONE_FIO#",
			1 => "#BXR_PROPERTY_FORMS_PHONE_PHONE#",
			2 => "#BXR_PROPERTY_FORMS_PHONE_COMMENT#",
		),
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
        "IBLOCK_ID" => "#BXR_IBLOCK_FEEDBACK_ID#",
        "IBLOCK_TYPE" => "services",
        "MAX_FILE_SIZE" => "0",
        "MODE" => "link",
        "NAME_FROM_PROPERTY" => "#BXR_PROPERTY_FEEDBACK_FIO#",
        "POPUP_TITLE" => GetMessage("POPUP_TITLE_2"),
        "PROPERTY_CODES" => array(
            0 => "#BXR_PROPERTY_FEEDBACK_FIO#",
            1 => "#BXR_PROPERTY_FEEDBACK_EMAIL#",
            2 => "#BXR_PROPERTY_FEEDBACK_PHONE#",
            3 => "#BXR_PROPERTY_FEEDBACK_ANSWER#",
        ),
        "RESIZE_IMAGES" => "N",
        "SEND_EVENT" => "KZNC_NEW_FORM_RESULT_FEEDBACK",
        "STATUS_NEW" => "N",
        "USER_MESSAGE_ADD" => GetMessage("USER_MESSAGE_ADD_2"),
        "USE_CAPTCHA" => "Y",
        "BXR_FORM_ID" => "bxr-feedback-popup",
        "FORM_TITLE" => GetMessage("FORM_TITLE_2"),
      ),
      $false
);?>