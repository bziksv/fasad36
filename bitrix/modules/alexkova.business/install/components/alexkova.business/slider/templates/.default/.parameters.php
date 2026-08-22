<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arTemplateParameters = array(
    "SLIDER_FULL_SCREEN" => array(
        "PARENT" => "SLIDER",
        "NAME" => GetMessage("SLIDER_FULL_SCREEN"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "Y",
    ),
    "COLUMN_DESC" => array(
        "PARENT" => "SLIDER",
        "NAME" => GetMessage("SLIDER_COLUMN"),
        "TYPE" => "CHECKBOX",
        "DEFAULT" => "N",
        "REFRESH" => "Y"
    ),
    "COLUMN_POSITION" => array(
        "PARENT" => "SLIDER",
        "NAME" => GetMessage("SLIDER_POSITION"),
        "TYPE" => "LIST",
        "VALUES" => array("left" => GetMessage("SLIDER_POSITION_LEFT"), "right" => GetMessage("SLIDER_POSITION_RIGHT")),
        "DEFAULT" => "left",
        "HIDDEN" => (isset($arCurrentValues['COLUMN_DESC']) && $arCurrentValues['COLUMN_DESC'] == 'Y' ? 'N' : 'Y')

    )
);
?>
