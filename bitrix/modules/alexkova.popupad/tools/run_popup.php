<? include($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$result = $APPLICATION->IncludeComponent(
    "kuznica:banner.popup",
    "json",
    Array("ONLY_RETURN" => "Y","BACKURL" => htmlspecialcharsbx($_REQUEST["backurl"])),
    false,
    array("HIDE_ICONS" => "Y")
);
echo json_encode($result);