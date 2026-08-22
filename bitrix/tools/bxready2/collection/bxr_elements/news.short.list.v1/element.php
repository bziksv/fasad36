<?
use Alexkova\Bxready2\Draw;
$elementDraw = Draw::getInstance();

$dateFormat = !empty($arElementParams['ACTIVE_DATE_FORMAT']) ? $arElementParams['ACTIVE_DATE_FORMAT'] : 'd.m.Y';
$displayDate = '';
if (!empty($arElement['DISPLAY_ACTIVE_FROM']))
{
	$displayDate = $arElement['DISPLAY_ACTIVE_FROM'];
}
elseif (!empty($arElement['DATE_ACTIVE_FROM']))
{
	$displayDate = date($dateFormat, MakeTimeStamp($arElement['DATE_ACTIVE_FROM'], CSite::GetDateFormat()));
}
?>
<div class="bxr-news-short-list-v1" data-uid="<?=$arElementParams["UNICUM_ID"]?>">
	<div class="bxr-element-container">
		<div class="bxr-element-date">
			<div class="bxr-color"><?=$displayDate?></div>
		</div>
		<div class="bxr-element-name">
			<a class="bxr-gray-content" href="<?=$arElement['DETAIL_PAGE_URL']?>"><?=$arElement['NAME']?></a>
		</div>
	</div>
</div>
<?$elementDraw->setAdditionalFile("CSS", "/bitrix/tools/bxready2/collection/bxr_elements/news.short.list.v1/include/style.css", false);?>
