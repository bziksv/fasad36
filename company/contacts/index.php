<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Контакты и обратная связь - Компания \"ТермоФасад\"");
$APPLICATION->SetPageProperty("title", "Контакты и обратная связь с компанией ТермоФасад");
$APPLICATION->SetTitle("Контакты");
?><h1>Контакты компании Термофасад</h1>
<p>
	Адрес: 394033, г.Воронеж, ул. Старых Большевиков, дом 53, офис 50 "а", 2 этаж
</p>
<p>
	Телефон: +7 (473) 230-44-25, +7(920)447-22-00
</p>
<p>
	Основная почта: <a href="mailto:info@fasad36.ru">info@fasad36.ru</a>
</p>
<div class="clearfix">
</div>
<div id="bxr-contact-map">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"named_area",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"INCLUDE_PTITLE" => GetMessage("GHANGE_MOBILE_CONTACTS"),
		"PATH" => SITE_DIR."include/map.php"
	)
);?>
</div>
<h2>Обратная связь</h2>
<div class="tb20-bottom">
	 Предлагаем задать интересующий Вас вопрос, отправить комментарии, замечания или предложения.
</div>
 <button class="bxr-color-button" href="javascript:void(0);" data-toggle="modal" data-target="#bxr-feedback-contacts-popup"> <span class=" fa fa-send-o"></span>Обратная связь</button>
<?$APPLICATION->IncludeComponent(
	"alexkova.business:form.iblock",
	"popup",
	Array(
		"BUTTON_TEXT" => "",
		"BXR_FORM_ID" => "bxr-feedback-contacts-popup",
		"BXR_FORM_SUBMIT_CAPTION" => "Отправить",
		"BXR_FORM_SUBMIT_ICON" => "fa fa-send-o",
		"COMPONENT_TEMPLATE" => "popup",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"EVENT_CLASS" => "open-form",
		"FORM_TITLE" => "Обратная связь",
		"GROUPS" => array(0=>"2",),
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "services",
		"MAX_FILE_SIZE" => "0",
		"MODE" => "link",
		"NAME_FROM_PROPERTY" => "109",
		"POPUP_TITLE" => "Заполните поля",
		"PROPERTY_CODES" => array(0=>"109",1=>"110",2=>"111",3=>"112",4=>"114",),
		"RESIZE_IMAGES" => "N",
		"SEND_EVENT" => "KZNC_NEW_FORM_RESULT_FEEDBACK",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => "Спасибо за сообщение. Мы с вами свяжемся.",
		"USE_CAPTCHA" => "Y"
	),
$false
);?> <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>