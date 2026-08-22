<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;?>
<?\Alexkova\Bxready2\Area::showArea("footer", "footer_subscribe_form.disabled", true);?>
<footer class="bxr-color-line footer-head-v0 footer-head-v1">
    <div class="hidden-sm hidden-xs">
        <div class="container footer-head">
            <div class="row">
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/footer_name_1.php",
                        ),
                        false
                    );?>
                </div>

                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/footer_name_2.php",
                        ),
                        false
                    );?>
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/footer_name_3.php",
                        ),
                        false
                    );?>
                </div>
                <div class="col-lg-3 col-md-3 hidden-sm hidden-xs pull-right">
                     <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/footer_name_4.php",
                        ),
                        false
                    );?>                    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row footerline">
                <div class="hidden-lg hidden-md col-sm-12 col-xs-12 mobile-footer-menu-tumbl">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/footer_name_1.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_CATALOG")
                        ),
                        false
                    );?>
                    <i class="fa fa-chevron-down"></i>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 toggled-item">
                    <?
                    $APPLICATION->IncludeComponent(
                        "alexkova.business:menu",
                        "footer_cols",
                        Array(
                            "ROOT_MENU_TYPE" => "footer_1",
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => "",
                            "COLS" => "1",
                        ),
                        false
                    );
                    ?>
                </div>
                <div class="hidden-lg hidden-md col-sm-12 col-xs-12 mobile-footer-menu-tumbl">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/footer_name_2.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_MENU")
                        ),
                        false
                    );?>
                    <i class="fa fa-chevron-down"></i>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 toggled-item">
                    <?
                    $APPLICATION->IncludeComponent(
                        "alexkova.business:menu",
                        "footer_cols",
                        Array(
                            "ROOT_MENU_TYPE" => "footer_2",
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "left",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => "",
                            "COLS" => "1",
                        ),
                        false
                    );
                    ?>
                </div>
                <div class="hidden-lg hidden-md col-sm-12 col-xs-12 mobile-footer-menu-tumbl">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/footer_name_3.php",
                        "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_MENU")
                      ),
                      false
                    );?>
                    <i class="fa fa-chevron-down"></i>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 toggled-item">
                    <?
                        $APPLICATION->IncludeComponent(
                        "alexkova.business:menu",
                        "footer_cols",
                        Array(
                            "ROOT_MENU_TYPE" => "footer_3",
                            "MAX_LEVEL" => "1",
                            "USE_EXT" => "Y",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => "",
                            "COLS" => "1",
                          ),
                          false
                        );
                    ?>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 footer-about-company">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/footer_about_company.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_INFO")
                        ),
                        false
                    );?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/socnet.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_SOCNET")
                        ),
                        false
                    );?>
                </div>
        </div>
    </div>
    <?\Alexkova\Bxready2\Area::showArea("footer", "footer_forms.disabled", true);?>
</footer>
