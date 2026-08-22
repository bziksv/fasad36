<?php
/*
 * New Class of BXready2
 */
namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
//use Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

class Allbxready {

	static public $moduleID = 'alexkova.bxready2';

	private static  $managmentMode = null;
	private static  $lessMode = null;
	private static  $helpMode = null;

	public static function getManagementMode(){

		if (is_null(self::$managmentMode)){
			$managmentMode = \Bitrix\Main\Config\Option::get(self::$moduleID, 'managment_mode', 'N');
			self::$managmentMode = $managmentMode == "Y" ? true : false;

		}else{
			return self::$managmentMode;
		}

		return self::$managmentMode;
	}

	public static function getManagementLessMode(){

		if (is_null(self::$lessMode)){
			$lessMode = \Bitrix\Main\Config\Option::get(self::$moduleID, 'less_mode', 'N');
			self::$lessMode = $lessMode == "Y" ? true : false;

		}else{
			return self::$lessMode;
		}

		return self::$lessMode;
	}

	public static function getManagementHelpMode(){

		global $USER;

		if (is_null(self::$helpMode)){

			if (!$USER->IsAdmin()){
				self::$helpMode = "N";
				return self::$helpMode;
			}

			$helpMode = \Bitrix\Main\Config\Option::get(self::$moduleID, 'help_mode', 'N');
			self::$helpMode = $helpMode == "Y" ? true : false;

		}else{
			return self::$helpMode;
		}

		return self::$helpMode;
	}

	public static function getTemplateManagementMode($template = ''){

		if (strlen($template)>0){
			$managmentMode = \Bitrix\Main\Config\Option::get(self::$moduleID, 'managment_mode_template_'.$template, 'N');
			return $managmentMode == "Y" ? true : false;
		}else{
			return false;
		}

	}

	static function getLang($path){

		$MESS = array();
		if (file_exists($path)){
			include($path);
		}
		return $MESS;

	}

	static function GetStrFileSize($size, $round=2){
		$arSize = GetMessage("FILE_SIZE_S");
		$sizes = array($arSize["b"], $arSize["Kb"], $arSize["Mb"], $arSize["Gb"], $arSize["Tb"], $arSize["Pb"], $arSize["Eb"], $arSize["Zb"], $arSize["Yb"]);
		for ($i=0; $size > 1024 && $i < count($sizes) - 1; $i++) $size /= 1024;
		return round($size,$round)." ".$sizes[$i];
	}


}
