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
	array("DIV" => "edit1", "TAB" => GetMessage("BXR_TEMPLATE_AREA_EDIT_TAB1"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("AK_MARKETING_GROUP_EDIT_TAB1"))
);

if (Templates::getManagementLessMode()){
	$aTabs[] = array("DIV" => "edit2", "TAB" => GetMessage("BXR_TEMPLATE_AREA_EDIT_TAB_LESS"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("BXR_TEMPLATE_AREA_EDIT_TAB_LESS"));
}

$tabControl = new CAdminTabControl("tabControl", $aTabs);

$ID = htmlspecialchars($_REQUEST['ID']);
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

	if (strlen($ID)>0){
		COption::SetOptionString($module_id, "managment_mode_template_".$ID, $HTTP_POST_VARS["managment_mode"]);

		foreach ($area_version as $cell=>$val){
			Templates::setAreaVersion($ID,$cell,$val);
		}

		$operationOk = true;
	}
	else{
		$APPLICATION->ThrowException(GetMessage('BXR_TEMPLATE_AREA_EDIT_FAIL'));
	}

	if($operationOk)
	{
		if ($apply != "")
			LocalRedirect("/bitrix/admin/alexkova.bxready2_template_area_edit.php?ID=".$ID."&mess=ok&lang=".LANG."&".$tabControl->ActiveTabParam());
		else
			LocalRedirect("/bitrix/admin/alexkova.bxready2_template_area_edit.php?ID=".$ID."&mess=ok&lang=".LANG."&".$tabControl->ActiveTabParam());
	}
	else
	{
		if($e = $APPLICATION->GetException())
			$message = new CAdminMessage(GetMessage("BXR_TEMPLATE_AREA_EDIT_FAIL"), $e);
		$bVarsFromForm = true;
	}

}

$arResult = array();
if (strlen($ID)>0){
	$arResult['managment_mode'] = COption::GetOptionString($module_id, "managment_mode_template_".$ID, "N");
	$arResult["areas"] = Templates::getAreaListByCode($ID);
}

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


	<?if (count($arResult['areas'])>0):?>
		<?foreach($arResult['areas'] as $cell=>$area):?>
		<?	$areaName  = strlen($area["name"])>0 ? "[$cell] ".$area["name"] : $cell?>
			<tr class="heading only-managment-mode" >
				<td colspan="2">
					<?=$areaName?>
				</td>
			</tr>
			<tr class="only-managment-mode">
				<td width="40%"><?echo GetMessage("BXR_TEMPLATE_AREA_SELECT")." ".$areaName?></td>
				<td width="60%">
					<select name="area_version[<?=$cell?>]">
						<option value="" <?if(Templates::getAreaVersion($ID, $cell, '') == '') echo 'selected="selected"'?>><?echo GetMessage("BXR_TEMPLATE_AREA_NOSELECT")?></option>
						<?foreach ($area['items'] as $cell2=>$item):?>
							<option value="<?=$cell2?>" <?if(Templates::getAreaVersion($ID, $cell) == $cell2) echo 'selected="selected"'?>><?=strlen($item["name"])>0 ? "[$cell2] ".$item["name"] : $cell2?></option>
						<?endforeach;?>
					</select>
				</td>
			</tr>
		<?endforeach;?>
	<?else:?>
		<tr class="heading only-managment-mode" >
			<td colspan="2">
				<?CAdminMessage::ShowMessage(array("MESSAGE"=>GetMessage("BXR_TEMPLATE_AREA_EMPTY"), "TYPE"=>"ERROR"));?>
			</td>
		</tr>

	<?endif;?>
<?
// завершение формы - вывод кнопок сохранения изменений
$tabControl->Buttons(
	array(
		"disabled"=>($POST_RIGHT<"W")
	)
);
?>
	<input type="hidden" name="lang" value="<?=LANG?>">
<?if(strlen($ID)>0):?>
	<input type="hidden" name="ID" value="<?=$ID?>">
<?endif;?>
<?
// завершаем интерфейс закладок
$tabControl->End();
?>

<?
$tabControl->ShowWarnings("post_form", $message);
?>

	<script language="JavaScript">
		<!--
		function toggleManagmentMode(){
			if ($('input[name=managment_mode]').attr('checked') == "checked"){
				$('.only-managment-mode').css('display', 'table-row');
			}else{
				$('.only-managment-mode').css('display', 'none');
			}
		};

		$(document).ready(function(){
			$(document).on(
				'change',
				'input[name=managment_mode]',
				function(){

					toggleManagmentMode();
				}
			);

			toggleManagmentMode();
		});
		//-->
	</script>

<?
// информационная подсказка
echo BeginNote();?>
<span class="required">*</span><?echo GetMessage("REQUIRED_FIELDS")?>
<?echo EndNote();?>

<?
// завершение страницы
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>