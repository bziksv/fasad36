<?php

function getIndexes() {
	
	CModule::IncludeModule("iblock");
	
	global $APPLICATION;
	
	$pages   = $APPLICATION->GetCurDir();
	$pages   = explode('/', $pages);
	$code = isset($pages[2]) ? $pages[2] : '';

	$result = getSectionIndex(2, $code);
	if ($result === false || $result === null || $result === '') {
		$result = getSectionIndex(11, $code);
	}

	if (is_array($result)) {
		return $result;
	}
	return ($result === false || $result === null || $result === '') ? array() : array($result);
}

function getSectionIndex($id, $code) {
	
	if ($code === '' || $code === null) {
		return false;
	}

	$dbRes = CIBlockSection::GetList(array(), array('IBLOCK_ID' => $id, 'CODE' => $code), false, array("ID", "UF_DELETE_INDEX"));
	$arCurSection = $dbRes->Fetch();
	
	if (!$arCurSection || empty($arCurSection['UF_DELETE_INDEX'])) {
		return false;
	}

	return $arCurSection['UF_DELETE_INDEX'];
}

