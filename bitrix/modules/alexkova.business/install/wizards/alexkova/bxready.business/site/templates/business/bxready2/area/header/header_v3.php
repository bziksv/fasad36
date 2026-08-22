<? global $APPLICATION, $arTopMenu;?>
<div class="bxr-header bxr-header-v3 bxr-full-width bxr-container-headline">
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
               <div class="bxr-element-col-middle visual">
                    <?
                        $APPLICATION->IncludeComponent(
	"alexkova.business:search.title", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"NUM_CATEGORIES" => "1",
		"TOP_COUNT" => "5",
		"ORDER" => "date",
		"USE_LANGUAGE_GUESS" => "Y",
		"CHECK_DATES" => "N",
		"SHOW_OTHERS" => "N",
		"PAGE" => "#SITE_DIR#search/",
		"SHOW_INPUT" => "Y",
		"INPUT_ID" => "title-search-head-input",
		"CONTAINER_ID" => "title-search-head",
		"CATEGORY_0_TITLE" => "",
		"CATEGORY_0" => array(
			0 => "no",
		),
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PREVIEW_TRUNCATE_LEN" => "200",
		"SHOW_PREVIEW" => "Y",
		"CONVERT_CURRENCY" => "N",
		"PREVIEW_WIDTH" => "100",
		"PREVIEW_HEIGHT" => "100",
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);
                    ?>      
                </div>
            </div>
            <div class="col-sm-3 hidden-xs hidden-sm bxr-element-row-middle">
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




