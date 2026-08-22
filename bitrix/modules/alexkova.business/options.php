<?
$module_id = "alexkova.business";
$bxready_id = "alexkova.bxready";

use Bitrix\Main\Loader,
	Bitrix\Main\ModuleManager,
	Bitrix\Main\Localization\Loc,
	Alexkova\Bxready2,
	Alexkova\Bxready2\Templates,
	Alexkova\Business\Core;

Loader::includeModule('alexkova.bxready2');
Loader::includeModule('alexkova.business');

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"].BX_ROOT."/modules/main/options.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$module_id."/include.php");
IncludeModuleLangFile(__FILE__);


CJSCore::init('jquery');
CJSCore::init('jquery-ui');

$RK_RIGHT = $APPLICATION->GetGroupRight($module_id);
$aTabs = array(
	array("DIV" => "edit1", "TAB" => GetMessage("BASE_SETTINGS"), "TITLE" => GetMessage("BASE_SETTINGS")),
	//array("DIV" => "edit2", "TAB" => GetMessage("TEMPLATE_SETTINGS"), "TITLE" => GetMessage("TEMPLATE_SETTINGS")),
        //array("DIV" => "edit3", "TAB" => GetMessage("PRICE_FORMATTING"), "TITLE" => GetMessage("PRICE_FORMATTING")),
//	array("DIV" => "edit5", "TAB" => GetMessage("AMK_ACCESS"), "TITLE" => GetMessage("AMK_ACCESS_TITLE")),

);
$tabControl = new CAdminTabControl("tabControl", $aTabs);
if ($REQUEST_METHOD=="GET" && $RK_RIGHT=="W" && strlen($RestoreDefaults)>0 && check_bitrix_sessid())
{
	COption::RemoveOption($module_id);
	$z = CGroup::GetList($v1="id",$v2="asc", array("ACTIVE" => "Y", "ADMIN" => "N"));
	while($zr = $z->Fetch())
		$APPLICATION->DelGroupRight($module_id, array($zr["ID"]));
}
if($REQUEST_METHOD=="POST" && strlen($Update.$Apply)>0 && $RK_RIGHT>="W" && check_bitrix_sessid())
{
        $siteTemplateID = $HTTP_POST_VARS["bxr_less_template_id"];
	/*$old_days = intval(COption::GetOptionString($module_id, "STAT_DAYS"));

	$new_days= intval($HTTP_POST_VARS["STAT_DAYS"]);

	$new_group = serialize($HTTP_POST_VARS["EXC_GROUP"]);
	COption::SetOptionString($module_id, "EXCLUDE_GROUPS", $new_group);

	COption::SetOptionString($module_id, "bxr_banners", $HTTP_POST_VARS["bxr_banners"]);
        COption::SetOptionString($module_id, "price_format_string", $HTTP_POST_VARS["price_format_string"]);
        COption::SetOptionString($module_id, "price_format_decimal", $HTTP_POST_VARS["price_format_decimal"]);

	$Update = $Update.$Apply;
	ob_start();
	require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");
	ob_end_clean();*/

        $arSetTemplateOption = array();
        if (strlen($siteTemplateID) > 0){
            $arSetTemplateOption["bxr_less_base_color"] = $HTTP_POST_VARS["bxr_less_base_color_".$siteTemplateID];
            $arSetTemplateOption["bxr_less_darken"] = $HTTP_POST_VARS["bxr_less_darken_".$siteTemplateID];
            $arSetTemplateOption["bxr_less_lighten"] = $HTTP_POST_VARS["bxr_less_lighten_".$siteTemplateID];
            
            $inFile = $_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".$siteTemplateID."/library/less/css.less";
            $outFile = $_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".$siteTemplateID."/library/less/less.css";
            if (!file_exists($inFile)) {
                $inFile = $_SERVER["DOCUMENT_ROOT"]."/local/templates/".$siteTemplateID."/library/less/css.less";
                $outFile = $_SERVER["DOCUMENT_ROOT"]."/local/templates/".$siteTemplateID."/library/less/less.css";
            }
            if (file_exists($inFile)) {
                \Alexkova\Bxready2\Less::createLess($inFile, $outFile, array(
                    "base"=>$arSetTemplateOption["bxr_less_base_color"],
                    "steplight"=>$arSetTemplateOption["bxr_less_lighten"],
                    "stepdark"=>$arSetTemplateOption["bxr_less_darken"],
                ));
            }           
        }
        

	/*if($Apply == '' && $_REQUEST["back_url_settings"] <> '')
		LocalRedirect($_REQUEST["back_url_settings"]);
	else
		LocalRedirect($APPLICATION->GetCurPage()."?mid=".urlencode($mid)."&lang=".urlencode(LANGUAGE_ID)."&back_url_settings=".urlencode($_REQUEST["back_url_settings"])."&".$tabControl->ActiveTabParam());
*/
        Alexkova\Business\Core::getInstance()->setTemplateOption($siteTemplateID, $arSetTemplateOption);
        
}

$bxr_less_template_id = $HTTP_POST_VARS["bxr_less_template_id"];

$bxr_banners = COption::GetOptionString($module_id, "bxr_banners");

$templatesList = Alexkova\Bxready2\Templates::getList();

$templatesOption = array();
foreach ($templatesList as $cell=>$template){
    $templatesOption[$cell] = $template;
	$templatesOption[$cell]["option"] = Alexkova\Business\Core::getInstance()->getTemplateOption($cell);
}

?>
<form method="POST" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialchars($mid)?>&lang=<?=LANGUAGE_ID?>" enctype="multipart/form-data">
	<?$tabControl->Begin();?>
        <?$tabControl->BeginNextTab();?>
        <tr>
		<td valign="top" width="40%"><?=GetMessage("BXREADY_SELECT_TEMPLATE")?></td>
		<td valign="middle"><select id="bxr_less_template_id" name="bxr_less_template_id">
			<option value=""></option>
			<?foreach($templatesList as $template => $v):?>
				<option value="<?=$template?>" <?/*if($bxr_less_template_id == $template) echo 'selected="selected"'*/?>><?=$v["name"]?></option>
			<?endforeach;?>
		</select></td>
	</tr>

	<?foreach($templatesList as $template => $v):?>
		<tr class="bxr_templates bxr_template_<?=$template?>" style="display:none">
			<td valign="top" width="40%"><?=GetMessage("BXREADY_LESS_BASE_COLOR")?></td>
			<td valign="middle">
				<input type="text" name="bxr_less_base_color_<?=$template?>" id="color-base-<?=$template?>" value="<?=$templatesOption[$template]["option"]["bxr_less_base_color"]?>">
			</td>
		</tr>
	<?endforeach;?>

	<?foreach($templatesList as $template => $v):?>
		<tr class="bxr_templates bxr_template_<?=$template?>" style="display:none">
			<td valign="top" width="40%"><?=GetMessage("BXREADY_LESS_DARKEN_COLOR")?></td>
			<td valign="middle">
				<div id="less-darken-<?=$template?>"></div>
				<input type="text" name="bxr_less_darken_<?=$template?>" value="<?=$templatesOption[$template]["option"]["bxr_less_darken"]?>" id="less-darken-<?=$template?>-val" readonly style="border:0; color:#900; font-weight:bold; font-size: 20px">
			</td>
		</tr>
	<?endforeach;?>

	<?foreach($templatesList as $template => $v):?>
		<tr class="bxr_templates bxr_template_<?=$template?>" style="display:none">
			<td valign="top" width="40%"><?=GetMessage("BXREADY_LESS_LIGHTEN_COLOR")?></td>
			<td valign="middle">
				<div id="less-lighten-<?=$template?>"></div>
				<input type="text" name="bxr_less_lighten_<?=$template?>" value="<?=$templatesOption[$template]["option"]["bxr_less_lighten"]?>" id="less-lighten-<?=$template?>-val" readonly style="border:0; color:#900; font-weight:bold; font-size: 20px">
			</td>
		</tr>
	<?endforeach;?>
	<?/*$tabControl->BeginNextTab();?>
	<tr>
		<td valign="top" width="40%"><?=GetMessage("USE_MANAGMENT_ELEMENT_MODE")?></td>
		<td valign="middle"><input type="checkbox" size="30" maxlength="255" value="Y" name="managment_element_mode" <?if ($managment_element_mode == "Y") echo 'checked="checked"'?>></td>
	</tr>
        
        <tr class="only-managment-element-mode" <?if ($managment_element_mode != "Y") {?>style="display: none;"<?}?>>
		<td valign="top" width="40%"><?=GetMessage("BXREADY_SELECT_TEMPLATE")?></td>
		<td valign="middle"><select id="bxr_template_id" name="bxr_template_id">
			<option value=""></option>
			<?foreach($templatesList as $template):?>
				<option value="<?=$template?>" <?if($bxr_template_id == $template) echo 'selected="selected"'?>><?=$template?></option>
			<?endforeach;?>
		</select></td>
	</tr>
        <?foreach($templatesList as $template):?>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                <th colspan="2"><?=GetMessage("CARD_VIEW_CATALOG")?></th>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_LIST_ELEMENT_TYPE_GRID")?></td>
                    <td valign="middle">
                            <select name="catalog_list_element_type_<?=$template?>">
                                    <option value=""><?=GetMessage('BXREADY_ELEMENT_TYPE')?></option>
                                    <?foreach($elementGrid as $cell=>$element):?>
                                            <option value="<?=$cell?>" <?if ($templatesOption[$template]["catalog_list_element_type"] == $cell) echo 'selected="selected"'?>><?=$element?></option>
                                    <?endforeach;?>
                            </select>
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_LIST_ELEMENT_TYPE_GRID_OWN")?></td>
                    <td valign="middle">
                        <input type="text" name="own_catalog_list_element_type_<?=$template?>" value="<?=$templatesOption[$template]["own_catalog_list_element_type"]?>">
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_LIST_ELEMENT_TYPE_LIST")?></td>
                    <td valign="middle">
                            <select name="catalog_list_element_type_list_<?=$template?>">
                                    <option value=""><?=GetMessage('BXREADY_ELEMENT_TYPE')?></option>
                                    <?foreach($elementList as $cell=>$element):?>
                                            <option value="<?=$cell?>" <?if ($templatesOption[$template]["catalog_list_element_type_list"] == $cell) echo 'selected="selected"'?>><?=$element?></option>
                                    <?endforeach;?>
                            </select>
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_LIST_ELEMENT_TYPE_LIST_OWN")?></td>
                    <td valign="middle">
                        <input type="text" name="own_catalog_list_element_type_list_<?=$template?>" value="<?=$templatesOption[$template]["own_catalog_list_element_type_list"]?>">
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_LIST_ELEMENT_TYPE_TABLE")?></td>
                    <td valign="middle">
                            <select name="catalog_list_element_type_table_<?=$template?>">
                                    <option value=""><?=GetMessage('BXREADY_ELEMENT_TYPE')?></option>
                                    <?foreach($elementTable as $cell=>$element):?>
                                            <option value="<?=$cell?>" <?if ($templatesOption[$template]["catalog_list_element_type_table"] == $cell) echo 'selected="selected"'?>><?=$element?></option>
                                    <?endforeach;?>
                            </select>
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_LIST_ELEMENT_TYPE_TABLE_OWN")?></td>
                    <td valign="middle">
                        <input type="text" name="own_catalog_list_element_type_table_<?=$template?>" value="<?=$templatesOption[$template]["own_catalog_list_element_type_table"]?>">
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                <th colspan="2"><?=GetMessage("BXREADY_CATALOG_ADAPTIVE")?></th>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_CATALOG_ADAPTIVE_LG")?></td>
                    <td valign="middle">
                            <select name="catalog_list_element_count_lg_<?=$template?>">
                                    <?foreach($elementListCount12 as $cell=>$elementCount):?>
                                            <option value="<?=$cell?>" <?if ($templatesOption[$template]["catalog_list_element_count_lg"] == $cell) echo 'selected="selected"'?>><?=$elementCount?></option>
                                    <?endforeach;?>
                            </select>
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_CATALOG_ADAPTIVE_MD")?></td>
                    <td valign="middle">
                            <select name="catalog_list_element_count_md_<?=$template?>">
                                    <?foreach($elementListCount12 as $cell=>$elementCount):?>
                                            <option value="<?=$cell?>" <?if ($templatesOption[$template]["catalog_list_element_count_md"] == $cell) echo 'selected="selected"'?>><?=$elementCount?></option>
                                    <?endforeach;?>
                            </select>
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_CATALOG_ADAPTIVE_SM")?></td>
                    <td valign="middle">
                            <select name="catalog_list_element_count_sm_<?=$template?>">
                                    <?foreach($elementListCount12 as $cell=>$elementCount):?>
                                            <option value="<?=$cell?>" <?if ($templatesOption[$template]["catalog_list_element_count_sm"] == $cell) echo 'selected="selected"'?>><?=$elementCount?></option>
                                    <?endforeach;?>
                            </select>
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_CATALOG_ADAPTIVE_XS")?></td>
                    <td valign="middle">
                            <select name="catalog_list_element_count_xs_<?=$template?>">
                                    <?foreach($elementListCount12 as $cell=>$elementCount):?>
                                            <option value="<?=$cell?>" <?if ($templatesOption[$template]["catalog_list_element_count_xs"] == $cell) echo 'selected="selected"'?>><?=$elementCount?></option>
                                    <?endforeach;?>
                            </select>
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                <th colspan="2"><?=GetMessage("CARD_VIEW_OTHERS")?></th>
            </tr>
            
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_LIST_ELEMENT_TYPE_GRID")?></td>
                    <td valign="middle">
                            <select name="list_element_type_<?=$template?>">
                                    <option value=""><?=GetMessage('BXREADY_ELEMENT_TYPE')?></option>
                                    <?foreach($elementGrid as $cell=>$element):?>
                                            <option value="<?=$cell?>" <?if ($templatesOption[$template]["list_element_type"] == $cell) echo 'selected="selected"'?>><?=$element?></option>
                                    <?endforeach;?>
                            </select>
                    </td>
            </tr>
            <tr class="only-managment-element-mode bxr_templates bxr_template_<?=$template?>" style="display:none">
                    <td valign="top" width="40%"><?=GetMessage("BXREADY_LIST_ELEMENT_TYPE_GRID_OWN")?></td>
                    <td valign="middle">
                        <input type="text" name="own_list_element_type_<?=$template?>" value="<?=$templatesOption[$template]["own_list_element_type"]?>">
                    </td>
            </tr>
        <?endforeach;?>
        <?*//*$tabControl->BeginNextTab();?>
        <tr>
		<td valign="top" width="40%"><?=GetMessage("PRICE_FORMAT_STRING")?></td>
		<td valign="middle"><input type="text" name="price_format_string" value="<?=$price_format_string?>"></td>
	</tr>
        <tr>
		<td valign="top" width="40%"><?=GetMessage("PRICE_FORMAT_DECIMAL")?></td>
		<td valign="middle"><input type="text" name="price_format_decimal" value="<?=$price_format_decimal?>"></td>
	</tr>
	<? *///$tabControl->BeginNextTab();?>
	<? //require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/admin/group_rights.php");?>

	<? //$tabControl->BeginNextTab();?>
<!--	<tr>
		<td valign="top" width="40%"></?=GetMessage("BXREADY_SCHEMA_ORG_NAME")?>:</td>
		<td valign="middle"><input type="text" name="bxr_org_name" value="<?=$bxr_org_name?>" /></td>
	</tr>
	<tr>
		<td width="40%" align="right"></?=GetMessage("BXREADY_SCHEMA_ORG_LOGO")?>:</td>
		<td width="60%">
			<? //echo CFile::InputFile("bxr_org_logo", 20, $bxr_org_logo);?><br>
			<? //echo CFile::ShowImage($bxr_org_logo, 200, 200, "border=0", "", true)?>
		</td>
	</tr>
	<tr>
		<td valign="top" width="40%"></?=GetMessage("BXREADY_SCHEMA_ORG_OPENGRAPH")?>:</td>
		<td valign="middle"><input type="checkbox" size="30" maxlength="255" value="Y" name="bxr_org_opengraph" <? //if ($bxr_org_opengraph == "Y") echo 'checked="checked"'?>></td>
	</tr>-->
<?/*	<tr>
		<td valign="top" width="40%"><?=GetMessage("BXREADY_SCHEMA_ORG_TYPE")?>:</td>
		<td valign="middle"><select></select></td>
	</tr>*/?>
<!--	<tr>
		<td valign="top" width="40%"></?=GetMessage("BXREADY_SCHEMA_ORG_DESCRIPTION")?>:</td>
		<td valign="middle"><textarea name="bxr_org_description"></?=$bxr_org_description?></textarea></td>
	</tr>
	<tr class="heading">
		<td colspan="2"><b></?=GetMessage("BXREADY_SCHEMA_ORG_CONTACTS")?></b></td>
	</tr>
	<tr>
		<td valign="top" width="40%"></?=GetMessage("BXREADY_SCHEMA_ORG_PHONE")?>:</td>
		<td valign="middle"><input type="text" name="bxr_org_phone" value="</?=$bxr_org_phone?>" /></td>
	</tr>
	<tr>
		<td valign="top" width="40%"></?=GetMessage("BXREADY_SCHEMA_ORG_FAX")?>:</td>
		<td valign="middle"><input type="text" name="bxr_org_fax" value="</?=$bxr_org_fax?>" /></td>
	</tr>
	<tr>
		<td valign="top" width="40%"></?=GetMessage("BXREADY_SCHEMA_ORG_EMAIL")?>:</td>
		<td valign="middle"><input type="text" name="bxr_org_email" value="</?=$bxr_org_email?>" /></td>
	</tr>
	<tr class="heading">
		<td colspan="2"><b></?=GetMessage("BXREADY_SCHEMA_ORG_ADDRESS")?></b></td>
	</tr>
	<tr>
		<td valign="top" width="40%"></?=GetMessage("BXREADY_SCHEMA_ORG_CITY")?>:</td>
		<td valign="middle"><input type="text" name="bxr_org_address_city" value="</?=$bxr_org_address_city?>" /></td>
	</tr>
	<tr>
		<td valign="top" width="40%"></?=GetMessage("BXREADY_SCHEMA_ORG_ZIP")?>:</td>
		<td valign="middle"><input type="text" name="bxr_org_address_zip" value="</?=$bxr_org_address_zip?>" /></td>
	</tr>
	<tr>
		<td valign="top" width="40%"></?=GetMessage("BXREADY_SCHEMA_ORG_STREET")?>:</td>
		<td valign="middle"><textarea name="bxr_org_address_street"></?=$bxr_org_address_street?></textarea></td>
	</tr>-->

	<?$tabControl->Buttons();?>
	<script type="text/javascript">
		function RestoreDefaults()
		{
			if(confirm('<?echo AddSlashes(GetMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING"))?>'))
				window.location = "<?echo $APPLICATION->GetCurPage()?>?RestoreDefaults=Y&lang=<?=LANGUAGE_ID?>&mid=<?echo urlencode($mid)?>&<?echo bitrix_sessid_get()?>";
		}
	</script>
	<?if(strlen($_REQUEST["back_url_settings"])>0):?>
		<input type="submit" name="Update" value="<?=GetMessage("MAIN_SAVE")?>" title="<?=GetMessage("MAIN_OPT_SAVE_TITLE")?>"<?if ($RK_RIGHT<"W") echo " disabled" ?>>
	<?endif?>
	<input type="submit" name="Apply" value="<?=GetMessage("MAIN_OPT_APPLY")?>" title="<?=GetMessage("MAIN_OPT_APPLY_TITLE")?>"<?if ($RK_RIGHT<"W") echo " disabled" ?>>
	<?if(strlen($_REQUEST["back_url_settings"])>0):?>
		<input type="button" name="Cancel" value="<?=GetMessage("MAIN_OPT_CANCEL")?>" title="<?=GetMessage("MAIN_OPT_CANCEL_TITLE")?>" onclick="window.location='<?echo htmlspecialchars(CUtil::JSEscape($_REQUEST["back_url_settings"]))?>'">
		<input type="hidden" name="back_url_settings" value="<?=htmlspecialchars($_REQUEST["back_url_settings"])?>">
	<?endif?>
	<input type="button" title="<?echo GetMessage("MAIN_HINT_RESTORE_DEFAULTS")?>" OnClick="RestoreDefaults();" value="<?echo GetMessage("MAIN_RESTORE_DEFAULTS")?>"<?if ($RK_RIGHT<"W") echo " disabled" ?>>
	<?=bitrix_sessid_post();?>
                
	<?$tabControl->End();?>
</form>
<?
$APPLICATION->AddHeadScript('/bitrix/tools/alexkova.business/spectrum/spectrum.js');
$APPLICATION->SetAdditionalCSS('/bitrix/tools/alexkova.business/spectrum/spectrum.css');
$APPLICATION->AddHeadScript('/bitrix/tools/alexkova.business/ui/jquery-ui.js');
$APPLICATION->SetAdditionalCSS('/bitrix/tools/alexkova.business/ui/jquery-ui.css');
?>
<script>

	$(document).ready(function(){
		$(document).on(
			'change',
			'input[name=managment_mode]',
			function(){
				if ($('input[name=managment_mode]').attr('checked') == "checked"){
					$('.only-managment-mode').css('display', 'table-row');
				}else{
					$('.only-managment-mode').css('display', 'none');
				}
			}
		);
        
                $(document).on(
			'change',
			'input[name=managment_element_mode]',
			function(){
				if ($('input[name=managment_element_mode]').attr('checked') == "checked"){
					$('.only-managment-element-mode').css('display', 'table-row');
                                        $('#bxr_template_id').trigger('change');
				}else{
					$('.only-managment-element-mode').css('display', 'none');
				}
			}
		);

		$(document).on(
			'change',
			'#bxr_less_template_id',
			function(){
                                console.info("asd");
				$('.bxr_templates').hide();
				$('.bxr_template_'+$(this).val()).show();
			}
		);
        
                $(document).on(
			'change',
			'#bxr_template_id',
			function(){

				$('.bxr_templates').hide();
				$('.bxr_template_'+$(this).val()).show();
			}
		);

	});

	<?foreach($templatesList as $template => $v):?>
		$("#color-base-<?=$template?>").spectrum({
			preferredFormat: "hex",
			showInput: true,
			showPalette: true,
			palette: [["#F44336","#E91E63","#9C27B0","#7E57C2","#5C6BC0"],
                            ["#2196F3","#039BE5","#0097A7","#009688","#43A047"],
                            ["#689F38","#827717","#F9A825","#FF9800","#EF6C00"],
                            ["#FF5722","#795548","#757575","#607D8B","#000000"]],
			change: function(color) {
				$("#color-base-<?=$template?>").val(color.toHexString());
			}
		});

		$("#less-darken-<?=$template?>").slider({
			value:<?=$templatesOption[$template]["option"]["bxr_less_darken"]>0?$templatesOption[$template]["option"]["bxr_less_darken"]:20?>,
			min: 0,
			max: 100,
			step: 5,
			slide: function( event, ui ) {
				$( "#less-darken-<?=$template?>-val" ).val( ui.value);
			}
		});
	$( "#less-darken-<?=$template?>-val" ).val( $( "#less-darken-<?=$template?>" ).slider( "value" ) );

	$("#less-lighten-<?=$template?>").slider({
		value:<?=$templatesOption[$template]["option"]["bxr_less_lighten"]>0?$templatesOption[$template]["option"]["bxr_less_lighten"]:20?>,
		min: 0,
		max: 100,
		step: 5,
		slide: function( event, ui ) {
			$( "#less-lighten-<?=$template?>-val" ).val( ui.value);
		}
	});
	$( "#less-lighten-<?=$template?>-val" ).val( $( "#less-lighten-<?=$template?>" ).slider( "value" ));
	<?endforeach;?>



</script>