<?php
/*
 * New Class of BXready2
 */
namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Alexkova\Bxready2\Templates;

Loc::loadMessages(__FILE__);

class Admin extends \Alexkova\Bxready2\Allbxready{

	public static function getTemplatesMenu(){

		$arMenu = array();

		$arTemplates = Templates::getList();

		foreach($arTemplates as $cell=>$val){
			$arMenu[] = array(
				"parent_menu" => "bxr_template_area",
				"text" => $cell,
				"url" => self::$moduleID."_template_area_edit.php?lang=".LANGUAGE_ID."&ID=".$cell,
				"dynamic" => false,
				"items_id" => 'bxr_bxready2_'.$cell,
				"title" => $cell,
				"items" => array(),
			);
		}

		return $arMenu;
	}

}