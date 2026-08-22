<?php

namespace Alexkova\Business;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Alexkova\Business\Core;

Loc::loadMessages(__FILE__);

class Smartprice extends \Alexkova\Business\Core {

	static $defaultPriceCode = 'BXR_SMART_PRICE';
	static $defaultRelatedCode = 'BXR_SMART_PRICE_PARENT';

	static public function getComponentParams($arCurrentValues) {

		$arDefaultSettings = array();

		if (\CModule::IncludeModule('iblock')){
			$arDefaultSettings = array(
				"GROUPS" => array(
					"BXR_BUSINESS_SMARTPRICE" =>
						array('NAME' => Loc::getMessage('BXR_BUSINESS_SMARTPRICE'))
				),
				"PARAMETERS" => array(

					"BXR_BUSINESS_USE_SMARTPRICE" => array(
						"PARENT" => "BXR_BUSINESS_SMARTPRICE",
						"NAME" => GetMessage("BXR_BUSINESS_USE_SMARTPRICE"),
						"TYPE" => "CHECKBOX",
						"DEFAULT" => "N",
						"REFRESH" => "Y"
					),
				)
			);

			if (isset($arCurrentValues['BXR_BUSINESS_USE_SMARTPRICE']) && $arCurrentValues['BXR_BUSINESS_USE_SMARTPRICE'] == 'Y'){

				$arIBlocksList = array('0'=>Loc::getMessage("BXR_BUSINESS_SMARTPRICE_IBLOCK_ID_SELECT"));
				$db_iblock = \CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"]));

				while($arRes = $db_iblock->Fetch()){
					$arIBlocksList[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];
				}

				$arDefaultSettings['PARAMETERS']['BXR_BUSINESS_SMARTPRICE_IBLOCK_ID'] = array(
					"PARENT" => "BXR_BUSINESS_SMARTPRICE",
					"NAME" => Loc::getMessage("BXR_BUSINESS_SMARTPRICE_IBLOCK_ID"),
					"TYPE" => "LIST",
					"VALUES" => $arIBlocksList,
					"REFRESH" => "Y"
				);

			}

			if (
				isset($arCurrentValues['BXR_BUSINESS_USE_SMARTPRICE'])
				&& $arCurrentValues['BXR_BUSINESS_USE_SMARTPRICE'] == 'Y'
				&& $arCurrentValues['BXR_BUSINESS_SMARTPRICE_IBLOCK_ID'] > 0
			){

				$arDefaultSettings['PARAMETERS']['BXR_BUSINESS_SMARTPRICE_PROPERTY_CODE'] = array(
					"PARENT" => "BXR_BUSINESS_SMARTPRICE",
					"NAME" => Loc::getMessage("BXR_BUSINESS_SMARTPRICE_PROPERTY_CODE"),
					"TYPE" => "STRING",
					"DEFAULT" => "",
					"REFRESH" => "N"
				);



				//$arSection = array('0'=>Loc::getMessage("BXR_BUSINESS_SMARTPRICE_SECTION_SELECT"));
				$arSection = array();

				$arFilter = array(
					'IBLOCK_ID' => $arCurrentValues['BXR_BUSINESS_SMARTPRICE_IBLOCK_ID'],
					'ACTIVE'=>'Y'
				);

				$rsSect = \CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
				while ($arSect = $rsSect->GetNext())
				{
					$addContext = '';
					for ($i=0; $i<$arSect['DEPTH_LEVEL']; $i++) $addContext .= '.';
					$arSection[$arSect['ID']] = $addContext.' ['.$arSect['ID'].']'.$arSect['NAME'];
				}


				$arDefaultSettings['PARAMETERS']['BXR_BUSINESS_PRICE_SECTION'] = array(
					"PARENT" => "BXR_BUSINESS_SMARTPRICE",
					"NAME" => Loc::getMessage("BXR_BUSINESS_PRICE_SECTION"),
					"TYPE" => "LIST",
					"MULTIPLE" => "Y",
					"VALUES" => $arSection,
				);

				$arDefaultSettings['PARAMETERS']['BXR_BUSINESS_INCLUDE_SUBSECTION'] = array(
					"PARENT" => "BXR_BUSINESS_SMARTPRICE",
					"NAME" => Loc::getMessage("BXR_BUSINESS_INCLUDE_SUBSECTION"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "N",
				);

				/*$arDefaultSettings['PARAMETERS']['BXR_BUSINESS_USE_ELEMENT_FILTER'] = array(
					"PARENT" => "BXR_BUSINESS_SMARTPRICE",
					"NAME" => Loc::getMessage("BXR_BUSINESS_USE_ELEMENT_FILTER"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "N",
					'REFRESH' => 'Y'
				);

				if (
					isset($arCurrentValues['BXR_BUSINESS_USE_ELEMENT_FILTER'])
					&& $arCurrentValues['BXR_BUSINESS_USE_ELEMENT_FILTER'] == 'Y'
				){
					$arDefaultSettings['PARAMETERS']['BXR_BUSINESS_ELEMENT_ID'] = array(
						"PARENT" => "BXR_BUSINESS_SMARTPRICE",
						"NAME" => Loc::getMessage("IBLOCK_ELEMENT_ID"),
						"TYPE" => "STRING",
						"DEFAULT" => '',
					);

					$arDefaultSettings['PARAMETERS']['BXR_BUSINESS_ELEMENT_ID_VARIABLE'] = array(
						"PARENT" => "BXR_BUSINESS_SMARTPRICE",
						"NAME" => Loc::getMessage("IBLOCK_ELEMENT_ID_VARIABLE"),
						"TYPE" => "STRING",
						"DEFAULT" => '={$_REQUEST["ID"]}',
					);
				}*/



				/*$arDefaultSettings['PARAMETERS']['BXR_BUSINESS_PRICE_AJAX'] = array(
					"PARENT" => "BXR_BUSINESS_SMARTPRICE",
					"NAME" => Loc::getMessage("BXR_BUSINESS_PRICE_AJAX"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "N",
				);*/
			}
		}

		return $arDefaultSettings;

	}
}
