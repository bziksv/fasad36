<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;?>
<?if(IsModuleInstalled("subscribe")):?>
    <div class="bxr-gray-ribbon-list min">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 bxr-subscribe-fullscren">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:subscribe.form", 
                        "business_horizontal", 
                        array(
                                "CACHE_TIME" => "3600",
                                "CACHE_TYPE" => "A",
                                "PAGE" => "#SITE_DIR#profile/subscribe/",
                                "SHOW_HIDDEN" => "N",
                                "USE_PERSONALIZATION" => "Y",
                                "COMPONENT_TEMPLATE" => "business_horizontal",
                                "SHOW_RUBRICS" => "Y"
                        ),
                        false,
                        array(
                        "ACTIVE_COMPONENT" => "Y"
                        )
                    );?>
                <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
<?endif;?>