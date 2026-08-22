<?
define("ADMIN_SECTION",false);
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$bError = true;
if (CModule::IncludeModule("alexkova.popupad"))
{
	$ID = intval($ID);
	if($ID>0)
	{
		$rsBanner = CKuznicaPopupad::GetByID($ID);
		if($arBanner = $rsBanner->Fetch())
		{
			$bError = false;
			
			LocalRedirect($arBanner["URL"]);
			exit();
		}
	}
}
if($bError && $_REQUEST["backurl"])
{
	LocalRedirect($_REQUEST["backurl"]);
	exit();
}
else
{
	LocalRedirect('/404.php');
}
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>