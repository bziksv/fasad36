<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?><div class="tb20-bottom">
	 Компания специализируется на предоставлении услуг как для корпоративных клиентов так и для частных лиц. Деятельность компании получила высокую оценку профессионального сообщества.
</div>
<div class="tb20-bottom row bxr-page-contacts">
	<div class="col-md-6">
		<div class="bxr-border">
			<p>
 <b>Адрес:</b>&nbsp;г. Челябинск, ул. Вечнозелёной аллеи, 742
			</p>
			<p>
 <b>Телефон:</b> +7 (000) 000-00-00
			</p>
			<p>
 <b>Факс:</b> 100-02-03
			</p>
		</div>
	</div>
	<div class="col-md-6">
		<div class="bxr-border">
			<p>
 <b>Основная почта:</b> <a href="mail:mail@mail.ru">mail@mail.ru</a>
			</p>
			<p>
 <b>Почта для справок:</b> <a href="mail:mail@mail.ru">mail@mail.ru</a>
			</p>
		</div>
	</div>
</div>
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
	 Данный сервис предназначен для обратной связи. Воспользуйтесь формой, чтобы задать интересующий Вас вопрос, отправить комментарии, замечания или предложения.
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
		"EVENT_CLASS" => "open-form",
		"FORM_TITLE" => "Обратная связь",
		"GROUPS" => array("2"),
		"IBLOCK_ID" => "#BXR_IBLOCK_FEEDBACK_ID#",
		"IBLOCK_TYPE" => "services",
		"MAX_FILE_SIZE" => "0",
		"MODE" => "link",
		"NAME_FROM_PROPERTY" => "#BXR_PROPERTY_FEEDBACK_FIO#",
		"POPUP_TITLE" => "Заполните поля",
		"PROPERTY_CODES" => array(
			"#BXR_PROPERTY_FEEDBACK_FIO#",
			"#BXR_PROPERTY_FEEDBACK_EMAIL#",
			"#BXR_PROPERTY_FEEDBACK_PHONE#",
			"#BXR_PROPERTY_FEEDBACK_ANSWER#"
		),
		"RESIZE_IMAGES" => "N",
		"SEND_EVENT" => "KZNC_NEW_FORM_RESULT_FEEDBACK",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => "Спасибо за сообщение. Мы с вами свяжемся.",
		"USE_CAPTCHA" => "N"
	),
$false
);?> <br>
 <br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>