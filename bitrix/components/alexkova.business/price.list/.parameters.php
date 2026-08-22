<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

//if (!CModule::IncludeModule('bxready2')) return;

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(

		"CACHE_TIME"  =>  Array("DEFAULT"=>3600),

	),
);

if (CModule::IncludeModule('alexkova.business')){

	$arCurrentValues["BXR_BUSINESS_USE_SMARTPRICE"] = "Y";

	$additionalParams = \Alexkova\Business\Smartprice::getComponentParams($arCurrentValues);

	if (is_array($additionalParams)){

		if (count($additionalParams['GROUPS'])>0){
			foreach ($additionalParams['GROUPS'] as $cell=>$val){
				$arComponentParameters['GROUPS'][$cell] = $val;
			}
		}

		if (count($additionalParams['PARAMETERS'])>0){
			foreach ($additionalParams['PARAMETERS'] as $cell=>$val){
				if ($cell != 'BXR_BUSINESS_USE_SMARTPRICE'){
					$val['PARENT'] = 'BASE';
					$arComponentParameters['PARAMETERS'][$cell] = $val;
				}

			}
		}
	}

}


?>