<?php
/*
 * New Class of BXready2
 */
namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Bitrix\Main\Context;
use Alexkova\Bxready2\Allbxready;

Loc::loadMessages(__FILE__);

class Templates extends \Alexkova\Bxready2\Allbxready{

	private function isValidTemplate($arTemplate){

		if (!is_array($arTemplate)) return false;

		if (
			isset($arTemplate["location"])
			&& in_array($arTemplate["location"], array('base', 'local'))
			&& strlen($arTemplate["name"])>0
			&& substr_count($arTemplate["path"], $_SERVER["DOCUMENT_ROOT"])>0
		){
			return true;
		};

		return false;
	}

	public static function getList(){

		$allTemplates = array();

		if (is_dir($_SERVER["DOCUMENT_ROOT"]."/local/templates"))
		{
		$templates = scandir($_SERVER["DOCUMENT_ROOT"]."/local/templates");

		foreach ($templates as $cell=> $template){

			if (in_array($template, array('.', '..')) || $template == '.default'){
				unset($templates[$cell]);
			}else{
				$allTemplates[$template] = array(
					"name" => $template,
					"location" => 'local',
					"path" => $_SERVER["DOCUMENT_ROOT"]."/local/templates/".$template
				);
			}
		}
		}

                if (is_dir($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates"))
		{
		$templates = scandir($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates");


		foreach ($templates as $cell=> $template){
			if (in_array($template, array('.', '..')) || $template == '.default'){
				unset($templates[$cell]);
			}else{
				if(!in_array($template, $allTemplates)){
					$allTemplates[$template] = array(
						"name" => $template,
						"location" => 'base',
						"path" => $_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".$template
					);;
				}
			}
		}
                }

		return $allTemplates;
	}

	public static function getAreaList($arTemplate){

		$areaList = array();

		$bxreadyPathArea = $arTemplate["path"]."/bxready2/area";

		if (
			self::isValidTemplate($arTemplate)
			&& file_exists($bxreadyPathArea)
		){

			$areas = scandir($bxreadyPathArea);

			if (is_array($areas)){
				foreach ($areas as $area){
					if (!in_array($area, array('.', '..'))){
						$versions = scandir($bxreadyPathArea."/".$area);
						foreach ($versions as $version){
							if (!in_array($version, array('.', '..')) && substr_count($version, '.disabled')<=0){
								$code = str_replace(".php","",$version);
								$areaList[$area]["items"][$code] = array(
									"code" => $code,
									"path" => $bxreadyPathArea."/$area/$version"
								);
							}
						}
					}
				}
			}

		}

		return self::Localize($arTemplate, $areaList);

	}

	public static function getAreaListByCode($templateCode){

		$allTemplates = self::getList();

		$arTemplate = $allTemplates[$templateCode];

		return self::getAreaList($arTemplate);

	}

	private function Localize($arTemplate, $areaList){

		$newAreaList = $areaList;
		$context = Context::getCurrent();;

		$Messages = self::getLang($arTemplate["path"]."/bxready2/lang/".$context->getLanguage()."/area/lang.php");

		foreach($newAreaList as $cell=>$area){
			$newAreaList[$cell]["name"] = isset($Messages['bxr_'.$cell."_name"]) ?  $Messages['bxr_'.$cell."_name"] : '';
			$newAreaList[$cell]["description"] = isset($Messages['bxr_'.$cell."_description"]) ?  $Messages['bxr_'.$cell."_description"] : '';
			foreach ($area['items'] as $cellItem=>$item){
				$newAreaList[$cell]['items'][$cellItem]["name"] = isset($Messages['bxr_'.$cell."_".$cellItem."_name"]) ?  $Messages['bxr_'.$cell."_".$cellItem."_name"] : '';
				$newAreaList[$cell]['items'][$cellItem]["description"] = isset($Messages['bxr_'.$cell."_".$cellItem."_description"]) ?  $Messages['bxr_'.$cell."_".$cellItem."_description"] : '';
			}
		}

		return $newAreaList;
	}

	public static function getAreaVersion($templateCode, $areaCode, $default = ''){
		return \Bitrix\Main\Config\Option::get(self::$moduleID, $templateCode.'_bxr_area_'.$areaCode, $default);
	}

	public static function setAreaVersion($templateCode, $areaCode, $version){
		\Bitrix\Main\Config\Option::set(self::$moduleID, $templateCode.'_bxr_area_'.$areaCode, $version);
	}

	public function getBitrixTopPanelMenu(){


		global $USER, $APPLICATION;

		if (defined('SITE_TEMPLATE_ID')
			&& strlen(SITE_TEMPLATE_ID)>0
			&& $USER->IsAdmin()
			&& self::getManagementMode()){

			$arMenu = array(); // подпункты меню

			// create top line list

			$arMarketAreas = self::getAreaListByCode(SITE_TEMPLATE_ID);

			foreach ($arMarketAreas as $cell => $val){

				$arExtMenu = array();

				$areaName = strlen($val['name'])>0 ? "[".$cell."]".$val['name'] : $cell;

				foreach ($val['items'] as $cell2 => $item){
					$name = $item['code'];
					$title = strlen($item['name'])>0 ? "[".$item['code']."]".$item['name'] : $item['code'];
					$redirectUri = $APPLICATION->GetCurPageParam('set_new_type=yes&mtype='.$cell.'&mversion='.$name, array('set_new_type', 'mtype', 'mversion'));
					$arExtMenu[] =  array(
						"TEXT"  => $name,
						"TITLE"  => $title,
						"ALT" => $title,
						"ICON"  => "panel-edit-text",
						"ACTION" => "jsUtils.Redirect([], '".$redirectUri."')",
						"DEFAULT" => false,
					);
				};

				if (count($arExtMenu)>0){
					$arMenu[] = array(
						"TEXT"  => $cell,
						"TITLE"  => $areaName,
						"ICON"  => "panel-edit-text",
						"ACTION" => false,
						"DEFAULT" => false,
						"MENU" => $arExtMenu,
					);
					$arMenu[] = array('SEPARATOR' => "Y"); // разделитель
				}
			}

			if (0 < sizeof($arMenu)):
				$APPLICATION->AddPanelButton(array(
					"HREF" => '', // можно и ссылку. в таком вариант при нажатии откроется меню
					"TITLE" => GetMessage('BXR_MANAGER'),
					"ICON" => 'panel-edit-text',
					"ALT" => GetMessage('BXR_MANAGER_DESCRIPTION'),
					"TEXT" => GetMessage('BXR_MANAGER_DESCRIPTION'),
					"MAIN_SORT" => 2000, // после всех кнопок
					"SORT" => 100,
					"MENU" => $arMenu,
				));
			endif;
		}
	}

}
