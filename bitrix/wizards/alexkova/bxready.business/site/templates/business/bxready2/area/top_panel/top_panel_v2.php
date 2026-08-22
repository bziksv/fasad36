<?global $APPLICATION;?>
<div class='bxr-top-panel hidden-xs hidden-sm'>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<?$APPLICATION->IncludeComponent(
					"bitrix:system.auth.form",
					"context",
					array(
						"REGISTER_URL" => "#SITE_DIR#auth/",
						"FORGOT_PASSWORD_URL" => "#SITE_DIR#auth/",
						"PROFILE_URL" => "#SITE_DIR#profile/",
						"SHOW_ERRORS" => "Y",
						"COMPONENT_TEMPLATE" => "popup"
					),
					false
				);?>
			</div>
			<div class="col-md-5">
				<?
				$APPLICATION->IncludeComponent(
					"alexkova.business:menu",
					"line",
					array(
						"ALLOW_MULTI_SELECT" => "N",
						"CHILD_MENU_TYPE" => "top_line",
						"COMPONENT_TEMPLATE" => "top_line",
						"DELAY" => "N",
						"MAX_LEVEL" => "1",
						"MENU_CACHE_GET_VARS" => array(
						),
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_TYPE" => "N",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"ROOT_MENU_TYPE" => "top_line",
						"USE_EXT" => "N",
						"BXR_MOBILE_SHOW_SEARCH_FORM" => "Y",
						"BXR_MOBILE_SHOW_ANSWER_FORM" => "Y",
						"BXR_MOBILE_SHOW_PHONE_FORM" => "Y",
						"BXR_MOBILE_SHOW_USER_FORM" => "Y"
					),
					false
				);
				?>
			</div>
			<div class="col-md-2 text-right bx-share-social">
				<?$APPLICATION->IncludeComponent(
                                "bitrix:main.include",
                                "named_area",
                                Array(
                                    "AREA_FILE_SHOW" => "file",
                                    "AREA_FILE_SUFFIX" => "inc",
                                    "EDIT_TEMPLATE" => "",
                                    "PATH" => SITE_DIR."include/socnet.php",
						),
					false
				);?>
			</div>
			<div class="col-md-2">

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
		"INPUT_ID" => "title-search-input-topline",
		"CONTAINER_ID" => "title-search-topline",
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
		"PREVIEW_WIDTH" => "75",
		"PREVIEW_HEIGHT" => "75"
	),
	false
);
				?>
			</div>
		</div>
	</div>
</div>
<div class="bxr-top-panel-line bxr-color hidden-xs"></div>