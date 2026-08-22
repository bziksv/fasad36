<?php
/*
 * New Class of BXready2
 */
namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Alexkova\Bxready2\Allbxready;
use Bitrix\Main\Context;

Loc::loadMessages(__FILE__);

class Library extends \Alexkova\Bxready2\Allbxready{

	private static $bxreadyLibrary = null;

	private static $bxreadyCollectionPath = '/bitrix/tools/bxready2/collection/';

	public static function getCollectionList(){

		if (is_null(self::$bxreadyLibrary)){

			self::getLibraryList();

		}

		return self::$bxreadyLibrary;

	}

	private function getSection($section, &$globalSection, $sectionType, $depthLevel = 0){

		$arReturn = array();

		$depthLevel ++ ;

		$section = (array) $section;

		if (isset($section["section"])){
			if (is_array($section["section"])){
				foreach ($section["section"] as $val2){
					$section["items"][] = self::getSection($val2, $globalSection, $sectionType, $depthLevel);
				}
			}else{
				$section["items"][] = self::getSection($section["section"], $globalSection, $sectionType, $depthLevel);
			}
		};

		$globalSection[$section["id"]] = array(
			"name"=> $section["name"],
			"code"=> $section["id"],
			"level" => $depthLevel,
			"type" => $sectionType
		);

		$arReturn = array(
			"name"=>$section["name"],
			"code"=>$section["id"],
			"type" => $sectionType
		);

		if (isset($section["items"]) && count($section["items"])>0){
			$arReturn["items"] = $section["items"];
		}

		return $arReturn;

	}

	private function Localize(){

		$newAreaList = self::getCollectionList();

		$context = Context::getCurrent();

		if (file_exists($_SERVER["DOCUMENT_ROOT"].self::$bxreadyCollectionPath."lang/".$context->getLanguage()."/index.xml.php")){
			$Messages = self::getLang($_SERVER["DOCUMENT_ROOT"].self::$bxreadyCollectionPath."lang/".$context->getLanguage()."/index.xml.php");

			foreach($newAreaList["SECTIONS"] as $cell=>$area){
				$newAreaList["SECTIONS"][$cell]["name"] = isset($Messages['bxr_section_'.$cell."_name"]) && strlen($Messages['bxr_section_'.$cell."_name"])>0 ?  $Messages['bxr_section_'.$cell."_name"] : strtoupper($cell);
			}

			foreach($newAreaList["COLLECTIONS"] as $cell=>$area){
				$newAreaList["COLLECTIONS"][$cell]["name"] = isset($Messages['bxr_collection_'.$cell."_name"]) && strlen($Messages['bxr_collection_'.$cell."_name"])>0 ?  $Messages['bxr_collection_'.$cell."_name"] : strtoupper($cell);
			}

			foreach($newAreaList["ELEMENTS"] as $cell=>$area){
				$newAreaList["ELEMENTS"][$cell]["name"] = isset($Messages['bxr_element_'.$cell."_name"]) && strlen($Messages['bxr_element_'.$cell."_name"])>0 ?  $Messages['bxr_element_'.$cell."_name"] : strtoupper($cell);
			}

			self::$bxreadyLibrary = $newAreaList;
		}

	}


	private function getLibraryList(){

		$bxreadyLibrary = array();

		$library = $_SERVER["DOCUMENT_ROOT"].self::$bxreadyCollectionPath."index.xml";

		if (file_exists($library)){

			$xmlLibrary = simplexml_load_file($library);

			if (is_object($xmlLibrary)){

				foreach($xmlLibrary->collections->collection as $val){

					$collection = (array) $val;

					$bxreadyLibrary["COLLECTIONS"][$collection["id"]] = array(
						"name"=>$collection["name"],
						"code"=>$collection["id"],
					);
				}

				$bxreadyLibrary["SECTIONS"] = array();

				foreach($xmlLibrary->sections->section as $val){

					$section = (array) $val;

					$bxreadyLibrary["SECTIONS_TREE"][$section["type"]][$section["id"]] = self::getSection($val, $bxreadyLibrary["SECTIONS"], $section["type"]);
				}

				foreach($xmlLibrary->elements->element as $val){

					$element = (array) $val;

					if (!is_array($element["collection"])){
						$element["collection"] = array($element["collection"]);
					}
					foreach($element["collection"] as $val2){
						$bxreadyLibrary["COLLECTIONS"][$val2]["elements"][] = $element["id"];
					}

					if (!is_array($element["section"])){
						$element["section"] = array($element["section"]);
					}

					foreach($element["section"] as $val2){
						$bxreadyLibrary["SECTIONS"][$val2]["elements"][] = $element["id"];;
					}

					$bxreadyLibrary["ELEMENTS"][$element["id"]] = array(
						"name"=>$element["name"],
						"code"=>$element["id"],
						"section"=>$element["section"],
						"collection"=>$element["collection"],
					);

				}
			}
		}

		self::$bxreadyLibrary = $bxreadyLibrary;
		self::Localize();

	}


	public static function getListSelector($sectionType = '', $section = '', $collection = ''){

		$arPropertyList = array();

		$allCollection = self::getCollectionList();

		if(strlen($sectionType)>0 && in_array($sectionType, array('markers', 'ecommerce', 'elements'))){

			foreach ($allCollection["ELEMENTS"] as $val){

				$flagActive = true;


				if (strlen($section)>0  && $section!='empty' && !in_array($val['code'], $allCollection['SECTIONS'][$section]['elements'])) $flagActive = false;
				if (strlen($collection)>0 && $collection!='empty' && !in_array($collection, $val['collection'])) $flagActive = false;

				if ($flagActive){
					$arPropertyList["ELEMENTS"][$val['code']] = $val['name'];
				}
			}

			$arPropertyList["SECTIONS"]['empty'] = GetMessage('BXR_EMPTY_SECTION_SELECTOR');

			if (is_array($allCollection["SECTIONS_TREE"][$sectionType])){

				foreach ($allCollection["SECTIONS_TREE"][$sectionType] as $val){

					$prefix = '';

					$arPropertyList["SECTIONS"][$val['code']] = $prefix.$allCollection["SECTIONS"][$val['code']]["name"];;

					if (is_array($val["items"]) && count($val["items"])>0){
						$prefix = '..';
						foreach ($val["items"] as $val2){
							$arPropertyList["SECTIONS"][$val2['code']] = $prefix.$allCollection["SECTIONS"][$val2['code']]["name"];
						}
					}

				}
			}

			$arPropertyList["COLLECTIONS"]['empty'] = GetMessage('BXR_EMPTY_COLLECTION_SELECTOR');
			foreach ($allCollection["COLLECTIONS"] as $cell=>$val){
				$arPropertyList["COLLECTIONS"][$cell] = $val["name"];
			}

		}

		return $arPropertyList;

	}

	public static function getCustomListSelector($collection = array()){

		$arPropertyList = array();

		$allCollection = self::getCollectionList();

		if(count($collection)>0){

			foreach ($allCollection["ELEMENTS"] as $val){

				if (in_array($val['code'],$collection)){
					$arPropertyList["ELEMENTS"][$val['code']] = $val['name'];
				}
			}
		}else{
			foreach ($allCollection["ELEMENTS"] as $val){

				$arPropertyList["ELEMENTS"][$val['code']] = $val['name'];
			}
		}

		return $arPropertyList;

	}

	public static function getElementParameters($path){

		$arParams = array();

		return $arParams;

	}

}