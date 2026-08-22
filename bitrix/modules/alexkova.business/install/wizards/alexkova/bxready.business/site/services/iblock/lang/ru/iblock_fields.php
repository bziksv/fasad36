<?
$MESS["market_promo_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '2016-07-21 14:13:41',
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["market_promo_DATA"] = array (
	'TIMESTAMP_X' => '07.07.2016 15:22:02',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'market_promo',
	'NAME' => 'Промо-блок',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/content/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/content/detail.php?ID=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/content/list.php?SECTION_ID=#SECTION_ID#',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_market_promo',
	'TMP_ID' => '4a4c9e4027c4e708ab1bb22ae02e8083',
	'INDEX_ELEMENT' => 'N',
	'INDEX_SECTION' => 'N',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_market_promo',
	'LANG_DIR' => '/site_lc/',
	'SERVER_NAME' => 'shop.bxready.ru',
);

$MESS["actions_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '2016-07-07 15:23:03',
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["actions_DATA"] = array (
	'TIMESTAMP_X' => '07.07.2016 15:23:03',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'actions',
	'NAME' => 'Акции',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/actions/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/actions/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_actions',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'N',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_actions',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["feedback_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["feedback_DATA"] = array (
	'TIMESTAMP_X' => '08.07.2016 07:53:57',
	'IBLOCK_TYPE_ID' => 'services',
	'CODE' => 'feedback',
	'NAME' => 'Обратная связь',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/services/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/services/detail.php?ID=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/services/list.php?SECTION_ID=#SECTION_ID#',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_feedback',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'N',
	'INDEX_SECTION' => 'N',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_feedback',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["forms_phone_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["forms_phone_DATA"] = array (
	'TIMESTAMP_X' => '08.07.2016 08:05:48',
	'IBLOCK_TYPE_ID' => 'services',
	'CODE' => 'forms_phone',
	'NAME' => 'Заказать звонок',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/services/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/services/detail.php?ID=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/services/list.php?SECTION_ID=#SECTION_ID#',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_forms_phone',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'N',
	'INDEX_SECTION' => 'N',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => NULL,
	'PROPERTY_INDEX' => NULL,
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_forms_phone',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["catalog_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '2016-07-14 09:12:47',
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["catalog_DATA"] = array (
	'TIMESTAMP_X' => '14.07.2016 09:12:47',
	'IBLOCK_TYPE_ID' => 'catalog',
	'CODE' => 'catalog',
	'NAME' => 'Каталог товаров',
	'ACTIVE' => 'Y',
	'SORT' => '100',
	'LIST_PAGE_URL' => '#SITE_DIR#/catalog/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/catalog/#SECTION_CODE#/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/catalog/#SECTION_CODE#/',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => 'Поставка широкого спектра товаров и промышленного оборудования как для корпоративных клиентов так и для частных лиц. Профессионализм и ответственность ключевые преимущества нашей компании. 

 
',
	'DESCRIPTION_TYPE' => 'html',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_catalog',
	'TMP_ID' => '0dc2c166c3603a6334110eb7a23eca67',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'Y',
	'PROPERTY_INDEX' => 'I',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_catalog',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["offers_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '2016-07-15 06:52:01',
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["offers_DATA"] = array (
	'TIMESTAMP_X' => '15.07.2016 06:52:01',
	'IBLOCK_TYPE_ID' => 'catalog',
	'CODE' => 'offers',
	'NAME' => 'Предложения',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/offers/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#PRODUCT_URL#?offer=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/offers/list.php?SECTION_ID=#SECTION_ID#',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_offers',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'N',
	'INDEX_SECTION' => 'N',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'Y',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_offers',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["faq_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '2016-08-05 12:35:32',
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["faq_DATA"] = array (
	'TIMESTAMP_X' => '05.08.2016 12:35:31',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'faq',
	'NAME' => 'Вопрос-ответ',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/faq/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/faq/#SECTION_CODE#/#ELEMENT_ID#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/faq/#SECTION_CODE#/',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_faq',
	'TMP_ID' => '151aba8bae810d9705d20506525530d1',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_faq',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["slider_slick_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '2016-08-05 16:02:29',
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["slider_slick_DATA"] = array (
	'TIMESTAMP_X' => '05.08.2016 16:02:29',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'slider_slick',
	'NAME' => 'Слайдер на главной',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/content/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/content/detail.php?ID=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/content/list.php?SECTION_ID=#SECTION_ID#',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_slider_slick',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_slider_slick',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["products_request_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["products_request_DATA"] = array (
	'TIMESTAMP_X' => '09.08.2016 10:26:33',
	'IBLOCK_TYPE_ID' => 'services',
	'CODE' => 'products_request',
	'NAME' => 'Заказанные товары',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/services/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/services/detail.php?ID=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/services/list.php?SECTION_ID=#SECTION_ID#',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_products_request',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => NULL,
	'PROPERTY_INDEX' => NULL,
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_products_request',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["project_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["project_DATA"] = array (
	'TIMESTAMP_X' => '21.09.2016 13:45:54',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'project',
	'NAME' => 'Проекты',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/projects/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/projects/#SECTION_CODE#/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/projects/#SECTION_CODE#/',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => 'Наша компания направленна на создание уникальных продуктов. Мы обладаем большим спектром оказываемых услуг: от готовых и типовых решений до индивидуальных проектов.',
	'DESCRIPTION_TYPE' => 'html',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_project',
	'TMP_ID' => '022d78421bcd97c47828af93f77f17bc',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => NULL,
	'PROPERTY_INDEX' => NULL,
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_project',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["news_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["news_DATA"] = array (
	'TIMESTAMP_X' => '21.10.2016 15:45:08',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'news',
	'NAME' => 'Новости',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#news/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#news/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => 'Последние новости сегодня, самые свежие и актуальные новости нашей компании',
	'DESCRIPTION_TYPE' => 'html',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_news',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_news',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["articles_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["articles_DATA"] = array (
	'TIMESTAMP_X' => '24.10.2016 09:23:41',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'articles',
	'NAME' => 'Статьи',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/articles/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/articles/#SECTION_CODE#/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/articles/#SECTION_CODE#/',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => 'Статьи которые помогут вам в правильном выборе',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_articles',
	'TMP_ID' => 'd3c7159f658ef371fffe1f2687244596',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_articles',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["services_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["services_DATA"] = array (
	'TIMESTAMP_X' => '24.10.2016 10:01:54',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'services',
	'NAME' => 'Услуги',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/services/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/services/#SECTION_CODE#/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/services/#SECTION_CODE#/',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_services',
	'TMP_ID' => 'dd4e52d9010206cd61a145cd77be9ef0',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_services',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["brands_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["brands_DATA"] = array (
	'TIMESTAMP_X' => '26.10.2016 14:13:15',
	'IBLOCK_TYPE_ID' => 'catalog',
	'CODE' => 'brands',
	'NAME' => 'Производители',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/manufacturers/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/manufacturers/#SECTION_CODE#/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/manufacturers/#SECTION_CODE#/',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_brands',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_brands',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["triggers_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["triggers_DATA"] = array (
	'TIMESTAMP_X' => '27.10.2016 16:27:50',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'triggers',
	'NAME' => 'Триггеры',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/content/index.php?ID=#IBLOCK_ID#',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/content/detail.php?ID=#ELEMENT_ID#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/content/list.php?SECTION_ID=#SECTION_ID#',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_triggers',
	'TMP_ID' => '90378dc0e687405a95306fa5e741dad0',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => NULL,
	'PROPERTY_INDEX' => NULL,
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_triggers',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["reviews_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["reviews_DATA"] = array (
	'TIMESTAMP_X' => '02.11.2016 12:18:58',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'reviews',
	'NAME' => 'Отзывы',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#reviews/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#reviews/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => 'qwe qwe qw e',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_reviews',
	'TMP_ID' => '2c9797e1b1c1d4edf6cec9a79dcf87fb',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_reviews',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["vacancies_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["vacancies_DATA"] = array (
	'TIMESTAMP_X' => '07.11.2016 08:44:07',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'vacancies',
	'NAME' => 'Вакансии',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/company/vacancies/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/company/vacancies/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/company/vacancies/',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => 'Компания специализируется на предоставлении услуг как для корпоративных клиентов так и для частных лиц.  Деятельность компании получила высокую оценку профессионального сообщества.',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_vacancies',
	'TMP_ID' => 'f1b4e533cd8bb5ab68349f3b127346ae',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_vacancies',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["corporate_licenses_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["corporate_licenses_DATA"] = array (
	'TIMESTAMP_X' => '07.11.2016 09:11:30',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'corporate_licenses',
	'NAME' => 'Лицензии и сертификаты',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/company/licenses/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/company/licenses/#SECTION_CODE#/#ELEMENT_CODE#',
	'SECTION_PAGE_URL' => '#SITE_DIR#/company/licenses/#SECTION_CODE#',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_corporate_licenses',
	'TMP_ID' => '80027574ae5999ce1c8553d7c80284d5',
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_corporate_licenses',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["employees_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'N',
					'TRANSLITERATION' => 'N',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["employees_DATA"] = array (
	'TIMESTAMP_X' => '07.11.2016 13:12:33',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'employees',
	'NAME' => 'Сотрудники',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/employees/vacancies/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/employees/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_employees',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => NULL,
	'PROPERTY_INDEX' => NULL,
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_employees',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["clients_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["clients_DATA"] = array (
	'TIMESTAMP_X' => '09.11.2016 08:21:51',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'clients',
	'NAME' => 'Клиенты',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/company/partners_and_clients/clients/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/company/partners_and_clients/clients/#SECTION_CODE#/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/company/partners_and_clients/clients/#SECTION_CODE#/',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_clients',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_clients',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);

$MESS["partners_FIELDS"] = array (
	'IBLOCK_SECTION' =>
		array (
			'NAME' => 'Привязка к разделам',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'KEEP_IBLOCK_SECTION_ID' => 'N',
				),
		),
	'ACTIVE' =>
		array (
			'NAME' => 'Активность',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'Y',
		),
	'ACTIVE_FROM' =>
		array (
			'NAME' => 'Начало активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'ACTIVE_TO' =>
		array (
			'NAME' => 'Окончание активности',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SORT' =>
		array (
			'NAME' => 'Сортировка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '0',
		),
	'NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'PREVIEW_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'PREVIEW_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип описания для анонса',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'PREVIEW_TEXT' =>
		array (
			'NAME' => 'Описание для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'DETAIL_TEXT_TYPE' =>
		array (
			'NAME' => 'Тип детального описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'DETAIL_TEXT' =>
		array (
			'NAME' => 'Детальное описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'TAGS' =>
		array (
			'NAME' => 'Теги',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_NAME' =>
		array (
			'NAME' => 'Название',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_PICTURE' =>
		array (
			'NAME' => 'Картинка для анонса',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'FROM_DETAIL' => 'N',
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'DELETE_WITH_DETAIL' => 'N',
					'UPDATE_WITH_DETAIL' => 'N',
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_DESCRIPTION_TYPE' =>
		array (
			'NAME' => 'Тип описания',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' => 'text',
		),
	'SECTION_DESCRIPTION' =>
		array (
			'NAME' => 'Описание',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_DETAIL_PICTURE' =>
		array (
			'NAME' => 'Детальная картинка',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' =>
				array (
					'SCALE' => 'N',
					'WIDTH' => '',
					'HEIGHT' => '',
					'IGNORE_ERRORS' => 'N',
					'METHOD' => 'resample',
					'COMPRESSION' => 95,
					'USE_WATERMARK_TEXT' => 'N',
					'WATERMARK_TEXT' => '',
					'WATERMARK_TEXT_FONT' => '',
					'WATERMARK_TEXT_COLOR' => '',
					'WATERMARK_TEXT_SIZE' => '',
					'WATERMARK_TEXT_POSITION' => 'tl',
					'USE_WATERMARK_FILE' => 'N',
					'WATERMARK_FILE' => '',
					'WATERMARK_FILE_ALPHA' => '',
					'WATERMARK_FILE_POSITION' => 'tl',
					'WATERMARK_FILE_ORDER' => NULL,
				),
		),
	'SECTION_XML_ID' =>
		array (
			'NAME' => 'Внешний код',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => '',
		),
	'SECTION_CODE' =>
		array (
			'NAME' => 'Символьный код',
			'IS_REQUIRED' => 'Y',
			'DEFAULT_VALUE' =>
				array (
					'UNIQUE' => 'Y',
					'TRANSLITERATION' => 'Y',
					'TRANS_LEN' => 100,
					'TRANS_CASE' => 'L',
					'TRANS_SPACE' => '-',
					'TRANS_OTHER' => '-',
					'TRANS_EAT' => 'Y',
					'USE_GOOGLE' => 'N',
				),
		),
	'LOG_SECTION_ADD' =>
		array (
			'NAME' => 'LOG_SECTION_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_EDIT' =>
		array (
			'NAME' => 'LOG_SECTION_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_SECTION_DELETE' =>
		array (
			'NAME' => 'LOG_SECTION_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_ADD' =>
		array (
			'NAME' => 'LOG_ELEMENT_ADD',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_EDIT' =>
		array (
			'NAME' => 'LOG_ELEMENT_EDIT',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'LOG_ELEMENT_DELETE' =>
		array (
			'NAME' => 'LOG_ELEMENT_DELETE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
		),
	'XML_IMPORT_START_TIME' =>
		array (
			'NAME' => 'XML_IMPORT_START_TIME',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => NULL,
			'VISIBLE' => 'N',
		),
	'DETAIL_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'DETAIL_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'PREVIEW_TEXT_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'PREVIEW_TEXT_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
	'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE' =>
		array (
			'NAME' => 'SECTION_DESCRIPTION_TYPE_ALLOW_CHANGE',
			'IS_REQUIRED' => 'N',
			'DEFAULT_VALUE' => 'Y',
			'VISIBLE' => 'N',
		),
);

$MESS["partners_DATA"] = array (
	'TIMESTAMP_X' => '09.11.2016 08:24:43',
	'IBLOCK_TYPE_ID' => 'content',
	'CODE' => 'partners',
	'NAME' => 'Партнёры',
	'ACTIVE' => 'Y',
	'SORT' => '500',
	'LIST_PAGE_URL' => '#SITE_DIR#/company/partners_and_clients/partners/',
	'DETAIL_PAGE_URL' => '#SITE_DIR#/company/partners_and_clients/partners/#SECTION_CODE#/#ELEMENT_CODE#/',
	'SECTION_PAGE_URL' => '#SITE_DIR#/company/partners_and_clients/partners/#SECTION_CODE#/',
	'CANONICAL_PAGE_URL' => '',
	'PICTURE' => NULL,
	'DESCRIPTION' => '',
	'DESCRIPTION_TYPE' => 'text',
	'RSS_TTL' => '24',
	'RSS_ACTIVE' => 'Y',
	'RSS_FILE_ACTIVE' => 'N',
	'RSS_FILE_LIMIT' => NULL,
	'RSS_FILE_DAYS' => NULL,
	'RSS_YANDEX_ACTIVE' => 'N',
	'XML_ID' => 'bxr_partners',
	'TMP_ID' => NULL,
	'INDEX_ELEMENT' => 'Y',
	'INDEX_SECTION' => 'Y',
	'WORKFLOW' => 'N',
	'BIZPROC' => 'N',
	'SECTION_CHOOSER' => 'L',
	'LIST_MODE' => '',
	'RIGHTS_MODE' => 'S',
	'SECTION_PROPERTY' => 'N',
	'PROPERTY_INDEX' => 'N',
	'VERSION' => '2',
	'LAST_CONV_ELEMENT' => '0',
	'SOCNET_GROUP_ID' => NULL,
	'EDIT_FILE_BEFORE' => '',
	'EDIT_FILE_AFTER' => '',
	'SECTIONS_NAME' => 'Разделы',
	'SECTION_NAME' => 'Раздел',
	'ELEMENTS_NAME' => 'Элементы',
	'ELEMENT_NAME' => 'Элемент',
	'EXTERNAL_ID' => 'bxr_partners',
	'LANG_DIR' => '/',
	'SERVER_NAME' => '',
);
?>