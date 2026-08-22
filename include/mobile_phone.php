<div class="col-xs-12">
	<div class="bxr-mobile-contact-form">
		<table class="twidth100">
		<tbody>
		<tr>
			<td class="twidth50">
  Отдел продаж 
			</td>
			<td class="talign-right">
				 +7 (920) 447-22-00
			</td>
		</tr>
		<tr>
			
		</tr>
		</tbody>
		</table>
	</div>
	<div class="bxr-mobile-contact-form bxr-built-in-form">
		<div class="h2">Заявка на звонок</div>
		 <?$APPLICATION->IncludeComponent(
			"alexkova.business:form.iblock",
			"built_in",
			Array(
				"BUTTON_TEXT" => "Открыть форму",
				"BXR_FORM_SUBMIT_CAPTION" => "Позвоните мне",
				"BXR_FORM_SUBMIT_ICON" => "fa fa-phone",
				"COMPONENT_TEMPLATE" => "built_in",
				"EVENT_CLASS" => "open-form",
				"GROUPS" => array("2"),
				"IBLOCK_ID" => "18",
				"IBLOCK_TYPE" => "bxr_services",
				"MAX_FILE_SIZE" => "0",
				"MODE" => "link",
				"NAME_FROM_PROPERTY" => "106",
				"POPUP_TITLE" => "Заполните поля",
				"PROPERTY_CODES" => array("106","107","108","113"),
				"RESIZE_IMAGES" => "N",
				"SEND_EVENT" => "KZNC_NEW_FORM_RESULT_PHONE",
				"STATUS_NEW" => "N",
				"USER_MESSAGE_ADD" => "Спасибо за сообщение. Наш менеджер перезвонит вам.",
				"USE_CAPTCHA" => "Y"
			),
		false
		);?>
	</div>
</div>
 <br>