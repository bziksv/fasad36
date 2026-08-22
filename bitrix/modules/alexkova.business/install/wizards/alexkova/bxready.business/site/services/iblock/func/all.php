<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

function installIblock($iblockCodeS, $iblockType){

	define('WIZARD_INSTALL_DEMO_DATA', true);

	WizardServices::IncludeServiceLang("iblock_fields.php", LANGUAGE_ID);

	$iblockCode = "bxr_".$iblockCodeS."_".WIZARD_SITE_ID;
	$iblockCodeDef = "bxr_$iblockCodeS";

	if (WIZARD_INSTALL_DEMO_DATA){
		$IBLOCK_CATALOG_ID = getIblockID($iblockCodeDef, $iblockType);
		if ($IBLOCK_CATALOG_ID){
			$boolFlag = CIBlock::Delete($IBLOCK_CATALOG_ID);
		}
	}

	$IBLOCK_CATALOG_ID = getIblockID($iblockCode, $iblockType);

	if ($IBLOCK_CATALOG_ID == false){

		createIblock(WIZARD_SITE_ID, $iblockCodeS, $iblockType);

		$iblockXMLFile = WIZARD_ABSOLUTE_PATH."/lang/".LANGUAGE_ID."/iblock/".$iblockType."/".$iblockCodeS.".xml";

		$IBLOCK_CATALOG_ID = getIblockID($iblockCodeDef, $iblockType);

		if($IBLOCK_CATALOG_ID)
		{
			$IBLOCK_CATALOG_ID = ImportXMLFile($iblockXMLFile, $iblockType, $site_id=WIZARD_SITE_ID, $section_action="N", $element_action="N", $use_crc=false, $preview=false, $sync=false, $return_last_error=false, $return_iblock_id=true);

			if ($IBLOCK_CATALOG_ID < 1)
				return;
		}
	}
	else{
		updateCatalogIblock($IBLOCK_CATALOG_ID, WIZARD_SITE_ID);
	}
}


function getIblockID($iblockCode, $iblockType){
	$IBLOCK_CATALOG_ID = false;

	$res = CIblock::GetList(array(), array("XML_ID"=>$iblockCode, "IBLOCK_TYPE"=>$iblockType));
	if ($arFields = $res->Fetch()){
		$IBLOCK_CATALOG_ID = $arFields["ID"];
	}
	return $IBLOCK_CATALOG_ID;
}

function updateCatalogIblock($IBLOCK_CATALOG_ID,$LID){
	$arSites = array();
	$db_res = CIBlock::GetSite($IBLOCK_CATALOG_ID);
	while ($res = $db_res->Fetch())
		$arSites[] = $res["LID"];
	if (!in_array($LID, $arSites))
	{
		$arSites[] = $LID;
		$iblock = new CIBlock;
		$iblock->Update($IBLOCK_CATALOG_ID, array("LID" => $arSites));
	}
}

function createIblock($LID, $IBLOCK_CODE, $IBLOCKTYPE){


	$arIblock = GetMessage($IBLOCK_CODE."_DATA");
	$arIblock["LID"] = $LID;
	$arIblock["XML_ID"] = "bxr_$IBLOCK_CODE";
	$arIblock["EXTERNAL_ID"] = "bxr_$IBLOCK_CODE";
	unset($arIblock["SERVER_NAME"]);
	$arIblock["CODE"] = $IBLOCK_CODE;
	$arIblock["IBLOCK_TYPE"] = $IBLOCKTYPE;
	$arIblock["GROUP_ID"] = array('2'=>'R');


	$iblock = new CIBlock;

	$IBLOCK_ID = $iblock->Add($arIblock);

	if ($IBLOCK_ID) {

		$arFields = GetMessage($IBLOCK_CODE."_FIELDS");

		CIblock::SetFields($IBLOCK_ID, $arFields);
		return $IBLOCK_ID;
	}

	return false;
}
?>