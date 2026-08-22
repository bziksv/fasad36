<?
use Alexkova\Bxready2\Draw;
IncludeModuleLangFile(__FILE__);
$elementDraw = Draw::getInstance($this);

$name = strlen($arElement['DESCRIPTION'])>0 ? $arElement['DESCRIPTION'] : $arElement['ORIGINAL_NAME'];
$arExt = explode('.', $arElement['FILE_NAME']);
$ext = $arExt[count($arExt)-1];
?>
<div class="bxr-file-st-v1">
<a href="<?=$arElement['SRC']?>" title="<?=$name?>">
	<span class="bxr-file-ico bxr-file-ico-<?=$ext?>"></span>
	<?=$name?>
</a><p><?=GetMessage("BXR_SIZE");?>: <?=$elementDraw->GetStrFileSize($arElement['FILE_SIZE'])?></p>
</div>
<?$elementDraw->setAdditionalFile("CSS", "/bitrix/tools/bxready2/collection/bxr_elements/file.standart.v1/include/style.css", false);?>