<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();


$wizIDS = $wizard->GetVar("wizardSiteID");
if (strlen($wizIDS)<=0){
	return false;
}

global $USER;
$bannersPath = WIZARD_ABSOLUTE_PATH."/include/banners/";

$arBanTypes = array(
		"BXR_TOP" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_TOP_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_TOP_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
        "BXR_BOTTOM" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_BOTTOM_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_BOTTOM_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
        "BXR_COLUMN" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_COLUMN_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_COLUMN_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
        "BXR_CONTENT_TOP" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_CATALOG_INNER_TOP_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_CATALOG_INNER_TOP_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
	"BXR_CONTENT_BOTTOM" => array(
		"ACTIVE" => "Y",
		"NAME"=> GetMessage('BANTYPE_EMARKET_CATALOG_INNER_BOTTOM_NAME'),
		"DESCRIPTION" => GetMessage('BANTYPE_EMARKET_CATALOG_INNER_BOTTOM_DESC'),
		"SORT" => 100,
		"ITEMS" => array()
	),
);


/** верхние баннеры **/
$arBanTypes["BXR_TOP"]["ITEMS"][] = array(
		"NAME" => GetMessage('BANNER_TOP_1_NAME')."__".$wizIDS,
		"ACTIVE" => "Y",
		"PATH" => $bannersPath.'top.jpg',
		"SID" => serialize(array($wizIDS=>'Y')),
		"SHOW_TYPE" => 'image',
		"WEIGHT" => 100,
		"URL" => '',
		"MODIFIED_BY" => $USER->GetID(),
		"INFO" => array(
			"TARGET" => '_blank',
			"TITLE" => GetMessage('BANNER_TOP_1_NAME'),
			"INC_SHOW_COUNT" => 'Y',
			"INC_CLICK_COUNT" => 'Y',
			"BANNER_REDIRECT" => 'Y',
			"BANNER_USHOW" => 'Y',
			"BANNER_USHOW_TYPE" => 'C',
			"BANNER_USHOW_COOKIE_TIME" => 3600
		),
		"SHOW_FIRST" => time()
);

$arBanTypes["BXR_BOTTOM"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_TOP_1_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'bottom.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 1000,
	"URL" => '',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_blank',
		"TITLE" => GetMessage('BANNER_TOP_1_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

$arBanTypes["BXR_COLUMN"]["ITEMS"][] = array(
		"NAME" => GetMessage('BANNER_COLUMN_1_NAME'),
		"ACTIVE" => "Y",
		"PATH" => $bannersPath.'column2.jpg',
		"SID" => serialize(array($wizIDS=>'Y')),
		"SHOW_TYPE" => 'image',
		"WEIGHT" => 100,

		"URL" => '',
		//"URL" => WIZARD_SITE_DIR.'catalog/smartfony/apple-iphone-6-64gb/',
		"MODIFIED_BY" => $USER->GetID(),
		"INFO" => array(
			"TARGET" => '_self',
			"TITLE" => GetMessage('BANNER_COLUMN_1_NAME'),
			"INC_SHOW_COUNT" => 'Y',
			"INC_CLICK_COUNT" => 'Y',
			"BANNER_REDIRECT" => 'Y',
			"BANNER_USHOW" => 'Y',
			"BANNER_USHOW_TYPE" => 'C',
			"BANNER_USHOW_COOKIE_TIME" => 3600
		),
		"SHOW_FIRST" => time()
);

/**  catalog_top_banner ***/

$arBanTypes["BXR_CONTENT_TOP"]["ITEMS"][] = array(
		"NAME" => GetMessage('BANNER_CATALOG_INNER_TOP_1_NAME'),
		"ACTIVE" => "Y",
		"PATH" => $bannersPath.'content_top.jpg',
		"SID" => serialize(array($wizIDS=>'Y')),
		"SHOW_TYPE" => 'image',
		"WEIGHT" => 1000,
		"URL" => '',//WIZARD_SITE_DIR.'catalog/binokli/nikon-aculon-t01-8x21/',
		"MODIFIED_BY" => $USER->GetID(),
		"INFO" => array(
			"TARGET" => '_self',
			"TITLE" => GetMessage('BANNER_CATALOG_INNER_TOP_1_NAME'),
			"INC_SHOW_COUNT" => 'Y',
			"INC_CLICK_COUNT" => 'Y',
			"BANNER_REDIRECT" => 'Y',
			"BANNER_USHOW" => 'Y',
			"BANNER_USHOW_TYPE" => 'C',
			"BANNER_USHOW_COOKIE_TIME" => 3600
		),
		"SHOW_FIRST" => time()
);

/**  catalog_bottom_banner ***/


$arBanTypes["BXR_CONTENT_BOTTOM"]["ITEMS"][] = array(
	"NAME" => GetMessage('BANNER_CATALOG_INNER_TOP_1_NAME'),
	"ACTIVE" => "Y",
	"PATH" => $bannersPath.'content_bottom.jpg',
	"SID" => serialize(array($wizIDS=>'Y')),
	"SHOW_TYPE" => 'image',
	"WEIGHT" => 100,
	"URL" => '',//WIZARD_SITE_DIR.'catalog/binokli/nikon-aculon-t01-8x21/',
	"MODIFIED_BY" => $USER->GetID(),
	"INFO" => array(
		"TARGET" => '_self',
		"TITLE" => GetMessage('BANNER_CATALOG_INNER_TOP_1_NAME'),
		"INC_SHOW_COUNT" => 'Y',
		"INC_CLICK_COUNT" => 'Y',
		"BANNER_REDIRECT" => 'Y',
		"BANNER_USHOW" => 'Y',
		"BANNER_USHOW_TYPE" => 'C',
		"BANNER_USHOW_COOKIE_TIME" => 3600
	),
	"SHOW_FIRST" => time()
);

$arWeekday = Array(
	"SUNDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"MONDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"TUESDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"WEDNESDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"THURSDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"FRIDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23),
	"SATURDAY" => Array(0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23)
);
$newContractName = "CorpDefault";
$arContractFields = array(
	"ACTIVE" => 'Y',
    "NAME" => $newContractName,
    "DESCRIPTION" => '',
    "KEYWORDS" => '',
    "ADMIN_COMMENTS" => '',
    "WEIGHT" => 100,
    "SORT" => 10,
    "DEFAULT_STATUS_SID" => 'PUBLISHED',
    "arrSHOW_PAGE" => Array(),
    "arrNOT_SHOW_PAGE" => Array(),
    "arrTYPE" => Array('ALL'),
    "arrWEEKDAY" => $arWeekday,
    "arrUSER_VIEW" => '',
    "arrUSER_ADD" => '',
    "arrUSER_EDIT" => '',
    "arrSITE" => Array($wizIDS)
);

$contractCreated = false;
foreach ($arBanTypes as $typeCode => $arType) {
	$arFields = array(
		"ACTIVE"			=> $arType["ACTIVE"],
		"SORT"				=> $arType["SORT"],
		"NAME"				=> $arType["NAME"],
		"DESCRIPTION"		=> $arType["DESCRIPTION"]
	);
    if(CModule::IncludeModule('advertising')){

		//create new contract if not created yet and not exists
		if(!$contractCreated){
			$dbResult = CAdvContract::GetList($b,$o,array("NAME"=>$newContractName));
			if (!$arContract = $dbResult->Fetch()){
				$contractId = CAdvContract::Set($arContractFields,"","N");
				$contractCreated = true;
			}else{
                            
                            $contractId = $arContract["ID"];
                            CAdvContract::Set($arContractFields,$contractId,"N");
			}
		}

		//create banner type if not exist
		$rsCheck = CAdvType::GetByID($typeCode);


		if($rsCheck && $arTypeFromDB = $rsCheck->Fetch()){
			$banTypeId = $arTypeFromDB["SID"];
		}else{
			$arFields["SID"] = $typeCode;
			$banTypeId = CAdvType::Set($arFields,"","N");
		}

		if($banTypeId && $contractId){
			foreach ($arType["ITEMS"] as $arBanner) {
				$arFields = array(
					"CONTRACT_ID" => $contractId,
					"TYPE_SID" => $banTypeId,
					"STATUS_SID" => 'PUBLISHED',
					"NAME" => $arBanner["NAME"],
					"ACTIVE" => $arBanner["ACTIVE"],
					"WEIGHT" => $arBanner["WEIGHT"],
					"FIX_CLICK" => 'Y',
					"FIX_SHOW" => 'N',
					"FLYUNIFORM" => 'N',
					"IMAGE_ALT" => $arBanner["INFO"]["TITLE"],
					"URL" => $arBanner["URL"],
					"URL_TARGET" => $arBanner["INFO"]["TARGET"],
					"STAT_EVENT_1" => 'banner',
					"STAT_EVENT_2" => 'click',
					"STAT_EVENT_3" => '#CONTRACT_ID# / "#BANNER_ID#" "#TYPE_SID#" #BANNER_NAME#',
					"SHOW_USER_GROUP" => 'N',
					"arrSHOW_PAGE" => Array(),
					"arrNOT_SHOW_PAGE" => Array(),
					"arrWEEKDAY" => $arWeekday,
					"arrSITE" => Array($wizIDS),
					"SEND_EMAIL" => 'Y',
					"AD_TYPE" => $arBanner["SHOW_TYPE"],
					"arrCOUNTRY" => Array(),
					"STAT_TYPE" => 'COUNTRY',
					"FLASH_JS" => 'N'
				);

                                $arFields["arrIMAGE_ID"] = CFile::MakeFileArray($arBanner["PATH"]);
                                $arFields["arrIMAGE_ID"]["MODULE_ID"] = 'advertising';

				if($arBanner["SHOW_TYPE"] == "flash"){
					$arFields["NO_URL_IN_FLASH"] = $arBanner["FLASH_LINK"] == "Y"?"Y":"N";
					$arFields["FLASH_TRANSPARENT"] = $arBanner["FLASH_TRANSPARENT"];
				}
                                //echo "22<pre>"; print_r($arFields["arrIMAGE_ID"]);echo "</pre>";
                                //echo "22<pre>"; print_r($arBanner["PATH"]);echo "</pre>";

				CAdvBanner::Set($arFields,"","N");
                                //echo "22<pre>"; print_r($arBanner["PATH"]);echo "</pre>";die();
			}
		}
		//banner create


	}elseif(CModule::IncludeModule('alexkova.rklite'))
            {

		$obRklite = new CKuznica_rklite();
		//check if this bantype already exists
		$rsCheck = $obRklite->GetTypeList(array(),array('CODE'=>$typeCode));
		if($arTypeFromDB = $rsCheck->Fetch()){
			$banTypeId = $arTypeFromDB["ID"];
		}else{//if bantype not exists, create it
			$arFields["CODE"] = $typeCode;
			$banTypeId =  $obRklite->AddType($arFields);
		}
                
                //echo "22<pre>"; print_r($arFields);echo "</pre>";die();
                
		if($banTypeId>0){
			foreach($arType["ITEMS"] as $arBanner){
				$arBannerFields = $arBanner;
				$arBannerFields["BANTYPE"] = $banTypeId;
				//$image = CFile::MakeFileArray($arBanner["PATH"]);
				//$arBannerFields["IMAGE_ID"] = $image["ID"];
				$arBannerFields["IMAGE_ID"] = CFile::MakeFileArray($arBanner["PATH"]);
				unset($arBannerFields["PATH"]);
				unset($arBannerFields["FLASH_LINK"]);
                                
                                //echo "22<pre>"; print_r($arBannerFields);echo "</pre>";die();
                                
				$bannerId = $obRklite->Add($arBannerFields);
			}
		}
	}
}

COption::SetOptionString("alexkova.business", 'bxr_top_banner', 'FIXED');
COption::SetOptionString("alexkova.business", 'bxr_bottom_banner', 'FIXED');
COption::SetOptionString("alexkova.business", 'bxr_catalog_top_banner', 'RESPONSIVE');
COption::SetOptionString("alexkova.business", 'bxr_catalog_bottom_banner', 'RESPONSIVE');
COption::SetOptionString("alexkova.business", 'bxr_left_banner', 'RESPONSIVE');


?>