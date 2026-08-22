<?
##############################################
# Alexkova: popupad                          #
# Copyright (c) 2013 Kuznica                 #
# http://kuznica74.ru                        #
# mailto:global@kuznica.ru                   #
##############################################
$MODULE_ID = 'alexkova.popupad';
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");//первый общий пролог
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$MODULE_ID."/include.php");
IncludeModuleLangFile(__FILE__);
$REK_RIGHT = $APPLICATION->GetGroupRight($MODULE_ID);
if ($REK_RIGHT == "D")
	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
?>
<?// здесь будет вс€ серверна€ обработка и подготовка данных

$sTableID = "kznc_popupad_banner"; // ID таблицы
$oSort = new CAdminSorting($sTableID, "NAME", "desc"); // объект сортировки
$lAdmin = new CAdminList($sTableID, $oSort); // основной объект списка

if($lAdmin->EditAction() && $REK_RIGHT=="W")
{
	foreach($FIELDS as $ID=>$arFields)
	{
		$DB->StartTransaction();
		$ID = trim($ID);

		if(!$lAdmin->IsUpdated($ID))
			continue;

		$oBanner = new CKuznicaPopupad;
		if(!$oBanner->Update($ID, $arFields))
		{
			$lAdmin->AddUpdateError(GetMessage("SAVE_ERROR").$ID.": ".$oBanner->LAST_ERROR, $ID);
			$DB->Rollback();
		}
		$DB->Commit();
	}
}
// обработка одиночных и групповых действий
if(($arID = $lAdmin->GroupAction()) && $REK_RIGHT=="W")
{
  // если выбрано "ƒл€ всех элементов"
  if($_REQUEST['action_target']=='selected')
  {
	$cData = new CKuznicaPopupad;
	$rsData = $cData->GetList();
    while($arRes = $rsData->Fetch())
      $arID[] = $arRes['ID'];
  }

  // пройдем по списку элементов
  foreach($arID as $ID)
  {
    if(strlen($ID)<=0)
      continue;
       $ID = IntVal($ID);

    // дл€ каждого элемента совершим требуемое действие
    switch($_REQUEST['action'])
    {
    // удаление
    case "delete":
      @set_time_limit(0);
      $DB->StartTransaction();
      if(!CKuznicaPopupad::Delete($ID))
      {
        $DB->Rollback();
        $lAdmin->AddGroupError(GetMessage("ban_del_err"), $ID);
      }
      $DB->Commit();
      break;

    // активаци€/деактиваци€
    case "activate":
    case "deactivate":
      $cData = new CKuznicaPopupad;
      if(($rsData = $cData->GetByID($ID)) && ($arFields = $rsData->Fetch()))
      {
		$arFields["ACTIVE"]=($_REQUEST['action']=="activate"?"Y":"N");
		if(!$cData->SetActive($ID, $arFields["ACTIVE"]))
			$lAdmin->AddGroupError(GetMessage("SAVE_ERROR").$cData->LAST_ERROR, $ID);
      }
      else
        $lAdmin->AddGroupError(GetMessage("SAVE_ERROR")." ".GetMessage("NO_BANNER"), $ID);

      break;
    }
  }
}

// выберем список баннеров
$cData = new CKuznicaPopupad;
$rsData = $cData->GetList(array($by=>$order));
// преобразуем список в экземпл€р класса CAdminResult
$rsData = new CAdminResult($rsData, $sTableID);

// аналогично CDBResult инициализируем постраничную навигацию.
$rsData->NavStart();
// отправим вывод переключател€ страниц в основной объект $lAdmin
$lAdmin->NavText($rsData->GetNavPrint(GetMessage("POPUPAD_REK_NAV")));

$lAdmin->AddHeaders(array(
  array(  "id"    =>"ID",
    "content"  =>"ID",
    "sort"     =>"id",
    "default"  =>true,
  ),
  array(  "id"    =>"NAME",
    "content"  =>GetMessage("POPUPAD_COL_NAME"),
    "sort"     =>"name",
    "default"  =>true,
  ),
  array(  "id"    =>"ACTIVE",
    "content"  =>GetMessage("POPUPAD_COL_ACTIVE"),
    "sort"     =>"active",
    "default"  =>true,
  ),
  array(  "id"    =>"WEIGHT",
    "content"  =>GetMessage("POPUPAD_COL_WEIGHT"),
    "sort"     =>"weight",
    "default"  =>true,
  ),
  array(  "id"    =>"SID",
    "content"  =>GetMessage("POPUPAD_SID"),
    "sort"     =>"sid",
    "default"  =>true,
  ),
  array(  "id"    =>"SHOW_TYPE",
    "content"  =>GetMessage("POPUPAD_SHOW_TYPE"),
    "sort"     =>"show_type",
    "default"  =>true,
  ),
));
$arTypes = array();
$arTypesCode = array();
while($arRes = $rsData->NavNext(true, "f_"))
{
	$arSites = unserialize($arRes["SID"]);
	$arSiteID = array();
	$siteLinks = "";
	foreach($arSites as $sid=>$checked)
	{
		$arSiteID[] = $sid;
	}
	if(!empty($arSiteID))
		$arRes["SID"] = implode(",", $arSiteID);

   // создаем строку. результат - экземпл€р класса CAdminListRow
  $row =& $lAdmin->AddRow($f_ID, $arRes);

  // далее настроим отображение значений при просмотре и редаткировании списка

  // параметр NAME будет редактироватьс€ как текст, а отображатьс€ ссылкой
  $row->AddInputField("NAME", array("size"=>40));
  $row->AddViewField("NAME", '<a href="popupad_banner_edit.php?ID='.$f_ID.'&lang='.LANG.'">'.$f_NAME.'</a>');
  $row->AddInputField("WEIGHT", array("size"=>20));
  $row->AddCheckField("ACTIVE");

  // сформируем контекстное меню
  $arActions = Array();

  // редактирование элемента
  $arActions[] = array(
    "ICON"=>"edit",
    "DEFAULT"=>true,
    "TEXT"=>GetMessage("POPUPAD_REK_EDIT"),
    "ACTION"=>$lAdmin->ActionRedirect("popupad_banner_edit.php?ID=".$f_ID)
  );
  // вставим разделитель
  $arActions[] = array("SEPARATOR"=>true);
  // удаление элемента
  if ($REK_RIGHT>="W")
    $arActions[] = array(
      "ICON"=>"delete",
      "TEXT"=>GetMessage("POPUPAD_REK_DEL"),
      "ACTION"=>"if(confirm('".GetMessage('POPUPAD_REK_DEL_CONF')."')) ".$lAdmin->ActionDoGroup($f_ID, "delete")
    );

  if(is_set($arActions[count($arActions)-1], "SEPARATOR"))
    unset($arActions[count($arActions)-1]);
  // применим контекстное меню к строке
  $row->AddActions($arActions);
}
$lAdmin->AddFooter(
  array(
    array("title"=>GetMessage("MAIN_ADMIN_LIST_SELECTED"), "value"=>$rsData->SelectedRowsCount()), // кол-во элементов
    array("counter"=>true, "title"=>GetMessage("MAIN_ADMIN_LIST_CHECKED"), "value"=>"0"), // счетчик выбранных элементов
  )
);
// групповые действи€
$lAdmin->AddGroupActionTable(Array(
  "delete"=>GetMessage("MAIN_ADMIN_LIST_DELETE"), // удалить выбранные элементы
  "activate"=>GetMessage("MAIN_ADMIN_LIST_ACTIVATE"), // активировать выбранные элементы
  "deactivate"=>GetMessage("MAIN_ADMIN_LIST_DEACTIVATE"), // деактивировать выбранные элементы
  ));
// сформируем меню из одного пункта - добавление баннера
$aContext = array(
  array(
    "TEXT"=>GetMessage("POPUPAD_BANNER_ADD"),
    "LINK"=>"popupad_banner_edit.php?lang=".LANG,
    "TITLE"=>GetMessage("POPUPAD_BANNER_ADD_TITLE"),
    "ICON"=>"btn_new",
  ),
);

// и прикрепим его к списку (вызывать об€зательно ƒќ CheckListMode)
$lAdmin->AddAdminContextMenu($aContext);

// альтернативный вывод (дл€ AJAX и т.п)
$lAdmin->CheckListMode();
$APPLICATION->SetTitle(GetMessage("POPUPAD_BANNER_LIST_TITLE"));
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php"); // второй общий пролог
?>
<?
$lAdmin->DisplayList();
?>
<?// завершение страницы
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>