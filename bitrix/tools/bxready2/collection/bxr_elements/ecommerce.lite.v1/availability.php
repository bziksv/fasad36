<?if(!empty($arElement["DISPLAY_PROPERTIES"]["BXR_INSTOCK"]["VALUE"])):?>
    <div class="bxr-element-availability <?if($hideElements === true):?>js-availability<?endif;?>" 
		data-xml="<?=$arElement["DISPLAY_PROPERTIES"]["BXR_INSTOCK"]["VALUE_XML_ID"];?>"
		data-value="<?=$arElement["DISPLAY_PROPERTIES"]["BXR_INSTOCK"]["VALUE"];?>"
		>
		<?if($hideElements === false):?>
		
        <span class="xml-availability-<?=$arElement["DISPLAY_PROPERTIES"]["BXR_INSTOCK"]["VALUE_XML_ID"];?>">
            <?=$arElement["DISPLAY_PROPERTIES"]["BXR_INSTOCK"]["VALUE"];?>
        </span>
		<?endif;?>
    </div>
<?endif;?>