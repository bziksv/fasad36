<? global $APPLICATION, $arTopMenu;?>
<div class="bxr-header bxr-header-v2 bxr-full-width bxr-container-headline">
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
            <div class="col-sm-6 hidden-xs hidden-sm bxr-element-row-middle">
               <div class="bxr-element-col-middle">
                    <?$APPLICATION->IncludeComponent(
                        "alexkova.business:menu", 
                        "line", 
                        array(
                                "COMPONENT_TEMPLATE" => "line",
                                "ROOT_MENU_TYPE" => "service",
                                "MENU_CACHE_TYPE" => "A",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => array(
                                ),
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "service",
                                "USE_EXT" => "N",
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N"
                        ),
                        false
                    );?>                    
                </div>
            </div>
            <div class="col-sm-3 hidden-xs hidden-sm bxr-element-row-middle">
                <div class="bxr-element-col-middle  bxr-recall-btn-content-rigth">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/phone.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_LOGO")
                        ),
                        false
                    );?>
                    <span data-toggle="modal" data-target="#bxr-phone-popup" class="bxr-color bxr-bg-hover-light fa fa-phone open-answer-form bxr-recall-btn"></span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
   
</div>
<div class="bxr-full-width">
    <?\Alexkova\Bxready2\Area::showArea("top_menu", "menu_v1");?>
</div>




