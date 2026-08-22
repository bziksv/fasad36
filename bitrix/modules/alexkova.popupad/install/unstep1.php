<form action="<?echo $APPLICATION->GetCurPage()?>">
    <?=bitrix_sessid_post()?>
    <?echo CAdminMessage::ShowMessage(GetMessage("POPUPAD_UNINST_WARN"))?>
	<input type="hidden" name="lang" value="<?=LANGUAGE_ID?>">
	<input type="hidden" name="id" value="alexkova.popupad">
	<input type="hidden" name="uninstall" value="Y">
	<input type="hidden" name="step" value="2">
        <p><input type="checkbox" name="savedata" id="savedata" value="Y" checked><label for="savedata"><?echo GetMessage("POPUPAD_UNINST_SAVE_TABLES")?></label></p>
	<input type="submit" name="inst" value="<?echo GetMessage("POPUPAD_BACK")?>">
<form>