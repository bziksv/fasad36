<?
IncludeModuleLangFile(__FILE__);
$module_id = "alexkova.popupad";

if($APPLICATION->GetGroupRight($module_id)>"D")
{
	$aMenu = array(
		"parent_menu" => "global_menu_services",
		"sort" => 100,
		"url" => "popupad_banners_list.php?lang=".LANGUAGE_ID,
		"text" => GetMessage("POPUPAD_MENU_MAIN"),
		"title" => GetMessage("POPUPAD_MENU_MAIN_TITLE"),
		"icon" => "popupad_menu_icon",
		"page_icon" => "popupad_page_icon",
		"module_id" => $module_id,
		"items_id" => "menu_popupad",
		"items" => array(),
	);

	$aMenu["items"][] = array(
		"text" => GetMessage("POPUPAD_BANNERS_LIST"),
		"url" => "popupad_banners_list.php?lang=".LANGUAGE_ID,
		"more_url"=> array("popupad_banner_edit.php?lang=".LANGUAGE_ID),
		"module_id" => $module_id,
		"title" => GetMessage("POPUPAD_BANNERS_LIST_TITLE"),
		"items_id" => "popupad_banners_list",
	);

	return $aMenu;
}
return false;
?>
