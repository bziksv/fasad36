<?php
/*
 * New Class of BXready2
 */
namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Alexkova\Bxready2\Allbxready;

Loc::loadMessages(__FILE__);

class Related extends \Alexkova\Bxready2\Allbxready{

	static $defaultRelatedCode = "BXR_RELATED";

	public static function getRelatedElements($elementID, $arRelatedIblock = array()){

		$stopOperation = false;

		$result = array();

		if (intval($elementID)>0 && count($arRelatedIblock)>0 && \CModule::IncludeModule('iblock')){

			$res = \CIBlockElement::GetByID($elementID);

			if($ar_res = $res->GetNext()){

				$resIblock = \CIblockProperty::GetList(
					array(),
					array(
						"IBLOCK_ID"=>$ar_res['IBLOCK_ID'],
						'ACTIVE' => 'Y',
						'CODE'=>self::$defaultRelatedCode
					),
					array('ID', 'CODE')
				);

				if ($resCode = $resIblock->Fetch()){

					$related = self::getTargetElements($elementID, $ar_res['IBLOCK_ID'], $arRelatedIblock);

					foreach ($related as $cell=>$val){
						if (!isset($result[$cell])) $result[$cell] = array();
						$result[$cell] = array_merge($val, $result[$cell]);
					}
				}
			}else{
				return false;
			}

			foreach ($arRelatedIblock as $val){
				$related = self::getRelatedElementsByParent($val, $elementID);
				if (count($related)>0){
					foreach ($related as $cell=>$val){
						if (!isset($result[$cell])) $result[$cell] = array();
						$result[$cell] = array_merge($val, $result[$cell]);
					}
				}
			}

		}

		return $result;

	}

	private static function getTargetElements($elementID, $iblockID, $arRelatedIblock){

		$result = array();




		$res = \CIBlockElement::GetList(
			array(),
			array(
				'ACTIVE' => 'Y',
				"IBLOCK_ID" => $iblockID,
				'ID' => $elementID
			),
			false,
			false,
			array('ID', 'PROPERTY_'.self::$defaultRelatedCode)
		);

		if ($arRes = $res->Fetch()){

			if (is_array($arRes['PROPERTY_'.self::$defaultRelatedCode.'_VALUE'])>0 && count($arRes['PROPERTY_'.self::$defaultRelatedCode.'_VALUE'])>0){

				$res2 = \CIBlockElement::GetList(
					array(),
					array(
						'ACTIVE' => 'Y',
						'ID' => $arRes['PROPERTY_'.self::$defaultRelatedCode.'_VALUE']
					),
					false,
					false,
					array('ID', 'IBLOCK_ID')
				);

				while ($ob = $res2->Fetch()){
					$result[$ob['IBLOCK_ID']][] = $ob['ID'];
				}
			}
		}

		return $result;
	}

	private static function getRelatedElementsByParent($parentIblockID, $parentID){
		$result = array();

		$resIblock = \CIblockProperty::GetList(
			array(),
			array(
				"IBLOCK_ID"=>$parentIblockID,
				'ACTIVE' => 'Y',
				'CODE'=>self::$defaultRelatedCode
			),
			array('ID', 'CODE')
		);

		if ($resCode = $resIblock->Fetch()){

			if ($parentIblockID>0 && $parentID>0){

				$res = \CIBlockElement::GetList(
					array(),
					array(
						'ACTIVE' => 'Y',
						"IBLOCK_ID" => $parentIblockID,
						'PROPERTY_'.self::$defaultRelatedCode =>$parentID
					),
					false,
					false,
					array('ID', 'NAME', 'PROPERTY_'.self::$defaultRelatedCode)
				);

				while ($arRes = $res->Fetch()){
					$result[$parentIblockID][] = $arRes['ID'];
				}


			}
		}else{
			$result[$parentIblockID] = array();
		}



		return $result;
	}
}