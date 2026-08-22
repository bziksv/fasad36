<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var CBitrixComponent $this */
/** @var array $arParams */
/** @var array $arResult */
/** @var string $componentPath */
/** @var string $componentName */
/** @var string $componentTemplate */
/** @global CDatabase $DB */
/** @global CUser $USER */
/** @global CMain $APPLICATION */
//$this->setFrameMode(false);
$this->setFrameMode(true);

\Alexkova\Bxready2\Component::prepareParams($arParams, "alexkova.business:panel.top.fixed.ajax");

if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
|| $_REQUEST['ajax_call'] == "Y"){
	echo "-";
}else{
	$this->IncludeComponentTemplate();
}
?>