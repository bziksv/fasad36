<?
IncludeModuleLangFile(__FILE__);
class CKuznica_rklite_general
{
	function SaveFile($arImage,$bannerID = 0,$INFO_FIELD = "")
	{
		if (is_array($arImage))
		{
			$arImage["MODULE_ID"] = "alexkova.rklite";
			if ($bannerID>0)
			{
				global $DB;
				if(strlen($INFO_FIELD) == 0)
				{
					$rsBanner= $DB->Query("SELECT IMAGE_ID FROM b_rklite_banner WHERE ID='$bannerID'", false, "<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
					if($arBanner = $rsBanner->Fetch())
					{
						$arImage["old_file"] = $arBanner["IMAGE_ID"];
					}
				}
				else
				{
					$rsInfo= $DB->Query("SELECT INFO FROM b_rklite_banner WHERE ID='$bannerID'", false, "<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
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
			$this->LAST_ERROR .= GetMessage("BANNER_BAD_NAME")."<br>";
		if(is_set($arFields, "SID") && strlen($arFields["SID"])<=0)
			$this->LAST_ERROR .= GetMessage("BANNER_BAD_SITE")."<br>";
		if(is_set($arFields, "BANTYPE_ID") && intval($arFields["BANTYPE_ID"])<=0)
			$this->LAST_ERROR .= GetMessage("BANNER_BAD_BANTYPE")."<br>";
		if(strlen($arFields["SHOW_FROM"])>0 && (!$DB->IsDate($arFields["SHOW_FROM"], false, LANG, "FULL")))
			$this->LAST_ERROR .= GetMessage("BANNER_BAD_SHOW_FROM")."<br>";
		if(strlen($arFields["SHOW_TO"])>0 && (!$DB->IsDate($arFields["SHOW_TO"], false, LANG, "FULL")))
			$this->LAST_ERROR .= GetMessage("BANNER_BAD_SHOW_TO")."<br>";
		if(intval($arFields["IMAGE_ID"])>0)
		{
			$strRes = CFile::CheckImageFile($arFields["IMAGE_ID"], 0, 0, 0, array("FLASH", "IMAGE"));
			if (strlen($strRes)>0)
				$this->LAST_ERROR .= GetMessage("BANNER_BAD_IMAGE")."<br>";
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

		/*if(is_set($arFields, "CODE"))
			$arFields["CODE"] = $DB->ForSql($arFields["CODE"]);*/
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
	function CheckTypeFields(&$arFields, $ID=false)
	{
		global $DB, $APPLICATION, $USER;
		$this->LAST_ERROR = "";

		if(($ID===false || is_set($arFields, "NAME")) && strlen(trim($arFields["NAME"]))<=0)
			$this->LAST_ERROR .= GetMessage("BANTYPE_BAD_NAME")."<br>";
		if($ID===false && strlen(trim($arFields["CODE"]))<=0)
			$this->LAST_ERROR .= GetMessage("BANTYPE_BAD_CODE")."<br>";
		if($ID===false && $arFields["CODE"]){
			if (!preg_match('/^[a-zA-Z]{1,1}[a-zA-Z0-9_\-]+$/', $arFields["CODE"])){
				$this->LAST_ERROR .= GetMessage("BANTYPE_BAD_CODE_SYNT");
			}else{
				$tryFind = CKuznica_rklite::GetTypeList(array(),array("CODE"=>$arFields["CODE"]));
				if($tryFind->Fetch()){
					$this->LAST_ERROR .= GetMessage("BANTYPE_CODE_EXISTS")."<br>";
				}
			}
		}
		if(strlen($this->LAST_ERROR)>0)
			return false;
		$arFields["NAME"] = $DB->ForSql($arFields["NAME"]);
		$arFields["DESCRIPTION"] = $DB->ForSql($arFields["DESCRIPTION"]);
		if(is_set($arFields, "ACTIVE"))
			$arFields["ACTIVE"] = $DB->ForSql($arFields["ACTIVE"],1);
		if(is_set($arFields, "SORT"))
			$arFields["SORT"] = intval($arFields["SORT"]);
		return true;
	}
	function getContent($imageID,$flashTransparent="",$olink="",$isPublic = false,$arFields = array(),$hideWidthHeight = "N", $addNoFollow = "N")
	{
		global $APPLICATION;
		$arInfo = unserialize($arFields["~INFO"]);
		if($arInfo["BANNER_REDIRECT"] == "Y")//если стоит галочка "использовать редирект"
		{			
			if(strlen($olink)>0)
				$overLink = "/bitrix/rklite_go.php?ID={$arFields["ID"]}&backurl=".urlencode($APPLICATION->GetCurPage());
		}
		else
		{
			$overLink = $olink;
		}
		$noFollow = '';
		if($addNoFollow == "Y" || $arInfo["NOFOLLOW"] == "Y")
			$noFollow = " rel='nofollow' ";

		$strReturn = "";
		$imageID = intval($imageID);
		$info = unserialize(htmlspecialchars_decode($arFields["INFO"]));
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
							<div class='rklite_banner_block' style=' ";
						if($hideWidthHeight != "Y")
							$strReturn .= " width:{$arImage["WIDTH"]}px;height:{$arImage["HEIGHT"]}px; ";
						$strReturn .= " position:relative;overflow:hidden;zoom:1'>
							<object classid=\"clsid:d27cdb6e-ae6d-11cf-96b8-444553540000\" ";
						if($hideWidthHeight != "Y")
							$strReturn .= " width=\"{$arImage["WIDTH"]}\" height=\"{$arImage["HEIGHT"]}\" ";
						$strReturn .= " id=\"banner_$imageID\" align=\"middle\">
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
							<a $noFollow  target='$target' title='$title' alt='$title' href='{$overLink}' style='text-decoration:none;position:absolute;top:0;left:0;display:block; ";
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
						$strReturn .= " id=\"banner_$imageID\" align=\"middle\">
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
							$strReturn = "<a $noFollow target='$target' title='$title' alt='$title' style='text-decoration:none;border:0;' href='{$overLink}'><img border='0' ";
							if($hideWidthHeight != "Y")
								$strReturn .= " width='{$image["WIDTH"]}' height='{$image["HEIGHT"]}' ";
							$strReturn .= " src='{$image["SRC"]}'/></a>";
						}
						else
						{
							$strReturn = "<img border='0' title='$title' alt='$title' ";
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
	function GetIcons($arBanner,$banTypeID = "")
	{
		global $USER, $APPLICATION;
		$banTypeID = intval($banTypeID);
		if(is_object($USER))
			$arrGroups = $USER->GetUserGroupArray();
		$arRoles = $APPLICATION->GetUserRoles("alexkova.rklite", $arrGroups);
		if(!in_array("W", $arRoles))
			return false;

		$arIcons = array();
		if (!empty($arBanner) && isset($arBanner["ID"]))
		{
			$arIcons[] = array(
				"URL" => 'javascript:'.$APPLICATION->GetPopupLink(
					array(
						'URL' => "/bitrix/admin/rklite_banner_edit.php?bxpublic=Y&from_module=alexkova.rklite&lang=".LANGUAGE_ID."&ID=".$arBanner["ID"],
						'PARAMS' => array(
							'width' => 700,
							'height' => 400,
							'resize' => false,
						)
					)
				),
				"ICON" => "bx-context-toolbar-edit-icon",
				"TITLE" => GetMessage("EDIT_BANNER").$arBanner["ID"]/*GetMessage("PUBLIC_BANNER_EDIT_ICON")*/
			);
		}
		if($banTypeID>0)
		{
			$arIcons[] = array(
						"ICON" => "bx-context-toolbar-create-icon",
						"TITLE" => GetMessage("ADD_BANNER")/*GetMessage("PUBLIC_BANNER_ADD_ICON")*/,
						"URL" => 'javascript:'.$APPLICATION->GetPopupLink(
								array(
									'URL' => "/bitrix/admin/rklite_banner_edit.php?bxpublic=Y&from_module=alexkova.rklite&lang=".LANGUAGE_ID/*."&TYPE_SID=".$TYPE_SID*/,
									'PARAMS' => array(
										'width' => 700,
										'height' => 400,
										'resize' => false,
										)
									)
								),
						"TEXT" => $arContract["NAME"]
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
			$sql = "UPDATE b_rklite_banner SET SHOW_COUNT = SHOW_COUNT+1 WHERE ID IN $ids";

			$DB->Query($sql,false,__LINE__);
		}
		return false;
	}
	function GetBanners($banTypeCode = "",$limit = 0)
	{
		if(strlen($banTypeCode) == 0)
			return false;
		$arNew = array();
		$arCPM = array();
		$arSort = array();
		$curPage = $GLOBALS['APPLICATION']->GetCurPage(true);
		//get bantype id by code
		$rsBantype = CKuznica_rklite::GetTypeList(array(),array('CODE'=>$banTypeCode));
		if($arBantype = $rsBantype->Fetch()){
			$banTypeID = $arBantype["ID"];
		}else{
			return false;
		}

		//get all active banners list
		$rsBanners = CKuznica_rklite::GetBannersList($banTypeID);
		$allCnt = 0;
		$k=0;
		$sumLeftCount = 0;

		while($arBanner = $rsBanners->GetNext())
		{
			$allCnt++;
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
					CKuznica_rklite::UpdateLeftCount($arBanner["ID"],$arBanner["WEIGHT"]);


		//расчет коэффициента - он одинаков для всех новых баннеров
		$k = CKuznica_rklite::GetKoef();
		foreach ($arNew as &$arBanner)//новые баннеры
		{
				//расчет оставшихся показов
				$arBanner["LEFT_COUNT"] = $k*$arBanner["WEIGHT"];
				//запись нового значения LEFT_COUNT в таблицу
				CKuznica_rklite::UpdateLeftCount($arBanner["ID"],$arBanner["LEFT_COUNT"]);
				//добавление нового баннера к старым
				$arCPM[$arBanner["ID"]] = $arBanner;
		}
		$arPageDesiredKeywords = CKuznica_rklite::GetPageDesiredKeywords();
		$arPageRequiredKeywords = CKuznica_rklite::GetPageRequiredKeywords();
		foreach ($arCPM as $bannerID=>$arBanner)
		{
			//таргетинг
			$bError = false;
			$arInfo = unserialize($arBanner["~INFO"]);
			if($arInfo["DESIRED_KEYWORDS"] || $arInfo["REQUIRED_KEYWORDS"])
			{
				if($arInfo["REQUIRED_KEYWORDS"])
				{
					$bError = true;
					$exReqKeywords = explode(",", $arInfo["REQUIRED_KEYWORDS"]);
					if(is_array($exReqKeywords) && is_array($arPageRequiredKeywords) && !empty($arPageRequiredKeywords))
					{
						foreach ($exReqKeywords as $bannerkWord)
						{
							foreach ($arPageRequiredKeywords as $pagekWord)
							{
								if(trim($bannerkWord) != trim($pagekWord))
								{
									$bError = true;
									break 2;
								}
								else
								{
									$bError = false;
								}
							}
						}
					}
				}
				elseif($arInfo["DESIRED_KEYWORDS"] && !$bError)
				{
					$bError = true;
					$exDesKeywords = explode(",", $arInfo["DESIRED_KEYWORDS"]);
					if(is_array($exDesKeywords) && is_array($arPageDesiredKeywords) && !empty($arPageDesiredKeywords))
					{
						foreach ($exDesKeywords as $bannerkWord)
						{
							foreach ($arPageDesiredKeywords as $pagekWord)
							{
								if(trim($bannerkWord) == trim($pagekWord))
								{
									$bError = false;
									break 2;
								}
							}
						}
					}
				}
				if($bError)
					continue;
			}
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
					/*
					if(strlen($pageON)>0)
						if(CSite::InDir($pageON) ||  $pageON == $_SERVER["SCRIPT_NAME"])
						{
							$bError = false;
							break;
						}
					 *
					 */
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
					/*$pageOFF = trim($pageOFF);
					if(strlen($pageOFF)>0)
						if(CSite::InDir($pageOFF) || $pageOFF == $_SERVER["SCRIPT_NAME"])
						{
							$bError = true;
							break;
						}
					 *
					 */
				}
			}
			if(!$bError)//если баннер можно показывать, считаем CPM, добавляем в массив для сортировки
			{
				//если запрос вернул баннеров больше, чем в параметре компонента, то сортировка по CPM, иначе по WEIGHT
				if($limit>0 && $allCnt>$limit)
					$arSort[$bannerID] = $arBanner["WEIGHT"]/($arBanner["WEIGHT"]-$arBanner["LEFT_COUNT"]+0.01);
				else
					$arSort[$bannerID] = $arBanner["WEIGHT"];
			}
		}
		//обратная сортировка с сохранением ключей
		arsort($arSort);

        $sumLeftCount = 0;
        $resultBanners = array();
        foreach ($arSort as $bannerID => $cpm)
        {
            if(in_array($bannerID, $_SESSION["RKLITE"]["BANNERS"]))
                continue;
            $arBanner = $arCPM[$bannerID];
            $sumLeftCount += $arBanner["LEFT_COUNT"];
            $resultBanners[$bannerID] = $arCPM[$bannerID];
        }
        if($sumLeftCount == 0)
        {
            foreach ($arSort as $bannerID => $cpm)
            {
                $arBanner = $arCPM[$bannerID];
                CKuznica_rklite::UpdateLeftCount($arBanner["ID"], $arBanner["WEIGHT"]);
            }
        }

        $arReturn = array();
		$cnt = 1;
		foreach ($resultBanners as $bannerID=>$banner)
		{
			if(in_array($bannerID, $_SESSION["RKLITE"]["BANNERS"]))
				continue;
			//нужное количество баннеров сохраняется в массив, и для каждого уменьшается LEFT_COUNT
			$arReturn[] = $banner;
			$_SESSION["RKLITE"]["BANNERS"][] = $bannerID;
			if($banner["LEFT_COUNT"]>0 && $allCnt>$limit)
				CKuznica_rklite::UpdateLeftCount($bannerID,$banner["LEFT_COUNT"]-1);
			if($limit == 0 || $cnt == $limit)
				break;
			$cnt++;
		}
		return $arReturn;
	}
	function ChangeStat($ID,$arChange)
	{
		$ID = intval($ID);
		if($ID == 0) return false;
		$arrayKeys = array_keys($arChange);
		if(!in_array("CLICK", $arrayKeys) && !in_array("SHOW", $arrayKeys))
			return false;
		$current_day_start = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
		$current_day_end = mktime(23, 59, 59, date("m"), date("d"), date("Y"));
		$by = "";$order = "";
		$rsStat = CKuznica_rklite::GetStatList($by,$order,array("BANNER_ID"=>$ID,">UNIX_TIMESTAMP(EVENT_DATE)"=>$current_day_start,"<UNIX_TIMESTAMP(EVENT_DATE)"=>$current_day_end));
		if($arStat = $rsStat->Fetch())
		{
			$arChangeUpdated = array(
				"SHOW"=>$arStat["SHOW_COUNT"]+intval($arChange["SHOW"]),
				"CLICK"=>$arStat["CLICK_COUNT"]+intval($arChange["CLICK"]),
			);
			CKuznica_rklite::UpdateStat($ID,$arChangeUpdated);
		}
		else//за сегодняшний день ещё не было статистики по данному баннеру
		{
			CKuznica_rklite::AddStat($ID,$arChange);
		}

		return true;
	}
	function GetStatGraph($arFilter,&$arLegend)
	{
		global $DB;
		if($arFilter["BANNER_SUM"] == "Y")
			$bannerSum = "Y";
		if(in_array('ctr',$arFilter["WHAT_SHOW"]))
		{
			$arFilter["WHAT_SHOW"] = array('click','show','ctr');
		}
		$rsList = CKuznica_rklite::GetGraphList($arFilter);
		$arLegend = array();
		while($arRow = $rsList->GetNext())
		{
			$arReturn[$arRow["DATE"]]["DATE"] =  $arRow["DATE"];
			if($bannerSum == "Y")
			{
				$arReturn[$arRow["DATE"]]["BANNERS"] = array(
					"SHOW_COUNT"=>$arRow["SHOW_COUNT"],
					"CLICK_COUNT"=>$arRow["CLICK_COUNT"],
					"CTR"=>$arRow["CTR"]
				);
				if(empty($arLegend))
					$arLegend["SUM"] = array(
						"TYPE"=>"SUM"
					);
			}
			else
			{
				$arReturn[$arRow["DATE"]]["BANNERS"][$arRow["BANNER_ID"]] = array(
					"SHOW_COUNT"=>$arRow["SHOW_COUNT"],
					"CLICK_COUNT"=>$arRow["CLICK_COUNT"],
					"CTR"=>$arRow["CTR"]
				);
				if(!$arLegend[$arRow["BANNER_ID"]])
					$arLegend[$arRow["BANNER_ID"]] = array(
						"TYPE"=>"SINGLE",
						"NAME"=>$arRow["NAME"],
						"ID"=>$arRow["BANNER_ID"]
					);
			}
		}
		$tmp = 0;
		foreach ($arFilter["WHAT_SHOW"] as $w)
			$tmp++;
		$colorsCnt = count($arLegend)*$tmp;
		foreach ($arLegend as $key => $value)
		{
			if(in_array("show", $arFilter["WHAT_SHOW"]))
			{
				$color = GetNextRGB($color, $colorsCnt);
				$arLegend[$key]["SHOW_COLOR"] = $color;
			}
			if(in_array("click", $arFilter["WHAT_SHOW"]))
			{
				$color = GetNextRGB($color, $colorsCnt);
				$arLegend[$key]["CLICK_COLOR"] = $color;
			}
			if(in_array("ctr", $arFilter["WHAT_SHOW"]))
			{
				$color = GetNextRGB(GetNextRGB($color, $colorsCnt), $colorsCnt);
				$arLegend[$key]["CTR_COLOR"] = $color;
			}
		}
		return $arReturn;
	}
	function GetPageDesiredKeywords()
	{
		return $GLOBALS["RKLITE_PAGE_DESIRED_KEYWORDS"];
	}
	function SetPageDesiredKeywords($string)
	{
		if(substr_count($string,","))
			$exWords = explode(",", $string);
		else
			$exWords = array(trim($string));
		foreach ($exWords as $value)
			$GLOBALS["RKLITE_PAGE_DESIRED_KEYWORDS"][] = trim($value);
		return false;
	}
	function GetPageRequiredKeywords()
	{
		return $GLOBALS["RKLITE_PAGE_REQUIRED_KEYWORDS"];
	}
	function SetPageRequiredKeywords($string)
	{
		if(substr_count($string,","))
			$exWords = explode(",", $string);
		else
			$exWords = array(trim($string));
		foreach ($exWords as $value)
			$GLOBALS["RKLITE_PAGE_REQUIRED_KEYWORDS"][] = trim($value);
		return false;
	}
}
?>
