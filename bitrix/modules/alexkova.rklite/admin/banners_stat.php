<?
##############################################
# Alexkova: rklite                           #
# Copyright (c) 2012 Alexkova                #
# http://www.kuznica74.ru                    #
# mailto:kova@alexkova.ru                    #
##############################################
$MODULE_ID = 'alexkova.rklite';
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_before.php");//первый общий пролог
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$MODULE_ID."/include.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/img.php");
IncludeModuleLangFile(__FILE__);
$REK_RIGHT = $APPLICATION->GetGroupRight($MODULE_ID);
if ($REK_RIGHT == "D")
	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
?>
<?// здесь будет вс€ серверна€ обработка и подготовка данных
$sTableID = "b_rklite_stat"; // ID таблицы
$oSort = new CAdminSorting($sTableID, "EVENT_DATE", "desc"); // объект сортировки
$lAdmin = new CAdminList($sTableID, $oSort); // основной объект списка

//фильтр
// проверку значений фильтра дл€ удобства вынесем в отдельную функцию
function CheckFilter()
{
  global $FilterArr, $lAdmin;
  foreach ($FilterArr as $f) global $$f;
  return count($lAdmin->arFilterErrors)==0; // если ошибки есть, вернем false;
}
$rsBanners = CKuznica_rklite::GetList(array("ID"=>"DESC"));
while ($arBanner = $rsBanners->Fetch())
{
	$banner_ref_id[] = $arBanner["ID"];
	$banner_ref[] = "[".$arBanner["ID"]."] ".$arBanner["NAME"];
}

if (strlen($find_date1)<=0 && strlen($find_date2)<=0 && !is_array($find_banner_id) && strlen($find_banner_summa)<=0 && !is_array($find_what_show))
{
	$find_banner_summa = "Y";
	$find_what_show = Array("show","click");
}

// опишем элементы фильтра
$FilterArr = Array(
	"find_date1",
	"find_date2",
	"find_banner_id",
	"find_what_show",
	"find_banner_sum"
  );

// инициализируем фильтр
$lAdmin->InitFilter($FilterArr);
if (strlen($set_filter)>0)
	InitFilterEx($FilterArr,"RK_STAT_FILTER","set",true);
else
	InitFilterEx($FilterArr,"RK_STAT_FILTER","get",true);
if (strlen($del_filter)>0)
	DelFilterEx($FilterArr,"RK_STAT_FILTER",true);

if (empty($find_what_show))
{
	$find_what_show = array("ctr");
}
$arFilter = Array(
	"DATE_1"			=> $find_date1,
	"DATE_2"			=> $find_date2,
	"BANNER_ID"			=> $find_banner_id,
	"WHAT_SHOW"			=> $find_what_show,
	"BANNER_SUM"		=> $find_banner_sum,
);


// выберем список баннеров
$cData = new CKuznica_rklite;
$rsData = $cData->GetStatList($by,$order,$arFilter);
$arDays = CKuznica_rklite::GetStatGraph($arFilter,$arLegend);
// преобразуем список в экземпл€р класса CAdminResult
$rsData = new CAdminResult($rsData, $sTableID);

// аналогично CDBResult инициализируем постраничную навигацию.
$rsData->NavStart();
// отправим вывод переключател€ страниц в основной объект $lAdmin
$lAdmin->NavText($rsData->GetNavPrint(GetMessage("REK_NAV")));

$arHeaders =array(
  array(  "id"    =>"EVENT_DATE",
    "content"  =>GetMessage("COL_EVENT_DATE"),
    "sort"     =>"EVENT_DATE",
    "default"  =>true,
  ),
);
if($find_banner_sum != "Y")
	$arHeaders[] =  array(
		"id"    =>"BANNER_ID",
		"content"  =>GetMessage("COL_BANNER_ID"),
		"sort"     =>"BANNER_ID",
		"default"  =>true,
	);
$arHeaders[] = array(  "id"    =>"SHOW_COUNT",
    "content"  =>GetMessage("COL_SHOW_COUNT"),
    "sort"     =>"SHOW_COUNT",
    "default"  =>true,
  );
$arHeaders[] =  array(  "id"    =>"CLICK_COUNT",
    "content"  =>GetMessage("COL_CLICK_COUNT"),
    "sort"     =>"CLICK_COUNT",
    "default"  =>true,
  );
$arHeaders[] =  array(  "id"    =>"CTR",
    "content"  =>"CTR",
    "sort"     =>"CTR",
    "default"  =>true,
  );
$lAdmin->AddHeaders($arHeaders);
global $colors;
$cntDates = array();
while($arRes = $rsData->NavNext(true, "f_"))
{
	if(!in_array($arRes["DATE"], $cntDates))
		$cntDates[] = $arRes["DATE"];
	//$arRes["CTR"] = round(($arRes["CLICK_COUNT"]*100)/$arRes["SHOW_COUNT"], 2);
	//$f_CTR = $arRes["CTR"];
	$f_BANNER_ID = "[<a href='/bitrix/admin/rklite_banner_edit.php?ID=" . $arRes["BANNER_ID"] . "&lang=ru'>" . $arRes["BANNER_ID"] . "</a>] " . $arLegend[$arRes["BANNER_ID"]]["NAME"];
	$row =& $lAdmin->AddRow($_DATE, $arRes);

  $row->AddViewField("EVENT_DATE", $f_DATE);
  $row->AddViewField("BANNER_ID", $f_BANNER_ID);
  $row->AddViewField("SHOW_COUNT", $f_SHOW_COUNT);
  $row->AddViewField("CLICK_COUNT", $f_CLICK_COUNT);
  $row->AddViewField("CTR", $f_CTR);
}
$_SESSION["BANNERS_COLORS"] = $colors;
$lAdmin->AddFooter(
  array(
    array("title"=>GetMessage("MAIN_ADMIN_LIST_SELECTED"), "value"=>$rsData->SelectedRowsCount()), // кол-во элементов
  )
);
// альтернативный вывод (дл€ AJAX и т.п)
$lAdmin->CheckListMode();
$APPLICATION->SetTitle(GetMessage("BANNER_STAT"));
?>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_admin_after.php"); // второй общий пролог
?>
<?
$FilterFields = Array(
		GetMessage("RKLITE_F_WHAT_SHOW"),
		GetMessage("RKLITE_F_BANNERS"),
	);
$filter = new CAdminFilter(
	$sTableID."_filter_id",
	$FilterFields
	);
?>
<form name="form1" method="POST" action="<?=$APPLICATION->GetCurPage()?>?">
<input type="hidden" name="lang" value="<?=htmlspecialcharsbx(LANGUAGE_ID)?>">
<?$filter->Begin();
?>
<tr valign="center">
	<td width="0%" nowrap><?echo GetMessage("RKLITE_F_PERIOD")." (".CSite::GetDateFormat("SHORT")."):"?></td>
	<td width="0%" nowrap><?echo CalendarPeriod("find_date1", $find_date1, "find_date2", $find_date2, "form1", "Y")?></td>
</tr>
<tr>
	<td nowrap valign="top"><span class="required">*</span><?=GetMessage("RKLITE_F_WHAT_SHOW")?>:</td>
	<td valign="top"><?
		$arr = array(
			"reference" => array(
				GetMessage("RKLITE_SELECT_SHOW"),
				GetMessage("RKLITE_SELECT_CLICK"),
				'CTR',
			),
			"reference_id" => array(
				"show",
				"click",
				'ctr'
				));
		echo SelectBoxMFromArray("find_what_show[]",$arr, $find_what_show, "",false,"2");
		?></td>
</tr>
<tr>
	<td nowrap valign="top"><span class="required">*</span><?=GetMessage("RKLITE_F_BANNER_ID")?>:</td>
	<td valign="top"><?
		$arr = array("reference"=>array(GetMessage("RKLITE_EACH"), GetMessage("RKLITE_SUM")), "reference_id"=>array("N","Y"));
		echo SelectBoxFromArray("find_banner_sum", $arr, htmlspecialcharsbx($find_banner_sum), "", "style='width:100%'")."<br>";
		echo SelectBoxMFromArray("find_banner_id[]",array("REFERENCE"=>$banner_ref, "REFERENCE_ID"=>$banner_ref_id), $find_banner_id,"",false,"10", "style='width:100%'");
		?></td>
</tr>
<?
$filter->Buttons();
?>
<input type="submit" id="set_filter" name="set_filter" value="<?=GetMessage("RKLITE_F_FIND")?>" title="<?=GetMessage("RKLITE_F_FIND_TITLE")?>">
<input type="submit" name="del_filter" value="<?=GetMessage("RKLITE_F_CLEAR")?>" title="<?=GetMessage("RKLITE_F_CLEAR_TITLE")?>">
<?
$filter->End();
?>
</form>
<div class="graph">
	<?if(count($cntDates)>1):?>
	<table border="0" cellspacing="3" cellpadding="10" class="graph">
		<tr>
			<td>
				<img src="/bitrix/admin/rklite_graph.php?t=<?=time()?><?=GetFilterParams($FilterArr)?>" />
			</td>
		</tr>
		<tr>
			<td>
				<table class="list-table">
					<tr class="head">
						<?if(in_array('show', $find_what_show)):?>
							<td width="0%"><?=GetMessage("RKLITE_COL_SHOW")?></td>
						<?endif;?>
						<?if(in_array('click', $find_what_show)):?>
							<td width="0%"><?=GetMessage("RKLITE_COL_CLICK")?></td>
						<?endif;?>
						<?if(in_array('ctr', $find_what_show)):?>
							<td width="0%">CTR</td>
						<?endif;?>
						<td width="100%">
							<?if($find_banner_sum != "Y"):?>
								<?=GetMessage("RKLITE_COL_NAME")?>
							<?endif;?>
						</td>
					</tr>
					<?foreach($arLegend as $key=>$arL):?>
					<tr>
						<?if(in_array('show', $find_what_show)):?>
							<td style="text-align: center;vertical-align: middle;"><div style="background: <?="#".$arL["SHOW_COLOR"];?>; height:2px;"></div></td>
						<?endif;?>
						<?if(in_array('click', $find_what_show)):?>
							<td style="text-align: center;vertical-align: middle;"><div style="background: <?="#".$arL["CLICK_COLOR"];?>; height:2px;"></div></td>
						<?endif;?>
						<?if(in_array('ctr', $find_what_show)):?>
							<td style="text-align: center;vertical-align: middle;"><div style="background: <?="#".$arL["CTR_COLOR"];?>; height:2px;"></div></td>
						<?endif;?>
						<td>
							<?if($find_banner_sum != "Y"):?>
								[<?=$arL["ID"]?>] <?=$arL["NAME"]?>
							<?else:?>
								<?=GetMessage("RKLITE_SUM_TITLE");?>
							<?endif;?>
						</td>
					</tr>
					<?endforeach;?>
				</table>
			</td>
		</tr>
	</table>
<?else:?>
	<span class="errortext"><?=GetMessage("NEED_MORE_INFO")?></span>
<?endif;?>
</div>
<?
$lAdmin->DisplayList($FilterArr);
?>
<?// завершение страницы
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_admin.php");
?>