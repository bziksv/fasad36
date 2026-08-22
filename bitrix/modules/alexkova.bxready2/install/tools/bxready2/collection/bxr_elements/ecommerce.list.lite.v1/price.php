<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$boolDiscountShow = ('Y' == $arElementParams['SHOW_OLD_PRICE']);

global $DB,$GlobalDate;

$currency = $arElement["PROPERTIES"]["BXR_UNIT_PRICE"]["VALUE"];
$price = round($arElement["PROPERTIES"]["BXR_PRICE"]["VALUE"]);
$display_price = number_format($price, 0, ".", " ");
$discount_price = round($arElement["PROPERTIES"]["BXR_DISCOUNT_PRICE"]["VALUE"]);
$display_discount_price = number_format($discount_price, 0, ".", " ");
$discount_period_from = strtotime($arElement["PROPERTIES"]["BXR_DISCOUNT_PERIOD_FROM"]["VALUE"]);
$discount_period_to = strtotime($arElement["PROPERTIES"]["BXR_DISCOUNT_PERIOD_TO"]["VALUE"]);

if(empty($GlobalDate))
    $GlobalDate = strtotime(date($DB->DateFormatToPHP(CLang::GetDateFormat("FULL"))));

$discount_active = ((!$discount_period_from && !$discount_period_to) || ($GlobalDate >= $discount_period_from && $GlobalDate <= $discount_period_to) || ($GlobalDate >= $discount_period_from && !$discount_period_to)) ? true : false;
$show_timer = /*($arElement["PROPERTIES"]["BXR_DISCOUNT_TIMER"]["VALUE"] == "Y" && $discount_active) ? true : */false;
$discount_show_type = "none";/*$arParams["BXR_OFFERS_BLOCK"]["BXR_DISCOUNT_SHOW_TYPE"];*/

?>
<?if ($price > 0 && $discount_price > 0 && $discount_active) {?>
    <span class="bxr-old-price"><span><?=$display_price?></span></span>
    <span class="bxr-current-price"><?=$display_discount_price?></span>
    <span class="bxr-price-currency"><?=$currency?></span>
<?} elseif ($price > 0) {?>
    <span class="bxr-current-price"><?=$display_price?></span>
    <span class="bxr-price-currency"><?=$currency?></span>
<?}?>