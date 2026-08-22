<div class="col-xs-12">
	<div class="bxr-mobile-contact-form">
            <table class="twidth100">
		<tbody>
		<tr>
			<td class="twidth60">
  Адрес 
			</td>
			<td class="twidth40 talign-right">
				  г.Воронеж, ул. Старых Большевиков, дом 53, офис 50, 2 этаж
			</td>
		</tr>
		<tr>
			<td class="twidth60">
  График работы 
			</td>
			<td class="twidth40 talign-right">
				 Пн-Пт с 9.00 до 17.00
			</td>
		</tr>
		</tbody>
		</table>
	</div>
	<div class="bxr-mobile-contact-form" id="bxr-mobile-contact-map">
		<?include 'map.php';?>
	</div>
	<div class="bxr-mobile-contact-form bxr-built-in-form">
		<div class="h2">Задать вопрос</div>
		 <?$APPLICATION->IncludeComponent(
	"alexkova.business:form.iblock", 
	"built_in", 
	array(
		"BUTTON_TEXT" => "Открыть форму",
		"BXR_FORM_SUBMIT_CAPTION" => "Написать сообщение",
		"BXR_FORM_SUBMIT_ICON" => "fa fa-envelope",
		"COMPONENT_TEMPLATE" => "built_in",
		"EVENT_CLASS" => "open-form",
		"GROUPS" => array(
			0 => "2",
		),
		"IBLOCK_ID" => "19",
		"IBLOCK_TYPE" => "bxr_services",
		"MAX_FILE_SIZE" => "0",
		"MODE" => "link",
		"NAME_FROM_PROPERTY" => "109",
		"POPUP_TITLE" => "Заполните поля",
		"PROPERTY_CODES" => array(
			0 => "109",
			1 => "110",
			2 => "111",
			3 => "112",
			4 => "114",
		),
		"RESIZE_IMAGES" => "N",
		"SEND_EVENT" => "KZNC_NEW_FORM_RESULT",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => "Спасибо за сообщение. Наш менеджер перезвонит вам.",
		"USE_CAPTCHA" => "N",
		"FORM_TITLE" => "Заполните поля",
		"BXR_FORM_ID" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
	</div>
</div>
 <br>