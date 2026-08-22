<?
##############################################
# Alexkova: rklite                           #
# Copyright (c) 2011 Alexkova               #
# http://www.alexkova.ru                     #
# mailto:kova@alexkova.ru                    #
##############################################
$MODULE_ID = 'alexkova.rklite';
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
	array("DIV" => "edit1", "TAB" => GetMessage("REK_TAB_DEFAULT"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("REK_TAB_DEFAULT_TITLE")),
	array("DIV" => "edit2", "TAB" => GetMessage("REK_TAB_TARGETING"), "ICON"=>"main_user_edit", "TITLE"=> GetMessage("REK_TAB_TARGETING_TITLE")),
	array("DIV" => "edit3", "TAB" => GetMessage("REK_TAB_STAT"), "ICON"=>"main_user_edit", "TITLE"=> GetMessage("REK_TAB_STAT_TITLE")),
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
	if($FLASH_OVERFLOW !="Y" && $SHOW_TYPE=="flash"){
		$URL = "";
		$INFO["NOFOLLOW"] = '';
	}
	if($ACTIVE != "Y")
		$ACTIVE = 'N';
	//$arIMAGE["MODULE_ID"] = "rklite";
	$oBanner = new CKuznica_rklite();
	
	
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
		"BANTYPE_ID"	 => $BANTYPE_ID,
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
		// если сохранение прошло удачно - перенаправим на новую страницу
		// (в целях защиты от повторной отправки формы нажатием кнопки "Обновить" в браузере)
		if ($apply != "")
			// если была нажата кнопка "Применить" - отправляем обратно на форму.
			LocalRedirect("/bitrix/admin/rklite_banner_edit.php?ID=".$ID."&mess=ok&lang=".LANG."&".$tabControl->ActiveTabParam());
		else
			// если была нажата кнопка "Сохранить" - отправляем к списку элементов.
			LocalRedirect("/bitrix/admin/rklite_banners_list.php?lang=".LANG);
	}
	else
	{
		// если в процессе сохранения возникли ошибки - получаем текст ошибки и меняем вышеопределённые переменные
		if($e = $APPLICATION->GetException())
			$message = new CAdminMessage(GetMessage("BANNER_SAVE_ERROR"), $e);
		$bVarsFromForm = true;
	}
}
$str_SHOW_TYPE = 'image';
$str_ACTIVE = "Y";
if($bVarsFromForm)
	//$DB->InitTableVarsForEdit("b_rklite_banner", "", "str_");
		extract($arFields,EXTR_PREFIX_IF_EXISTS,'str');
if($ID>0)
{
	$arBanner = CKuznica_rklite::GetByID($ID);
	if(!$arBanner->ExtractFields("str_"))
		$ID=0;

	$str_BANTYPE_ID = $str_TYPE;
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
if(!$str_INFO= unserialize(htmlspecialchars_decode($str_INFO)))
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

//secho "<pre>"; print_r($str_BANTYPE);echo "</pre>";die();

$APPLICATION->SetTitle(($ID>0? GetMessage("BANNER_TITLE_EDIT").$ID : GetMessage("BANNER_TITLE_ADD")));
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php"); // второй общий пролог
?>
<?
// конфигурация административного меню
$aMenu = array(
	array(
		"TEXT"=>GetMessage("BANNER_LIST"),
		"TITLE"=>GetMessage("BANNER_LIST_TITLE"),
		"LINK"=>"rklite_banners_list.php?lang=".LANG,
		"ICON"=>"btn_list",
	),
	array(
		"TEXT"	=> GetMessage("BANNER_NEW"),
		"TITLE"	=> GetMessage("BANNER_NEW_TITLE"),
		"LINK"	=> "rklite_banner_edit.php?lang=".LANGUAGE_ID,
		"ICON"	=> "btn_new"
		),
	array(
		"TEXT"	=> GetMessage("BANNER_DELETE"),
		"TITLE"	=> GetMessage("BANNER_DELETE_TITLE"),
		"LINK"	=> "javascript:if(confirm('".GetMessage("BANNER_DELETE_CONFIRM")."'))window.location='rklite_banners_list.php?ID=".$ID."&lang=".LANGUAGE_ID."&sessid=".bitrix_sessid()."&action=delete';",
		"ICON"	=> "btn_delete"
	)
);

$context = new CAdminContextMenu($aMenu);

// выведем меню
$context->Show();

if($_REQUEST["mess"] == "ok" && $ID>0)
  CAdminMessage::ShowMessage(array("MESSAGE"=>GetMessage("BANNER_SAVED"), "TYPE"=>"OK"));

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
		<td width="40%"><label for="active"><?echo GetMessage("BANNER_ACTIVE")?></label></td>
		<td width="60%">
			<?
			echo InputType("checkbox", "ACTIVE", "Y", $str_ACTIVE, false, "", 'id="active"');
			?>
		</td>
	</tr>
	 <tr>
		<td width="40%"><span class="required">*</span><?echo GetMessage("BANNER_SITE")?></td>
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
	<?/*<tr>
		<td width="40%"><label for="redirect"><?echo GetMessage("BANNER_REDIRECT")?></label></td>
		<td width="60%">
			<?
			echo InputType("checkbox", "INFO[REDIRECT]", "Y", $str_INFO["REDIRECT"], false, "", 'id="redirect"');
			?>
		</td>
	</tr>
	 *
	 */?>
	<tr>
		<td><?=GetMessage("SHOW_DATE")." (".CSite::GetDateFormat("SHORT")."):"?></td>
		<td><?echo CalendarPeriod("SHOW_FROM", $str_SHOW_FROM, "SHOW_TO", $str_SHOW_TO, "post_form");?></td>
	</tr>
	<tr>
		<td><span class="required">*</span><?echo GetMessage("BANNER_NAME")?></td>
		<td><input type="text" name="NAME" value="<?echo $str_NAME;?>" size="30" maxlength="100"></td>
	</tr>
	<tr>
		<td><?echo GetMessage("BANNER_WEIGHT")?></td>
		<td><input type="text" name="WEIGHT" value="<?echo $str_WEIGHT;?>" size="10" maxlength="10"></td>
	</tr>
	<tr>
		<td><span class="required">*</span><?echo GetMessage("BANNER_TYPE")?></td>
		<td>
			<?
			$ref = array();
			$ref_id = array();
			$rsTypes = CKuznica_rklite::GetTypeList(array(),array("ACTIVE"=>"Y"));
			while ($arType = $rsTypes->Fetch())
			{
				$ref[] = "[".$arType["CODE"]."] ".htmlspecialcharsbx($arType["NAME"]);
				$ref_id[] = $arType["ID"];
			}
			//echo "<pre>"; print_r($GLOBALS);echo "</pre>";die();

			echo SelectBoxFromArray("BANTYPE_ID", array("REFERENCE" => $ref, "REFERENCE_ID" => $ref_id),$str_BANTYPE_ID,GetMessage("SELECT_BANTYPE"));
		?>
		</td>
	</tr>
	<tr class="heading">
		<td colspan="2"><b><?=GetMessage("BANNER_SHOW")?></b></td>
	</tr>

	<tr valign="top">
		<td>
			<?=GetMessage("BANNER_SHOW_TYPE")?>
		</td>
		<td align="left">
			<input type="radio" onclick="changeType('image');" id="SHOW_TYPE_IMAGE" name="SHOW_TYPE" value="image"<?if (((($ID && $str_SHOW_TYPE=='image')|| !$ID) && !isset($SHOW_TYPE)) || (isset($SHOW_TYPE) && ($SHOW_TYPE == 'image'))): ?> checked="checked"<? endif; ?>>
			<label for="SHOW_TYPE_IMAGE"><?=GetMessage("BANNER_SHOW_IMAGE")?></label><br>
			<input type="radio" onclick="changeType('flash');" id="SHOW_TYPE_FLASH" name="SHOW_TYPE" value="flash"<?if (($ID && $str_SHOW_TYPE=='flash') || (isset($SHOW_TYPE) && ($SHOW_TYPE == 'flash'))): ?> checked="checked"<? endif; ?>>
			<label for="SHOW_TYPE_FLASH"><?=GetMessage("BANNER_SHOW_FLASH")?></label><br>

			<input type="radio" onclick="changeType('html');" id="SHOW_TYPE_HTML" name="SHOW_TYPE" value="html"<?if (($ID && $str_SHOW_TYPE=='html') || (isset($SHOW_TYPE) && ($SHOW_TYPE == 'html'))): ?> checked="checked"<? endif; ?>>
			<label for="SHOW_TYPE_HTML"><?=GetMessage("BANNER_SHOW_HTML")?></label>

		<script type="text/javascript">
			function SwitchRows(elements, on)
			{
				for(var i=0; i<elements.length; i++)
				{
					var el = document.getElementById(elements[i]);
					if (el)
						el.style.display = (on? '':'none');
				}
			}

			function CheckRedirSet(ob)
			{
				var redir = document.getElementById('ban_redir');
				if(ob.checked && !redir.checked)
				{
					redir.checked = 'checked';
				}
			}
			function CheckRedir(ob)
			{
				var stat_click = document.getElementById('ban_stat_click');
				if(stat_click.checked && !ob.checked)
				{
					if(confirm('<?=GetMessage("RK_REDIR_ERROR_2")?>'))
					{
						stat_click.checked = '';
						fix('click');
					}else{
						ob.checked = 'checked';
					}
				}
			}
			var changeType = function(type)
			{
				if (!type)
					type = 'image';

				if(type == 'image')
				{
					SwitchRows(['eDummyFileLoaded','eFlashDummyCheck','eDummy','eFlashOver','eAltImage','eFlashUrl','eFlashFileLoaded','eFlashTrans','eFlashJs','eFlashVer','eCode'], false);
					SwitchRows(['eFile','eFileLoaded','eUrl','eNoFollow','eImageAlt','eUrlTarget', 'eCodeHeader','eTitle','eTarget'], true);
				}
				else if(type == 'flash')
				{
					SwitchRows(['eFlashDummyCheck','eTarget','eFlashOver','eCodeHeader','eFile','eFileLoaded','eFlashUrl','eFlashJs','eFlashTrans', 'eUrl', 'eUrlTarget', 'eImageAlt','eTitle'], true);
					SwitchRows(['eAltImage', 'eFlashFileLoaded', 'eFlashVer','eCode'], false);
					if(document.getElementById('flash_dummy_check').checked)
						SwitchRows(['eDummyFileLoaded','eDummy'],true);
					if(document.getElementById('flash_overflow').checked)
						SwitchRows(['eUrl','eTarget','eNoFollow'],true);
					else
						SwitchRows(['eUrl','eTarget','eNoFollow'],false);
				}
				else if(type == 'html')
				{
					SwitchRows(['eDummyFileLoaded','eFlashDummyCheck','eDummy','eFlashOver','eFlashUrl','eFile','eFileLoaded','eFlashJs','eFlashFileLoaded','eFlashTrans',
						'eAltImage','eImageAlt','eUrl','eNoFollow','eUrlTarget','eCodeHeader','eFlashVer',"eTitle",'eTarget'], false);
					SwitchRows(['eCode'], true);
				}
			}
			var fix = function(type)
			{
				var ths2;
				if(type=='click')
					ths2 = document.getElementById('ban_stat_show');
				else
					ths2 = document.getElementById('ban_stat_click');
				var ths = document.getElementById('ban_stat_'+type);
				var ban_redir = document.getElementById('ban_redir');
				if(type=='click' && !ban_redir.checked){
					if(ths.checked)
					{
						if(!confirm('<?=GetMessage('RK_REDIR_ERROR_1')?>')){
							ths.checked =  '';
							return false;
						}
						else
							ban_redir.checked  = 'checked';
					}
				}
				var uheader = document.getElementById('uheader');
				var ushowTR = document.getElementById('banner_ushow_tr');
				var ushow = document.getElementById('ban_ushow');
				var ushow_typeTR = document.getElementById('banner_ushow_type');
				var ushow_cookie_time = document.getElementById('banner_ushow_cookie_time');
				var ushow_cookie= document.getElementById('ban_ushow_cookie');
				if(ths.checked && !ths2.checked){
					uheader.style.display = '';
					ushowTR.style.display = '';
					if(ushow.checked){
						ushow_typeTR.style.display = '';
						ushow_cookie_time.style.display =ushow_cookie.checked?'':'none';
					}else{
						ushow_typeTR.style.display = 'none';
					}
				}else if(!ths2.checked){
					uheader.style.display = 'none';
					ushowTR.style.display = 'none';
					ushow_typeTR.style.display = 'none';
					ushow_cookie_time.style.display = 'none';
				}
			}
			var onlyUnique = function (type)
			{
				var ths = document.getElementById('ban_u'+type);
				var ushow_typeTR = document.getElementById('banner_u'+type+'_type');
				var ushow_cookie_time = document.getElementById('banner_u'+type+'_cookie_time');
				var ushow_cookie= document.getElementById('ban_u'+type+'_cookie');
				if(ths.checked){
					ushow_typeTR.style.display = '';
					ushow_cookie_time.style.display =ushow_cookie.checked?'':'none';
				}else{
					ushow_typeTR.style.display = 'none';
					ushow_cookie_time.style.display = 'none';
				}
			}
			var cookieTime = function(type)
			{
				var ushow_cookie= document.getElementById('ban_u'+type+'_cookie');
				var ushow_cookie_time = document.getElementById('banner_u'+type+'_cookie_time');
				if(ushow_cookie.checked)
				{
					ushow_cookie_time.style.display='';
				}
				else{
					ushow_cookie_time.style.display='none';
				}
			}

		</script>
		</td>
	</tr>
	<tr valign="top" id="eFile" style="display:<?if(!in_array($str_SHOW_TYPE, array('image','flash'))):?>none<?endif?>;">
		<td><?=GetMessage("BANNER_FILE")?></td>
		<td><?echo CFile::InputFile("arIMAGE", 25, $str_IMAGE_ID);?></td>
	</tr>
	<?if(intval($str_IMAGE_ID)>0):?>
		<tr valign="top" id="eFileLoaded" style="display:<?if(!in_array($str_SHOW_TYPE, array('image','flash'))):?>none<?endif?>;">
			<td align="center" colspan="2">
				<?echo CKuznica_rklite_general::GetContent($str_IMAGE_ID,$str_FLASH_TRANSPARENT)?>
				<input type="hidden" name="IMAGE_ID" value="<?=$str_IMAGE_ID?>"/>
			</td>
		</tr>
	<?endif;?>
	<tr id="eFlashTrans" style="display:<?if($str_SHOW_TYPE <> 'flash'):?>none<?endif?>;">
		<td><?=GetMessage('BANNER_FLASH_TRANSPARENT')?></td>
		<td>
			<select id="FLASH_TRANSPARENT" name="FLASH_TRANSPARENT">
				<option value="transparent"<? if ($str_FLASH_TRANSPARENT == 'transparent') echo " selected=\"selected\""?>>transparent</option>
				<option value="opaque"<? if ($str_FLASH_TRANSPARENT == 'opaque') echo " selected=\"selected\""?>>opaque</option>
				<option value="window"<? if ($str_FLASH_TRANSPARENT == 'window') echo " selected=\"selected\""?>>window</option>
			</select>
		</td>
	</tr>
	<tr id="eFlashDummyCheck" style="display:<?if($str_SHOW_TYPE <> 'flash'):?>none<?endif?>;">
		<td><label for="flash_dummy_check"><?=GetMessage('BANNER_FLASH_DUMMY_USE')?></label></td>
		<td>
			<?
			$flashDummyCheck = "N";
			if(strlen($str_DUMMY_IMAGE_ID)>0)
				$flashDummyCheck = "Y";
			echo InputType("checkbox", "FLASH_DUMMY_CHECK", "Y", $flashDummyCheck, false, "", 'id="flash_dummy_check" onClick="SwitchRows([\'eDummy\',\'eDummyFileLoaded\'],this.checked)"');
			?>
		</td>
	</tr>
	<tr valign="top" id="eDummy" style="display:<?if($str_SHOW_TYPE <> 'flash' || strlen($str_DUMMY_IMAGE_ID)==0):?>none<?endif?>;">
		<td><?=GetMessage("BANNER_DUMMY_FILE")?></td>
		<td><?echo CFile::InputFile("arDUMMY_IMAGE", 25, $str_DUMMY_IMAGE_ID);?></td>
	</tr>
	<?if(intval($str_DUMMY_IMAGE_ID)>0):?>
		<tr valign="top" id="eDummyFileLoaded" style="display:<?if(!in_array($str_SHOW_TYPE, array('flash'))):?>none<?endif?>;">
			<td align="center" colspan="2">
				<?echo CKuznica_rklite_general::GetContent($str_DUMMY_IMAGE_ID)?>
				<input type="hidden" name="DUMMY_IMAGE_ID" value="<?=$str_DUMMY_IMAGE_ID?>"/>
			</td>
		</tr>
	<?endif;?>
	<tr id="eFlashOver" style="display:<?if($str_SHOW_TYPE <> 'flash'):?>none<?endif?>;">
		<td><label for="flash_overflow"><?=GetMessage('BANNER_FLASH_OVERFLOW')?></label></td>
		<td>
			<?
			$flashOverCheck = "N";
			if(strlen($str_URL)>0)
				$flashOverCheck = "Y";
			echo InputType("checkbox", "FLASH_OVERFLOW", "Y", $flashOverCheck, false, "", 'id="flash_overflow" onClick="SwitchRows([\'eNoFollow\',\'eUrl\',\'eTarget\'],this.checked)"');
			?>
		</td>
	</tr>
	<tr id="eUrl" style="display:<?if($str_SHOW_TYPE == "html" || ($str_SHOW_TYPE == 'flash' && $flashOverCheck !="Y")):?>none<?endif?>;">
		<td><?echo GetMessage("BANNER_URL")?></td>
		<td>
			<input type="text" name="URL" value="<?echo $str_URL;?>" size="30">
		</td>
	</tr>
	<tr id="eNoFollow" style="display:<?if($str_SHOW_TYPE == "html" || ($str_SHOW_TYPE == 'flash' && $flashOverCheck !="Y")):?>none<?endif?>;">
		<td><label for="urlNoFollow"><?echo GetMessage("RKLITE_BANNER_NOFOLLOW")?></label></td>
		<td>
			<?
			$urlNoFollow = "N";
			if(strlen($str_INFO["NOFOLLOW"])>0)
				$urlNoFollow = "Y";
			echo InputType("checkbox", "INFO[NOFOLLOW]", "Y", $urlNoFollow, false, "", 'id="urlNoFollow" ');
			?>
		</td>
	</tr>
	<tr id="eTarget" style="display:<?if($str_SHOW_TYPE == "html" || ($str_SHOW_TYPE == 'flash' && $flashOverCheck !="Y")):?>none<?endif?>;">
		<td><?echo GetMessage("BANNER_TARGET")?></td>
		<td>
			<?
			$ref = array(
				GetMessage("BANNER_TARGET_SELF"),
				GetMessage("BANNER_TARGET_BLANK"),
				GetMessage("BANNER_TARGET_PARENT"),
				GetMessage("BANNER_TARGET_TOP"),
			);
			$ref_id = array(
				"_self",
				"_blank",
				"_parent",
				"_top"
			);
			//echo "<pre>"; print_r($GLOBALS);echo "</pre>";die();
			echo SelectBoxFromArray("INFO[TARGET]", array("REFERENCE" => $ref, "REFERENCE_ID" => $ref_id),$str_INFO["TARGET"]);
			?>
		</td>
	</tr>
	<tr id="eTitle" style="display:<?if($str_SHOW_TYPE == "html"):?>none<?endif?>;">
		<td><?echo GetMessage("BANNER_TITLE")?></td>
		<td><input type="text" name="INFO[TITLE]" value="<?echo $str_INFO["TITLE"];?>" size="30"></td>
	</tr>
	<tr valign="top" id="eCode" style="display:<?if($str_SHOW_TYPE <> 'html'):?>none<?endif?>;">
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
						<td align="center" colspan="2"><? echo InputType("radio", "CODE_TYPE","text",$str_CODE_TYPE,false)?><?echo GetMessage("AD_TEXT")?>/&nbsp;<? echo InputType("radio","CODE_TYPE","html",$str_CODE_TYPE,false)?>&nbsp;HTML&nbsp;</td>
					</tr>
					<tr>
						<td align="center"><textarea style="width:100%" rows="30" name="CODE" onfocus="t=this"><?echo $str_CODE?></textarea></td>
					</tr>
				<?endif;?>
			</table></td>
	</tr>



  <!--  HTML-код строк таблицы -->


<?
//********************
// вторая закладка - таргетинг
//********************
$tabControl->BeginNextTab();
?>
 <tr>
	 <td width="40%"><?=GetMessage("BANNER_SHOW_ON")?></td>
	 <td width="60%">
		 <textarea name="SHOW_ON" cols="30" rows="5"><?=$str_SHOW_ON?></textarea>
	 </td>
 </tr>
 <tr>
	 <td width="40%"><?=GetMessage("BANNER_SHOW_OFF")?></td>
	 <td width="60%">
		 <textarea name="SHOW_OFF" cols="30" rows="5"><?=$str_SHOW_OFF?></textarea>
	 </td>
 </tr>
<tr>
	<td><?echo GetMessage("RKLITE_BANNER_REQUIRED_KEYWORDS")?></td>
	<td>
		<input type="text" name="INFO[REQUIRED_KEYWORDS]" value="<?echo $str_INFO["REQUIRED_KEYWORDS"];;?>" size="30">
	</td>
</tr>
<tr>
	<td><?echo GetMessage("RKLITE_BANNER_DESIRED_KEYWORDS")?></td>
	<td>
		<input type="text" name="INFO[DESIRED_KEYWORDS]" value="<?echo $str_INFO["DESIRED_KEYWORDS"];;?>" size="30">
	</td>
</tr>
 <?
//********************
// Третья закладка - статистика
//********************
$tabControl->BeginNextTab();
?>

	<tr>
		<td width="40%"><label for="ban_stat_show"><?echo GetMessage("BANNER_STAT_SHOW")?></label></td>
		<td width="60%">
			<?echo InputType("checkbox", "INFO[INC_SHOW_COUNT]", "Y", $str_INFO["INC_SHOW_COUNT"], false, "", 'id="ban_stat_show" onClick="fix(\'show\');"');?>
		</td>
	</tr>
	<tr>
		<td width="40%"><label for="ban_stat_click"><?echo GetMessage("BANNER_STAT_CLICK")?></label></td>
		<td width="60%">
			<?echo InputType("checkbox", "INFO[INC_CLICK_COUNT]", "Y", $str_INFO["INC_CLICK_COUNT"], false, "", 'id="ban_stat_click" onclick="fix(\'click\')"');?>
		</td>
	</tr>
	<tr>
		<td width="40%"><label for="ban_redir"><?echo GetMessage("BANNER_REDIRECT")?></label></td>
		<td width="60%"><?echo InputType("checkbox", "INFO[BANNER_REDIRECT]", "Y", $str_INFO["BANNER_REDIRECT"], false, "", 'id="ban_redir"  onclick="CheckRedir(this)"');?></td>
	</tr>
	<tr class="heading" id="uheader" style='display:<?if(!$str_INFO["INC_SHOW_COUNT"] && !$str_INFO["INC_CLICK_COUNT"]) echo 'none';?>'>
		<td colspan="2"><b><?=GetMessage("BANNER_STAT_UNIQUE_TITLE")?></b></td>
	</tr>
	<tr id="banner_ushow_tr" style='display:<?if(!$str_INFO["INC_SHOW_COUNT"] && !$str_INFO["INC_CLICK_COUNT"]) echo 'none';?>'>
		<td width="40%"><label for="ban_ushow"><?echo GetMessage("BANNER_UNIQUE")?></label></td>
		<td width="60%"><?echo InputType("checkbox", "INFO[BANNER_USHOW]", "Y", $str_INFO["BANNER_USHOW"], false, "", 'id="ban_ushow" onClick="onlyUnique(\'show\')"');?></td>
	</tr>
	<tr id="banner_ushow_type" style='display:<?if(!$str_INFO["BANNER_USHOW"]) echo 'none';?>'>
		<td width="40%"><label ><?echo GetMessage("BANNER_UNIQUE_TYPE")?></label></td>
		<td width="60%">
			<?echo InputType("radio", "INFO[BANNER_USHOW_TYPE]", "S", $str_INFO["BANNER_USHOW_TYPE"], false, "", 'id="ban_ushow_sess" onClick="cookieTime(\'show\');"');?><label for="ban_ushow_sess"><?=GetMessage('BANNER_UNIQUE_SESS');?></label><br/>
			<?echo InputType("radio", "INFO[BANNER_USHOW_TYPE]", "C", $str_INFO["BANNER_USHOW_TYPE"], false, "", 'id="ban_ushow_cookie" onClick="cookieTime(\'show\');"');?><label for="ban_ushow_cookie"><?=GetMessage('BANNER_UNIQUE_COOKIE');?></label><br/>
		</td>
	</tr>
	<tr id="banner_ushow_cookie_time" style='display:<?if(!$str_INFO["BANNER_USHOW"] || $str_INFO["BANNER_USHOW_TYPE"]!='C') echo 'none';?>'>
		<td width="40%"><?echo GetMessage("BANNER_UNIQUE_COOKIE_TIME")?></td>
		<td width="60%"><input type="text" name="INFO[BANNER_USHOW_COOKIE_TIME]" value="<?echo $str_INFO["BANNER_USHOW_COOKIE_TIME"]>0?$str_INFO["BANNER_USHOW_COOKIE_TIME"]:'3600';?>" size="5"></td>
	</tr>
<?
// завершение формы - вывод кнопок сохранения изменений
$tabControl->Buttons(
  array(
    "disabled"=>($REK_RIGHT<"W"),
    "back_url"=>"rklite_banners_list.php?lang=".LANG,
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