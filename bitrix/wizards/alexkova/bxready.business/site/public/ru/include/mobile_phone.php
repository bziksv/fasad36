<div class="col-xs-12">
	<div class="bxr-mobile-contact-form">
		<table class="twidth100">
		<tbody>
		<tr>
			<td class="twidth50">
 <b>Группа поддержки</b>
			</td>
			<td class="talign-right">
				 +7(000) 000-00-00
			</td>
		</tr>
		<tr>
			<td class="twidth50">
 <b>Отдел снабжения</b>
			</td>
			<td class="talign-right">
				 +7(000) 000-00-00
			</td>
		</tr>
		<tr>
			<td class="twidth50">
 <b>Отдел продаж</b>
			</td>
			<td class="talign-right">
				 +7(000) 000-00-00
			</td>
		</tr>
		<tr>
			<td class="twidth50">
 <b>Директор</b>
			</td>
			<td class="talign-right">
				 +7(000) 000-00-00
			</td>
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
				"IBLOCK_ID" => "4",
				"IBLOCK_TYPE" => "bxr_services",
				"MAX_FILE_SIZE" => "0",
				"MODE" => "link",
				"NAME_FROM_PROPERTY" => "19",
				"POPUP_TITLE" => "Заполните поля",
				"PROPERTY_CODES" => array("19","20","21"),
				"RESIZE_IMAGES" => "N",
				"SEND_EVENT" => "KZNC_NEW_FORM_RESULT",
				"STATUS_NEW" => "N",
				"USER_MESSAGE_ADD" => "Спасибо за сообщение. Наш менеджер перезвонит вам.",
				"USE_CAPTCHA" => "N"
			),
		false
		);?>
	</div>
</div>
 <br>