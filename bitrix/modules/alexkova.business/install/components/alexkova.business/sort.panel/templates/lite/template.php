<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->createFrame()->begin('sortpanel');
global $arSortGlobal;
$numShow = false;
$viewShow = ('Y' == $arParams["CATALOG_VIEW_SHOW"]);
?>
<div class="col-xs-12<?=($arParams["THEME"] == 'default') ?' bxr-border-color':' bxr-color-flat'?> bxr-sort-panel">
    <div class="row">
        <div class="bxr-sort-panel-params">
                <?foreach ($arResult["SORT_PROPS"] as $key => $val):
                        $className = ($arSortGlobal["sort"] == $val[0]) ? ' active' : ' hidden-xs';
                        $icon = "";
                        if ($className){
                                $className .= ($arSortGlobal["sort_order"] == 'asc') ? ' asc' : ' desc';
                                $icon = ($arSortGlobal["sort_order"] == 'asc') ? '<i class="fa fa-angle-up"></i>' : ' <i class="fa fa-angle-down"></i>';
                        }

                        if (strlen($val[3])>0){
                                $className .= " ".$val[3];
                        }

                        $newSort = ($arSortGlobal["sort"] == $val[0]) ? ($arSortGlobal["sort_order"] == 'desc' ? 'asc' : 'desc') : $arAvailableSort[$key][1];
                        ?>
                        <a href="<?=$APPLICATION->GetCurPageParam('sort='.$key.'&order='.$newSort, array('sort', 'order'))?>"
                           class="bxr-sortbutton<?=$className?> <?if(number_key($arResult["SORT_PROPS"], $key) == count($arResult["SORT_PROPS"])) echo "last";?>" rel="nofollow">
                                <?=$val[2]?><?=($arSortGlobal["sort"] == $val[0])?$icon:''?>
                        </a>
                <?endforeach;?>
        </div>
        <?if ($viewShow):?>
        <div class="bxr-sort-panel-mode">
                <a href="<?=$APPLICATION->GetCurPageParam('view=title',array('view'));?>" title="<?=GetMessage('BXR_VIEW_PLITKA')?>" class="bxr-view-mode<?=($arSortGlobal['view'] == 'title' || !$arSortGlobal['view']) ? ' active' : '';?>">
                        <i class="fa fa-th"></i>
                </a>
                <a href="<?=$APPLICATION->GetCurPageParam('view=list',array('view'));?>" title="<?=GetMessage('BXR_VIEW_LIST')?>" class="bxr-view-mode<?=($arSortGlobal['view'] == 'list') ? ' active' : '';?>">
                        <i class="fa fa-th-list"></i>
                </a>
                <a href="<?=$APPLICATION->GetCurPageParam('view=table',array('view'));?>" title="<?=GetMessage('BXR_VIEW_TABLE')?>" class="bxr-view-mode<?=($arSortGlobal['view'] == 'table') ? ' active' : '';?>">
                        <i class="fa fa-align-justify"></i>
                </a>
        </div>
        <?endif;?>
    </div>
</div>