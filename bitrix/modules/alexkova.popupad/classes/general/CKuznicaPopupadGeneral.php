<?
IncludeModuleLangFile(__FILE__);
class CKuznicaPopupadGeneral
{
	const MODULE_ID = 'alexkova.popupad';
	function SaveFile($arImage,$bannerID = 0,$INFO_FIELD = "")
	{
		if (is_array($arImage))
		{
			$arImage["MODULE_ID"] = "alexkova.popupad";
			if ($bannerID>0)
			{
				global $DB;
				if(strlen($INFO_FIELD) == 0)
				{
					$rsBanner= $DB->Query("SELECT IMAGE_ID FROM kznc_popupad_banner WHERE ID='$bannerID'", false, "<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
					if($arBanner = $rsBanner->Fetch())
					{
						$arImage["old_file"] = $arBanner["IMAGE_ID"];
					}
				}
				else
				{
					$rsInfo= $DB->Query("SELECT INFO FROM kznc_popupad_banner WHERE ID='$bannerID'", false, "<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
					if($arRes = $rsInfo->Fetch())
					{
						$arInfo = unserialize(htmlspecialchars_decode($arRes["INFO"]));
						$arImage["old_file"] = $arInfo[$INFO_FIELD];
					}
					
				}
			}
			if (strlen($arImage["name"])>0 || strlen($arImage["del"])>0)
			{
				$fileID = CFile::SaveFile($arImage, $arImage["MODULE_ID"]);
				if (intval($fileID)>0)
					return intval($fileID);
				else
					return "";
			}
			elseif($arImage["old_file"]>0)
			{
				return $arImage["old_file"];
			}
		}
		return "";
	}
	function CheckFields(&$arFields, $ID=false)
	{
		global $DB, $APPLICATION, $USER;
		$this->LAST_ERROR = "";
		

		if(is_set($arFields, "NAME") && strlen($arFields["NAME"])<=0)
			$this->LAST_ERROR .= GetMessage("POPUPAD_BAD_NAME")."<br>";
		if(is_set($arFields, "SID") && strlen($arFields["SID"])<=0)
			$this->LAST_ERROR .= GetMessage("POPUPAD_BAD_SITE")."<br>";
		if(strlen($arFields["SHOW_FROM"])>0 && (!$DB->IsDate($arFields["SHOW_FROM"], false, LANG, "FULL")))
			$this->LAST_ERROR .= GetMessage("POPUPAD_BAD_SHOW_FROM")."<br>";
		if(strlen($arFields["SHOW_TO"])>0 && (!$DB->IsDate($arFields["SHOW_TO"], false, LANG, "FULL")))
			$this->LAST_ERROR .= GetMessage("POPUPAD_BAD_SHOW_TO")."<br>";
		if(intval($arFields["IMAGE_ID"])>0)
		{
			$strRes = CFile::CheckImageFile($arFields["IMAGE_ID"], 0, 0, 0, array("FLASH", "IMAGE"));
			if (strlen($strRes)>0)
				$this->LAST_ERROR .= GetMessage("POPUPAD_BAD_IMAGE")."<br>";
		}
		if($arFields["RESET_COUNTER"] == "Y")
		{
			$arFields["SHOW_COUNT"] = 0;
			unset($arFields["RESET_COUNTER"]);
		}
		if(strlen($this->LAST_ERROR)>0)
			return false;
			
		if(!empty($arFields["INFO"]))
		{
			$arInfo = $arFields["INFO"];
			if(is_array($arInfo["DUMMY_IMAGE"]) && !empty($arInfo["DUMMY_IMAGE"]))
			{
				if($arFields["SHOW_TYPE"] != "flash")
					$arInfo["DUMMY_IMAGE"]["del"] = "Y";
				$arInfo["DUMMY_IMAGE"] = $this->SaveFile($arInfo["DUMMY_IMAGE"],$ID,"DUMMY_IMAGE");
			}
			if(is_array($arInfo["ICON_FILE"]) && !empty($arInfo["ICON_FILE"]))
			{
				$arInfo["ICON_FILE"] = $this->SaveFile($arInfo["ICON_FILE"],$ID,"ICON_FILE");
			}
			if(!$arInfo["INC_SHOW_COUNT"] && !$arInfo["INC_CLICK_COUNT"])
			{
				unset($arInfo["BANNER_USHOW"]);
				unset($arInfo["BANNER_USHOW_TYPE"]);
				unset($arInfo["BANNER_USHOW_COOKIE_TIME"]);
			}
			if(!$arInfo["BANNER_USHOW"])
			{
				unset($arInfo["BANNER_USHOW_TYPE"]);
				unset($arInfo["BANNER_USHOW_COOKIE_TIME"]);
			}
			elseif($arInfo["BANNER_USHOW_TYPE"] == "C")
			{
				$arInfo["BANNER_USHOW_COOKIE_TIME"] = intval($arInfo["BANNER_USHOW_COOKIE_TIME"]);
				if($arInfo["BANNER_USHOW_COOKIE_TIME"]<=0)
					$arInfo["BANNER_USHOW_COOKIE_TIME"] = 3600;

			}
			if(strlen($arFields["URL"]) == 0)
				unset($arInfo["TARGET"]);
			if(strlen($arInfo["TITLE"]) == 0)
				unset($arInfo["TITLE"]);

			$arFields["INFO"] = serialize($arInfo);
		}
		$arFields["NAME"] = $DB->ForSql($arFields["NAME"]);
		if(is_set($arFields, "CODE_TYPE"))
			$arFields["CODE_TYPE"] = $DB->ForSql($arFields["CODE_TYPE"],5);
		if(is_set($arFields, "ACTIVE"))
			$arFields["ACTIVE"] = $DB->ForSql($arFields["ACTIVE"],1);
		if(is_set($arFields, "URL"))
			$arFields["URL"] = $DB->ForSql($arFields["URL"],1000);
		if(is_set($arFields, "FLASH_TRANSPARENT"))
			$arFields["FLASH_TRANSPARENT"] = $DB->ForSql($arFields["FLASH_TRANSPARENT"],22);
		if(is_set($arFields, "FLASH_TRANSPARENT"))
			$arFields["FLASH_TRANSPARENT"] = $DB->ForSql($arFields["FLASH_TRANSPARENT"],12);
		if(is_set($arFields, "BANTYPE_ID"))
			$arFields["BANTYPE"] = intval($arFields["BANTYPE_ID"]);
		if(is_set($arFields, "WEIGHT"))
			$arFields["WEIGHT"] = abs(intval($arFields["WEIGHT"]))>0?intval($arFields["WEIGHT"]):100;
		if(is_set($arFields, "SORT"))
			$arFields["SORT"] = intval($arFields["SORT"]);
		return true;
	}
	
	function getContent($imageID,$flashTransparent="",$olink="",$isPublic = false,$arFields = array())
	{
		global $APPLICATION;
		$info = unserialize($arFields["~INFO"]);
		$overLink = $olink;
		$strReturn = "";
		$imageID = intval($imageID);
		$target = $info["TARGET"];
		$title = $info["TITLE"];
		if($imageID>0)
		{
			$arImage = CFile::GetFileArray($imageID);
			if($arImage)
			{
				$file_type = GetFileType($arImage["FILE_NAME"]);
				$path = $arImage["SRC"];
				if($file_type == "FLASH")
				{
					if($info["DUMMY_IMAGE"]>0)
					{
						$arDummy = CFile::GetFileArray($info["DUMMY_IMAGE"]);
						$APPLICATION->AddHeadString('<script src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>',true);
					}
					if(strlen($overLink)>0)
					{
						$strReturn = "
							<div class='popupad_banner_block' style=' ";
						if($hideWidthHeight != "Y")
							$strReturn .= " width:{$arImage["WIDTH"]}px;height:{$arImage["HEIGHT"]}px; ";
						$strReturn .= " position:relative;overflow:hidden;zoom:1'>
							<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" ";
						if($hideWidthHeight != "Y")
							$strReturn .= " width=\"{$arImage["WIDTH"]}\" height=\"{$arImage["HEIGHT"]}\" ";
						$strReturn .= " id=\"popup_banner_$imageID\" align=\"middle\">
								<param name=\"movie\" value=\"$path\"/>
								<param NAME=\"quality\" VALUE=\"high\" />
								<param NAME=\"bgcolor\" VALUE=\"#FFFFFF\" />
								<param NAME=\"wmode\" VALUE=\"opaque\" />
								";
								$strReturn .="
								<!--[if !IE]>-->
								<object type=\"application/x-shockwave-flash\" data=\"$path\" ";
								if($hideWidthHeight != "Y")
									$strReturn .=" width=\"{$arImage["WIDTH"]}\" height=\"{$arImage["HEIGHT"]}\" ";
								$strReturn .= "><!--<![endif]-->";
								$strReturn .= "
									<param name=\"movie\" value=\"$path\"/>
									<param NAME=\"quality\" VALUE=\"high\" />
									<param NAME=\"bgcolor\" VALUE=\"#FFFFFF\" />
									<param NAME=\"wmode\" VALUE=\"opaque\" />";
							
								if($arDummy["SRC"])
								{
									$strReturn .= "<img src=\"{$arDummy["SRC"]}\" ";
									if($hideWidthHeight != "Y")
										$strReturn .= " width=\"{$arDummy["WIDTH"]}\" height=\"{$arDummy["HEIGHT"]}\" ";
									$strReturn .= " alt=\"$title\" />";
								}
								$strReturn .="
								<!--[if !IE]>-->
								</object>
								<!--<![endif]-->
							</object>
							<a target='$target' title='$title' alt='$title' href='{$overLink}' style='text-decoration:none;position:absolute;top:0;left:0;display:block; ";
							if($hideWidthHeight != "Y")
								$strReturn .= " width:{$arImage["WIDTH"]}px;height:{$arImage["HEIGHT"]}px; ";
							$strReturn .= " z-index:10;'>
								<img border='0' ";
							if($hideWidthHeight != "Y")
								$strReturn .= " width='{$arImage["WIDTH"]}' height='{$arImage["HEIGHT"]}' ";
							$strReturn .= "src='/bitrix/images/1.gif'/>
							</a>
							</div>
						";
					}
					else
					{
						$strReturn = "
							<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" ";
						if($hideWidthHeight != "Y")
							$strReturn .= " width=\"{$arImage["WIDTH"]}\" height=\"{$arImage["HEIGHT"]}\" ";
						$strReturn .= " id=\"popup_banner_$imageID\" align=\"middle\">
								<param name=\"movie\" value=\"$path\"/>
								<param NAME=\"quality\" VALUE=\"high\" />
								<param NAME=\"bgcolor\" VALUE=\"#FFFFFF\" />";
								if($flashTransparent):
									$strReturn .="<param NAME=\"wmode\" VALUE=\"$flashTransparent\" />";
								endif;
								$strReturn .="
								<!--[if !IE]>-->
								<object type=\"application/x-shockwave-flash\" data=\"$path\" ";
								$strReturn .= " width=\"{$arImage["WIDTH"]}\" height=\"{$arImage["HEIGHT"]}\" ";
								$strReturn .= "><!--<![endif]-->
									<param name=\"movie\" value=\"$path\"/>
									<param NAME=\"quality\" VALUE=\"high\" />
									<param NAME=\"bgcolor\" VALUE=\"#FFFFFF\" />";
									if($flashTransparent)
										$strReturn .="<param NAME=\"wmode\" VALUE=\"$flashTransparent\" />";
								
									
								if($arDummy["SRC"])
								{
									$strReturn .= "<img src=\"{$arDummy["SRC"]}\" ";
									if($hideWidthHeight != "Y")
										$strReturn .= " width=\"{$arDummy["WIDTH"]}\" height=\"{$arDummy["HEIGHT"]}\" ";
									$strReturn .= " alt=\"$title\" />";
								}
								$strReturn .="
								<!--[if !IE]>-->
								</object>
								<!--<![endif]-->
							</object>
						";
					}
				}
				else
				{
					if(!$isPublic)
						$strReturn = CFile::ShowImage($imageID, 300, 300, "border=0", "", true);
					else
					{
						$image = CFile::GetFileArray($imageID);
						if(strlen($overLink)>0)
						{
							$strReturn = "<a target='$target' title='$title' alt='$title' style='text-decoration:none;border:0;' href='{$overLink}'><img border='0' ";
							if($hideWidthHeight != "Y")
								$strReturn .= " width='{$image["WIDTH"]}' height='{$image["HEIGHT"]}' ";
							$strReturn .= " src='{$image["SRC"]}'/></a>";
						}
						else
						{
							$strReturn = "<img border='0' ";
							if($hideWidthHeight != "Y")
								$strReturn .= " width='{$image["WIDTH"]}' height='{$image["HEIGHT"]}' ";
							$strReturn .= " src='{$image["SRC"]}'/>";
						}
					}
				}
			}
		}
		return $strReturn;
	}
	function GetIcons($arBanner)
	{
		global $USER, $APPLICATION;
		if(is_object($USER))
			$arrGroups = $USER->GetUserGroupArray();
		$arRoles = $APPLICATION->GetUserRoles("alexkova.popupad", $arrGroups);
		if(!in_array("W", $arRoles))
			return false;

		$arIcons = array();
		if (!empty($arBanner) && isset($arBanner["ID"]))
		{
			$arIcons[] = array(
				"URL" => 'javascript:'.$APPLICATION->GetPopupLink(
					array(
						'URL' => "/bitrix/admin/popupad_banner_edit.php?bxpublic=Y&from_module=alexkova.popupad&lang=".LANGUAGE_ID."&ID=".$arBanner["ID"],
						'PARAMS' => array(
							'width' => 700,
							'height' => 400,
							'resize' => false,
						)
					)
				),
				"ICON" => "bx-context-toolbar-edit-icon",
				"TITLE" => GetMessage("POPUPAD_EDIT_BANNER").$arBanner["ID"]/*GetMessage("POPUPAD_PUBLIC_BANNER_EDIT_ICON")*/
			);
		}
		
		return $arIcons;
	}
	function incShow($arIDs)
	{
		if(count($arIDs)>0)
		{
			$ids = "(".implode(",", $arIDs).")";
			global $DB;
			$sql = "UPDATE kznc_popupad_banner SET SHOW_COUNT = SHOW_COUNT+1 WHERE ID IN $ids";

			$DB->Query($sql,false,__LINE__);
		}
		return false;
	}
	function GetBanners($limit = 0, $backurl = '')
	{
		$arNew = array();
		$arCPM = array();
		$arSort = array();
		$iconExistedPlaces = array();
        $POPUP_VERSION_2_ON = COption::GetOptionString(self::MODULE_ID, "POPUP_VERSION_2_ON", '');
        if($POPUP_VERSION_2_ON && $backurl)
            $curPage = \GetPagePath($backurl,true);
        else
		    $curPage = $GLOBALS['APPLICATION']->GetCurPage(true);
		//get all active banners list
		$rsBanners = CKuznicaPopupad::GetBannersList();
		$allCnt = 0;
		$k=0;
		$sumLeftCount = 0;

		while($arBanner = $rsBanners->GetNext())
		{
			$allCnt++;
			//Banner property show
			if ($_COOKIE["KZNC_BANER_ID_SHOWN_".$arBanner['ID']]){
				continue;
			}
			if($arBanner["SHOW_FIRST"]<$arBanner["SHOW_FROM_X"] && $arBanner["SHOW_FROM_X"]>0)
			{//сюда попадают ещё не показанные баннеры
				$arNew[$arBanner["ID"]] = $arBanner;
			}
			else
			{//старые баннеры
				$arCPM[$arBanner["ID"]] = $arBanner;
				$sumLeftCount += $arBanner["LEFT_COUNT"];
			}
		}

		//если сумма LEFT_COUNT всех старых баннеров равна нулю, то им всем надо установить LEFT_COUNT=WEIGHT
		if($sumLeftCount == 0)
			foreach ($arCPM as $arBanner)//старые баннеры
					CKuznicaPopupad::UpdateLeftCount($arBanner["ID"],$arBanner["WEIGHT"]);


		//расчет коэффициента - он одинаков для всех новых баннеров
		$k = CKuznicaPopupad::GetKoef();
		foreach ($arNew as &$arBanner)//новые баннеры
		{
				//расчет оставшихся показов
				$arBanner["LEFT_COUNT"] = $k*$arBanner["WEIGHT"];
				//запись нового значения LEFT_COUNT в таблицу
				CKuznicaPopupad::UpdateLeftCount($arBanner["ID"],$arBanner["LEFT_COUNT"]);
				//добавление нового баннера к старым
				$arCPM[$arBanner["ID"]] = $arBanner;
		}
		foreach ($arCPM as $bannerID=>$arBanner)
		{
			//таргетинг
			$bError = false;

			if(!empty($arBanner["SHOW_ON"]))
			{
				$bError = true;
				$showON = unserialize($arBanner["~SHOW_ON"]);

				foreach ($showON as $pageON)
				{
					$pageON = trim($pageON);
					if(strlen($pageON)>0){
						$mask = str_replace("*", ".*", $pageON);
						$mask = str_replace("/", "\/", $mask);
						if(preg_match("/^$mask/", $curPage)){
							$bError = false;
							break;
						}
					}
				}
			}

			if(!empty($arBanner["SHOW_OFF"]) && !$bError)
			{
				$showOFF = unserialize($arBanner["~SHOW_OFF"]);

				foreach ($showOFF as $pageOFF)
				{
					$pageOFF = trim($pageOFF);
					if(strlen($pageOFF)>0){
						$mask = str_replace("*", ".*", $pageOFF);
						$mask = str_replace("/", "\/", $mask);
						if(preg_match("/^$mask/", $curPage)){
							$bError = true;
							break;
						}
					}
				}
			}

			if(!$bError)//если баннер можно показывать, считаем CPM, добавляем в массив для сортировки
			{
				//если запрос вернул баннеров больше, чем в параметре компонента, то сортировка по CPM, иначе по WEIGHT
//				if($limit>0 && $allCnt>$limit)
					$arSort[$bannerID] = $arBanner["WEIGHT"]/($arBanner["WEIGHT"]-$arBanner["LEFT_COUNT"]+0.01);
//				else
//					$arSort[$bannerID] = $arBanner["WEIGHT"];
			}
		}
		//обратная сортировка с сохранением ключей
		arsort($arSort);
		$arReturn = array();
		$cnt = 1;
		$defaultModeDone = false;//баннер в обычном режиме должен быть только один

		$hideFancy = COption::GetOptionString(self::MODULE_ID, "POPUP_HIDE_FANCY", '');
		$hideIcons = COption::GetOptionString(self::MODULE_ID, "POPUP_HIDE_ICON", '');
		foreach ($arSort as $bannerID=>$cpm)
		{
			$banner = $arCPM[$bannerID];
			if(in_array($bannerID, $_SESSION["POPUPAD"]["BANNERS"]))
				continue;

			$banner["INFO"] = unserialize($banner["~INFO"]);
			$iconMode = $banner["INFO"]["SHOW_TYPE"] == "icon";

			if($iconMode){
				if(/*in_array($banner["INFO"]["ICON_PLACE"],$iconExistedPlaces)
					|| */
					!$banner["INFO"]["ICON_FILE"]
					|| $hideIcons == "Y"//глобальное отключение иконок
				)
					continue;
//				else
//					$iconExistedPlaces[] = $banner["INFO"]["ICON_PLACE"];
			}elseif($defaultModeDone
				|| $hideFancy == "Y"//глобальное отключение обычных баннеров
				|| $_COOKIE["KZNC_PROTECT_BANER_SHOW_TIME"]
			){
				continue;
			}else{
				$defaultModeDone = true;
			}
			//нужное количество баннеров сохраняется в массив, и для каждого уменьшается LEFT_COUNT
			$arReturn[] = $banner;
			$_SESSION["POPUPAD"]["BANNERS"][] = $bannerID;
			if($banner["LEFT_COUNT"]>0 && $allCnt>$limit)
				CKuznicaPopupad::UpdateLeftCount($bannerID,$banner["LEFT_COUNT"]-1);
			if($limit != 0 && $cnt == $limit)
				break;
			$cnt++;
		}
		return $arReturn;
	}
	function ResetBannersLeftCount()
	{
		global $DB;
		$strSql = "UPDATE kznc_popupad_banner SET LEFT_COUNT=WEIGHT AND SHOW_FIRST=NOW()";
		if($DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__))
			return true;
		return false;
	}
}
?>
