<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

if(empty($arResult))
	return "";

$strReturn = '';

$css = $APPLICATION->GetCSSArray();
if(!is_array($css) || !in_array("/bitrix/css/main/font-awesome.css", $css))
{
	$strReturn .= '<link href="'.CUtil::GetAdditionalFileURL("/bitrix/css/main/font-awesome.css").'" type="text/css" rel="stylesheet" />'."\n";
}

$strReturn .= '<div class="bxr-breadcrumb hidden-sm hidden-xs">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$isLast = ($index === $itemSize - 1);

	if ($index > 0)
	{
		$strReturn .= '<span class="bxr-alter-arrow"> / </span>';
	}

	if (!$isLast && $arResult[$index]["LINK"] <> "")
	{
		$strReturn .= '
			<div class="bxr-breadcrumb-item" id="bx_breadcrumb_'.$index.'">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">
					<span>'.$title.'</span>
				</a>
			</div>';
	}
	else
	{
		$strReturn .= '
			<div class="bxr-breadcrumb-item">
				<span>'.$title.'</span>
			</div>';
	}
}

$strReturn .= '<div style="clear:both"></div></div>';

return $strReturn;
