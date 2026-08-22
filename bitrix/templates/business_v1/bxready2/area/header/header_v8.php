<? global $APPLICATION, $arTopMenu;?>
<div class="bxr-header bxr-header-v8 bxr-full-width bxr-container-headline">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 text-center hidden-md  hidden-lg">
                    <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => SITE_DIR."include/mobile_logo.php",
                                    "INCLUDE_PTITLE" => GetMessage("GHANGE_LOGO")
                            ),
                            false
                    );?>
            </div>
            <div class="col-sm-3 hidden-xs hidden-sm bxr-element-row-middle"><div class="bxr-element-col-middle">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "named_area",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/logo.php",
                        "INCLUDE_PTITLE" => GetMessage("GHANGE_LOGO")
                    ),
                    false
                );?>
            </div></div>
            <div class="col-sm-9 hidden-xs hidden-sm bxr-element-row-middle"><div class="bxr-element-col-middle bxr-built-menu">
                <?\Alexkova\Bxready2\Area::showArea("top_menu", "menu_v1");?>               
            </div></div>            
            <div class="clearfix"></div>
        </div>
    </div>   
</div>
