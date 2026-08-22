<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

function readyCatalogIblock($icode, $sid){

	$iblockID = 0;

	$res = CIBlock::GetList(
		Array(),
		Array(
			"XML_ID"=>'bxr_'.$icode
		), true
	);
	if($ar_res = $res->Fetch())
	{
		$iblockID = $ar_res['ID'];
		$arUpdate = array( "XML_ID" => 'bxr_'.$icode."_".$sid);
		$iblock = new CIBlock;
		$iblock->Update($iblockID, $arUpdate);
	}

	return $iblockID;
}

function readyFormIblock($icode, $sid){

	$arDetail = array();

	$arDetail['ID'] = readyCatalogIblock($icode, $sid);
	$arDetail['PROPERTIES'] = array();

	$properties = CIBlockProperty::GetList(
		Array(),
		Array(
			"IBLOCK_ID"=>$arDetail['ID']
		)
	);
	while ($prop_fields = $properties->GetNext())
	{
		$arDetail['PROPERTIES']['BXR_PROPERTY_'.$icode."_".$prop_fields["CODE"]] = $prop_fields["ID"];
	}

	return $arDetail;
}

?>