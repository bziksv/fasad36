<?
IncludeModuleLangFile(__FILE__);
$module_id = "alexkova.rklite";

//if($APPLICATION->GetGroupRight($module_id)>"D")
{
	$aMenu = array(
		"parent_menu" => "global_menu_services",
		"sort" => 100,
		"url" => "rklite_banners_list.php?lang=".LANGUAGE_ID,
		"text" => GetMessage("REKLAMA_MENU_MAIN"),
		"title" => GetMessage("REKLAMA_MENU_MAIN_TITLE"),
		"icon" => "rklite_menu_icon",
		"page_icon" => "rklite_page_icon",
		"module_id" => $module_id,
		"items_id" => "menu_rklite",
		"items" => array(),
	);



	$aMenu["items"][] = array(
		"text" => GetMessage("REKLAMA_BANNERS_LIST"),
		"url" => "rklite_banners_list.php?lang=".LANGUAGE_ID,
		"more_url"=> array("rklite_banner_edit.php?lang=".LANGUAGE_ID),
		"module_id" => $module_id,
		"title" => GetMessage("REKLAMA_BANNERS_LIST_TITLE"),
		"items_id" => "rklite_banners_list",
	);
	$aMenu["items"][] = array(
		"text" => GetMessage("REKLAMA_BANTYPE_LIST"),
		"url" => "rklite_bantype_list.php?lang=".LANGUAGE_ID,
		"more_url"=> array("rklite_bantype_edit.php?lang=".LANGUAGE_ID),
		"module_id" => $module_id,
		"title" => GetMessage("REKLAMA_BANTYPE_LIST_TITLE"),
		"items_id" => "rklite_banners_type_list",
	);
	$aMenu["items"][] = array(
		"text" => GetMessage("REKLAMA_BANNERS_STAT"),
		"url" => "rklite_stat.php?lang=".LANGUAGE_ID,
		"module_id" => $module_id,
		"title" => GetMessage("REKLAMA_BANNERS_STAT_TITLE"),
		"items_id" => "rklite_banners_stat",
	);



	return $aMenu;
}
return false;
?>
