<?php
/*
 * New Class of BXready2
 */
namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Alexkova\Bxready2\Allbxready;
use Alexkova\Bxready2\Templates;

//Loc::loadMessages(__FILE__);

class Area extends \Alexkova\Bxready2\Allbxready{

	public static function showArea($areaName, $areaVersion, $noManagment = false){

		if ($noManagment){
			$areaFile = self::getAreaFileByCode($areaName, $areaVersion);
		}else{
                    
		global $BXRGeneral;
                    if (!is_array($BXRGeneral)){
                        $BXRGeneral = array();
                        if(isset($_SESSION["BXR_GENERAL"]))
                            $BXRGeneral = $_SESSION["BXR_GENERAL"];                      
                    }
		if (is_array($BXRGeneral) && isset($BXRGeneral['AREAS'][$areaName]) && strlen($BXRGeneral['AREAS'][$areaName])>0){
			$areaFile = self::getAreaFileByCode($areaName, $BXRGeneral['AREAS'][$areaName]);
		}else{
			if (defined('SITE_TEMPLATE_ID') && strlen(SITE_TEMPLATE_ID)>0){
				if (!$noManagment && self::getTemplateManagementMode(SITE_TEMPLATE_ID)){
					$areaFile = self::getArea($areaName, $areaVersion);
				}else{
					$areaFile = self::getAreaFileByCode($areaName, $areaVersion);
				}
			}
		}
		}



		if (file_exists($areaFile)) include($areaFile);
	}

	public function getArea($areaName, $default){

		$areaFile = '';

		if (strlen(SITE_TEMPLATE_ID)>0){
			$currentArea  = Templates::getAreaVersion(SITE_TEMPLATE_ID, $areaName, $default);
		}

		if (strlen($currentArea)>0){
			$areas = Templates::getAreaListByCode(SITE_TEMPLATE_ID);

			if (isset($areas[$areaName]["items"][$currentArea]["path"]) && strlen($areas[$areaName]["items"][$currentArea]["path"])>0){
				$areaFile = $areas[$areaName]["items"][$currentArea]["path"];
			}
		}

		return $areaFile;
		/*  абослютный путь или false если не удалось найти файл или определить что показать в области */

	}

	public function getAreaFileByCode($areaName, $areaVersion){
		return $_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/bxready2/area/".$areaName."/".$areaVersion.".php";
	}
}