<div class="tb30-bottom">
	 <?$APPLICATION->IncludeComponent(
	"alexkova.business:slider", 
	".default", 
	array(
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COLUMN_DESC" => "Y",
		"COLUMN_POSITION" => "right",
		"FILTER_NAME" => "",
		"IBLOCK_ID" => "#BXR_IBLOCK_SLIDER_SLICK_ID#",
		"IBLOCK_TYPE" => "content",
		"NEWS_COUNT" => "20",
		"PROPERTY_CODE" => array(
			0 => "LOCATION",
			1 => "",
		),
		"SLIDER_AUTOPLAY" => "Y",
		"SLIDER_AUTOPLAY_SPEED" => "2000",
		"SLIDER_FADE" => "Y",
		"SLIDER_FULL_SCREEN" => "N",
		"SLIDER_SPEED" => "800",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			 <?$APPLICATION->IncludeComponent(
	"bxready2:block.list",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BXREADY_COLLECTION_DRAW" => "empty",
		"BXREADY_ELEMENT_ADDCLASS" => "",
		"BXREADY_ELEMENT_DRAW" => "trigger.flat.horizontal.v1",
		"BXREADY_ELEMENT_EXT_PARAMS" => "arrExtParams",
		"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => "12",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS" => "Y",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL" => "N",
		"BXREADY_LIST_HIDE_SLIDER_ARROWS" => "Y",
		"BXREADY_LIST_LG_CNT" => "3",
		"BXREADY_LIST_MD_CNT" => "4",
		"BXREADY_LIST_PAGE_BLOCK_TITLE" => "",
		"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => "",
		"BXREADY_LIST_SLIDER" => "N",
		"BXREADY_LIST_SLIDER_MARKERS" => "N",
		"BXREADY_LIST_SM_CNT" => "6",
		"BXREADY_LIST_TYPES" => "elements",
		"BXREADY_LIST_VERTICAL_SLIDER_MODE" => "N",
		"BXREADY_LIST_XS_CNT" => "12",
		"BXREADY_SECTION_DRAW" => "empty",
		"BXREADY_USER_TYPES" => "N",
		"BXREADY_USE_ELEMENTCLASS" => "Y",
		"BXREADY_VERTICAL_ALIGN" => "Y",
		"BXR_COLOR_TYPE" => "white_border",
		"BXR_PRST_COLOR_TYPE" => "gray",
		"BXR_PRST_IMAGE_SIZE" => "50",
		"BXR_PRST_IMAGE_TYPE" => "gray",
		"BXR_PRST_USE_HREF" => "N",
		"BXR_USE_HREF" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("ID","CODE","XML_ID","NAME","TAGS","SORT","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","DATE_ACTIVE_FROM","ACTIVE_FROM","DATE_ACTIVE_TO","ACTIVE_TO","SHOW_COUNTER","SHOW_COUNTER_START","IBLOCK_TYPE_ID","IBLOCK_ID","IBLOCK_CODE","IBLOCK_NAME","IBLOCK_EXTERNAL_ID","DATE_CREATE","CREATED_BY","CREATED_USER_NAME","TIMESTAMP_X","MODIFIED_BY","USER_NAME",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#BXR_IBLOCK_TRIGGERS_ID#",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "for_main",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("BXR_GLYPH",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
		</div>
	</div>
</div>
<div class="container tb20-bottom">
	<div class="row">
		<div class="col-xs-12">
			 <?$APPLICATION->IncludeComponent(
	"alexkova.business:promo",
	"ribbon",
	Array(
		"CACHE_TIME" => "0",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "ribbon",
		"DISPLAY_TYPE" => "block",
		"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"DETAIL_PICTURE",3=>"",),
		"HOVER_EFFECT" => "approx",
		"IBLOCK_ID" => "#BXR_IBLOCK_MARKET_PROMO_ID#",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_SUBSECTIONS" => "Y",
		"NEWS_COUNT" => "7",
		"PARENT_SECTION" => "",
                "PARENT_SECTION_CODE" => "business-demo",
		"PROPERTY_CODE" => array(0=>"PROMO_HIDE_NAME",1=>"",)
	)
);?>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bxr-list">
				<h2 class="tb20-bottom txtTrans">Каталог товаров</h2>
				<p class="tb30-bottom">
					 Поставка широкого спектра товаров и промышленного оборудования как для корпоративных клиентов так и для частных лиц. Профессионализм и ответственность ключевые преимущества нашей компании.
				</p>
			</div>
			 <?$APPLICATION->IncludeComponent(
	"bxready2:catalog.section.tree",
	"main",
	Array(
		"ADD_SECTIONS_CHAIN" => "N",
		"BXREADY_ELEMENT_DRAW" => "section.horizontal.v2",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000",
		"CACHE_TYPE" => "A",
		"COMPONENT_TEMPLATE" => "main",
		"COUNT_ELEMENTS" => "N",
		"IBLOCK_ID" => "#BXR_IBLOCK_CATALOG_ID#",
		"IBLOCK_TYPE" => "catalog",
		"SECTION_CODE" => "",
		"SECTION_FIELDS" => array(0=>"",1=>$sectionFields,2=>"",),
		"SECTION_ID" => "",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(0=>"",1=>"",),
		"SHOW_PARENT_NAME" => "Y",
		"SHOW_SECTION_DESCRIPTION" => "N",
		"SHOW_SECTION_NAME" => "N",
		"TOP_DEPTH" => "3",
		"VIEW_MODE" => "LIST"
	)
);?>
		</div>
	</div>
</div>
 <br>
 <br>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bxr-list">
				<h2 class="tb20-bottom txtTrans">Проекты</h2>
				<p class="tb30-bottom">
					 Поставка широкого спектра товаров и промышленного оборудования как для корпоративных клиентов так и для частных лиц. Профессионализм и ответственность ключевые преимущества нашей компании.
				</p>
			</div>
			 <?$APPLICATION->IncludeComponent(
	"bxready2:block.list",
	".default",
	Array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BXREADY_COLLECTION_DRAW" => "standart",
		"BXREADY_ELEMENT_ADDCLASS" => "",
		"BXREADY_ELEMENT_DRAW" => "news.vertical.v1",
		"BXREADY_ELEMENT_EXT_PARAMS" => "arrExtParams",
		"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => "12",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS" => "Y",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL" => "N",
		"BXREADY_LIST_HIDE_SLIDER_ARROWS" => "Y",
		"BXREADY_LIST_LG_CNT" => "3",
		"BXREADY_LIST_MD_CNT" => "4",
		"BXREADY_LIST_PAGE_BLOCK_TITLE" => "",
		"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => "",
		"BXREADY_LIST_SLIDER" => "N",
		"BXREADY_LIST_SLIDER_MARKERS" => "N",
		"BXREADY_LIST_SM_CNT" => "6",
		"BXREADY_LIST_TYPES" => "elements",
		"BXREADY_LIST_VERTICAL_SLIDER_MODE" => "N",
		"BXREADY_LIST_XS_CNT" => "12",
		"BXREADY_SECTION_DRAW" => "empty",
		"BXREADY_USER_TYPES" => "N",
		"BXREADY_USE_ELEMENTCLASS" => "Y",
		"BXREADY_VERTICAL_ALIGN" => "Y",
		"BXR_COLOR_TYPE" => "white_border",
		"BXR_PRST_COLOR_TYPE" => "gray",
		"BXR_PRST_IMAGE_SIZE" => "50",
		"BXR_PRST_IMAGE_TYPE" => "gray",
		"BXR_PRST_SHOW_BORDER" => "Y",
		"BXR_PRST_STYLE" => "left",
		"BXR_USE_HREF" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"ID",1=>"CODE",2=>"XML_ID",3=>"NAME",4=>"TAGS",5=>"SORT",6=>"PREVIEW_TEXT",7=>"PREVIEW_PICTURE",8=>"DETAIL_TEXT",9=>"DETAIL_PICTURE",10=>"SHOW_COUNTER",11=>"SHOW_COUNTER_START",12=>"IBLOCK_TYPE_ID",13=>"IBLOCK_ID",14=>"IBLOCK_CODE",15=>"IBLOCK_NAME",16=>"IBLOCK_EXTERNAL_ID",17=>"DATE_CREATE",18=>"CREATED_BY",19=>"CREATED_USER_NAME",20=>"TIMESTAMP_X",21=>"MODIFIED_BY",22=>"USER_NAME",23=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#BXR_IBLOCK_PROJECT_ID#",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"BXR_UNIT_PRICE",1=>"BXR_PRICE",2=>"BXR_DISCOUNT_PRICE",3=>"BXR_DISCOUNT_PERIOD_FROM",4=>"BXR_DISCOUNT_PERIOD_TO",5=>"BXR_DISCOUNT_TIMER",6=>"BXR_OFFER_DETAIL",7=>"BXR_ARTICLE",8=>"BXR_INSTOCK",9=>"BXR_VIDEO",10=>"PROJECT_DETAIL",11=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
		</div>
	</div>
</div>
 <br>
 <br>
<div class="container tb20-bottom">
	<div class="row">
		<div class="col-xs-12">
			<div class="bxr-list">
				<h2 class="tb20-bottom txtTrans">Отзывы наших клиентов</h2>
				<p class="tb30-bottom">
					 Поставка широкого спектра товаров и промышленного оборудования как для корпоративных клиентов так и для частных лиц. Профессионализм и ответственность ключевые преимущества нашей компании.
				</p>
			</div>
			 <?$APPLICATION->IncludeComponent(
	"bxready2:block.list",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BXREADY_COLLECTION_DRAW" => "empty",
		"BXREADY_ELEMENT_ADDCLASS" => "",
		"BXREADY_ELEMENT_DRAW" => "reviews.v1",
		"BXREADY_ELEMENT_EXT_PARAMS" => "arrExtParams",
		"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => "12",
		"BXREADY_LIST_LG_CNT" => "6",
		"BXREADY_LIST_MD_CNT" => "6",
		"BXREADY_LIST_PAGE_BLOCK_TITLE" => "",
		"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => "",
		"BXREADY_LIST_SLIDER" => "N",
		"BXREADY_LIST_SM_CNT" => "12",
		"BXREADY_LIST_TYPES" => "elements",
		"BXREADY_LIST_XS_CNT" => "12",
		"BXREADY_SECTION_DRAW" => "empty",
		"BXREADY_USER_TYPES" => "N",
		"BXREADY_USE_ELEMENTCLASS" => "Y",
		"BXREADY_VERTICAL_ALIGN" => "Y",
		"BXR_PRST_COLOR_TYPE" => "gray",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("NAME","PREVIEW_TEXT","DATE_ACTIVE_FROM",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#BXR_IBLOCK_REVIEWS_ID#",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "2",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("BXR_POST",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
		</div>
	</div>
</div>
 <br>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bxr-list">
				<h2 class="tb20-bottom txtTrans">Новости</h2>
			</div>
			 <?$APPLICATION->IncludeComponent(
	"bxready2:block.list",
	".default",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BXREADY_COLLECTION_DRAW" => "empty",
		"BXREADY_ELEMENT_ADDCLASS" => "",
		"BXREADY_ELEMENT_DRAW" => "news.short.list.v1",
		"BXREADY_ELEMENT_EXT_PARAMS" => "arrExtParams",
		"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => "12",
		"BXREADY_LIST_LG_CNT" => "3",
		"BXREADY_LIST_MD_CNT" => "4",
		"BXREADY_LIST_PAGE_BLOCK_TITLE" => "",
		"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => "",
		"BXREADY_LIST_SLIDER" => "N",
		"BXREADY_LIST_SM_CNT" => "6",
		"BXREADY_LIST_TYPES" => "elements",
		"BXREADY_LIST_XS_CNT" => "12",
		"BXREADY_SECTION_DRAW" => "empty",
		"BXREADY_USER_TYPES" => "N",
		"BXREADY_USE_ELEMENTCLASS" => "Y",
		"BXREADY_VERTICAL_ALIGN" => "Y",
		"BXR_PRST_COLOR_TYPE" => "gray-border",
		"BXR_PRST_IMAGE_SIZE" => "50",
		"BXR_PRST_IMAGE_TYPE" => "color",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"COMPONENT_TEMPLATE" => ".default",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"NAME",1=>"PREVIEW_TEXT",2=>"DATE_ACTIVE_FROM",3=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#BXR_IBLOCK_NEWS_ID#",
		"IBLOCK_TYPE" => "-",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"",1=>"",),
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
		</div>
	</div>
</div>
 <br>
 <br>
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="bxr-list">
				<h2 class="tb20-bottom txtTrans">Статьи и обзоры</h2>
			</div>
			 <?$APPLICATION->IncludeComponent(
	"bxready2:block.list",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BXREADY_COLLECTION_DRAW" => "standart",
		"BXREADY_ELEMENT_ADDCLASS" => "",
		"BXREADY_ELEMENT_DRAW" => "news.vertical.v1",
		"BXREADY_ELEMENT_EXT_PARAMS" => "arrExtParams",
		"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => "12",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS" => "Y",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL" => "N",
		"BXREADY_LIST_HIDE_SLIDER_ARROWS" => "Y",
		"BXREADY_LIST_LG_CNT" => "3",
		"BXREADY_LIST_MD_CNT" => "3",
		"BXREADY_LIST_PAGE_BLOCK_TITLE" => "",
		"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => "",
		"BXREADY_LIST_SLIDER" => "N",
		"BXREADY_LIST_SLIDER_MARKERS" => "N",
		"BXREADY_LIST_SM_CNT" => "6",
		"BXREADY_LIST_TYPES" => "elements",
		"BXREADY_LIST_VERTICAL_SLIDER_MODE" => "N",
		"BXREADY_LIST_XS_CNT" => "12",
		"BXREADY_SECTION_DRAW" => "empty",
		"BXREADY_USER_TYPES" => "N",
		"BXREADY_USE_ELEMENTCLASS" => "Y",
		"BXREADY_VERTICAL_ALIGN" => "Y",
		"BXR_COLOR_TYPE" => "white_border",
		"BXR_ELEMENT_HEIGHT" => "140",
		"BXR_ELEMENT_REGIME" => "normal",
		"BXR_ELEMENT_WIDTH" => "100",
		"BXR_PRST_COLOR_TYPE" => "gray",
		"BXR_PRST_ELEMENT_HEIGHT" => "140",
		"BXR_PRST_ELEMENT_REGIME" => "normal",
		"BXR_PRST_ELEMENT_WIDTH" => "100",
		"BXR_PRST_GRAYSCALE" => "N",
		"BXR_PRST_IMAGE_SIZE" => "50",
		"BXR_PRST_IMAGE_TYPE" => "gray",
		"BXR_PRST_SHOW_BORDER" => "N",
		"BXR_PRST_SHOW_IMAGE" => "Y",
		"BXR_PRST_SHOW_NAME" => "Y",
		"BXR_PRST_STYLE" => "left",
		"BXR_PRST_USE_BACKGROUND" => "Y",
		"BXR_SHOW_BORDER" => "N",
		"BXR_SHOW_NAME" => "Y",
		"BXR_USE_BACKGROUND" => "Y",
		"BXR_USE_HREF" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("ID","CODE","XML_ID","NAME","TAGS","SORT","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","DATE_ACTIVE_FROM","ACTIVE_FROM","DATE_ACTIVE_TO","ACTIVE_TO","SHOW_COUNTER","SHOW_COUNTER_START","IBLOCK_TYPE_ID","IBLOCK_ID","IBLOCK_CODE","IBLOCK_NAME","IBLOCK_EXTERNAL_ID","DATE_CREATE","CREATED_BY","CREATED_USER_NAME","TIMESTAMP_X","MODIFIED_BY","USER_NAME",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#BXR_IBLOCK_ARTICLES_ID#",
		"IBLOCK_TYPE" => "content",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
		</div>
	</div>
</div>
 <br>
 <br>
<div class="bxr-gray-ribbon-list tb20-bottom">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				 <?$APPLICATION->IncludeComponent(
	"bxready2:block.list",
	"",
	Array(
		"ACTIVE_DATE_FORMAT" => "j F Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BXREADY_COLLECTION_DRAW" => "empty",
		"BXREADY_ELEMENT_ADDCLASS" => "",
		"BXREADY_ELEMENT_DRAW" => "image.v1",
		"BXREADY_ELEMENT_EXT_PARAMS" => "arrExtParams",
		"BXREADY_LIST_BOOTSTRAP_GRID_STYLE" => "12",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_ARROWS" => "N",
		"BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL" => "N",
		"BXREADY_LIST_HIDE_SLIDER_ARROWS" => "Y",
		"BXREADY_LIST_LG_CNT" => "2",
		"BXREADY_LIST_MD_CNT" => "3",
		"BXREADY_LIST_PAGE_BLOCK_TITLE" => "",
		"BXREADY_LIST_PAGE_BLOCK_TITLE_GLYPHICON" => "",
		"BXREADY_LIST_SLIDER" => "Y",
		"BXREADY_LIST_SLIDER_MARKERS" => "N",
		"BXREADY_LIST_SM_CNT" => "4",
		"BXREADY_LIST_TYPES" => "elements",
		"BXREADY_LIST_VERTICAL_SLIDER_MODE" => "N",
		"BXREADY_LIST_XS_CNT" => "6",
		"BXREADY_SECTION_DRAW" => "empty",
		"BXREADY_USER_TYPES" => "N",
		"BXREADY_USE_ELEMENTCLASS" => "Y",
		"BXREADY_VERTICAL_ALIGN" => "Y",
		"BXR_COLOR_TYPE" => "white_border",
		"BXR_ELEMENT_HEIGHT" => "60",
		"BXR_ELEMENT_REGIME" => "normal",
		"BXR_ELEMENT_WIDTH" => "60",
		"BXR_PRST_COLOR_TYPE" => "gray",
		"BXR_PRST_ELEMENT_HEIGHT" => "60",
		"BXR_PRST_ELEMENT_REGIME" => "normal",
		"BXR_PRST_ELEMENT_WIDTH" => "70",
		"BXR_PRST_GRAYSCALE" => "Y",
		"BXR_PRST_IMAGE_SIZE" => "50",
		"BXR_PRST_IMAGE_TYPE" => "gray",
		"BXR_PRST_SHOW_BORDER" => "N",
		"BXR_PRST_SHOW_NAME" => "N",
		"BXR_PRST_USE_BACKGROUND" => "Y",
		"BXR_SHOW_BORDER" => "N",
		"BXR_SHOW_NAME" => "N",
		"BXR_USE_BACKGROUND" => "Y",
		"BXR_USE_HREF" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array("ID","CODE","XML_ID","NAME","TAGS","SORT","PREVIEW_TEXT","PREVIEW_PICTURE","DETAIL_TEXT","DETAIL_PICTURE","DATE_ACTIVE_FROM","ACTIVE_FROM","DATE_ACTIVE_TO","ACTIVE_TO","SHOW_COUNTER","SHOW_COUNTER_START","IBLOCK_TYPE_ID","IBLOCK_ID","IBLOCK_CODE","IBLOCK_NAME","IBLOCK_EXTERNAL_ID","DATE_CREATE","CREATED_BY","CREATED_USER_NAME","TIMESTAMP_X","MODIFIED_BY","USER_NAME",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "#BXR_IBLOCK_BRANDS_ID#",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "10",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array("",""),
		"SET_BROWSER_TITLE" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?>
			</div>
		</div>
	</div>
</div>
 <br>