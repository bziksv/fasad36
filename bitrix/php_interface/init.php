<?php

function getIndexes() {
	
	CModule::IncludeModule("iblock");
	
	global $APPLICATION;
	
	$pages   = $APPLICATION->GetCurDir();
	$pages   = explode('/', $pages);

	return (getSectionIndex(2, $pages[2])) ?: getSectionIndex(11, $pages[2]);
}

function getSectionIndex($id, $code) {
	
	$dbRes = CIBlockSection::GetList(array(), ['IBLOCK_ID' => $id, 'CODE' => $code], false, array("ID", "UF_DELETE_INDEX"));
	$arCurSection = $dbRes->Fetch();
	
	return ($arCurSection['UF_DELETE_INDEX']) ?: false;
}

