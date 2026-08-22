<?
global $DBType;
$module_id = 'alexkova.rklite';
//require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$module_id."/general/".$DBType."/reklama.php");

IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
	$module_id,
	array(
		"CKuznica_rklite"=> "classes/".$DBType."/CKuznica_rklite.php",
		)
	);

?>