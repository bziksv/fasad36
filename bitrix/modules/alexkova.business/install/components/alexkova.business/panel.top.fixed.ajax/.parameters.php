<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"GROUPS" => array(
	),

	"PARAMETERS" => array(

		"USE_FIXED_PANEL" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("BXR_USE_FIXED_PANEL"),
			"TYPE" => "CHECKBOX",
			"DEFAULT" => "N",
		),

		"MAX_WIDTH" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("BXR_FIXED_MAX_WIDTH"),
			"TYPE" => "STRING"
		),
	),
);

?>