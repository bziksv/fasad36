<div class="bxr-nav-wrapper col-md-3 hidden-sm hidden-xs">
  <ul class="bxr-main-slider-nav">
    <span class="bxr-line <?= $arParams["COLUMN_POSITION"];?>"></span>
    <?foreach ($arResult["ITEMS"] as $key => $item):
      if ($key == 0) {?>
        <li class="bxr-active">
          <div class="bxr-slide-name-nav"><?= $item["NAME"]?></div>
        </li>
      <?}else{?>
        <li>
          <div class="bxr-slide-name-nav">
            <?= $item["NAME"]?>
          </div>
        </li>
      <?}?>
    <?endforeach;?>
  </ul>
</div>
