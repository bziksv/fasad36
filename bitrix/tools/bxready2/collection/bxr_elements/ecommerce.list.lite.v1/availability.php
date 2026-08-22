<?if(!empty($arElement["PROPERTIES"]["BXR_INSTOCK"]["VALUE"])):?>
    <div class="bxr-element-availability <?if($hideElements === true):?>js-availability<?endif;?>"
		data-xml="<?=$arElement["PROPERTIES"]["BXR_INSTOCK"]["VALUE_XML_ID"];?>"
		data-value="<?=$arElement["PROPERTIES"]["BXR_INSTOCK"]["VALUE"];?>"
		>
			<?if($hideElements === false):?>
        <span class="xml-availability-<?=$arElement["PROPERTIES"]["BXR_INSTOCK"]["VALUE_XML_ID"];?>">
            <?=$arElement["PROPERTIES"]["BXR_INSTOCK"]["VALUE"];?>
        </span>
			<?else:?>		
				<div style="width:100%; height:22px;"></div>
			<?endif;?>	
    </div>
<?endif;?>