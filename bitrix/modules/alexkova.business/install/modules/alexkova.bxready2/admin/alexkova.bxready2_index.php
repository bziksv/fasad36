<?
// подключим все необходимые файлы:
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php");
?>

<style>
	.frame-width{
		width: 100%;
		min-height: 600px;
		border: none;
		border-collapse: collapse;
	}
</style>


<iframe src="http://bxready.ru/digest/" class="frame-width"></iframe>


<?	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>
