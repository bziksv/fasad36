<?
$module_id = "alexkova.rklite";
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$module_id."/include.php");
IncludeModuleLangFile(__FILE__);

$RK_RIGHT = $APPLICATION->GetGroupRight($module_id);
$aTabs = array(
	array("DIV" => "edit1", "TAB" => GetMessage("RKLITE_OPTIONS"), "TITLE" => GetMessage("RKLITE_OPTIONS_TITLE")),
	array("DIV" => "edit2", "TAB" => GetMessage("RKLITE_ACCESS"), "TITLE" => GetMessage("RKLITE_ACCESS_TITLE")),
);
$tabControl = new CAdminTabControl("tabControl", $aTabs);
if ($REQUEST_METHOD=="GET" && $RK_RIGHT=="W" && strlen($RestoreDefaults)>0 && check_bitrix_sessid())
{
	COption::RemoveOption($module_id);
	$z = CGroup::GetList($v1="id",$v2="asc", array("ACTIVE" => "Y", "ADMIN" => "N"));
	while($zr = $z->Fetch())
		$APPLICATION->DelGroupRight($module_id, array($zr["ID"]));
}
if($REQUEST_METHOD=="POST" && strlen($Update.$Apply)>0 && $RK_RIGHT>="W" && check_bitrix_sessid())
{
	$old_days = intval(COption::GetOptionString($module_id, "STAT_DAYS"));
	$new_days= intval($HTTP_POST_VARS["STAT_DAYS"]);

	if($old_days != $new_days)
	{
		COption::SetOptionString($module_id, "STAT_DAYS", $new_days);
	}

	COption::SetOptionString($module_id, "DONT_IGNORE_SECURITY", $HTTP_POST_VARS["DONT_IGNORE_SECURITY"]);
	COption::SetOptionString($module_id, "set_subdomain_keywords", $HTTP_POST_VARS["set_subdomain_keywords"]);

	$Update = $Update.$Apply;
	ob_start();
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");
	ob_end_clean();

	if($Apply == '' && $_REQUEST["back_url_settings"] <> '')
		LocalRedirect($_REQUEST["back_url_settings"]);
	else
		LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());

}
$STAT_DAYS = COption::GetOptionString($module_id, "STAT_DAYS");
if(intval($STAT_DAYS) == 0)
	$STAT_DAYS = 30;

$DONT_IGNORE_SECURITY = COption::GetOptionString($module_id, "DONT_IGNORE_SECURITY","");
$set_subdomain_keywords = COption::GetOptionString($module_id, "set_subdomain_keywords","Y");
?>
<form method="POST" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialchars($mid)?>&lang=<?=LANGUAGE_ID?>">
<?$tabControl->Begin();?>
<?$tabControl->BeginNextTab();?>
	<tr>
		<td valign="top" width="40%"><?=GetMessage("RK_STAT_DAYS")?></td>
		<td valign="middle"><input type="text" size="30" maxlength="255" value="<?=$STAT_DAYS?>" name="STAT_DAYS"></td>
	</tr>
	<tr>
		<td valign="top"><label for="rklite_dont_ignore_security"><?=GetMessage("RKLITE_DONT_IGNORE_SECURITY")?></label></td>
		<td valign="middle"><input id="rklite_dont_ignore_security" type="checkbox" size="30" maxlength="255" <?if($DONT_IGNORE_SECURITY == "Y") echo "checked"?> value="Y" name="DONT_IGNORE_SECURITY"></td>
	</tr>
	<tr>
		<td valign="top"><label for="rklite_set_subdomain_keywords"><?=GetMessage("RKLITE_SET_SUBDOMAIN_KEYWORDS")?></label></td>
		<td valign="middle"><input id="rklite_set_subdomain_keywords" type="checkbox" size="30" maxlength="255" <?if($set_subdomain_keywords == "Y") echo "checked"?> value="Y" name="set_subdomain_keywords"></td>
	</tr>
<?$tabControl->BeginNextTab();?>
<?require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");?>
<?$tabControl->Buttons();?>
	<script type="text/javascript">
function RestoreDefaults()
{
	if(confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>'))
		window.location = "<?echo $APPLICATION->GetCurPage()?>?RestoreDefaults=Y&lang=<?=LANGUAGE_ID?>&mid=<?echo urlencode($mid)?>&<?echo bitrix_sessid_get()?>";
}
</script>
	<?if(strlen($_REQUEST["back_url_settings"])>0):?>
	<input type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>" title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>"<?if ($RK_RIGHT<"W") echo " disabled" ?>>
	<?endif?>
	<input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>"<?if ($RK_RIGHT<"W") echo " disabled" ?>>
	<?if(strlen($_REQUEST["back_url_settings"])>0):?>
		<input type="button" name="Cancel" value="<?=GetMessage("MAIN_OPT_CANCEL")?>" title="<?=GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?echo htmlspecialchars(CUtil::JSEscape($_REQUEST["back_url_settings"]))?>'">
		<input type="hidden" name="back_url_settings" value="<?=htmlspecialchars($_REQUEST["back_url_settings"])?>">
	<?endif?>
	<input type="button" title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="RestoreDefaults();" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>"<?if ($RK_RIGHT<"W") echo " disabled" ?>>
	<?=bitrix_sessid_post();?>

<?$tabControl->End();?>
</form>