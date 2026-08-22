<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?$this->setFrameMode(true);?>

<?
function print_section_tree($arSection, $arElements){

	if (count($arElements[$arSection['ID']])>0 || count($arSection['CHILD'])>0) {
		print_r($arSection['ID'].'___'.$arSection['NAME']); echo '<ul>';
	}


	if (count($arSection['CHILD'])>0){
		foreach ($arSection['CHILD'] as $val){
			echo "<li>";
			print_section_tree($val, $arElements);
			echo "</li>";
		}
	}
	if (count($arElements[$arSection['ID']])>0){
		foreach ($arElements[$arSection['ID']] as $val){
			echo '<li>';
			print_r($val);
			echo '</li>';
		}
	}
	if (count($arElements[$arSection['ID']])>0 || count($arSection['CHILD'])>0) {
		echo '</ul>';
	}

}
?>

<?//echo "<pre>"; print_r($arResult['ELEMENTS']); echo "</pre>";?>
<div class="bxr-price-list">
	<?
	print_section_tree($arResult['SECTION_TREE'], $arResult['ELEMENTS']);
	?>
</div>
