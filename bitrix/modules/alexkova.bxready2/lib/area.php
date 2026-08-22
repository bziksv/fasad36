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

	public static function showArea($areaName, $areaVersion, $noManagment = false, $siteId = false, $siteTemplateId = false, $siteTemplatePath = false){
		if ($noManagment){
			$areaFile = self::getAreaFileByCode($areaName, $areaVersion, $siteTemplatePath);
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
			if ($siteTemplateId && $siteTemplatePath) {
                            if (!$noManagment && self::getTemplateManagementMode($siteTemplateId)){
                                    $areaFile = self::getArea($areaName, $areaVersion, $siteTemplateId);
                            }else{
                                    $areaFile = self::getAreaFileByCode($areaName, $areaVersion, $siteTemplatePath);
                            }
			} elseif (defined('SITE_TEMPLATE_ID') && strlen(SITE_TEMPLATE_ID)>0) {
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

	public function getArea($areaName, $default, $siteTemplateId = false){

		$areaFile = '';
                $sTemplateId = ($siteTemplateId) ? $siteTemplateId : SITE_TEMPLATE_ID;
                
		if (strlen($sTemplateId)>0){
			$currentArea  = Templates::getAreaVersion($sTemplateId, $areaName, $default);
		}

		if (strlen($currentArea)>0){
			$areas = Templates::getAreaListByCode($sTemplateId);

			if (isset($areas[$areaName]["items"][$currentArea]["path"]) && strlen($areas[$areaName]["items"][$currentArea]["path"])>0){
				$areaFile = $areas[$areaName]["items"][$currentArea]["path"];
			}
		}

		return $areaFile;
		/*  абослютный путь или false если не удалось найти файл или определить что показать в области */

	}

	public function getAreaFileByCode($areaName, $areaVersion, $siteTemplatePath = false){
            $sTemplatePath = ($siteTemplatePath) ? $siteTemplatePath : SITE_TEMPLATE_PATH;
            return $_SERVER["DOCUMENT_ROOT"].$sTemplatePath."/bxready2/area/".$areaName."/".$areaVersion.".php";
	}
}