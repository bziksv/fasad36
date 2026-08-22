<?php
/*
 * Old Class to BXready2
 */
namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
//use Bitrix\Main\Config\Option;
use Alexkova\Bxready2\Library;

Loc::loadMessages(__FILE__);

class Component extends \Alexkova\Bxready2\Library {

	static $relatedParameters = array(
		'max_count' => 5,
		'params' => array(
			'BXR_RELATED_IBLOCK_TYPE',
			'BXR_RELATED_IBLOCK_ID',
			'BXR_RELATED_IBLOCK_FIELDS',
			'BXR_RELATED_IBLOCK_PROPERTIES',
			'BXR_RELATED_IBLOCK_SORT_FILELD',
			'BXR_RELATED_IBLOCK_SORT_ORDER',
			'BXR_RELATED_IBLOCK_SORT',
			'BXR_RELATED_IBLOCK_AREA',
			'BXR_RELATED_ELEMENTS_COUNT',
			'BXREADY_LIST_PAGE_BLOCK_TITLE',
			'BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON',
			'BXREADY_LIST_BOOTSTRAP_GRID_STYLE',

			'BXREADY_LIST_LG_CNT',
			'BXREADY_LIST_MD_CNT',
			'BXREADY_LIST_SM_CNT',
			'BXREADY_LIST_XS_CNT',

			'BXREADY_ELEMENT_ADDCLASS',
			'BXREADY_USE_ELEMENTCLASS',

			'BXREADY_LIST_SLIDER',
			'BXREADY_LIST_VERTICAL_SLIDER_MODE',
			'BXREADY_LIST_HIDE_SLIDER_ARROWS',
			'BXREADY_LIST_SLIDER_MARKERS',
			'BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS',
			'BXREADY_LIST_SLIDER_AUTOSCROLL',
                        'BXREADY_LIST_SLIDER_SCROLLSPEED',
                        'BXREADY_LIST_SLIDER_AUTOPLAY_SPEEDD',

			'BXREADY_LIST_TYPES',
			'BXREADY_USER_TYPES',
			'BXREADY_USER_TYPE_VARIANT',
			'BXREADY_SECTION_DRAW',
			'BXREADY_COLLECTION_DRAW',
			'BXREADY_ELEMENT_DRAW',
			'BXREADY_ELEMENT_EXT_PARAMS',
			'BXR_RELATED_LIST_COUNT',
			'BXREADY_VERTICAL_ALIGN'
		)
	);

	static $defaultBootstrapGrids = array(
		//10 => 10,
		12 => 12,
	);

	public static function getListSettings($bootstrapGridCount = 12, $arCurrentValues, $defaultTypes = '', $addIndex = 0){

		$arColCnt = array();

		if ($bootstrapGridCount>0){
			for($i=1; $i<=$bootstrapGridCount; $i++){
				if (($bootstrapGridCount % $i) == 0){
					$arColCnt[$i] = $bootstrapGridCount / $i;
				}
			}
		}

		$addContext = $addIndex>0 ? '_'.strval($addIndex) : '';

		$arDefaultSettings = array(
			"LIST_PARAMS" => array(

				"BXREADY_LIST_LG_CNT".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE",
					"NAME" => GetMessage("LG_CNT"),
					"TYPE" => "LIST",
					"DEFAULT" => "ASC",
					"VALUES" => $arColCnt,
					"ADDITIONAL_VALUES" => "N",
				),

				"BXREADY_LIST_MD_CNT".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE",
					"NAME" => GetMessage("MD_CNT"),
					"TYPE" => "LIST",
					"DEFAULT" => "ASC",
					"VALUES" => $arColCnt,
					"ADDITIONAL_VALUES" => "N",
				),

				"BXREADY_LIST_SM_CNT".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE",
					"NAME" => GetMessage("SM_CNT"),
					"TYPE" => "LIST",
					"DEFAULT" => "ASC",
					"VALUES" => $arColCnt,
					"ADDITIONAL_VALUES" => "N",
				),

				"BXREADY_LIST_XS_CNT".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE",
					"NAME" => GetMessage("XS_CNT"),
					"TYPE" => "LIST",
					"DEFAULT" => "ASC",
					"VALUES" => $arColCnt,
					"ADDITIONAL_VALUES" => "N",
				),

				"BXREADY_ELEMENT_ADDCLASS".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE",
					"NAME" => GetMessage("BXREADY_ELEMENT_ADDCLASS"),
					"TYPE" => "STRING",
				),

				"BXREADY_USE_ELEMENTCLASS".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE",
					"NAME" => GetMessage("BXREADY_USE_ELEMENTCLASS"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "Y",
				),

				"BXREADY_VERTICAL_ALIGN".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE",
					"NAME" => GetMessage("BXREADY_VERTICAL_ALIGN"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "Y"
				),

				"BXREADY_LIST_SLIDER".$addContext => array(
					"PARENT" => "BXREADY_SLIDER_MODE",
					"NAME" => GetMessage("SLIDER_MODE"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "N",
					"REFRESH" => "Y"
				),
			)
		);

		if (isset($arCurrentValues['BXREADY_LIST_SLIDER'.$addContext]) && $arCurrentValues['BXREADY_LIST_SLIDER'.$addContext] == 'Y'){

			$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_VERTICAL_SLIDER_MODE".$addContext] = array(
				"PARENT" => "BXREADY_SLIDER_MODE",
				"NAME" => GetMessage("VERTICAL_SLIDER_MODE"),
				"TYPE" => "CHECKBOX",
				"DEFAULT" => "N",
			);

			$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_HIDE_SLIDER_ARROWS".$addContext] = array(
				"PARENT" => "BXREADY_SLIDER_MODE",
				"NAME" => GetMessage("HIDE_SLIDER_ARROWS_DESC"),
				"TYPE" => "CHECKBOX",
				"DEFAULT" => "Y",
			);

			$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_SLIDER_MARKERS".$addContext] = array(
				"PARENT" => "BXREADY_SLIDER_MODE",
				"NAME" => GetMessage("BXREADY_LIST_SLIDER_MARKERS_DESC"),
				"TYPE" => "CHECKBOX",
				"DEFAULT" => "Y",
			);

			$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS".$addContext] = array(
				"PARENT" => "BXREADY_SLIDER_MODE",
				"NAME" => GetMessage("HIDE_MOBILE_SLIDER_ARROWS_DESC"),
				"TYPE" => "CHECKBOX",
				"DEFAULT" => "N",
			);

			$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_SLIDER_AUTOSCROLL".$addContext] = array(
				"PARENT" => "BXREADY_SLIDER_MODE",
				"NAME" => GetMessage("SLIDER_AUTOSCROLL_DESC"),
				"TYPE" => "CHECKBOX",
				"DEFAULT" => "N",
				"REFRESH" => "Y"
			);

			if (isset($arCurrentValues['BXREADY_LIST_SLIDER_AUTOSCROLL'.$addContext])
				&& $arCurrentValues['BXREADY_LIST_SLIDER_AUTOSCROLL'.$addContext] == 'Y'){
                            
				$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_SLIDER_SCROLLSPEED".$addContext] = array(
					"PARENT" => "BXREADY_SLIDER_MODE",
					"NAME" => GetMessage("SLIDER_SCROLLSPEED_DESC"),
					"TYPE" => "STRING",
					"DEFAULT" => "300",
				);
                                
                                $arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_SLIDER_AUTOPLAY_SPEEDD".$addContext] = array(
					"PARENT" => "BXREADY_SLIDER_MODE",
					"NAME" => GetMessage("SLIDER_AUTOPLAY_SPEEDD_DESC"),
					"TYPE" => "STRING",
					"DEFAULT" => "2500",
				);                                
			}
		}

		if (strlen($defaultTypes)>0){
			$arCurrentValues['BXREADY_LIST_TYPES'.$addContext] = $defaultTypes;
		}else{
			$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_TYPES".$addContext] = array(
				"PARENT" => "BXREADY_LIST_COLLECTION",
				"NAME" => GetMessage("BXREADY_LIST_TYPES_TITLE"),
				"TYPE" => "LIST",
				"VALUES" => array(
					"ecommerce" => 'E-Commerce',
					"elements" => 'ib-Elements',
				),
				"REFRESH" => "Y"
			);
		}

		$arDefaultSettings['LIST_PARAMS']["BXREADY_ELEMENT_EXT_PARAMS".$addContext] = array(
			"PARENT" => "BXREADY_LIST_COLLECTION",
			"NAME" => GetMessage("BXREADY_ELEMENT_EXT_PARAMS"),
			"TYPE" => "STRING",
			"DEFAULT" => "arrExtParams"
		);

		$arDefaultSettings['LIST_PARAMS']["BXREADY_USER_TYPES".$addContext] = array(
			"PARENT" => "BXREADY_LIST_COLLECTION",
			"NAME" => GetMessage("BXREADY_USER_TYPES"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y"
		);

		if (isset($arCurrentValues['BXREADY_USER_TYPES'.$addContext]) && $arCurrentValues['BXREADY_USER_TYPES'.$addContext] == 'Y'){

			$arDefaultSettings['LIST_PARAMS']["BXREADY_USER_TYPE_VARIANT".$addContext] = array(
				"PARENT" => "BXREADY_LIST_COLLECTION",
				"NAME" => GetMessage("BXREADY_USER_TYPE_VARIANT"),
				"TYPE" => "STRING",
			);

			if (strlen($arCurrentValues["BXREADY_USER_TYPE_VARIANT".$addContext])>0){
				$pathElement = $_SERVER['DOCUMENT_ROOT'].\Alexkova\Bxready2\Draw::getElementPath($arCurrentValues["BXREADY_LIST_TYPES".$addContext], $arCurrentValues["BXREADY_USER_TYPE_VARIANT".$addContext], true, $arCurrentValues["BXREADY_USER_TYPE_VARIANT".$addContext]);
				if (strlen($pathElement)>0){
					if (file_exists($pathElement."/.parameters.php")){
						$arElementParameters = array();
						include ($pathElement."/.parameters.php");
						foreach ($arElementParameters as $cell=>$val){
							$arDefaultSettings['LIST_PARAMS'][$cell] = $val;
						}
					}

				}
			}

		}else{
			$arCollectionTypes = (isset($arCurrentValues['BXREADY_LIST_TYPES'.$addContext]) && strlen($arCurrentValues['BXREADY_LIST_TYPES'.$addContext])>0) ? $arCurrentValues['BXREADY_LIST_TYPES'.$addContext] : '';
			$arCollectionSection = (isset($arCurrentValues['BXREADY_SECTION_DRAW'.$addContext]) && strlen($arCurrentValues['BXREADY_SECTION_DRAW'.$addContext])>0) ? $arCurrentValues['BXREADY_SECTION_DRAW'.$addContext] : '';
			$arCollectionCollection = (isset($arCurrentValues['BXREADY_COLLECTION_DRAW'.$addContext]) && strlen($arCurrentValues['BXREADY_COLLECTION_DRAW'.$addContext])>0) ? $arCurrentValues['BXREADY_COLLECTION_DRAW'.$addContext] : '';

			$arList = \Alexkova\Bxready2\Component::getListSelector($arCollectionTypes, $arCollectionSection, $arCollectionCollection);

			if (count($arList["SECTIONS"])>0){
				$arDefaultSettings['LIST_PARAMS']["BXREADY_SECTION_DRAW".$addContext] = array(
					"PARENT" => "BXREADY_LIST_COLLECTION",
					"NAME" => GetMessage("BXREADY_SECTION_DRAW"),
					"TYPE" => "LIST",
					"VALUES"=> $arList["SECTIONS"],
					"REFRESH" => "Y"
				);
			}

			$arDefaultSettings['LIST_PARAMS']["BXREADY_COLLECTION_DRAW".$addContext] = array(
				"PARENT" => "BXREADY_LIST_COLLECTION",
				"NAME" => GetMessage("BXREADY_COLLECTION_DRAW"),
				"TYPE" => "LIST",
				"VALUES"=> $arList["COLLECTIONS"],
				"REFRESH" => "Y"
			);

			$arDefaultSettings['LIST_PARAMS']["BXREADY_ELEMENT_DRAW".$addContext] = array(
				"PARENT" => "BXREADY_LIST_COLLECTION",
				"NAME" => GetMessage("BXREADY_ELEMENT_DRAW"),
				"TYPE" => "LIST",
				"VALUES"=> $arList["ELEMENTS"],
				"REFRESH" => "Y"
			);
		}

		$pathElement = $_SERVER['DOCUMENT_ROOT'].\Alexkova\Bxready2\Draw::getElementPath($arCurrentValues["BXREADY_LIST_TYPES".$addContext], $arCurrentValues["BXREADY_ELEMENT_DRAW".$addContext]);

		if (strlen($pathElement)>0){
			if (file_exists($pathElement."/.parameters.php")){

				$arElementParameters = array();
				include ($pathElement."/.parameters.php");
				foreach ($arElementParameters as $cell=>$val){
					$arDefaultSettings['LIST_PARAMS'][$cell.$addContext] = $val;
				}
			}
		}



		$arDefaultSettings["LIST_GROUPS"] = array(
			"BXREADY_LIST_MODE"=>array("NAME"=>GetMessage("BXREADY_LIST_MODE_DESC")),
			"BXREADY_LIST_COLLECTION"=>array("NAME"=>GetMessage("BXREADY_LIST_COLLECTION_DESC")),
			"BXR_ELEMENT_SETTINGS"=>array("NAME"=>GetMessage('BXR_ELEMENT_SETTINGS')),
			"BXREADY_SLIDER_MODE"=>array("NAME"=>GetMessage("BXREADY_SLIDER_MODE_DESC"))

		);

		return $arDefaultSettings;
	}

	public static function getCustomListSettings($bootstrapGridCount = 12, $arCurrentValues, $settings= array(), $addContext = '', $addTitle=''){

		//if (!is_array($settings['collection']) || count($settings['collection'])<=0) return array();
		//return self::_getCustomListSettings($bootstrapGridCount, $arCurrentValues, $settings, $addContext, $addTitle);

		$arColCnt = array();

		if ($bootstrapGridCount>0){
			for($i=1; $i<=$bootstrapGridCount; $i++){
				if (($bootstrapGridCount % $i) == 0){
					$arColCnt[$i] = $bootstrapGridCount / $i;
				}
			}
		}

		if (strlen($addTitle)<=0) $addTitle = $addContext;
		$addContext = "_".$addContext;

		if ($settings["sort"]>0){
			$sortStart = $settings["sort"];
		}else{
			$sortStart = 100;
		}


		$arDefaultSettings = array(
			"LIST_PARAMS" => array(

				"BXREADY_LIST_LG_CNT".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE".$addContext,
					"NAME" => GetMessage("LG_CNT"),
					"TYPE" => "LIST",
					"DEFAULT" => "ASC",
					"VALUES" => $arColCnt,
					"ADDITIONAL_VALUES" => "N",
				),

				"BXREADY_LIST_MD_CNT".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE".$addContext,
					"NAME" => GetMessage("MD_CNT"),
					"TYPE" => "LIST",
					"DEFAULT" => "ASC",
					"VALUES" => $arColCnt,
					"ADDITIONAL_VALUES" => "N",
				),

				"BXREADY_LIST_SM_CNT".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE".$addContext,
					"NAME" => GetMessage("SM_CNT"),
					"TYPE" => "LIST",
					"DEFAULT" => "ASC",
					"VALUES" => $arColCnt,
					"ADDITIONAL_VALUES" => "N",
				),

				"BXREADY_LIST_XS_CNT".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE".$addContext,
					"NAME" => GetMessage("XS_CNT"),
					"TYPE" => "LIST",
					"DEFAULT" => "ASC",
					"VALUES" => $arColCnt,
					"ADDITIONAL_VALUES" => "N",
				),

				"BXREADY_ELEMENT_ADDCLASS".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE".$addContext,
					"NAME" => GetMessage("BXREADY_ELEMENT_ADDCLASS"),
					"TYPE" => "STRING",
				),

				"BXREADY_USE_ELEMENTCLASS".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE".$addContext,
					"NAME" => GetMessage("BXREADY_USE_ELEMENTCLASS"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "Y",
				),

				"BXREADY_VERTICAL_ALIGN".$addContext => array(
					"PARENT" => "BXREADY_LIST_MODE".$addContext,
					"NAME" => GetMessage("BXREADY_VERTICAL_ALIGN"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "Y",
				),
			)
		);

		if ($settings['slider'] == true){

			$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_SLIDER".$addContext] = array(
				"PARENT" => "BXREADY_SLIDER_MODE".$addContext,
				"NAME" => GetMessage("SLIDER_MODE"),
				"TYPE" => "CHECKBOX",
				"DEFAULT" => "N",
				"REFRESH" => "Y"
			);

			if (isset($arCurrentValues['BXREADY_LIST_SLIDER'.$addContext]) && $arCurrentValues['BXREADY_LIST_SLIDER'.$addContext] == 'Y'){

				$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_VERTICAL_SLIDER_MODE".$addContext] = array(
					"PARENT" => "BXREADY_SLIDER_MODE".$addContext,
					"NAME" => GetMessage("VERTICAL_SLIDER_MODE"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "N",
				);

				$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_HIDE_SLIDER_ARROWS".$addContext] = array(
					"PARENT" => "BXREADY_SLIDER_MODE".$addContext,
					"NAME" => GetMessage("HIDE_SLIDER_ARROWS_DESC"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "Y",
				);

				$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_SLIDER_MARKERS".$addContext] = array(
					"PARENT" => "BXREADY_SLIDER_MODE".$addContext,
					"NAME" => GetMessage("BXREADY_LIST_SLIDER_MARKERS_DESC"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "Y",
				);

				$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS".$addContext] = array(
					"PARENT" => "BXREADY_SLIDER_MODE".$addContext,
					"NAME" => GetMessage("HIDE_MOBILE_SLIDER_ARROWS_DESC"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "N",
				);

				$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_SLIDER_AUTOSCROLL".$addContext] = array(
					"PARENT" => "BXREADY_SLIDER_MODE".$addContext,
					"NAME" => GetMessage("SLIDER_AUTOSCROLL_DESC"),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "N",
					"REFRESH" => "Y"
				);

				if (isset($arCurrentValues['BXREADY_LIST_SLIDER_AUTOSCROLL'.$addContext])
					&& $arCurrentValues['BXREADY_LIST_SLIDER_AUTOSCROLL'.$addContext] == 'Y'){
                                    
					$arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_SLIDER_SCROLLSPEED".$addContext] = array(
						"PARENT" => "BXREADY_SLIDER_MODE".$addContext,
						"NAME" => GetMessage("SLIDER_SCROLLSPEED_DESC"),
						"TYPE" => "STRING",
						"DEFAULT" => "300",
					);
                                        
                                        $arDefaultSettings['LIST_PARAMS']["BXREADY_LIST_SLIDER_AUTOPLAY_SPEEDD".$addContext] = array(
                                                "PARENT" => "BXREADY_SLIDER_MODE".$addContext,
                                                "NAME" => GetMessage("SLIDER_AUTOPLAY_SPEEDD_DESC"),
                                                "TYPE" => "STRING",
                                                "DEFAULT" => "2500",
                                        );   
				}
			}

		}


		$arDefaultSettings['LIST_PARAMS']["BXREADY_ELEMENT_EXT_PARAMS".$addContext] = array(
			"PARENT" => "BXREADY_LIST_COLLECTION".$addContext,
			"NAME" => GetMessage("BXREADY_ELEMENT_EXT_PARAMS"),
			"TYPE" => "STRING",
			"DEFAULT" => "arrExtParams"
		);

		$arDefaultSettings['LIST_PARAMS']["BXREADY_USER_TYPES".$addContext] = array(
			"PARENT" => "BXREADY_LIST_COLLECTION".$addContext,
			"NAME" => GetMessage("BXREADY_USER_TYPES"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
			"REFRESH" => "Y"
		);

		if (isset($arCurrentValues['BXREADY_USER_TYPES'.$addContext]) && $arCurrentValues['BXREADY_USER_TYPES'.$addContext] == 'Y'){
			$arDefaultSettings['LIST_PARAMS']["BXREADY_USER_TYPE_VARIANT".$addContext] = array(
				"PARENT" => "BXREADY_LIST_COLLECTION".$addContext,
				"NAME" => GetMessage("BXREADY_USER_TYPE_VARIANT"),
				"TYPE" => "STRING",
			);

			if (strlen($arCurrentValues["BXREADY_USER_TYPE_VARIANT".$addContext])>0){
				$pathElement = $_SERVER['DOCUMENT_ROOT'].\Alexkova\Bxready2\Draw::getElementPath($arCurrentValues["BXREADY_LIST_TYPES".$addContext], $arCurrentValues["BXREADY_USER_TYPE_VARIANT".$addContext], true, $arCurrentValues["BXREADY_USER_TYPE_VARIANT".$addContext]);
				if (strlen($pathElement)>0){
					if (file_exists($pathElement."/.parameters.php")){
						$arElementParameters = array();
						include ($pathElement."/.parameters.php");
						foreach ($arElementParameters as $cell=>$val){
							$val['PARENT'] = $val['PARENT'].$addContext;
							$arDefaultSettings['LIST_PARAMS'][$cell] = $val;
						}
					}

				}
			}

		}else{
			$arCollectionTypes = 'elements';//(isset($arCurrentValues['BXREADY_LIST_TYPES'.$addContext]) && strlen($arCurrentValues['BXREADY_LIST_TYPES'.$addContext])>0) ? $arCurrentValues['BXREADY_LIST_TYPES'.$addContext] : '';
			$arCollectionSection = array();//(isset($arCurrentValues['BXREADY_SECTION_DRAW'.$addContext]) && strlen($arCurrentValues['BXREADY_SECTION_DRAW'.$addContext])>0) ? $arCurrentValues['BXREADY_SECTION_DRAW'.$addContext] : '';
			//$arCollectionCollection = (isset($arCurrentValues['BXREADY_COLLECTION_DRAW'.$addContext]) && strlen($arCurrentValues['BXREADY_COLLECTION_DRAW'.$addContext])>0) ? $arCurrentValues['BXREADY_COLLECTION_DRAW'.$addContext] : '';
			$arCollectionCollection = $settings['collection'];

			$arList = \Alexkova\Bxready2\Component::getCustomListSelector($arCollectionCollection);

			$arDefaultSettings['LIST_PARAMS']["BXREADY_ELEMENT_DRAW".$addContext] = array(
				"PARENT" => "BXREADY_LIST_COLLECTION".$addContext,
				"NAME" => GetMessage("BXREADY_ELEMENT_DRAW"),
				"TYPE" => "LIST",
				"VALUES"=> $arList["ELEMENTS"],
				"REFRESH"=> "Y"
			);


			$pathElement = $_SERVER['DOCUMENT_ROOT'].\Alexkova\Bxready2\Draw::getElementPath($arCollectionTypes, $arCurrentValues["BXREADY_ELEMENT_DRAW".$addContext]);

			if (strlen($pathElement)>0){
				if (file_exists($pathElement."/.parameters.php")){

					$arElementParameters = array();
					include ($pathElement."/.parameters.php");
					foreach ($arElementParameters as $cell=>$val){
						$val['PARENT'] = $val['PARENT'].$addContext;
						$arDefaultSettings['LIST_PARAMS'][$cell.$addContext] = $val;
					}
				}
			}

		}

		$arDefaultSettings["LIST_GROUPS"] = array(
			"BXREADY_LIST_MODE".$addContext=>array(
				"NAME"=>$addTitle.":".GetMessage("BXREADY_LIST_MODE_DESC"),
				"SORT" => $sortStart+1
			),
			"BXREADY_LIST_COLLECTION".$addContext=>array(
				"NAME"=>$addTitle.":".GetMessage("BXREADY_LIST_COLLECTION_DESC"),
				"SORT" => $sortStart+2
			),
			"BXR_ELEMENT_SETTINGS".$addContext=>array(
				"NAME"=>$addTitle.":".GetMessage('BXR_ELEMENT_SETTINGS'),
				"SORT" => $sortStart+3
			),
			"BXREADY_SLIDER_MODE".$addContext=>array(
				"NAME"=>$addTitle.":".GetMessage("BXREADY_SLIDER_MODE_DESC"),
				"SORT" => $sortStart+4
			),

		);

		return $arDefaultSettings;
	}



	public static function getRelatedListSettings($arSettings = array(), $arCurrentValues, $arAreas=array()){

		if(!\CModule::IncludeModule("iblock"))
			return;

		$arTypesEx = \CIBlockParameters::GetIBlockTypes(array("-"=>" "));
		$arIblocks = array();

		$arCountList = array();
		for ($i=1; $i<self::$relatedParameters['max_count']; $i++){
			$arCountList[$i] = $i;
		}


		$arDefaultSettings = array(
			"GROUPS" => array(
				"BXR_RELATED_ELEMENTS" =>
					array('NAME' => Loc::getMessage('BXR_RELATED_ELEMENTS'))
			),
			'PARAMETERS' => array(

				"BXR_USE_RELATED_ELEMENTS" => array(
					"PARENT" => "BXR_RELATED_ELEMENTS",
					"NAME" => Loc::getMessage('BXR_USE_RELATED_ELEMENTS'),
					"TYPE" => "CHECKBOX",
					"DEFAULT" => "N",
					"REFRESH" => "Y",
				),
			)
		);

		if (isset($arCurrentValues['BXR_USE_RELATED_ELEMENTS']) && $arCurrentValues['BXR_USE_RELATED_ELEMENTS'] == 'Y'){

			$arDefaultSettings['PARAMETERS']['BXR_RELATED_ELEMENTS_COUNT'] = array(
				"PARENT" => "BXR_RELATED_ELEMENTS",
				"NAME" => Loc::getMessage('BXR_RELATED_ELEMENTS_COUNT'),
				"TYPE" => "LIST",
				"DEFAULT" => "",
				"VALUES" => $arCountList,
				"REFRESH" => "Y",
			);

			if ($arCurrentValues['BXR_RELATED_ELEMENTS_COUNT']<=0) $arCurrentValues['BXR_RELATED_ELEMENTS_COUNT'] = 1;

			if (intval($arCurrentValues['BXR_RELATED_ELEMENTS_COUNT'])>0){

				for ($i=0; $i<intval($arCurrentValues['BXR_RELATED_ELEMENTS_COUNT']); $i++){

					$arDefaultSettings['GROUPS']['BXR_RELATED_GROUP_'.($i+1)] = array(
						'NAME' => str_replace('#NUMBER#',($i+1), Loc::getMessage('BXR_RELATED_GROUPS_NAME'))
					);
					$arDefaultSettings['GROUPS']['BXR_RELATED_GROUP_LIST_'.($i+1)] = array(
						'NAME' => str_replace('#NUMBER#',($i+1), Loc::getMessage('BXR_RELATED_GROUPS_LIST'))
					);
					$arDefaultSettings['GROUPS']['BXR_RELATED_GROUP_ELEMENTS_'.($i+1)] = array(
						'NAME' => str_replace('#NUMBER#',($i+1), Loc::getMessage('BXR_RELATED_GROUPS_ELEMENTS'))
					);

					$arDefaultSettings['PARAMETERS']['BXR_RELATED_IBLOCK_SORT_'.($i+1)] = array(
						"PARENT" => 'BXR_RELATED_GROUP_'.($i+1),
						"NAME" => Loc::getMessage('BXR_RELATED_IBLOCK_SORT'),
						"TYPE" => "STRING",
						"DEFAULT" => "500",
						"REFRESH" => "N",
					);

					if (count($arAreas)>0){

						$areaList = array();
						foreach($arAreas as $cell=>$val){
							$areaList[$cell] = $val;
						}

						$arDefaultSettings['PARAMETERS']['BXR_RELATED_IBLOCK_AREA_'.($i+1)] = array(
							"PARENT" => 'BXR_RELATED_GROUP_'.($i+1),
							"NAME" => Loc::getMessage('BXR_RELATED_IBLOCK_AREA'),
							"TYPE" => "LIST",
							"VALUES" => $areaList,
							"REFRESH" => "N",
						);

					}

					$arDefaultSettings['PARAMETERS']['BXR_RELATED_IBLOCK_TYPE_'.($i+1)] = array(
						"PARENT" => 'BXR_RELATED_GROUP_'.($i+1),
						"NAME" => Loc::getMessage('BXR_RELATED_IBLOCK_TYPE'),
						"TYPE" => "LIST",
						"DEFAULT" => "",
						"VALUES" => $arTypesEx,
						"REFRESH" => "Y",
					);

					if (isset($arCurrentValues['BXR_RELATED_IBLOCK_TYPE_'.($i+1)]) && strlen($arCurrentValues['BXR_RELATED_IBLOCK_TYPE_'.($i+1)])>0){

						$arIBlocksList = array();

						if (isset($arIblocks[$arCurrentValues['BXR_RELATED_IBLOCK_TYPE_'.($i+1)]])){
							$arIBlocksList = $arIblocks[$arCurrentValues['BXR_RELATED_IBLOCK_TYPE_'.($i+1)]];
						}else{
							$arIblocks[$arCurrentValues['BXR_RELATED_IBLOCK_TYPE_'.($i+1)]] = array();
							$db_iblock = \CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues['BXR_RELATED_IBLOCK_TYPE_'.($i+1)]!="-"?$arCurrentValues['BXR_RELATED_IBLOCK_TYPE_'.($i+1)] : "")));

							while($arRes = $db_iblock->Fetch()){
								$arIBlocksList[$arRes["ID"]] = $arRes["NAME"];
								if (intval($arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)])<=0) $arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)] = $arRes["ID"];
							}


							$arIblocks[$arCurrentValues['BXR_RELATED_IBLOCK_TYPE_'.($i+1)]] = $arIBlocksList;
						}

						$arDefaultSettings['PARAMETERS']['BXR_RELATED_IBLOCK_ID_'.($i+1)] = array(
							"PARENT" => 'BXR_RELATED_GROUP_'.($i+1),
							"NAME" => Loc::getMessage('BXR_RELATED_IBLOCK_ID'),
							"TYPE" => "LIST",
							"DEFAULT" => "",
							"VALUES" => $arIBlocksList,
							"REFRESH" => "Y",
						);

					}

					$arDefaultSettings['PARAMETERS']['BXR_RELATED_LIST_COUNT_'.($i+1)] = array(
						"PARENT" => 'BXR_RELATED_GROUP_'.($i+1),
						"NAME" => Loc::getMessage('BXR_RELATED_LIST_COUNT'),
						"TYPE" => "STRING",
						"DEFAULT" => "10",
						"REFRESH" => "N",
					);

					if (isset($arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)]) && intval($arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)])>0){

						$settings = \Alexkova\Bxready2\Component::getIblockRelatedSettings(
							array(
								'use_related' => true,
								'related_items' => array($arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)])
							)
						);


						$arAllFields = array('SORT'=>'SORT');

						if (count($settings['iblock'][$arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)]]['fields'])>0){
							$arDefaultSettings['PARAMETERS']['BXR_RELATED_IBLOCK_FIELDS_'.($i+1)] = array(
								"PARENT" => 'BXR_RELATED_GROUP_'.($i+1),
								"NAME" => Loc::getMessage('BXR_RELATED_IBLOCK_FIELDS'),
								"TYPE" => "LIST",
								"MULTIPLE" => "Y",
								"DEFAULT" => "",
								"VALUES" => $settings['iblock'][$arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)]]['fields'],
								"REFRESH" => "N",
							);
							$arAllFields = array_merge($arAllFields,$settings['iblock'][$arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)]]['fields']);
						}

						if (count($settings['iblock'][$arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)]]['properties'])>0){
							$arDefaultSettings['PARAMETERS']['BXR_RELATED_IBLOCK_PROPERTIES_'.($i+1)] = array(
								"PARENT" => 'BXR_RELATED_GROUP_'.($i+1),
								"NAME" => Loc::getMessage('BXR_RELATED_IBLOCK_PROPERTIES'),
								"TYPE" => "LIST",
								"MULTIPLE" => "Y",
								"DEFAULT" => "",
								"VALUES" => $settings['iblock'][$arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)]]['properties'],
								"REFRESH" => "N",
							);
							$arAllFields = array_merge($arAllFields,$settings['iblock'][$arCurrentValues['BXR_RELATED_IBLOCK_ID_'.($i+1)]]['properties']);
						}

						if (count($arAllFields)>0){
							$arDefaultSettings['PARAMETERS']['BXR_RELATED_IBLOCK_SORT_FILELD_'.($i+1)] = array(
								"PARENT" => 'BXR_RELATED_GROUP_'.($i+1),
								"NAME" => Loc::getMessage('BXR_RELATED_IBLOCK_SORT_FIELD'),
								"TYPE" => "LIST",
								"DEFAULT" => "",
								"VALUES" => $arAllFields,
								"REFRESH" => "N",
							);
							$arDefaultSettings['PARAMETERS']['BXR_RELATED_IBLOCK_SORT_ORDER_'.($i+1)] = array(
								"PARENT" => 'BXR_RELATED_GROUP_'.($i+1),
								"NAME" => Loc::getMessage('BXR_RELATED_IBLOCK_SORT_ORDER'),
								"TYPE" => "LIST",
								"DEFAULT" => "SORT",
								"VALUES" => array('asc'=>'ASC', 'desc'=>'DESC'),
								"REFRESH" => "N",
							);
						}

						$arDefaultSettings['PARAMETERS']['BXREADY_LIST_PAGE_BLOCK_TITLE_'.($i+1)] = array(
							"PARENT" => 'BXR_RELATED_GROUP_LIST_'.($i+1),
							"NAME" => GetMessage("PAGE_BLOCK_TITLE"),
							"TYPE" => "STRING",
							"DEFAULT" => "",
						);

						$arDefaultSettings['PARAMETERS']['BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON_'.($i+1)] = array(
							"PARENT" => 'BXR_RELATED_GROUP_LIST_'.($i+1),
							"NAME" => GetMessage("PAGE_BLOCK_TITLE_GLYPHICON"),
							"TYPE" => "STRING",
							"DEFAULT" => "",
						);

						$arDefaultSettings['PARAMETERS']['BXREADY_LIST_BOOTSTRAP_GRID_STYLE_'.($i+1)] = array(
							"PARENT" => 'BXR_RELATED_GROUP_LIST_'.($i+1),
							"NAME" => GetMessage("BOOTSTRAP_GRID_STYLE"),
							"TYPE" => "LIST",
							"VALUES" => self::$defaultBootstrapGrids,
							"REFRESH" => "Y",
							"DEFAULT" => 12
						);

						if(isset($arCurrentValues["BXREADY_LIST_BOOTSTRAP_GRID_STYLE_".($i+1)]) && intval($arCurrentValues["BXREADY_LIST_BOOTSTRAP_GRID_STYLE_".($i+1)])>0)
						{
							$arParameters = self::getListSettings(intval($arCurrentValues["BXREADY_LIST_BOOTSTRAP_GRID_STYLE_".($i+1)]), $arCurrentValues, '', $i+1);

							foreach($arParameters["LIST_GROUPS"] as $cell=>$val){
								$cell = $cell."_".($i+1);
								$val['NAME'] = str_replace('#TITLE#', $val['NAME'], Loc::getMessage('BXR_RELATED_GROUPS_LIST_TITLE'));
								$val['NAME'] = str_replace('#NUMBER#', strval($i+1), $val['NAME']);
								$arDefaultSettings["GROUPS"][$cell] = $val;
							}

							foreach($arParameters["LIST_PARAMS"] as $cell=>$val){
								$val["PARENT"] = $val["PARENT"]."_".($i+1);
								$arDefaultSettings["PARAMETERS"][$cell] = $val;
							}
						}
					}
				}
			}
		}

		return $arDefaultSettings;
	}

	public static function getIblockRelatedSettings($arSettings = array()){
		$result = $arSettings;

		if (!empty($arSettings)){

			if (isset($arSettings['use_related']) && $arSettings['use_related'] && count($arSettings['related_items'])>0){

				$queryCache = array();

				foreach ($arSettings['related_items'] as $val){

					$resultIblock = array();

					if (intval($val)>0){
						if (isset($queryCache[$val])){
							$resultIblock = $queryCache[$val];
						}else{
							$resultIblock['fields'] = array(
								'NAME' => Loc::getMessage('BXR_FIELDS_NAME'),
								'PREVIEW_PICTURE' => Loc::getMessage('BXR_FIELDS_PREVIEW_PICTURE'),
								'DETAIL_PICTURE' => Loc::getMessage('BXR_FIELDS_DETAIL_PICTURE'),
								'PREVIEW_TEXT' => Loc::getMessage('BXR_FIELDS_PREVIEW_TEXT'),
								'DETAIL_TEXT' => Loc::getMessage('BXR_FIELDS_DETAIL_TEXT'),
								'DATE_FROM' => Loc::getMessage('BXR_FIELDS_DATE_FROM'),
								'DATE_TO' => Loc::getMessage('BXR_FIELDS_DATE_TO'),
							);

							$props = \CIBlockProperty::GetList(
								Array("sort"=>"asc", "name"=>"asc"),
								Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$val)
							);
							while ($prop_fields = $props->GetNext())
							{
								if(strlen($prop_fields['CODE'])>0){
									$resultIblock['properties'][$prop_fields['CODE']] = $prop_fields['NAME'];
								}
							}

							$queryCache[$val] = $resultIblock;
							$result['iblock'][$val] = $resultIblock;
						}
					}
				}

			}
		}

		return $result;

	}

	public static function prepareRelatedParams($arParams = array(), $arAreas=array()){

		$result = array(
			'iblocks' => array(),
			'order'=>array(),
		);

                $arBxrPrst = array();
                foreach ($arParams as $k => $v) {
                    if(substr($k, 0, 9) == 'BXR_PRST_')
                          $arBxrPrst[$k] = $v;                        
                }

		if (isset($arParams['BXR_USE_RELATED_ELEMENTS']) && intval($arParams['BXR_RELATED_ELEMENTS_COUNT'])>0){
			for ($i=1; $i<=intval($arParams['BXR_RELATED_ELEMENTS_COUNT']); $i++){
				foreach (self::$relatedParameters['params'] as $val){
					if (isset($arParams[$val."_".$i])){
						$result['iblocks'][$i][$val] = $arParams[$val."_".$i];
					}
				}
                                foreach ($arBxrPrst as $k => $v) {
                                    if(substr($k, -(strlen($i)+1)) == '_'.$i) {
                                        $result['iblocks'][$i][substr($k, 0, -(strlen($i)+1))] = $v;
                                    }                                        
                                }                                    
				if (count($arAreas)>0){
					$result['order'][$arParams["BXR_RELATED_IBLOCK_AREA_".$i]][$i] = $arParams["BXR_RELATED_IBLOCK_SORT_".$i];
				}else{
					$result['order'][$i] = $arParams["BXR_RELATED_IBLOCK_SORT_".$i];
				}

			}
		}

		if (!empty($result['order'])){
			if (count($arAreas)>0){
				foreach ($result['order'] as &$area){
					asort($area);
				}
			}else{
				asort($result['order']);
			}

		}

		return $result;

	}

	public static function getRelatedIblockList($arParams = array()){

		$result = array(
		);

		if (isset($arParams['BXR_USE_RELATED_ELEMENTS']) && intval($arParams['BXR_RELATED_ELEMENTS_COUNT'])>0){
			for ($i=1; $i<=intval($arParams['BXR_RELATED_ELEMENTS_COUNT']); $i++){
				if (intval($arParams["BXR_RELATED_IBLOCK_ID_".$i])>0){
					$result[] = $arParams["BXR_RELATED_IBLOCK_ID_".$i];
				}
			}
		}

		return $result;

	}

	public static function prepareParams(&$arParams, $componentCode='all'){

		global $BXRGeneral, $APPLICATION;
		if (isset($BXRGeneral) && is_array($BXRGeneral)){

			if ($componentCode != 'all'){
				if (isset($BXRGeneral['PAGES']['all']['all']) && is_array($BXRGeneral['PAGES']['all']['all'])){
					foreach ($BXRGeneral['PAGES']['all']['all'] as $key=>$val){
						$arParams[$key] = $val;
					}
				}

				$page = $APPLICATION->GetCurPage();
				if (isset($BXRGeneral['PAGES'][$page]['all']) && is_array($BXRGeneral['PAGES'][$page]['all'])){
					foreach ($BXRGeneral['PAGES'][$page]['all'] as $key=>$val){
						$arParams[$key] = $val;
					}
				}
			}


			if (isset($BXRGeneral['PAGES']['all'][$componentCode]) && is_array($BXRGeneral['PAGES']['all'][$componentCode])){
				foreach ($BXRGeneral['PAGES']['all'][$componentCode] as $key=>$val){
					$arParams[$key] = $val;
				}
			}

			$page = $APPLICATION->GetCurPage();
			if (isset($BXRGeneral['PAGES'][$page][$componentCode]) && is_array($BXRGeneral['PAGES'][$page][$componentCode])){
				foreach ($BXRGeneral['PAGES'][$page][$componentCode] as $key=>$val){
					$arParams[$key] = $val;
				}
			}
		}

	}
}
