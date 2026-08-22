<?
$classRight = ($arParams['COLUMN_DESC']=="N") ? "col-md-12" : "col-md-9" ;
$classContent = ($arParams['COLUMN_DESC']=="N" || $arParams['SLIDER_FULL_SCREEN']=="Y") ? "container" : "col-md-12" ;
?>
<div class="bxr-slider <?= $classRight?> col-sm-12 <? if(isset($arParams['SLIDER_FULL_SCREEN']) && $arParams['SLIDER_FULL_SCREEN']=="N") {echo "container";} ?>" accesskey="" style="position: relative">
<?foreach ($arResult["ITEMS"] as $key => $item):?>
    <?
        $target = "";
        ($item["PROPERTIES"]["NEW_TAB"]["VALUE"] == "Y") ? $target = "target='_blank'" : $target = "target='_self'";

        if ($item["PROPERTIES"]["LOCATION"]["VALUE"] != ""):
            $locationParts = explode(";", $item["PROPERTIES"]["LOCATION"]["VALUE"]);
            $location = $locationParts[0];
        else:
            $location = "left";
        endif;
    ?>
    <div class="container <?=$location;?>" style="background: url('<?=$item["DETAIL_PICTURE"]["SRC"]?>');"><div class="row">
        <?
            $link = "/";
            if(isset($item["PROPERTIES"]["LINK"]["VALUE"][0]))
                $link = $item["PROPERTIES"]["LINK"]["VALUE"][0];
        ?>
        <?if ($item["PROPERTIES"]["SLIDER_LINK"]["VALUE"] == "Y"):?>
            <a <?=$target;?> href="<?=$link;?>">
        <?endif;?><div class="<?= $classContent?>">
            <?
                if ($item["PROPERTIES"]["TITLE_COLOR"]["VALUE"] != "")
                    $title_color = "#" . $item["PROPERTIES"]["TITLE_COLOR"]["VALUE"];
                else
                   $title_color = "fff";

                if ($item["PROPERTIES"]["TEXT_COLOR"]["VALUE"] != "")
                    $text_color = "#" . $item["PROPERTIES"]["TEXT_COLOR"]["VALUE"];
                else
                   $text_color = "fff";
            ?>
            <?if(isset($item["PREVIEW_PICTURE"]["SRC"])):?>
                <div class="col-md-6 col-sm-5 hidden-xs pull-<?=$location?>">
                    <img class="img-responsive" alt="<?=$item["PREVIEW_PICTURE"]["ALT"]?>" src="<?=$item["PREVIEW_PICTURE"]["SRC"]?>"  title="<?=$item["NAME"]?>"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </div>
                <div class="col-md-6 col-sm-7 col-xs-12 slick-banner-content <?=$location?>">
            <?else:?>
                <div class="col-md-12 slick-banner-content <?=$location?>">
            <?endif;?><div class="bxr-table-cell">
                    <?if ($item["PROPERTIES"]["DONT_SHOW_SLIDENAME"]["VALUE"] !== "Y") {?>
                        <span class="h2" style="color: <?=$title_color?>" ><?=$item["NAME"]?></span>
                    <?}?>
                    <?if ($item["PROPERTIES"]["SHOW_PREVIEW_TEXT"]["VALUE"] == "Y"):?>
                        <p style="color: <?=$text_color?>"><?=$item["PREVIEW_TEXT"]?></p>
                    <? endif;?>
                        <div class="slick-buttons">
                            <?if (is_array($item["PROPERTIES"]["LINK"]["VALUE"]))
                                foreach ($item["PROPERTIES"]["LINK"]["VALUE"] as $k => $link): ?>
                                    <?if(empty($item["PROPERTIES"]["LINK"]["DESCRIPTION"][$k]))continue;?>
                                    <div class="modern-card-buttons">
                                        <?if ($item["PROPERTIES"]["SLIDER_LINK"]["VALUE"] != "Y"):?>
                                            <a href="<?=$link;?>" class="bxr-slider-button bxr-color-flat bxr-bg-hover-dark-flat"><?=$item["PROPERTIES"]["LINK"]["DESCRIPTION"][$k];?></a>
                                        <?else:?>
                                            <span class="bxr-slider-button bxr-color-flat bxr-bg-hover-dark-flat"><?=$item["PROPERTIES"]["LINK"]["DESCRIPTION"][$k];?></span>
                                        <? endif;?>
                                    </div>
                                <?endforeach;?>
                        </div>
                </div></div>
            </div>
        <?if ($item["PROPERTIES"]["SLIDER_LINK"]["VALUE"] == "Y"):?>
            </a>
        <?endif;?>
    </div></div>
<?endforeach;?>
</div>
