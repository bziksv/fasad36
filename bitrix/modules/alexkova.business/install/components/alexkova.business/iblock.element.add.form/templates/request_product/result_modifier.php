<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if (intval($arParams["DATA_ATTR"]["pid"]) > 0) {
    $pid = $arParams["DATA_ATTR"]["pid"];
    $res = CIBlockElement::GetByID($pid);

    if ($element = $res->GetNext()) {
        $arResult["ELEMENT"] = array(
            "ID" => $element["ID"],
            "NAME" => $element["NAME"],
            "LINK" => $element["DETAIL_PAGE_URL"],
            "PICTURE" => ($element["PREVIEW_PICTURE"])?CFile::GetPath($element["PREVIEW_PICTURE"]):(($element["DETAIL_PICTURE"])?CFile::GetPath($element["DETAIL_PICTURE"]):""),
            "MESSAGE" => GetMessage("REQUEST_MSG").'"'.$element["NAME"].'"'
        );

    
        if (intval($arParams["DATA_ATTR"]["primaryPid"]) > 0) {
            $primaryPid = $arParams["DATA_ATTR"]["primaryPid"];
            $res = CIBlockElement::GetByID($primaryPid);
            if ($element = $res->GetNext()) {
                $arResult["ELEMENT"]["OFFER_ID"] = $arResult["ELEMENT"]["ID"];
                $arResult["ELEMENT"]["ID"] = $element["ID"];
                $arResult["ELEMENT"]["LINK"] = $element["DETAIL_PAGE_URL"].$arResult["ELEMENT"]["LINK"];
            }
        }
    }
}