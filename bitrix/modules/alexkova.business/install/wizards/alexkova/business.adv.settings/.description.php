<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(!defined("WIZARD_DEFAULT_SITE_ID") && !empty($_REQUEST["wizardSiteID"]))
	define("WIZARD_DEFAULT_SITE_ID", $_REQUEST["wizardSiteID"]);

if (isset($_REQUEST["wizardSiteID"])){
	print_r($_REQUEST); die();
}



$arWizardDescription = Array(
	"NAME" => GetMessage("PORTAL_WIZARD_NAME"), 
	"DESCRIPTION" => GetMessage("PORTAL_WIZARD_DESC"), 
	"VERSION" => "1.0.0",
	"START_TYPE" => "WINDOW",
	//"WIZARD_TYPE" => "INSTALL",
	"IMAGE" => "images/corporate_logo.jpg",
	//"PARENT" => "wizard_sol",
	"TEMPLATES" => Array(
		Array("SCRIPT" => "wizard_sol")
	),
	"STEPS" => Array("SelectSiteStep","DataInstallStep", "FinishStep")
);
?>