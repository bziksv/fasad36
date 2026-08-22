<? global $APPLICATION, $arTopMenu;?>
<div class="bxr-header bxr-header-v6 bxr-full-width bxr-container-headline">
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
            <div class="col-sm-4 hidden-xs hidden-sm bxr-element-row-middle">
               <div class="bxr-element-col-middle slogan-wrap">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/slogan_average.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_SLOGAN")
                        ),
                        false
                    );?>
                </div>
            </div>
            <div class="col-sm-4 hidden-xs hidden-sm bxr-element-row-middle"><div class="bxr-element-col-middle logo-center">
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
            <div class="col-sm-3 col-sm-offset-1 hidden-xs hidden-sm bxr-element-row-middle">
                <div class="bxr-element-col-middle bxr-recall-btn-content-rigth">
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