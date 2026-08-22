<?
##############################################
# Alexkova: rklite                           #
# Copyright (c) 20011 Alexkova               #
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
$bVarsFromForm = false;		// флаг "ƒанные получены с формы", обозначающий, что выводимые данные получены с формы, а не из Ѕƒ.

$aTabs = array(
  array("DIV" => "edit1", "TAB" => GetMessage("REK_TAB_DEFAULT"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("REK_TAB_DEFAULT_TITLE")),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);




if(
    $REQUEST_METHOD == "POST" // проверка метода вызова страницы
    &&
    ($save!="" || $apply!="") // проверка нажати€ кнопок "—охранить" и "ѕрименить"
    &&
    $REK_RIGHT=="W"          // проверка наличи€ прав на запись дл€ модул€
    &&
    check_bitrix_sessid()     // проверка идентификатора сессии
)
{
	if($ACTIVE != "Y")
		$ACTIVE = 'N';
	if(intval($SORT) == 0)
		$SORT = 500;
	$oBanner = new CKuznica_rklite();
	$arFields = Array(
		"NAME"	=>$NAME,
		"CODE" => $CODE,
		"SORT"	=>$SORT,
		"ACTIVE"=>$ACTIVE,
		"DESCRIPTION"=>$DESCRIPTION,
	);

	if($ID > 0)
	{
		$res = $oBanner->UpdateType($ID, $arFields);
	}
	else
	{
		$ID = $oBanner->AddType($arFields);
		$res = ($ID > 0);
	}
	if($res)
	{
		// если сохранение прошло удачно - перенаправим на новую страницу
		if ($apply != "")
			// если была нажата кнопка "ѕрименить" - отправл€ем обратно на форму.
			LocalRedirect("/bitrix/admin/rklite_bantype_edit.php?ID=".$ID."&mess=ok&lang=".LANG."&".$tabControl->ActiveTabParam());
		else
			// если была нажата кнопка "—охранить" - отправл€ем к списку элементов.
			LocalRedirect("/bitrix/admin/rklite_bantype_list.php?lang=".LANG);
	}
	else
	{
		// если в процессе сохранени€ возникли ошибки - получаем текст ошибки и мен€ем вышеопределЄнные переменные
		if($e = $APPLICATION->GetException())
		$message = new CAdminMessage(GetMessage("BANTYPE_SAVE_ERROR"), $e);
		$bVarsFromForm = true;
	}
}
if($ID>0)
{
	$arBanner = CKuznica_rklite::GetTypeByID($ID);
	if(!$arBanner->ExtractFields("str_"))
		$ID=0;
}
if($bVarsFromForm)
	$DB->InitTableVarsForEdit("b_rklite_bantype", "", "str_");

if($ID==0)
{
	$str_ACTIVE = 'Y';
	$str_SORT = 500;
}

$APPLICATION->SetTitle(($ID>0? GetMessage("BANTYPE_TITLE_EDIT").$ID : GetMessage("BANTYPE_TITLE_ADD")));

?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php"); // второй общий пролог
?>
<?
// конфигураци€ административного меню
$aMenu = array(
  array(
    "TEXT"=>GetMessage("BANTYPE_LIST"),
    "TITLE"=>GetMessage("BANTYPE_LIST_TITLE"),
    "LINK"=>"rklite_bantype_list.php?lang=".LANG,
    "ICON"=>"btn_list",
  ),
	array(
		"TEXT"	=> GetMessage("BANTYPE_DELETE"),
		"TITLE"	=> GetMessage("BANTYPE_DELETE_TITLE"),
		"LINK"	=> "javascript:if(confirm('".GetMessage("BANTYPE_DELETE_CONFIRM")."'))window.location='rklite_bantype_list.php?ID=".$ID."&lang=".LANGUAGE_ID."&sessid=".bitrix_sessid()."&action=delete';",
		"ICON"	=> "btn_delete"
	)
);

$context = new CAdminContextMenu($aMenu);

// выведем меню
$context->Show();

if($_REQUEST["mess"] == "ok" && $ID>0)
  CAdminMessage::ShowMessage(array("MESSAGE"=>GetMessage("BANTYPE_SAVED"), "TYPE"=>"OK"));

if($message)
  echo $message->Show();
elseif($oBanner->LAST_ERROR!="")
  CAdminMessage::ShowMessage($oBanner->LAST_ERROR);

?>

<form method="POST" action="<?echo $APPLICATION->GetCurPage()?>" name="post_form">
<?// проверка идентификатора сессии ?>
<?echo bitrix_sessid_post();?>
<input type="hidden" name="lang" value="<?=LANG?>">
<input type="hidden" name="action" value="<?=htmlspecialcharsbx($action)?>">
<?if($ID>0 && !$bCopy):?>
  <input type="hidden" name="ID" value="<?=$ID?>">
<?endif;?>
<?
// отобразим заголовки закладок
$tabControl->Begin();
?>
<?
//********************
// перва€ закладка - форма редактировани€ баннера
//********************
$tabControl->BeginNextTab();
?>
	<tr>
		<td width="40%"><?if(!$str_CODE):?><span class="required">*</span><?endif;?><?echo GetMessage("BANTYPE_CODE")?></td>
		<td width="60%">
			<?if($ID == 0):?>
				<input type="text" name="CODE" value="<?echo $str_CODE;?>" size="30" maxlength="100">
			<?else:?>
				<?=$str_CODE?>
			<?endif;?>
		</td>
	</tr>
	<tr>
		<td width="40%"><label for="active"><?echo GetMessage("BANTYPE_ACTIVE")?></label></td>
		<td width="60%">
			<?
			echo InputType("checkbox", "ACTIVE", "Y", $str_ACTIVE, false, "", 'id="active"');
			?>
		</td>
	</tr>
	<tr>
		<td width="40%"><?echo GetMessage("BANTYPE_SORT")?></td>
		<td width="60%">
			<input type="text" name="SORT" value="<?=$str_SORT?>" size="6" maxlength="18">
		</td>
	</tr>
	<tr>
		<td width="40%"><span class="required">*</span><?echo GetMessage("BANTYPE_NAME")?></td>
		<td width="60%"><input type="text" name="NAME" value="<?echo $str_NAME;?>" size="30" maxlength="100"></td>
	</tr>
	<tr>
		<td width="40%"><?echo GetMessage("BANTYPE_DESCRIPTION")?></td>
		<td width="60%">
			<textarea cols="45" name="DESCRIPTION" rows="8" maxlength="2000"><?=$str_DESCRIPTION?></textarea>
		</td>
	</tr>

  <!--  HTML-код строк таблицы -->


<?
//********************
// втора€ закладка - параметры автоматической генерации рассылки
//********************
$tabControl->BeginNextTab();
?>

<?
// завершение формы - вывод кнопок сохранени€ изменений
$tabControl->Buttons(
  array(
    "disabled"=>($REK_RIGHT<"W"),
    "back_url"=>"rklite_bantype_list.php?lang=".LANG,
  )
);
?>
<?
// завершаем интерфейс закладки
$tabControl->End();
?>
<?
// дополнительное уведомление об ошибках - вывод иконки около пол€, в котором возникла ошибка
$tabControl->ShowWarnings("post_form", $message);
?>
<?echo BeginNote();?>
<span class="required">*</span><?echo GetMessage("REQUIRED_FIELDS")?>
<?echo EndNote();?>
<?// завершение страницы
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>