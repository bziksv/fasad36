<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;?>
<div class="bxr-under-footer-v1 bxr-color-flat">
  <div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 hidden-xs">
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                "named_area",
                Array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => SITE_DIR."include/logo_footer.php",
                    "INCLUDE_PTITLE" => GetMessage("GHANGE_LOGO")
                ),
                false
            );?>
        </div>
        <div class="col-lg-5 col-md-6 col-sm-5 col-xs-12">
            <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "named_area",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/footer_forms.php",
                        "INCLUDE_PTITLE" => GetMessage("FOOTER_COPYRIGHT")
                    ),
                    false
            );?>            
        </div>
        <div class="col-lg-4 col-md-3 col-sm-4 col-xs-12 pull-right">
          <ul class="bxr-links pull-right">
              <li><span class="copyright"><?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/footer_copyright.php",
                            "INCLUDE_PTITLE" => GetMessage("FOOTER_COPYRIGHT")
                        ),
                        false
                    );?></span></li>
          </ul>
        </div>
    </div>
  </div>
</div>