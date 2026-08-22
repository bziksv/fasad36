<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
global $BXR_FORM_COUNTER;
?>

<div id='ajaxFormContainer_<?=$arParams["IBLOCK_ID"]?>_<?=$BXR_FORM_COUNTER?>'>
	<?$APPLICATION->IncludeComponent(
		"alexkova.business:iblock.element.add.form",
		"built_in",
		$arParams,
		$component,
		array("HIDE_ICONS"=>"Y")
	);?>
</div>

