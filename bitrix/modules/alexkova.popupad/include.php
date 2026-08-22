<?
global $DBType;
$module_id = 'alexkova.popupad';

IncludeModuleLangFile(__FILE__);

CModule::AddAutoloadClasses(
	$module_id,
	array(
		"CKuznicaPopupad"=> "classes/".$DBType."/CKuznicaPopupad.php",
		)
	);

?>