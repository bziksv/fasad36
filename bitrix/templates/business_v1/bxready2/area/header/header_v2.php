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
            <div class="col-sm-3 hidden-xs hidden-sm bxr-element-row-middle">
			<div class="bxr-element-col-middle">
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
			
			<img src="/images/fasad.jpg" style="max-width:565px">
               <div class="bxr-element-col-middle">
		
                    <?
					/*
					$APPLICATION->IncludeComponent(
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
                    );*/?>                    
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
								<?
				$APPLICATION->IncludeComponent("alexkova.business:search.title", "button_home", Array(
	"COMPONENT_TEMPLATE" => "button",
		"NUM_CATEGORIES" => "1",	// Количество категорий поиска
		"TOP_COUNT" => "5",	// Количество результатов в каждой категории
		"ORDER" => "date",	// Сортировка результатов
		"USE_LANGUAGE_GUESS" => "Y",	// Включить автоопределение раскладки клавиатуры
		"CHECK_DATES" => "N",	// Искать только в активных по дате документах
		"SHOW_OTHERS" => "N",	// Показывать категорию "прочее"
		"PAGE" => "/search/",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
		"SHOW_INPUT" => "Y",	// Показывать форму ввода поискового запроса
		"INPUT_ID" => "title-search-input-topline",	// ID строки ввода поискового запроса
		"CONTAINER_ID" => "title-search-topline",	// ID контейнера, по ширине которого будут выводиться результаты
		"CATEGORY_0_TITLE" => "",	// Название категории
		"CATEGORY_0" => array(	// Ограничение области поиска
			0 => "no",
		),
		"PRICE_CODE" => "",	// Тип цены
		"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
		"PREVIEW_TRUNCATE_LEN" => "200",	// Максимальная длина анонса для вывода
		"SHOW_PREVIEW" => "Y",	// Показать картинку
		"CONVERT_CURRENCY" => "N",
		"PREVIEW_WIDTH" => "75",	// Ширина картинки
		"PREVIEW_HEIGHT" => "75",	// Высота картинки
	),
	false
);
				?>
            </div>
			
            <div class="clearfix"></div>
        </div>
    </div>
   
</div>
<div class="bxr-full-width">
    <?\Alexkova\Bxready2\Area::showArea("top_menu", "menu_v1");?>
</div>




