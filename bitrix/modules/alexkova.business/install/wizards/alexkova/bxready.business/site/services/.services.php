<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arServices = Array(
	"main" => Array(
		"NAME" => GetMessage("SERVICE_MAIN_SETTINGS"),
		"STAGES" => Array(
			'bxready.php',

                        "template.php", // Install template
			"files.php", // Copy bitrix files

			///////"search.php", // Indexing files

			"menu.php", // Install menu
			"settings.php",
                    "rubric.php",
		),
	),
	"iblock" => Array(
		"NAME" => GetMessage("SERVICE_IBLOCK_DEMO_DATA"),
		"STAGES" => Array(
			"types.php",
			"brands.php",
			"catalog.php",
			"offers.php",
			"employees.php",
			"corporate_licenses.php",
			"vacancies.php",
			"reviews.php",
			"triggers.php",
			"news.php",
			"articles.php",
			"services.php",
			"project.php",
			"slider_slick.php",
			"actions.php",
			"faq.php",
			"market_promo.php",
			"products_request.php",
			"forms_phone.php",
			"feedback.php",
			"clients.php",
			'partners.php',
			'related.php',
			"iblock_ready.php",
                        "forms_ready.php",
		),
	)
);
?>