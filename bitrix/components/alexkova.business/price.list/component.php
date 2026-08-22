<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (
	!CModule::IncludeModule('alexkova.business')
	|| !CModule::IncludeModule('iblock')
) return;

function checkSection(&$arSection, $arSectionPrice){

	if (in_array($arSection['ID'], $arSectionPrice)) {
		return true;
	}

	$sectionIndicator = false;

	if (count($arSection['CHILD'])>0){
		foreach($arSection['CHILD'] as $cell=>$arSectionItem){
			if (!checkSection($arSectionItem, $arSectionPrice)){
				unset($arSection['CHILD'][$cell]);
			}else{
				$sectionIndicator = true;
			}
		}
	}

	if ($sectionIndicator) return true;

	return false;
}

$arResult = array();
$useCatalogModule = false;

if ($this->StartResultCache()){

	$priceList = array();

	if (!$useCatalogModule){

		if (isset($arParams["BXR_BUSINESS_SMARTPRICE_IBLOCK_ID"]) && intval($arParams["BXR_BUSINESS_SMARTPRICE_IBLOCK_ID"])>0){

			$arElementFilter = array(
				"IBLOCK_ID"=>intval($arParams["BXR_BUSINESS_SMARTPRICE_IBLOCK_ID"]),
				"ACTIVE" => 'Y'
			);

			$arSectionFilter = array(
				"IBLOCK_ID"=>intval($arParams["BXR_BUSINESS_SMARTPRICE_IBLOCK_ID"]),
				"ACTIVE" => 'Y'
			);

			if (isset($arParams["BXR_BUSINESS_PRICE_SECTION"]) && count($arParams["BXR_BUSINESS_PRICE_SECTION"])>0){
				$arElementFilter["SECTION_ID"] = $arParams["BXR_BUSINESS_PRICE_SECTION"];
			}
			if (isset($arParams["BXR_BUSINESS_INCLUDE_SUBSECTION"]) && $arParams["BXR_BUSINESS_INCLUDE_SUBSECTION"] == "Y"){
				$arElementFilter["INCLUDE_SUBSECTIONS"] = "Y";
			}

			$res = CIblockElement::GetList(
				array('sort'=>'asc'),
				$arElementFilter,
				false,
				false,
				array(
					"ID",
					'NAME',
					"IBLOCK_SECTION_ID"
				)
			);

			while ($arElement = $res->Fetch()){
				$arElement['PRICE'] = 300;
				$arElement['UNIT'] = 'barel';
				$priceList[$arElement["IBLOCK_SECTION_ID"]][] = $arElement;
			}

			$arResult['ELEMENTS'] = $priceList;
			$arSectionFilter = array(
				'IBLOCK_ID'=>$arParams["BXR_BUSINESS_SMARTPRICE_IBLOCK_ID"],
				'ACTIVE'=>'Y',
				"ID" => $arParams['BXR_BUSINESS_PRICE_SECTION']
			);

			$minLeft = 999999999; $maxRight = 0;

			$rsSect = CIBlockSection::GetList(
				array('DEPTH_LEVEL'=>'ASC','NAME'=>'ASC'),
				$arSectionFilter,
				false,
				array(
					'LEFT_MARGIN',
					'RIGHT_MARGIN',
					'ID'
				));

			while($arSection = $rsSect->GetNext()) {
				if ($arSection['LEFT_MARGIN']<$minLeft) $minLeft = $arSection['LEFT_MARGIN'];
				if ($arSection['RIGHT_MARGIN']>$maxRight) $maxRight = $arSection['RIGHT_MARGIN'];
			}

			unset($arSectionFilter['ID']);

			$arSectionFilter['>=LEFT_MARGIN'] = $minLeft;
			$arSectionFilter['<=RIGHT_MARGIN'] = $maxRight;

			$arSection = array();

			$useRoot = false;

			$rsSect = CIBlockSection::GetList(
				array('DEPTH_LEVEL'=>'ASC','NAME'=>'ASC'),
				$arSectionFilter,
				false,
				array(
					'ID',
					'NAME',
					'DEPTH_LEVEL',
					'IBLOCK_SECTION_ID'
				));

			$sectionLinc = array();
			$arResult['SECTION_TREE'] = array();

			while($arSection = $rsSect->GetNext()) {

				if (!$useRoot){
					$useRoot = true;
				}
				if (isset($sectionLinc[intval($arSection['IBLOCK_SECTION_ID'])])){
					$sectionLinc[intval($arSection['IBLOCK_SECTION_ID'])]['CHILD'][$arSection['ID']] = $arSection;
					$sectionLinc[$arSection['ID']] = &$sectionLinc[intval($arSection['IBLOCK_SECTION_ID'])]['CHILD'][$arSection['ID']];
				}else{
					$sectionLinc[0]['CHILD'][$arSection['ID']] = $arSection;
					$sectionLinc[$arSection['ID']] = &$sectionLinc[0]['CHILD'][$arSection['ID']];
				}
			}

			$arResult['SECTION_TREE'] = $sectionLinc[0];

			if (count($arParams['BXR_BUSINESS_PRICE_SECTION'])>0){
				checkSection($arResult['SECTION_TREE'], $arParams['BXR_BUSINESS_PRICE_SECTION']);
			}
		}
	}

	$this->IncludeComponentTemplate();
}

?>