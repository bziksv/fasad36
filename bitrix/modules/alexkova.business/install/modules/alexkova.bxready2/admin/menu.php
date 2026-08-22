<?

if (CModule::IncludeModule('alexkova.bxready2')){
	IncludeModuleLangFile(__FILE__);
	$module_id = "alexkova.bxready2";

	$aMenuBase = array();
	$aMenuExt = array();

	$aMenuExt[] = array(
		"text" => GetMessage('BXR_INDEX_MENU'),
		"url" => "{$module_id}_index.php?lang=".LANGUAGE_ID,
		"dynamic" => false,
		"title" => GetMessage('BXR_INDEX_MENU_TITLE'),
		"sort" => 100,
		"items_id" => 'bxr2_template_area',
		"items" => array()
	);

	$aMenuExt[] = array(
		"text" => GetMessage('BXR_TEMPLATES_AREA_MENU'),
		"dynamic" => false,
		"title" => GetMessage('BXR_TEMPLATES_AREA_MENU_TITLE'),
		"sort" => 100,
		"items_id" => 'bxr2_template_area',
		"items" => \Alexkova\Bxready2\Admin::getTemplatesMenu(),
	);

	$aMenuExt[] = array(
		"text" => GetMessage('BXR_SETTINGS'),
		"url" => "{$module_id}_settings.php?lang=".LANGUAGE_ID,
		"more_url"=> array("{$module_id}_settings.php"),
		"dynamic" => false,
		"title" => GetMessage('BXR_SETTINGS_TITLE'),
		"sort" => 200,
		"items_id" => 'bxr2_settings',
		"items" => array(),
	);

	$aMenuBase[] = array(
		"parent_menu" => "global_menu_services",
		/*"section" => 'bxready2',*/
		"text" => GetMessage('BXR_BXREADY2_MENU'),
		"name" => GetMessage('BXR_BXREADY2_MENU'),
		"dynamic" => false,
		"items_id" => 'bxr_bxready2',
		"title" => GetMessage('BXR_BXREADY2_MENU_TITLE'),
		"sort" => 1000,
		"items" => $aMenuExt,
	);





	return $aMenuBase;
}

?>

