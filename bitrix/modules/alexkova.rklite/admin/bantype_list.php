<?
##############################################
# Alexkova: rklite                           #
# Copyright (c) 20011 Alexkova               #
# http://www.alexkova.ru                     #
# mailto:kova@alexkova.ru                    #
##############################################
$MODULE_ID = 'alexkova.rklite';
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");//первый общий пролог
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$MODULE_ID."/include.php");
IncludeModuleLangFile(__FILE__);
$REK_RIGHT = $APPLICATION->GetGroupRight($MODULE_ID);


if ($REK_RIGHT == "D")
	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
?>
<?// здесь будет вс€ серверна€ обработка и подготовка данных

$sTableID = "b_rklite_bantype"; // ID таблицы
$oSort = new CAdminSorting($sTableID, "ID", "desc"); // объект сортировки
$lAdmin = new CAdminList($sTableID, $oSort); // основной объект списка
//
// обработка одиночных и групповых действий
if($lAdmin->EditAction() && $REK_RIGHT=="W")
{
	//print_r($FIELDS);
	foreach($FIELDS as $ID=>$arFields)
	{
		$DB->StartTransaction();
		$ID = trim($ID);

		if(!$lAdmin->IsUpdated($ID))
			continue;

		$oBantype = new CKuznica_rklite;
		if(!$oBantype->UpdateType($ID,$arFields))
		{
			$lAdmin->AddUpdateError(GetMessage("SAVE_ERROR").$ID.": ".$oBantype->LAST_ERROR, $ID);
			$DB->Rollback();
		}
		$DB->Commit();
	}
}
if(($arID = $lAdmin->GroupAction()) && $REK_RIGHT=="W")
{
  // если выбрано "ƒл€ всех элементов"
  if($_REQUEST['action_target']=='selected')
  {
	$cData = new CKuznica_rklite;
	$rsData = $cData->GetTypeList();
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
	  $rsBan = CKuznica_rklite::GetList(array(),array("BANTYPE"=>$ID));
	  if($arBan = $rsBan->GetNext())
	  {
		  $lAdmin->AddGroupError(GetMessage("bantype_del_err2"), $ID);
	  }
	  elseif(!CKuznica_rklite::DeleteType($ID))
      {
        $DB->Rollback();
        $lAdmin->AddGroupError(GetMessage("bantype_del_err"), $ID);
      }
      $DB->Commit();
      break;

    // активаци€/деактиваци€
    case "activate":
    case "deactivate":
      $cData = new CKuznica_rklite;
      if(($rsData = $cData->GetTypeByID($ID)) && ($arFields = $rsData->Fetch()))
      {
        $arFields["ACTIVE"]=($_REQUEST['action']=="activate"?"Y":"N");
        if(!$cData->UpdateType($ID, $arFields))
          $lAdmin->AddGroupError(GetMessage("SAVE_ERROR").$cData->LAST_ERROR, $ID);
      }
      else
        $lAdmin->AddGroupError(GetMessage("SAVE_ERROR")." ".GetMessage("NO_BANTYPE"), $ID);

      break;
    }
  }
}


// выберем список типов баннеров
$cData = new CKuznica_rklite;
$rsData = $cData->GetTypeList(array($by=>$order));

// преобразуем список в экземпл€р класса CAdminResult
$rsData = new CAdminResult($rsData, $sTableID);

// аналогично CDBResult инициализируем постраничную навигацию.
$rsData->NavStart();
// отправим вывод переключател€ страниц в основной объект $lAdmin
$lAdmin->NavText($rsData->GetNavPrint(GetMessage("REK_NAV")));

//столбцы таблицы
$lAdmin->AddHeaders(array(
  array(  "id"    =>"ID",
    "content"  =>"ID",
    "sort"     =>"id",
    "default"  =>false,
  ),
  array(  "id"    =>"CODE",
    "content"  =>GetMessage("COL_CODE"),
    "sort"     =>"code",
    "default"  =>true,
  ),
  array(  "id"    =>"NAME",
    "content"  =>GetMessage("COL_NAME"),
    "sort"     =>"name",
    "default"  =>true,
  ),
  array(  "id"    =>"ACTIVE",
    "content"  =>GetMessage("COL_ACTIVE"),
    "sort"     =>"active",
    "default"  =>true,
  ),
  array(  "id"    =>"SORT",
    "content"  =>GetMessage("COL_SORT"),
    "sort"     =>"sort",
    "default"  =>true,
  ),
));
while($arRes = $rsData->NavNext(true, "f_"))
{
   // создаем строку. результат - экземпл€р класса CAdminListRow
  $row =& $lAdmin->AddRow($f_ID, $arRes);

  // далее настроим отображение значений при просмотре и редаткировании списка

  // параметр NAME будет редактироватьс€ как текст, а отображатьс€ ссылкой
  $row->AddInputField("NAME", array("size"=>40));
  $row->AddViewField("NAME", '<a href="rklite_bantype_edit.php?ID='.$f_ID.'&lang='.LANG.'">'.$f_NAME.'</a>');
  $row->AddInputField("SORT", array("size"=>20));
  $row->AddCheckField("ACTIVE");

  // сформируем контекстное меню
  $arActions = Array();

  // редактирование элемента
  $arActions[] = array(
    "ICON"=>"edit",
    "DEFAULT"=>true,
    "TEXT"=>GetMessage("REK_EDIT"),
    "ACTION"=>$lAdmin->ActionRedirect("rklite_bantype_edit.php?ID=".$f_ID)
  );
  // вставим разделитель
  $arActions[] = array("SEPARATOR"=>true);
  // удаление элемента
  if ($REK_RIGHT>="W")
    $arActions[] = array(
      "ICON"=>"delete",
      "TEXT"=>GetMessage("REK_DEL"),
      "ACTION"=>"if(confirm('".GetMessage('REK_DEL_CONF')."')) ".$lAdmin->ActionDoGroup($f_ID, "delete")
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
    "TEXT"=>GetMessage("BANTYPE_ADD"),
    "LINK"=>"rklite_bantype_edit.php?lang=".LANG,
    "TITLE"=>GetMessage("BANTYPE_ADD_TITLE"),
    "ICON"=>"btn_new",
  ),
	array(
		"TEXT"	=> GetMessage("BANNER_NEW"),
		"TITLE"	=> GetMessage("BANNER_NEW_TITLE"),
		"LINK"	=> "rklite_banner_edit.php?lang=".LANGUAGE_ID,
		"ICON"	=> "btn_new"
		),
);

// и прикрепим его к списку (вызывать об€зательно ƒќ CheckListMode)
$lAdmin->AddAdminContextMenu($aContext);

// альтернативный вывод (дл€ AJAX и т.п)
$lAdmin->CheckListMode();
$APPLICATION->SetTitle(GetMessage("BANTYPE_LIST_TITLE"));
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