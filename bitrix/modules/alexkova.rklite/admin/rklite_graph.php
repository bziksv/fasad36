<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/img.php");

$width = 500; // ширина графика
$height = 300; // высота графика
$arrX=Array();
$arrY=Array();
$gridX=Array();
$gridY=Array();
$ImageHandle = CreateImageHandle($width, $height);
$arShow = $find_what_show;
$arFilter = Array(
	"DATE_1"			=> $find_date1,
	"DATE_2"			=> $find_date2,
	"BANNER_ID"			=> $find_banner_id,
	"BANNER_SUM"		=> $find_banner_sum,
	"WHAT_SHOW"			=> $find_what_show
);

$arDays = CKuznica_rklite::GetStatGraph($arFilter,$arLegend);
$prevDate = 0;
foreach ($arDays as $day=>$arDay)
{
	$date = MakeTimeStamp($day,"DD.MM.YYYY");
	if($prevDate>0)
		$nextDate = AddTime($prevDate,1,"D");
	if($date>$nextDate && $prevDate>0)
	{
		$missDate = $nextDate;
		while($date>$missDate)
		{
			$arX[] = $missDate;
			$missDate = AddTime($missDate,1,"D");
			foreach ($arLegend as $bid=>$value)
			{
				if(in_array("show",$arShow))
					$arrY_show[$bid][] = 0;
				if(in_array("click",$arShow))
					$arrY_click[$bid][] = 0;
				if(in_array("ctr",$arShow))
					$arrY_ctr[$bid][] = 0;
			}
			$arrY[] = 0;
		}
	}
	$arX[] = $date;
	$prevDate = $date;
	foreach ($arLegend as $bid=>$value)
	{
		if($find_banner_sum != "Y")
		{
			if (in_array("show", $arShow))
				$show_value = intval($arDay["BANNERS"][$bid]["SHOW_COUNT"]);
			if (in_array("click", $arShow))
				$click_value = intval($arDay["BANNERS"][$bid]["CLICK_COUNT"]);
			if (in_array("ctr", $arShow))
				$ctr_value = intval($arDay["BANNERS"][$bid]["CTR"]);
		}
		else
		{
			if (in_array("show", $arShow))
				$show_value = intval($arDay["BANNERS"]["SHOW_COUNT"]);
			if (in_array("click", $arShow))
				$click_value = intval($arDay["BANNERS"]["CLICK_COUNT"]);
			if (in_array("ctr", $arShow))
				$ctr_value = intval($arDay["BANNERS"]["CTR"]);
		}
		if (in_array("show", $arShow))
		{
			$arrY_show[$bid][] = $show_value;
			$arrY[] = $show_value;
		}
		if (in_array("click", $arShow))
		{
			$arrY_click[$bid][] = $click_value;
			$arrY[] = $click_value;
		}
		if (in_array("ctr", $arShow))
		{
			$arrY_ctr[$bid][] = $ctr_value;
			$arrY[] = $ctr_value;
		}
	}

}

/******************************************************
                 Формируем ось X
*******************************************************/
$arrayX = GetArrayX($arX, $MinX, $MaxX);
/******************************************************
                 Формируем ось Y
*******************************************************/
$arrayY = GetArrayY($arrY, $MinY, $MaxY, 10, "Y", true);
/******************************************************
                Рисуем координатную сетку
*******************************************************/
DrawCoordinatGrid($arrayX, $arrayY, $width, $height, $ImageHandle);

foreach ($arLegend as $bid=>$value)
{
	if (in_array("show", $arShow))
	{
		Graf($arX, $arrY_show[$bid], $ImageHandle, $MinX, $MaxX, $MinY, $MaxY, $value["SHOW_COLOR"]);
	}
	if (in_array("click", $arShow))
	{
		Graf($arX, $arrY_click[$bid], $ImageHandle, $MinX, $MaxX, $MinY, $MaxY, $value["CLICK_COLOR"]);
	}
	if (in_array("ctr", $arShow))
	{
		Graf($arX, $arrY_ctr[$bid], $ImageHandle, $MinX, $MaxX, $MinY, $MaxY, $value["CTR_COLOR"]);
	}
}

ShowImageHeader($ImageHandle);
?>