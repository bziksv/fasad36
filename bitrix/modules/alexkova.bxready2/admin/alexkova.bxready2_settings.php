<?
// подключим все необходимые файлы:
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php"); // первый общий пролог

use \Alexkova\Bxready2\Admin;
use \Alexkova\Bxready2\Templates;

$module_id = 'alexkova.bxready2';

if (!CModule::IncludeModule('alexkova.bxready2')) return;

CJSCore::init('jquery');

// подключим языковой файл
IncludeModuleLangFile(__FILE__);

$POST_RIGHT = $APPLICATION->GetGroupRight("alexkova.bxready2");

if ($POST_RIGHT < "R")
	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));

$aTabs = array(
	array("DIV" => "edit1", "TAB" => GetMessage("BXR_SETTINGS_PANEL"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("AK_MARKETING_GROUP_EDIT_TAB1"))
);

$tabControl = new CAdminTabControl("tabControl", $aTabs);

$message = null;
$bVarsFromForm = false;

if(
	$REQUEST_METHOD == "POST"
	&&
	($save!="" || $apply!="")
	&&
	$POST_RIGHT=="W"
	&&
	check_bitrix_sessid()
)
{
	$operationOk = false;

	COption::SetOptionString($module_id, "managment_mode", $HTTP_POST_VARS["managment_mode"]);
	COption::SetOptionString($module_id, "less_mode", $HTTP_POST_VARS["less_mode"]);
	COption::SetOptionString($module_id, "help_mode", $HTTP_POST_VARS["help_mode"]);

	$operationOk = true;

	if($operationOk)
	{
		if ($apply != "")
			LocalRedirect("/bitrix/admin/alexkova.bxready2_settings.php?&mess=ok&lang=".LANG."&".$tabControl->ActiveTabParam());
		else
			LocalRedirect("/bitrix/admin/alexkova.bxready2_settings.php?&mess=ok&lang=".LANG."&".$tabControl->ActiveTabParam());
	}
	else
	{
		if($e = $APPLICATION->GetException())
			$message = new CAdminMessage(GetMessage("BXR_TEMPLATE_AREA_EDIT_FAIL"), $e);
		$bVarsFromForm = true;
	}

}

$arResult = array();
$arResult['managment_mode'] = Templates::getManagementMode() ? "Y" : "N";
$arResult['less_mode'] = Templates::getManagementLessMode() ? "Y" : "N";
$arResult['help_mode'] = Templates::getManagementHelpMode() ? "Y" : "N";

$APPLICATION->SetTitle((strlen($ID)>0? GetMessage("BXR_TEMPLATE_AREA_EDIT_TITLE").$ID : GetMessage("BXR_TEMPLATE_AREA_EDIT_TITLE")));


require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");

if($_REQUEST["mess"] == "ok" && $ID>0)
	CAdminMessage::ShowMessage(array("MESSAGE"=>GetMessage("BXR_TEMPLATE_AREA_EDIT_OK"), "TYPE"=>"OK"));


if ($message){

		echo $message->Show();

}
?>

<?
// далее выводим собственно форму
?>
<form method="POST" Action="<?echo $APPLICATION->GetCurPage()?>" ENCTYPE="multipart/form-data" name="post_form">
<?// проверка идентификатора сессии ?>
<?echo bitrix_sessid_post();?>
<?
// отобразим заголовки закладок
$tabControl->Begin();
?>
<?
//********************
// первая закладка - форма редактирования параметров рассылки
//********************
$tabControl->BeginNextTab();
?>
	<tr>
		<td width="40%"><?echo GetMessage("BXR_TEMPLATE_MANAGMENT_MODE")?></td>
		<td width="60%">
			<input type="checkbox" name="managment_mode" value="Y" <?if ($arResult["managment_mode"] == "Y") echo 'checked="checked"'?>>
		</td>
	</tr>
	<tr>
		<td width="40%"><?echo GetMessage("BXR_TEMPLATE_LESS_MODE")?></td>
		<td width="60%">
			<input type="checkbox" name="less_mode" value="Y" <?if ($arResult["less_mode"] == "Y") echo 'checked="checked"'?>>
		</td>
	</tr>



<?
// завершение формы - вывод кнопок сохранения изменений
$tabControl->Buttons(
	array(
		"disabled"=>($POST_RIGHT<"W")
	)
);
?>
	<input type="hidden" name="lang" value="<?=LANG?>">
<?
// завершаем интерфейс закладок
$tabControl->End();
?>

<?
$tabControl->ShowWarnings("post_form", $message);
?>

<?
// информационная подсказка
echo BeginNote();?>
<span class="required">*</span><?echo GetMessage("REQUIRED_FIELDS")?>
<?echo EndNote();?>

<?
// завершение страницы
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>