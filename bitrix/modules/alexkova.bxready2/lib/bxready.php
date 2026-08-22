<?php
/*
 * New Class of BXready2
 */
namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use \Bitrix\Main\Page\Asset;
use Alexkova\Bxready2\Templates;

Loc::loadMessages(__FILE__);

class Bxready extends \Alexkova\Bxready2\Allbxready{

	private static $_instance = null;

	private static $areaNames = array();

	private function __construct() {

		if (self::getManagementMode()){

			global $APPLICATION;
                        $APPLICATION->AddHeadScript('/bitrix/js/alexkova.bxready2/core.js');
			if (isset($_REQUEST["set_new_type"])
				&& $_REQUEST["set_new_type"] == "yes"
				&& isset($_REQUEST["mtype"])
				&& strlen($_REQUEST["mtype"])>0
				&& isset($_REQUEST["mversion"])
				&& strlen($_REQUEST["mversion"])>0
			){
				define("CACHED_b_option", false);

				Templates::setAreaVersion(SITE_TEMPLATE_ID, strval($_REQUEST["mtype"]),strval($_REQUEST["mversion"]));

				$newPage = $APPLICATION->GetCurPageParam("", array("set_new_type","mtype", "mversion"));

				LocalRedirect($newPage);
			}

			if (defined('SITE_TEMPLATE_ID') && strlen(SITE_TEMPLATE_ID)>0 && self::getTemplateManagementMode(SITE_TEMPLATE_ID)){
				Templates::getBitrixTopPanelMenu();
			}

		}

	}

	protected function __clone() {

	}

	static public function getInstance() {
		if(is_null(self::$_instance))
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	static public function getAreas() {
		return self::$areaNames;
	}

	static public function getAreaByCode($areaCode) {
		if (isset(self::$areaNames[$areaCode])){
			return self::$areaNames[$areaCode];
		}else{
			return '';
		}

	}

	static public function setArea($areaNames) {
		if (is_array($areaNames)){
			self::$areaNames = $areaNames;
		}
	}

	static public function setAreayCode($areaCode, $areaValue) {
		self::$areaNames[$areaCode] = $areaValue;
	}
}
