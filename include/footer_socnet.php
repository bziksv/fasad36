<?
$APPLICATION->IncludeComponent(
	"bitrix:main.share", 
	"flat_business", //flat_business
	array(
		"COMPONENT_TEMPLATE" => "flat_default",
		"HANDLERS" => array(
			0 => "twitter",
			1 => "vk",
			2 => "pinterest",
			3 => "facebook",
			4 => "gplus",
		),
		"PAGE_URL" => "",
		"PAGE_TITLE" => "",
		"SHORTEN_URL_LOGIN" => "",
		"SHORTEN_URL_KEY" => ""
	),
	false
);
?>
