<?
##############################################
# Alexkova: popupad                          #
# Copyright (c) 2013 Kuznica                 #
# http://kuznica74.ru                        #
# mailto:global@kuznica.ru                   #
##############################################
$MODULE_ID = 'alexkova.popupad';
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");//первый общий пролог
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$MODULE_ID."/include.php");
IncludeModuleLangFile(__FILE__);
$REK_RIGHT = $APPLICATION->GetGroupRight($MODULE_ID);
if ($REK_RIGHT == "D")
	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
?>
<?
//подготовка данных
$ID = intval($ID);		// идентификатор редактируемой записи
$message = null;		// сообщение об ошибке
$bVarsFromForm = false;		// флаг "Данные получены с формы", обозначающий, что выводимые данные получены с формы, а не из БД.

$aTabs = array(
	array("DIV" => "edit1", "TAB" => GetMessage("POPUPAD_REK_TAB_DEFAULT"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("POPUPAD_REK_TAB_DEFAULT_TITLE")),
	array("DIV" => "edit2", "TAB" => GetMessage("POPUPAD_REK_TAB_TARGETING"), "ICON"=>"main_user_edit", "TITLE"=> GetMessage("POPUPAD_REK_TAB_TARGETING_TITLE")),
	array("DIV" => "edit3", "TAB" => GetMessage("POPUPAD_REK_TAB_SHOW_PROP"), "ICON"=>"main_user_edit", "TITLE"=> GetMessage("POPUPAD_REK_TAB_SHOW_PROP_TITLE")),
);

$tabControl = new CAdminTabControl("tabControl", $aTabs);

if(
    $REQUEST_METHOD == "POST" // проверка метода вызова страницы
    &&
    ($save!="" || $apply!="") // проверка нажатия кнопок "Сохранить" и "Применить"
    &&
    $REK_RIGHT=="W"          // проверка наличия прав на запись для модуля
    &&
    check_bitrix_sessid()     // проверка идентификатора сессии
)
{

	if(!is_array($arIMAGE))
		$arIMAGE = $_FILES["arIMAGE"];
	if(!is_array($arDUMMY_IMAGE))
		$arDUMMY_IMAGE = $_FILES["arDUMMY_IMAGE"];
	$arIMAGE["del"] = ${"arIMAGE_del"};
	$arDUMMY_IMAGE["del"] = ${"arDUMMY_IMAGE_del"};
	if($FLASH_DUMMY_CHECK != "Y")
		$arDUMMY_IMAGE["del"] = "Y";
	$INFO["DUMMY_IMAGE"] = $arDUMMY_IMAGE;
	$iconFile = $_FILES["ICON_FILE"];
	$iconFile["del"] = ${"ICON_FILE_del"};
	$INFO["ICON_FILE"] = $iconFile;
	
	if($FLASH_OVERFLOW !="Y" && $SHOW_TYPE=="flash")
		$URL = "";
	if($ACTIVE != "Y")
		$ACTIVE = 'N';
	$oBanner = new CKuznicaPopupad();

	$SID = $_POST["SID"];
	if(!empty($SID))
		$SID_4BD = serialize($SID);
	else
		$SID_4BD = '';
	if(!empty($SHOW_ON))
		$SHOW_ON_4BD = serialize(explode("\n", $SHOW_ON));
	else
		$SHOW_ON_4BD = '';
	if(!empty($SHOW_OFF))
		$SHOW_OFF_4BD = serialize(explode("\n", $SHOW_OFF));
	else
		$SHOW_OFF_4BD = '';

	$arFields = Array(
		"SID"			 =>	$SID_4BD,
		"ACTIVE"		 =>	$ACTIVE,
		"NAME"			 => $NAME,
		"SHOW_FROM"		 => $SHOW_FROM,
		"SHOW_TO"		 => $SHOW_TO,
		"SHOW_TYPE"		 => $SHOW_TYPE,
		"SHOW_ON"		 => $SHOW_ON_4BD,
		"SHOW_OFF"		 => $SHOW_OFF_4BD,
		"CODE"			 => $CODE,
		"CODE_TYPE"		 => $CODE_TYPE,
		"WEIGHT"		 => $WEIGHT,
		"URL"			 => $URL,
		"MODIFIED_BY"	 => $USER->GetID(),
		"IMAGE_ID"		 => $arIMAGE,
		"FLASH_TRANSPARENT"=>$FLASH_TRANSPARENT,
		"RESET_COUNTER"=>$RESET_COUNTER,
		"INFO"			=>$INFO
	);
	if($ID > 0)
	{
		$res = $oBanner->Update($ID, $arFields);
	}
	else
	{
		$ID = $oBanner->Add($arFields);
		$res = ($ID > 0);
	}
	if($res)
	{

		if (isset($_COOKIE['KZNC_PROTECT_BANER_SHOW_TIME'])) {
			unset($_COOKIE['KZNC_PROTECT_BANER_SHOW_TIME']);
			setcookie('KZNC_PROTECT_BANER_SHOW_TIME', null, -1, '/');
		}
		// если сохранение прошло удачно - перенаправим на новую страницу
		// (в целях защиты от повторной отправки формы нажатием кнопки "Обновить" в браузере)
		if ($apply != "")
			// если была нажата кнопка "Применить" - отправляем обратно на форму.
			LocalRedirect("/bitrix/admin/popupad_banner_edit.php?ID=".$ID."&mess=ok&lang=".LANG."&".$tabControl->ActiveTabParam());
		else
			// если была нажата кнопка "Сохранить" - отправляем к списку элементов.
			LocalRedirect("/bitrix/admin/popupad_banners_list.php?lang=".LANG);
	}
	else
	{
		// если в процессе сохранения возникли ошибки - получаем текст ошибки и меняем вышеопределённые переменные
		if($e = $APPLICATION->GetException())
			$message = new CAdminMessage(GetMessage("POPUPAD_BANNER_SAVE_ERROR"), $e);
		$bVarsFromForm = true;
	}
}
$str_SHOW_TYPE = 'image';
$str_ACTIVE = "Y";
if($bVarsFromForm)
	//$DB->InitTableVarsForEdit("kznc_popupad_banner", "", "str_");
		extract($arFields,EXTR_PREFIX_IF_EXISTS,'str');
if($ID>0)
{
	$arBanner = CKuznicaPopupad::GetByID($ID);
	if(!$arBanner->ExtractFields("str_"))
		$ID=0;

}
global $DB;
$phpDateFormat = $DB->DateFormatToPHP(CLang::GetDateFormat());

if(!$bVarsFromForm || $ID>0)
{
	if($str_SHOW_FROM)
		$str_SHOW_FROM = date($phpDateFormat,MakeTimeStamp($str_SHOW_FROM,"YYYY-MM-DD HH:MI:SS"));
	if($str_SHOW_TO)
		$str_SHOW_TO= date($phpDateFormat,MakeTimeStamp($str_SHOW_TO,"YYYY-MM-DD HH:MI:SS"));
}

if(!$str_SID = unserialize(htmlspecialchars_decode($str_SID)))
	$str_SID = array();
if(!is_array($str_INFO))
	if(!$str_INFO = unserialize(htmlspecialchars_decode($str_INFO)))
		$str_INFO = array();
if(!$str_INFO["BANNER_USHOW_TYPE"])
	$str_INFO["BANNER_USHOW_TYPE"] = "S";
$str_DUMMY_IMAGE_ID = $str_INFO["DUMMY_IMAGE"];
//где показывать баннер
if(!empty($str_SHOW_ON))
	$str_SHOW_ON = htmlspecialcharsbx(implode("\n",unserialize(htmlspecialchars_decode($str_SHOW_ON))));
if(!empty($str_SHOW_OFF))
	$str_SHOW_OFF = htmlspecialcharsbx(implode("\n",unserialize(htmlspecialchars_decode($str_SHOW_OFF))));
if(intval($str_WEIGHT)<=0)
		$str_WEIGHT = 100;


$APPLICATION->SetTitle(($ID>0? GetMessage("POPUPAD_BANNER_TITLE_EDIT").$ID : GetMessage("POPUPAD_BANNER_TITLE_ADD")));
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php"); // второй общий пролог
?>
<?
// конфигурация административного меню
$aMenu = array(
	array(
		"TEXT"=>GetMessage("POPUPAD_BANNER_LIST"),
		"TITLE"=>GetMessage("POPUPAD_BANNER_LIST_TITLE"),
		"LINK"=>"popupad_banners_list.php?lang=".LANG,
		"ICON"=>"btn_list",
	),
	array(
		"TEXT"	=> GetMessage("POPUPAD_BANNER_NEW"),
		"TITLE"	=> GetMessage("POPUPAD_BANNER_NEW_TITLE"),
		"LINK"	=> "popupad_banner_edit.php?lang=".LANGUAGE_ID,
		"ICON"	=> "btn_new"
		),
	array(
		"TEXT"	=> GetMessage("POPUPAD_BANNER_DELETE"),
		"TITLE"	=> GetMessage("POPUPAD_BANNER_DELETE_TITLE"),
		"LINK"	=> "javascript:if(confirm('".GetMessage("POPUPAD_BANNER_DELETE_CONFIRM")."'))window.location='popupad_banners_list.php?ID=".$ID."&lang=".LANGUAGE_ID."&sessid=".bitrix_sessid()."&action=delete';",
		"ICON"	=> "btn_delete"
	)
);

$context = new CAdminContextMenu($aMenu);

// выведем меню
$context->Show();

if($_REQUEST["mess"] == "ok" && $ID>0)
  CAdminMessage::ShowMessage(array("MESSAGE"=>GetMessage("POPUPAD_BANNER_SAVED"), "TYPE"=>"OK"));

if($message)
  echo $message->Show();
elseif($oBanner->LAST_ERROR!="")
  CAdminMessage::ShowMessage($oBanner->LAST_ERROR);

?>

<form method="POST" Action="<?echo $APPLICATION->GetCurPage()?>" ENCTYPE="multipart/form-data" name="post_form">
<?// проверка идентификатора сессии ?>
<?echo bitrix_sessid_post();?>
<input type="hidden" name="lang" value="<?=LANG?>">
<?if($ID>0 && !$bCopy):?>
  <input type="hidden" name="ID" value="<?=$ID?>">
<?endif;?>
<?
// отобразим заголовки закладок
$tabControl->Begin();
?>
<?
//********************
// первая закладка - форма редактирования баннера
//********************
$tabControl->BeginNextTab();
?>
	 <tr>
		<td width="40%"><label for="active"><?echo GetMessage("POPUPAD_BANNER_ACTIVE")?></label></td>
		<td width="60%">
			<?
			echo InputType("checkbox", "ACTIVE", "Y", $str_ACTIVE, false, "", 'id="active"');
			?>
		</td>
	</tr>
	 <tr>
		<td width="40%"><span class="required">*</span><?echo GetMessage("POPUPAD_BANNER_SITE")?></td>
		<td width="60%">
			<?
			$rsSites = CSite::GetList($by="sort", $order="desc", array("ACTIVE" => "Y"));
			while ($arSite = $rsSites->Fetch())
			{
				$checked = "";
				if($str_SID[$arSite["LID"]] == "Y")
					$checked = "checked";
				echo "<input type='checkbox' name='SID[{$arSite["LID"]}]' $checked value='Y' id='site_{$arSite["LID"]}'/><label for='site_{$arSite["LID"]}'> [".$arSite["LID"]."] ".htmlspecialcharsbx($arSite["NAME"])."</label><br/>";
			}
			?>
		</td>
	</tr>
	<tr>
		<td><?=GetMessage("POPUPAD_SHOW_DATE")." (".CSite::GetDateFormat("SHORT")."):"?></td>
		<td><?echo CalendarPeriod("SHOW_FROM", $str_SHOW_FROM, "SHOW_TO", $str_SHOW_TO, "post_form");?></td>
	</tr>
	<tr>
		<td><span class="required">*</span><?echo GetMessage("POPUPAD_BANNER_NAME")?></td>
		<td><input type="text" name="NAME" value="<?echo $str_NAME;?>" size="30" maxlength="100"></td>
	</tr>
	<tr>
		<td><?echo GetMessage("POPUPAD_BANNER_WEIGHT")?></td>
		<td><input type="text" name="WEIGHT" value="<?echo $str_WEIGHT;?>" size="10" maxlength="10"></td>
	</tr>
	
	<tr class="heading">
		<td colspan="2"><b><?=GetMessage("POPUPAD_BANNER_SHOW")?></b></td>
	</tr>

	<tr valign="top">
		<td width="40%"><label for="kznc_icon_show"><?=GetMessage("POPUPAD_SHOW_TYPE")?></label></td>
		<td>
			<?
			$ref = array(
				GetMessage("POPUPAD_SHOW_TYPE_DEFAULT"),
				GetMessage("POPUPAD_SHOW_TYPE_ICON"),
			);
			$ref_id = array(
				"default",
				"icon",
			);
			echo SelectBoxFromArray("INFO[SHOW_TYPE]", array("REFERENCE" => $ref, "REFERENCE_ID" => $ref_id),$str_INFO["SHOW_TYPE"],'','onchange="kzncPopupad.changePopupadType(this)"');
			?>
		</td>
	</tr>
<?
$iconShowFlag = false;
if($str_INFO["SHOW_TYPE"] == "icon")
	$iconShowFlag = true;
?>
	<tr class="adm-detail-content-wrap" valign="top" id="kznc_icon_file_input" <?if(!$iconShowFlag) echo "style='display: none;'";?>>
		<td><?=GetMessage("POPUPAD_BANNER_ICON_FILES")?></td>
		<td><?echo CFile::InputFile("ICON_FILE", 25, $str_INFO["ICON_FILE"]);?></td>
	</tr>
<?if(!$str_INFO["ICON_FILE"]["error"]):?>
	<tr class="adm-detail-content-wrap" id="kznc_icon_file" <?if(!$iconShowFlag) echo "style='display: none;'";?>>
		<td align="center" colspan="2">
			<?echo CKuznicaPopupadGeneral::GetContent($str_INFO["ICON_FILE"])?>
			<input type="hidden" name="INFO[ICON_FILE]" value="<?=$str_INFO["ICON_FILE"]?>"/>
		</td>
	</tr>
<?endif;?>

	<tr class="adm-detail-content-wrap" valign="top" id="kznc_icon_place" <?if(!$iconShowFlag) echo "style='display: none;'";?>>
		<td><?=GetMessage("POPUPAD_BANNER_ICON_PLACE")?></td>
		<td>
			<?
			$refIconPlace = array(
				GetMessage("POPUPAD_BANNER_ICON_PLACE_LT"),
				GetMessage("POPUPAD_BANNER_ICON_PLACE_LB"),
				GetMessage("POPUPAD_BANNER_ICON_PLACE_BL"),
				GetMessage("POPUPAD_BANNER_ICON_PLACE_BR"),
				GetMessage("POPUPAD_BANNER_ICON_PLACE_RT"),
				GetMessage("POPUPAD_BANNER_ICON_PLACE_RB"),
			);
			$refIdIconPlace = array(
				"lt",
				"lb",
				"bl",
				"br",
				"rt",
				"rb"
			);
			echo SelectBoxFromArray("INFO[ICON_PLACE]", array("REFERENCE" => $refIconPlace, "REFERENCE_ID" => $refIdIconPlace),$str_INFO["ICON_PLACE"]);
			?>
		</td>
	</tr>
	<tr class="adm-detail-content-wrap" valign="top" id="kznc_icon_fixed_tr" <?if(!$iconShowFlag) echo "style='display: none;'";?>>
		<td><label for="kznc_icon_fixed"><?=GetMessage("POPUPAD_BANNER_ICON_FIXED")?></label></td>
		<td>
			<?echo InputType("checkbox", "INFO[ICON_FIXED]", "Y", $str_INFO["ICON_FIXED"], false, "", 'id="kznc_icon_fixed"');?>
		</td>
	</tr>
	<tr class="adm-detail-content-wrap" valign="top" id="kznc_icon_show_close_tr" <?if(!$iconShowFlag) echo "style='display: none;'";?>>
		<td><label for="kznc_icon_show_close"><?=GetMessage("POPUPAD_BANNER_ICON_SHOW_CLOSE")?></label></td>
		<td>
			<?echo InputType("checkbox", "INFO[ICON_SHOW_CLOSE]", "Y", $str_INFO["ICON_SHOW_CLOSE"], false, "", 'id="kznc_icon_show_close"');?>
		</td>
	</tr>
	<tr class="adm-detail-content-wrap" valign="top" id="kznc_icon_margin1" <?if(!$iconShowFlag) echo "style='display: none;'";?>>
		<td><?=GetMessage("POPUPAD_BANNER_ICON_MARGIN1")?></td>
		<td>
			<input style="width: 30px" name="INFO[ICON_MARGIN1]" type="text" value="<?=$str_INFO["ICON_MARGIN1"];?>" />
			<?
			$refIconPlace = array(
				'px',
				'%'
			);
			$refIdIconPlace = array(
				"px",
				"pc",
			);
			echo SelectBoxFromArray("INFO[ICON_MARGIN1_UNIT]", array("REFERENCE" => $refIconPlace, "REFERENCE_ID" => $refIdIconPlace),$str_INFO["ICON_MARGIN1_UNIT"], '', " width='30px' ");
			?>
		</td>
	</tr>
	<tr class="adm-detail-content-wrap" valign="top" id="kznc_icon_margin2" <?if(!$iconShowFlag) echo "style='display: none;'";?>>
		<td><?=GetMessage("POPUPAD_BANNER_ICON_MARGIN2")?></td>
		<td>
			<input style="width: 30px" name="INFO[ICON_MARGIN2]" type="text" value="<?=$str_INFO["ICON_MARGIN2"];?>" />
			<?
			$refIconPlace = array(
				'px',
				'%'
			);
			$refIdIconPlace = array(
				"px",
				"pc",
			);
			echo SelectBoxFromArray("INFO[ICON_MARGIN2_UNIT]", array("REFERENCE" => $refIconPlace, "REFERENCE_ID" => $refIdIconPlace),$str_INFO["ICON_MARGIN2_UNIT"], '', " width='30px' ");
			?>
		</td>
	</tr>
	<tr class="adm-detail-content-wrap" valign="top" id="kznc_icon_size" <?if(!$iconShowFlag) echo "style='display: none;'";?>>
		<td><?=GetMessage("POPUPAD_BANNER_ICON_SIZE")?></td>
		<td>
			<input style="width: 30px" name="INFO[ICON_WIDTH]" type="text" value="<?=$str_INFO["ICON_WIDTH"];?>" />
			<span><?=GetMessage("POPUPAD_BANNER_ICON_SIZE_LIM")?></span>
			<input style="width: 30px" name="INFO[ICON_HEIGHT]" type="text" value="<?=$str_INFO["ICON_HEIGHT"];?>" />
			<span>px</span>
		</td>
	</tr>


	<tr class="adm-detail-content-wrap" valign="top" id="kznc_icon_show_image" <?if(!$iconShowFlag) echo "style='display: none;'";?>>
		<td><label for="kznc_icon_show_image_check"><?=GetMessage("POPUPAD_BANNER_ICON_SHOW_IMAGE")?></label></td>
		<td>
			<?echo InputType("checkbox", "INFO[ICON_SHOW_IMAGE]", "Y",
				$str_INFO["ICON_SHOW_IMAGE"], false, "",'id="kznc_icon_show_image_check" onclick="kzncPopupad.checkIconImage(this)"');?>
		</td>
	</tr>

	<?
	$imageShowFlag = false;
	if($str_INFO["ICON_SHOW_IMAGE"] == "Y" && $str_INFO["SHOW_TYPE"] == "icon"
		|| $str_INFO["SHOW_TYPE"] == "default"
		|| !$str_INFO["SHOW_TYPE"]
	)
	$imageShowFlag = true;
	?>
	<tr valign="top" id="popupadShowType" class="adm-detail-toolbar" <?if(!$imageShowFlag) echo 'style="display:none;"'?>>
		<td>
			<?=GetMessage("POPUPAD_BANNER_SHOW_TYPE")?>
		</td>
		<td align="left">
			<input type="radio" onclick="kzncPopupad.changeType('image');" id="SHOW_TYPE_IMAGE" name="SHOW_TYPE" value="image"<?if (((($ID && $str_SHOW_TYPE=='image')|| !$ID) && !isset($SHOW_TYPE)) || (isset($SHOW_TYPE) && ($SHOW_TYPE == 'image'))): ?> checked="checked"<? endif; ?>>
			<label for="SHOW_TYPE_IMAGE"><?=GetMessage("POPUPAD_BANNER_SHOW_IMAGE")?></label><br>
			<input type="radio" onclick="kzncPopupad.changeType('flash');" id="SHOW_TYPE_FLASH" name="SHOW_TYPE" value="flash"<?if (($ID && $str_SHOW_TYPE=='flash') || (isset($SHOW_TYPE) && ($SHOW_TYPE == 'flash'))): ?> checked="checked"<? endif; ?>>
			<label for="SHOW_TYPE_FLASH"><?=GetMessage("POPUPAD_BANNER_SHOW_FLASH")?></label><br>

			<input type="radio" onclick="kzncPopupad.changeType('html');" id="SHOW_TYPE_HTML" name="SHOW_TYPE" value="html"<?if (($ID && $str_SHOW_TYPE=='html') || (isset($SHOW_TYPE) && ($SHOW_TYPE == 'html'))): ?> checked="checked"<? endif; ?>>
			<label for="SHOW_TYPE_HTML"><?=GetMessage("POPUPAD_BANNER_SHOW_HTML")?></label>

		<script type="text/javascript">
			kzncPopupad = {
				iconRows: [
					'kznc_icon_show_image',
					'kznc_icon_file_input',
					'kznc_icon_file',
					'kznc_icon_place',
					'kznc_icon_fixed_tr',
					'kznc_icon_margin1',
					'kznc_icon_margin2',
					'kznc_icon_size',
				],
				imageRows:[
					'popupadShowType',
					'eFile',
					'eFileLoaded',
					'eFlashTrans',
					'eFlashDummyCheck',
					'eFlashOver'
				],
				checkIconImage: function(checkbox)
				{
					this.checkImageRadio();
					this.SwitchRows(this.imageRows,checkbox.checked);
				},
				checkImageRadio: function()
				{
					if(BX('SHOW_TYPE_HTML').checked)
						BX('SHOW_TYPE_HTML').click();
					if(BX('SHOW_TYPE_IMAGE').checked)
						BX('SHOW_TYPE_IMAGE').click();
					if(BX('SHOW_TYPE_FLASH').checked)
						BX('SHOW_TYPE_FLASH').click();
				},
				changePopupadType: function(select)
				{
					switch (select.value)
					{
						case 'icon':
							if(!BX('kznc_icon_show_image_check').checked)
								this.SwitchRows(this.imageRows,false);
							this.SwitchRows(this.iconRows,true);
							break;
						default:
							this.SwitchRows(this.imageRows,true);
							this.SwitchRows(this.iconRows,false);
					}
					this.checkImageRadio();
				},
				SwitchRows: function(elements, on)
				{
					for(var i=0; i<elements.length; i++)
					{
						var el = document.getElementById(elements[i]);
						if (el)
							el.style.display = (on? '':'none');
					}
				},
				changeType: function(type)
				{
					if (!type)
						type = 'image';

					if(type == 'image')
					{
						this.SwitchRows(['eDummyFileLoaded','eFlashDummyCheck','eDummy','eFlashOver','eAltImage','eFlashUrl','eFlashFileLoaded','eFlashTrans','eFlashJs','eFlashVer','eCode'], false);
						this.SwitchRows(['eFile','eFileLoaded','eUrl','eImageAlt','eUrlTarget', 'eCodeHeader','eTitle','eTarget'], true);
					}
					else if(type == 'flash')
					{
						this.SwitchRows(['eFlashDummyCheck','eTarget','eFlashOver','eCodeHeader','eFile','eFileLoaded','eFlashUrl','eFlashJs','eFlashTrans', 'eUrl', 'eUrlTarget', 'eImageAlt','eTitle'], true);
						this.SwitchRows(['eAltImage', 'eFlashFileLoaded', 'eFlashVer','eCode'], false);
						if(document.getElementById('flash_dummy_check').checked)
							this.SwitchRows(['eDummyFileLoaded','eDummy'],true);
						if(document.getElementById('flash_overflow').checked)
							this.SwitchRows(['eUrl','eTarget'],true);
						else
							this.SwitchRows(['eUrl','eTarget'],false);
					}
					else if(type == 'html')
					{
						this.SwitchRows(['eDummyFileLoaded','eFlashDummyCheck','eDummy','eFlashOver','eFlashUrl','eFile','eFileLoaded','eFlashJs','eFlashFileLoaded','eFlashTrans',
							'eAltImage','eImageAlt','eUrl','eUrlTarget','eCodeHeader','eFlashVer',"eTitle",'eTarget'], false);
						this.SwitchRows(['eCode'], true);
					}
				}
			};
		</script>
		</td>
	</tr>

	<tr class="adm-detail-toolbar" valign="top" id="eFile" style="display:<?if(!$imageShowFlag || !in_array($str_SHOW_TYPE, array('image','flash'))):?>none<?endif?>;">
		<td><?=GetMessage("POPUPAD_BANNER_FILE")?></td>
		<td><?echo CFile::InputFile("arIMAGE", 25, $str_IMAGE_ID);?></td>
	</tr>
	<?if(intval($str_IMAGE_ID)>0):?>
		<tr class="adm-detail-toolbar" valign="top" id="eFileLoaded" style="display:<?if(!$imageShowFlag || !in_array($str_SHOW_TYPE, array('image','flash'))):?>none<?endif?>;">
			<td align="center" colspan="2">
				<?echo CKuznicaPopupadGeneral::GetContent($str_IMAGE_ID,$str_FLASH_TRANSPARENT)?>
				<input type="hidden" name="IMAGE_ID" value="<?=$str_IMAGE_ID?>"/>
			</td>
		</tr>
	<?endif;?>
	<tr class="adm-detail-toolbar" id="eFlashTrans" style="display:<?if(!$imageShowFlag || $str_SHOW_TYPE <> 'flash'):?>none<?endif?>;">
		<td><?=GetMessage('POPUPAD_BANNER_FLASH_TRANSPARENT')?></td>
		<td>
			<select id="FLASH_TRANSPARENT" name="FLASH_TRANSPARENT">
				<option value="transparent"<? if ($str_FLASH_TRANSPARENT == 'transparent') echo " selected=\"selected\""?>>transparent</option>
				<option value="opaque"<? if ($str_FLASH_TRANSPARENT == 'opaque') echo " selected=\"selected\""?>>opaque</option>
				<option value="window"<? if ($str_FLASH_TRANSPARENT == 'window') echo " selected=\"selected\""?>>window</option>
			</select>
		</td>
	</tr>
	<tr class="adm-detail-toolbar" id="eFlashDummyCheck" style="display:<?if(!$imageShowFlag || $str_SHOW_TYPE <> 'flash'):?>none<?endif?>;">
		<td><label for="flash_dummy_check"><?=GetMessage('POPUPAD_BANNER_FLASH_DUMMY_USE')?></label></td>
		<td>
			<?
			$flashDummyCheck = "N";
			if(strlen($str_DUMMY_IMAGE_ID)>0)
				$flashDummyCheck = "Y";
			echo InputType("checkbox", "FLASH_DUMMY_CHECK", "Y", $flashDummyCheck, false, "", 'id="flash_dummy_check" onClick="kzncPopupad.SwitchRows([\'eDummy\',\'eDummyFileLoaded\'],this.checked)"');
			?>
		</td>
	</tr>
	<tr class="adm-detail-toolbar" valign="top" id="eDummy" style="display:<?if(!$imageShowFlag || $str_SHOW_TYPE <> 'flash' || strlen($str_DUMMY_IMAGE_ID)==0):?>none<?endif?>;">
		<td><?=GetMessage("POPUPAD_BANNER_DUMMY_FILE")?></td>
		<td><?echo CFile::InputFile("arDUMMY_IMAGE", 25, $str_DUMMY_IMAGE_ID);?></td>
	</tr>
	<?if(intval($str_DUMMY_IMAGE_ID)>0):?>
		<tr valign="top" id="eDummyFileLoaded" style="display:<?if(!in_array(!$imageShowFlag || $str_SHOW_TYPE, array('flash'))):?>none<?endif?>;">
			<td align="center" colspan="2">
				<?echo CKuznicaPopupadGeneral::GetContent($str_DUMMY_IMAGE_ID)?>
				<input type="hidden" name="DUMMY_IMAGE_ID" value="<?=$str_DUMMY_IMAGE_ID?>"/>
			</td>
		</tr>
	<?endif;?>
	<tr class="adm-detail-toolbar" id="eFlashOver" style="display:<?if(!$imageShowFlag || $str_SHOW_TYPE <> 'flash'):?>none<?endif?>;">
		<td><label for="flash_overflow"><?=GetMessage('POPUPAD_BANNER_FLASH_OVERFLOW')?></label></td>
		<td>
			<?
			$flashOverCheck = "N";
			if(strlen($str_URL)>0)
				$flashOverCheck = "Y";
			echo InputType("checkbox", "FLASH_OVERFLOW", "Y", $flashOverCheck, false, "", 'id="flash_overflow" onClick="kzncPopupad.SwitchRows([\'eUrl\',\'eTarget\'],this.checked)"');
			?>
		</td>
	</tr>

	<tr class="adm-detail-toolbar" valign="top" id="eCode" style="display:<?if(!$imageShowFlag || $str_SHOW_TYPE <> 'html'):?>none<?endif?>;">
		<td align="center" colspan="2">
			<table width="95%" cellspacing="0" border="0" cellpadding="0">
				<?if(CModule::IncludeModule("fileman")):?>
				<tr valign="top">
					<td align="center" colspan="2"><?
					if (defined('BX_PUBLIC_MODE') && BX_PUBLIC_MODE == 1)
						CFileMan::AddHTMLEditorFrame("CODE", $str_CODE, "CODE_TYPE", $str_CODE_TYPE, array('height' => 450, 'width' => '100%'), "N", 0, "", "onfocus=\"t=this\"");
					else
						CFileMan::AddHTMLEditorFrame("CODE", $str_CODE, "CODE_TYPE", $str_CODE_TYPE, 300, "N", 0, "", "onfocus=\"t=this\"");
				?></td>
				</tr>
				<?else:?>
					<tr valign="top">
						<td align="center" colspan="2"><? echo InputType("radio", "CODE_TYPE","text",$str_CODE_TYPE,false)?><?echo GetMessage("POPUPAD_AD_TEXT")?>/&nbsp;<? echo InputType("radio","CODE_TYPE","html",$str_CODE_TYPE,false)?>&nbsp;HTML&nbsp;</td>
					</tr>
					<tr>
						<td align="center"><textarea style="width:100%" rows="30" name="CODE" onfocus="t=this"><?echo $str_CODE?></textarea></td>
					</tr>
				<?endif;?>
			</table></td>
	</tr>
	<tr id="eUrl" style="display:<?if($str_SHOW_TYPE == "html" || ($str_SHOW_TYPE == 'flash' && $flashOverCheck !="Y")):?>none<?endif?>;">
		<td><?echo GetMessage("POPUPAD_BANNER_URL")?></td>
		<td>
			<input type="text" name="URL" value="<?echo $str_URL;?>" size="30">
		</td>
	</tr>
	<?/*<tr id="eRedir" style="display:<?if($str_SHOW_TYPE == "html" || ($str_SHOW_TYPE == 'flash' && $flashOverCheck !="Y")):?>none<?endif?>;">
		<td width="40%"><label for="ban_redir"><?echo GetMessage("POPUPAD_BANNER_REDIRECT")?></label></td>
		<td width="60%"><?echo InputType("checkbox", "INFO[BANNER_REDIRECT]", "Y", $str_INFO["BANNER_REDIRECT"], false, "", 'id="ban_redir"  ');?></td>
	</tr>*/?>
	<tr id="eTarget" style="display:<?if($str_SHOW_TYPE == "html" || ($str_SHOW_TYPE == 'flash' && $flashOverCheck !="Y")):?>none<?endif?>;">
		<td><?echo GetMessage("POPUPAD_BANNER_TARGET")?></td>
		<td>
			<?
			$ref = array(
				GetMessage("POPUPAD_BANNER_TARGET_SELF"),
				GetMessage("POPUPAD_BANNER_TARGET_BLANK"),
				GetMessage("POPUPAD_BANNER_TARGET_PARENT"),
				GetMessage("POPUPAD_BANNER_TARGET_TOP"),
			);
			$ref_id = array(
				"_self",
				"_blank",
				"_parent",
				"_top"
			);
			echo SelectBoxFromArray("INFO[TARGET]", array("REFERENCE" => $ref, "REFERENCE_ID" => $ref_id),$str_INFO["TARGET"]);
			?>
		</td>
	</tr>
	<tr id="eTitle" style="display:<?if($str_SHOW_TYPE == "html"):?>none<?endif?>;">
		<td><?echo GetMessage("POPUPAD_BANNER_TITLE")?></td>
		<td><input type="text" name="INFO[TITLE]" value="<?echo $str_INFO["TITLE"];?>" size="30"></td>
	</tr>
	

  <!--  HTML-код строк таблицы -->


<?
//********************
// вторая закладка - таргетинг
//********************
$tabControl->BeginNextTab();
?>
 <tr>
	 <td width="40%"><?=GetMessage("POPUPAD_BANNER_SHOW_ON")?></td>
	 <td width="60%">
		 <textarea name="SHOW_ON" cols="30" rows="5"><?=$str_SHOW_ON?></textarea>
	 </td>
 </tr>
 <tr>
	 <td width="40%"><?=GetMessage("POPUPAD_BANNER_SHOW_OFF")?></td>
	 <td width="60%">
		 <textarea name="SHOW_OFF" cols="30" rows="5"><?=$str_SHOW_OFF?></textarea>
	 </td>
 </tr>
<?
//********************
// третья закладка - свойства показа
//********************
$tabControl->BeginNextTab();
?>
 <tr>
	 <td width="40%"><?=GetMessage("POPUPAD_BANNER_SHOW_TIMER")?></td>
	 <td width="60%">
		 <input name="INFO[SHOW_TIMER]" type="text" value="<?=$str_INFO['SHOW_TIMER']?>" />
	 </td>
 </tr>
 <tr>
	 <td width="40%"><?=GetMessage("POPUPAD_BANNER_SHOW_PER_TIME")?></td>
	 <td width="60%">
		 <input name="INFO[SHOW_PER_TIME]" type="text" value="<?=(strlen($str_INFO['SHOW_PER_TIME']) > 0) ? $str_INFO['SHOW_PER_TIME'] : ''?>" />
	 </td>
 </tr>

 <?
// завершение формы - вывод кнопок сохранения изменений
$tabControl->Buttons(
  array(
    "disabled"=>($REK_RIGHT<"W"),
    "back_url"=>"popupad_banners_list.php?lang=".LANG,
  )
);
?>
<?
// завершаем интерфейс закладки
$tabControl->End();
?>
<?
// дополнительное уведомление об ошибках - вывод иконки около поля, в котором возникла ошибка
$tabControl->ShowWarnings("post_form", $message);
?>
<?echo BeginNote();?>
<span class="required">*</span><?echo GetMessage("REQUIRED_FIELDS")?>
<?echo EndNote();?>
<?// завершение страницы
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>
