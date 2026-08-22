<?php

namespace Alexkova\Business;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Alexkova\Business\Core;

Loc::loadMessages(__FILE__);

class Menu extends \Alexkova\Business\Core {

	static $defaultPriceCode = 'BXR_SMART_PRICE';
	static $defaultRelatedCode = 'BXR_SMART_PRICE_PARENT';

	static public function getComponentParams($arCurrentValues) {

		$arDefaultSettings = array();

                $arDefaultSettings = array(
                        "GROUPS" => array(
                            "LEFT_MENU_SETTINGS" =>
                                array('NAME' => Loc::getMessage('LEFT_MENU_SETTINGS'), 'SORT'=> 103)
                        ),
                        "PARAMETERS" => array(
                            "SHOW_LEFT_MENU" => array(
                                "PARENT" => "LEFT_MENU_SETTINGS",
                                "NAME" => GetMessage("SHOW_LEFT_MENU"),
                                "TYPE" => "CHECKBOX",
                                "DEFAULT" => "Y",
                                "REFRESH" => "Y",
                           ),
                        )
                );
                
                if($arCurrentValues["SHOW_LEFT_MENU"] == "Y")
                {
                    $site = ($_REQUEST["site"] <> ''? $_REQUEST["site"] : ($_REQUEST["src_site"] <> ''? $_REQUEST["src_site"] : false));
                    $arMenu = GetMenuTypes($site);

                    $arStyleMenu = array(
                        "colored_light" => GetMessage("LIGHT_STYLE_MENU"),
                        "colored_dark" => GetMessage("DARK_STYLE_MENU"),
                        "colored_color" => GetMessage("COLOR_STYLE_MENU"),
                    );


                    $arPictureSection = array("N" => GetMessage("PICTURE_SECTION_N"), "ICO" => GetMessage("PICTURE_SECTION_ICO"), "ICO_DEFAULT" => GetMessage("PICTURE_SECTION_ICO_DEFAULT"));
                    $arMenuTemplate = array("left" => GetMessage("LEFT_MENU_TEMPLATE_LEFT"), "left_hover" => GetMessage("LEFT_MENU_TEMPLATE_LEFT_HOVER"));

                    $arComponentParametersLeftMenu = array(
                        "LEFT_MENU_TEMPLATE" => Array(
                                "NAME"=>GetMessage("LEFT_MENU_TEMPLATE"),
                                "TYPE" => "LIST",
                                "DEFAULT"=>'left',
                                "VALUES" => $arMenuTemplate,
                                "DEFAULT"=>'left',
                                "PARENT" => "LEFT_MENU_SETTINGS",
                                "REFRESH" => "Y",
                        ),

                        "ROOT_MENU_TYPE" => Array(
                                "NAME"=>GetMessage("MAIN_MENU_TYPE_NAME"),
                                "TYPE" => "LIST",
                                "DEFAULT"=>'left',
                                "VALUES" => $arMenu,
                                "ADDITIONAL_VALUES" => "Y",
                                "DEFAULT"=>'left',
                                "PARENT" => "LEFT_MENU_SETTINGS",
                                "COLS" => 45
                        ),

                        "MAX_LEVEL" => Array(
                                "NAME"=>GetMessage("MAX_LEVEL_NAME"),
                                "TYPE" => "LIST",
                                "DEFAULT"=>'1',
                                "PARENT" => "LEFT_MENU_SETTINGS",
                                "VALUES" => Array(
                                        1 => "1",
                                        2 => "2",
                                        3 => "3",
                                        4 => "4",
                                ),
                                "ADDITIONAL_VALUES"	=> "N",
                        ),

                        "CHILD_MENU_TYPE" => Array(
                                "NAME"=>GetMessage("CHILD_MENU_TYPE_NAME"),
                                "TYPE" => "LIST",
                                "DEFAULT"=>'left',
                                "VALUES" => $arMenu,
                                "ADDITIONAL_VALUES"	=> "Y",
                                "PARENT" => "LEFT_MENU_SETTINGS",
                                "DEFAULT"=>'left',
                                "COLS" => 45
                        ),

                        "USE_EXT" => Array(
                                "NAME"=>GetMessage("USE_EXT_NAME"),
                                "TYPE" => "CHECKBOX",
                                "DEFAULT"=>'Y',
                                "PARENT" => "LEFT_MENU_SETTINGS",
                        ),

                        "DELAY" => Array(
                                "NAME"=>GetMessage("DELAY_NAME"),
                                "TYPE" => "CHECKBOX",
                                "DEFAULT"=>'N',
                                "PARENT" => "LEFT_MENU_SETTINGS",
                        ),

                        "TITLE_MENU" => array(
                            "PARENT" => "LEFT_MENU_SETTINGS",
                            "NAME" => GetMessage("TITLE_MENU"),
                            "TYPE" => "STRING ",
                            "DEFAULT" => "",
                        ),    

                        "STYLE_MENU" => array(
                            "PARENT" => "LEFT_MENU_SETTINGS",
                            "NAME" => GetMessage("STYLE_MENU"),
                            "TYPE" => "LIST",
                            "VALUES" => $arStyleMenu,
                            "DEFAULT" => "colored_light",
                        ),            

                        "PICTURE_SECTION" => array(
                            "PARENT" => "LEFT_MENU_SETTINGS",
                            "NAME" => GetMessage("PICTURE_SECTION"),
                            "TYPE" => "LIST",
                            "VALUES" => $arPictureSection,
                            "DEFAULT" => "N",
                            "REFRESH" => "Y", /*!!!*/
                        ),
                    );        
                    $arDefaultSettings["PARAMETERS"] = array_merge($arDefaultSettings["PARAMETERS"], $arComponentParametersLeftMenu);

                    if($arCurrentValues["LEFT_MENU_TEMPLATE"] == "left" || !isset($arCurrentValues["LEFT_MENU_TEMPLATE"])) {
                        $arSubmenu = array("ACTIVE_SHOW" => GetMessage("SUBMENU_ACTIVE_SHOW"), "SHOW" => GetMessage("SUBMENU_SHOW"), "NOT_SHOW" => GetMessage("SUBMENU_NOT_SHOW"));

                        $arDefaultSettings["PARAMETERS"]["SUBMENU"] = array (
                            "PARENT" => "LEFT_MENU_SETTINGS",
                            "NAME" => GetMessage("SUBMENU"),
                            "TYPE" => "LIST",
                            "VALUES" => $arSubmenu,
                            "DEFAULT" => "ACTIVE_SHOW",
                        );
                    }

                    if($arCurrentValues["LEFT_MENU_TEMPLATE"] == "left_hover") {

                        $arLeftMenuColor = array(
                            "light" => GetMessage("ICO_LEFT_MENU_COLOR_LIGHT"),
                            "dark" => GetMessage("ICO_LEFT_MENU_COLOR_DARK"),
                            "color" => GetMessage("ICO_LEFT_MENU_COLOR_COLOR")
                        );
    
                        if($arCurrentValues["PICTURE_SECTION"] === "ICO" || $arCurrentValues["PICTURE_SECTION"] === "ICO_DEFAULT") {
                                $arDefaultSettings["PARAMETERS"]["ICO_LEFT_MENU_COLOR_1"] = array(
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("ICO_LEFT_MENU_COLOR_1"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arLeftMenuColor,
                                    "DEFAULT" => "color",
                                );

                                $arDefaultSettings["PARAMETERS"]["ICO_LEFT_MENU_COLOR_2"] = array(
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("ICO_LEFT_MENU_COLOR_2"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arLeftMenuColor,
                                    "DEFAULT" => "light",
                                );
                        }

                        $arTemplateMenuHover = array("classic" => GetMessage("CLASSIC_HOVER_MENU"), "list" => GetMessage("LIST_HOVER_MENU"));

                        $arDefaultSettings["PARAMETERS"]["HOVER_TEMPLATE"] = array (
                            "PARENT" => "LEFT_MENU_SETTINGS",
                            "NAME" => GetMessage("TEMPLATE_MENU_HOVER"),
                            "TYPE" => "LIST",
                            "VALUES" => $arTemplateMenuHover,
                            "DEFAULT" => "classic",
                            "REFRESH" => "Y",
                        );
                        if(!isset($arCurrentValues["HOVER_TEMPLATE"]) || $arCurrentValues["HOVER_TEMPLATE"] == "classic") {
                            $arStyleMenuHover = array(
                                "colored_light" => GetMessage("LIGHT_STYLE_MENU"),
                                "colored_color" => GetMessage("COLOR_STYLE_MENU"),
                                "colored_dark" => GetMessage("DARK_STYLE_MENU"),
                            );

                            $arDefaultSettings["PARAMETERS"]["STYLE_MENU_HOVER"] = array (
                                "PARENT" => "LEFT_MENU_SETTINGS",
                                "NAME" => GetMessage("STYLE_MENU_HOVER"),
                                "TYPE" => "LIST",
                                "VALUES" => $arStyleMenuHover,
                                "DEFAULT" => "colored_light",
                            );

                            $arDefaultSettings["PARAMETERS"]["PICTURE_SECTION_HOVER"] = array (
                                "PARENT" => "LEFT_MENU_SETTINGS",
                                "NAME" => GetMessage("PICTURE_SECTION_HOVER"),
                                "TYPE" => "LIST",
                                "VALUES" => $arPictureSection,
                                "DEFAULT" => "N",
                                "REFRESH" => "Y", /*!!!*/
                            );
                            
                            if(!isset($arCurrentValues["PICTURE_SECTION_HOVER"]) || $arCurrentValues["PICTURE_SECTION_HOVER"] === "ICO" || $arCurrentValues["PICTURE_SECTION_HOVER"] === "ICO_DEFAULT") {
                                $arLeftMenuColor = array(
                                    "light" => GetMessage("ICO_LEFT_MENU_COLOR_LIGHT"),
                                    "dark" => GetMessage("ICO_LEFT_MENU_COLOR_DARK"),
                                    "color" => GetMessage("ICO_LEFT_MENU_COLOR_COLOR")
                                );

                                $arDefaultSettings["PARAMETERS"]["ICO_LEFT_MENU_HOVER_COLOR_1"] = array(
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("ICO_LEFT_MENU_HOVER_COLOR_1"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arLeftMenuColor,
                                    "DEFAULT" => "color",
                                );

                                $arDefaultSettings["PARAMETERS"]["ICO_LEFT_MENU_HOVER_COLOR_2"] = array(
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("ICO_LEFT_MENU_HOVER_COLOR_2"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arLeftMenuColor,
                                    "DEFAULT" => "light",
                                );
                            } 
                        }
                        elseif($arCurrentValues["HOVER_TEMPLATE"] == "list") {
                                $arStyleMenuHover = array(
                                    "colored_light" => GetMessage("LIGHT_STYLE_MENU"),
                                );

                                $arDefaultSettings["PARAMETERS"]["STYLE_MENU_HOVER"] = array (
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("STYLE_MENU_HOVER"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arStyleMenuHover,
                                    "DEFAULT" => "colored_light",
                                );

                                $arPictureSection["IMG"] = GetMessage("PICTURE_SECTION_PICTURE");
                                $arDefaultSettings["PARAMETERS"]["PICTURE_SECTION_HOVER"] = array (
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("PICTURE_SECTION_HOVER"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arPictureSection,
                                    "DEFAULT" => "N",
                                );

                                $arPictureCategories = array("N" => GetMessage("PICTURE_CATEGARIES_N"), "left" => GetMessage("PICTURE_CATEGARIES_LEFT"), "right" => GetMessage("PICTURE_CATEGARIES_RIGHT"));
                                $arDefaultSettings["PARAMETERS"]["PICTURE_CATEGARIES"] = array(
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("PICTURE_CATEGARIES"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arPictureCategories,
                                    "DEFAULT" => "N",
                                );

                                $arColHoverMenu = array("1" => "1", "2" => "2", "3" => "3", "4" => "4" );


                                $arDefaultSettings["PARAMETERS"]["HOVER_MENU_COL_LG"] = array(
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("HOVER_MENU_COL_LG"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arColHoverMenu,
                                    "DEFAULT" => "2",
                                );

                                $arDefaultSettings["PARAMETERS"]["HOVER_MENU_COL_MD"] = array(
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("HOVER_MENU_COL_MD"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arColHoverMenu,
                                    "DEFAULT" => "2",
                                );    

                                $arDefaultSettings["PARAMETERS"]["HOVER_MENU_COL_SM"] = array(
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("HOVER_MENU_COL_SM"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arColHoverMenu,
                                    "DEFAULT" => "1",
                                );

                                $arDefaultSettings["PARAMETERS"]["HOVER_MENU_COL_XS"] = array(
                                    "PARENT" => "LEFT_MENU_SETTINGS",
                                    "NAME" => GetMessage("HOVER_MENU_COL_XS"),
                                    "TYPE" => "LIST",
                                    "VALUES" => $arColHoverMenu,
                                    "DEFAULT" => "1",
                                );
                        }
                    }

                }
                        
                        
                        /***

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
				);***/

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
			/*}***/

		return $arDefaultSettings;

	}
}
