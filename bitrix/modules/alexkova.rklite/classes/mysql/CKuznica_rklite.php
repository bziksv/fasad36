<?
require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/alexkova.rklite/classes/general/CKuznica_rklite_general.php");
IncludeModuleLangFile(__FILE__);
class CKuznica_rklite extends CKuznica_rklite_general
{
	function GetList($arSort = Array("SORT"=>"ASC"),$arFilter=Array(),$arSelect = Array())
	{
		if(is_array($arSelect))
		{
			if(empty($arSelect))
				$arSelect = array("ID","NAME","ACTIVE","WEIGHT","SHOW_COUNT","BANTYPE","SID","SHOW_TYPE");
		}
		else
			$arSelect = array("ID","NAME");

		$selectFields = implode(",", $arSelect);

		if(!is_array($arSort) || empty($arSort))
			$arSort = array("SORT"=>"ASC");
		foreach($arSort as $order=>$by)
		{
			$order = $order." ".$by;
			break;
		}

		$selectFields = implode(",", $arSelect);

		if(is_array($arFilter) && count($arFilter)>0)
		{
			foreach ($arFilter as $colName => $colValue)
			{
				if(substr($colName, 0, 1) == "!")
				{
					$eq = "<>";
					$colName = str_replace("!", "", $colName);
				}
				else
					$eq = "=";
				$whereFields[]= "$colName $eq '$colValue'";
			}
			if(count($whereFields)>0)
				$where = implode(" AND ", $whereFields);
		}
		$sql = "SELECT $selectFields FROM b_rklite_banner";
		if(strlen($where)>0)
			$sql .= " WHERE $where";
		if(strlen($order)>0)
			$sql .= " ORDER BY $order";
		global $DB;
		return $DB->Query($sql,false);

	}
	function GetTypeList($arSort = Array("SORT"=>"ASC"),$arFilter=Array(),$arSelect = Array())
	{
		if(is_array($arSelect))
		{
			if(empty($arSelect))
				$arSelect = array("ID","CODE","NAME","ACTIVE","SORT");
		}
		else
			$arSelect = array("ID","CODE","NAME","ACTIVE","SORT");

		$selectFields = implode(",", $arSelect);

		if(!is_array($arSort) || empty($arSort))
			$arSort = array("SORT"=>"ASC");
		foreach($arSort as $order=>$by)
		{
			$order = $order." ".$by;
			break;
		}

		$selectFields = implode(",", $arSelect);

		if(is_array($arFilter) && count($arFilter)>0)
		{
			foreach ($arFilter as $colName => $colValue)
			{
				if(substr($colName, 0, 1) == "!")
				{
					$eq = "<>";
					$colName = str_replace("!", "", $colName);
				}
				else
					$eq = "=";
				$whereFields[]= "$colName $eq '$colValue'";
			}
			if(count($whereFields)>0)
				$where = implode(" AND ", $whereFields);
		}
		$sql = "SELECT $selectFields FROM b_rklite_bantype";
		if(strlen($where)>0)
			$sql .= " WHERE $where";
		if(strlen($order)>0)
			$sql .= " ORDER BY $order";
		global $DB;
		return $DB->Query($sql,false);

	}
	function GetByID($ID)
	{
		$ID = intval($ID);
		if($ID>0)
		{
			$sql = "
				SELECT
					ID,NAME,ACTIVE,
					BANTYPE as TYPE,SHOW_FROM,SHOW_TO, IMAGE_ID, URL, SHOW_TYPE, WEIGHT,
					CODE,CODE_TYPE, FLASH_TRANSPARENT, SHOW_ON, SHOW_OFF, SID, INFO, SHOW_COUNT
				FROM b_rklite_banner WHERE ID=".$ID
			;
			global $DB;
			return $DB->Query($sql,false);
		}
	}
	function GetTypeByID($ID)
	{
		$ID = intval($ID);
		if($ID>0)
		{
			$sql = "SELECT ID,CODE,NAME,ACTIVE,SORT,DESCRIPTION
				FROM b_rklite_bantype WHERE ID=".$ID;
			global $DB;
			return $DB->Query($sql,false);
		}
	}
	function Add(&$arFields)
	{
		global $DB;

		if(!$this->CheckFields($arFields))
		{
			return false;
		}
		else
		{
			if($arFields["SHOW_TYPE"] != "html")
				$arFields["IMAGE_ID"] = $this->SaveFile($arFields["IMAGE_ID"]);
			$this->SetLeftCount($arFields);
			return $ID = $DB->Add("b_rklite_banner",$arFields);
		}
	}
	function AddType($arFields)
	{
		global $DB;
		if(!$this->CheckTypeFields($arFields))
		{
			return false;
		}
		else
		{
			return $DB->Add("b_rklite_bantype",$arFields);
		}
	}
	function Update($ID,$arFields)
	{
		global $DB;
		$ID = intval($ID);
		if(!$this->CheckFields($arFields,$ID))
			return false;
		else
		{
			switch ($arFields["SHOW_TYPE"])
			{
				case "html":
					$arFields["URL"] = "";
					$arFields["FLASH_TRANSPARENT"] = "";
					$arFields["IMAGE_ID"]["del"] = "Y";
					$arFields["IMAGE_ID"] = $this->SaveFile($arFields["IMAGE_ID"],$ID);
					break;
				case "flash":
				case "image":
					$arFields["CODE"] = "";
					$arFields["IMAGE_ID"] = $this->SaveFile($arFields["IMAGE_ID"],$ID);
					break;
				default :
					//$arFields["IMAGE_ID"] = "";
					break;
			}
			//echo "<pre>"; print_r($arFields); echo "</pre>";die();
			$this->SetLeftCount($arFields,$ID);
			$strUpdate = $DB->PrepareUpdate("b_rklite_banner", $arFields);
			if($strUpdate!="")
			{
				$strSql = "UPDATE b_rklite_banner SET ".$strUpdate." WHERE ID=".$ID;
				$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
			}
			return true;
		}
	}
	function SetActive($ID,$value ='Y')
	{
		global $DB;
		if(intval($ID)>0)
			$strSql = "UPDATE b_rklite_banner SET ACTIVE='{$value}' WHERE ID='{$ID}'";
		if($DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__))
			return true;
	}
	function UpdateType($ID,$arFields)
	{
		global $DB;
		$ID = intval($ID);
		if(!$this->CheckTypeFields($arFields,$ID))
		{
			return false;
		}
		else
		{
			$strUpdate = $DB->PrepareUpdate("b_rklite_bantype", $arFields);
			if($strUpdate!="")
			{
				$strSql = "UPDATE b_rklite_bantype SET ".$strUpdate." WHERE ID=".$ID;
				$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
			}
			return true;
		}
	}
	function Delete($ID)
	{
		global $DB,$strError;
		$ID = intval($ID);
		if($ID>0)
		{
			$sql = "SELECT ID,IMAGE_ID FROM b_rklite_banner WHERE ID = '$ID'";
			$rsBanner = $DB->Query($sql, false, "File: ".__FILE__."<br/>Line:".__LINE__);
			if ($arBanner = $rsBanner->Fetch())
			{
				if($arBanner["IMAGE_ID"]>0)
					CFile::Delete($arBanner["IMAGE_ID"]);
				$strSql = "DELETE FROM b_rklite_banner WHERE ID = '{$arBanner["ID"]}'";
				$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
				$strSql = "DELETE FROM b_rklite_stat WHERE BANNER_ID = '{$arBanner["ID"]}'";
				$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
				return true;
			}
		}
		return false;

	}
	function DeleteType($ID)
	{
		global $DB;
		$ID = intval($ID);
		if($ID>0)
		{
			$sql = "SELECT ID FROM b_rklite_bantype WHERE ID = '$ID'";
			$rsBanType = $DB->Query($sql, false, "File: ".__FILE__."<br/>Line:".__LINE__);
			if ($arBanType = $rsBanType->Fetch())
			{
				$strSql = "DELETE FROM b_rklite_bantype WHERE ID=".$arBanType["ID"];
				$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__);
			}
		}
		return true;
	}
	//определение коэффициента
	function GetKoef($ID=0,$banType="")
	{
		$k=0;
		$banTypeID = intval($banType);
		global $DB;
		$sql = "
			SELECT ID,WEIGHT,LEFT_COUNT FROM b_rklite_banner
			WHERE ACTIVE='Y'
			AND (SHOW_FROM < NOW() OR SHOW_FROM IS NULL)
			AND (SHOW_TO>NOW() OR SHOW_TO IS NULL)
			AND (SHOW_FIRST>UNIX_TIMESTAMP(SHOW_FROM) OR SHOW_FROM IS NULL)
		";
		if($banTypeID>0)
			$sql .="AND BANTYPE='$banTypeID' ";
		if($ID>0)
			$sql .= " AND ID !='$ID'";
		$res = $DB->Query($sql,false,"<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
		$sum_weight = 0;
		$sum_left_count = 0;
		while($ar_res = $res->Fetch())
		{
			$sum_weight += $ar_res["WEIGHT"];
			$sum_left_count += $ar_res["LEFT_COUNT"];
		}
		if($sum_weight == 0 || $sum_left_count == 0)
			$k=1;//если обе суммы нулевые, то коэфициент K равен 1
		else
			$k = $sum_left_count/$sum_weight;
		return $k;
	}
	//по весу баннера определить его LEFT_SHOWS, установить время обновления этого поля
	function SetLeftCount(&$arFields,$ID=0)
	{
		$k = $this->GetKoef($ID,$arFields["BANTYPE"]);
		$arFields["LEFT_COUNT"] = round($k*$arFields["WEIGHT"]);
		$arFields["SHOW_FIRST"] = time();
	}
	function UpdateLeftCount($ID,$value)
	{
		$value = intval($value);
		global $DB;
		$sql = "UPDATE b_rklite_banner SET LEFT_COUNT=$value, SHOW_FIRST=UNIX_TIMESTAMP(NOW()) WHERE ID='$ID'";
		if($res = $DB->Query($sql,false,"<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>"))
			return true;
		else
			return false;
	}
	function GetBannersList($banTypeID = "",$limit = 0)// (ID типа баннера, сколько баннеров возвращать)
	{
		global $APPLICATION,$DB;
		$banTypeID = intval($banTypeID);
		$limit= intval($limit);
		$sql = "
			SELECT A.*,UNIX_TIMESTAMP(A.SHOW_FROM)as SHOW_FROM_X
			FROM b_rklite_banner A
			LEFT JOIN b_rklite_bantype B ON (A.BANTYPE = B.ID)
			WHERE A.ACTIVE='Y'
			AND B.ACTIVE='Y'
			AND (A.SHOW_FROM < NOW() OR A.SHOW_FROM IS NULL)
			AND (A.SHOW_TO > NOW() OR A.SHOW_TO IS NULL)
			AND A.SID LIKE '%".SITE_ID."%'
			";
		if($banTypeID>0)
			$sql .="AND BANTYPE='$banTypeID' ";
		if($limit>0)
			$sql .=" LIMIT $limit ";
		$res = $DB->Query($sql,false,"<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
		return $res;
	}
	function OnPrologHandler()
	{
		if(CSite::InDir('/bitrix/'))
			return true;
		$_SESSION["RKLITE"]["BANNERS"] = array();
		$set_subdomain_keywords = COption::GetOptionString("alexkova.rklite", "set_subdomain_keywords", 'Y');
		if($set_subdomain_keywords != 'Y')
			return true;
		$domainPath = explode('.',$_SERVER["SERVER_NAME"]);
		$domainPath = array_reverse($domainPath);
		if($domainPath[2])
		{
			CKuznica_rklite::SetPageDesiredKeywords($domainPath[2]);
			CKuznica_rklite::SetPageRequiredKeywords($domainPath[2]);
		}
		return true;

	}
	function GetStatList($by,$order,$arFilter=Array())
	{
		global $DB;

		$where = CKuznica_rklite::PrepareGraphWhere($arFilter,$group);
		//$selectFields = implode(",", $arSelect);
		$sql = "
			SELECT
				{$DB->DateToCharFunction("EVENT_DATE","SHORT")} as DATE,
				round((CLICK_COUNT*100)/SHOW_COUNT,2) as CTR,
				BANNER_ID,

		";
		if($arFilter["BANNER_SUM"] == "Y")
			$sql .= " SUM(SHOW_COUNT) as SHOW_COUNT,SUM(CLICK_COUNT) as CLICK_COUNT";
		else
			$sql .= "SHOW_COUNT, CLICK_COUNT";
		$sql .= " FROM b_rklite_stat";
		if(strlen($where)>0)
			$sql .= " WHERE $where";
		if(strlen($group)>0)
			$sql .= " GROUP BY $group";
		if(strlen($by)>0)
			$sql .= " ORDER BY $by $order";

		return $DB->Query($sql,false);
	}
	function AddStat($ID,$arChange)
	{
		$ID = intval($ID);
		if($ID == 0) return false;
		$arrayKeys = array_keys($arChange);
		if(!in_array("CLICK", $arrayKeys) && !in_array("SHOW", $arrayKeys))
			return false;
		$arFields = array(
			"CLICK_COUNT"=>$arChange["CLICK"],
			"SHOW_COUNT"=>$arChange["SHOW"],
			"BANNER_ID"=>$ID,
		);
		global $DB;
		return $DB->Add("b_rklite_stat",$arFields);
	}
	function UpdateStat($ID,$arChange)
	{
		global $DB;
		$ID = intval($ID);
		if($ID == 0) return false;
		$arrayKeys = array_keys($arChange);
		if(!in_array("CLICK", $arrayKeys) && !in_array("SHOW", $arrayKeys))
			return false;
		$arFields = array(
			"CLICK_COUNT"=>$arChange["CLICK"],
			"SHOW_COUNT"=>$arChange["SHOW"],
		);
		$strUpdate = $DB->PrepareUpdate("b_rklite_stat", $arFields);
		if($strUpdate!="")
		{
			$strSql = "UPDATE b_rklite_stat SET ".$strUpdate." WHERE BANNER_ID='$ID' AND EVENT_DATE>CURDATE()";
			if(!$DB->Query($strSql, false, "File: ".__FILE__."<br>Line: ".__LINE__))
				return false;
		}
		return true;
	}
	function  PrepareGraphWhere($arFilter,&$group)
	{
		global $DB;
		if(is_array($arFilter) && count($arFilter)>0)
		{
			foreach ($arFilter as $colName => $colValue)
			{
				switch ($colName)
				{
					case "DATE_1":
						if(strlen($colValue)>0)
							$whereFields[] = "EVENT_DATE>=".$DB->CharToDateFunction($colValue, "SHORT");
						break;
					case "DATE_2":
						if(strlen($colValue)>0)
							$whereFields[] = "EVENT_DATE<=".$DB->CharToDateFunction($colValue." 23:59:59", "FULL");
						break;
					case "BANNER_ID":
						if(is_array($colValue) && count($colValue)>0)
							$whereFields[] = "BANNER_ID IN (".implode(',', $colValue).")";
						elseif(intval($colValue)>0)
							$whereFields[] = "BANNER_ID = '".intval($colValue)."'";
						break;
					case "WHAT_SHOW":
					case "BANNER_SUM":
						if($colValue == "Y")
						{
							$group = "DATE_FORMAT(EVENT_DATE,'%Y-%m-%d')";
						}
						break;
					default:
						switch(substr($colName, 0, 1))
						{
							case "!":
								$eq = "<>";
								$col1Name = str_replace("!", "", $colName);
								break;
							case ">":
								$eq = ">";
								$col1Name = str_replace(">", "", $colName);
								break;
							case "<":
								$eq = "<";
								$col1Name = str_replace("<", "", $colName);
								break;
							default:
								$eq = "=";
								$col1Name = $colName;
								break;
						}
						$whereFields[]= "$col1Name $eq '$colValue'";
						break;
				}
			}
			if(count($whereFields)>0)
				return $where = implode(" AND ", $whereFields);
		}
		return false;
	}
	function GetGraphList($arFilter)
	{
		global $DB;
		$whereStr = CKuznica_rklite::PrepareGraphWhere($arFilter,$group);
		$sql = "
			SELECT
				".$DB->DateToCharFunction("A.EVENT_DATE","SHORT")." as DATE,
				DAYOFMONTH(A.EVENT_DATE) as DAY,
				MONTH(A.EVENT_DATE) as MONTH,
				YEAR(A.EVENT_DATE) as YEAR,
				round((A.CLICK_COUNT*100)/A.SHOW_COUNT,2) as CTR,";
		if($arFilter["BANNER_SUM"] == "Y")
			$sql .= " SUM(A.SHOW_COUNT) as SHOW_COUNT,SUM(A.CLICK_COUNT) as CLICK_COUNT";
		else
			$sql .= "A.SHOW_COUNT, A.CLICK_COUNT";
		$sql	.=", A.BANNER_ID,

				B.NAME,
				B.SORT,
				B.BANTYPE
			FROM
				b_rklite_stat A
			INNER JOIN b_rklite_banner B ON (A.BANNER_ID = B.ID)";
		if(strlen($whereStr)>0)
			$sql .=" WHERE $whereStr";
		if(strlen($group)>0)
			$sql .= " GROUP BY $group";
		$sql .= " ORDER BY
				A.EVENT_DATE, A.BANNER_ID
			";

		return $DB->Query($sql,false,"<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
	}
	function DeleteStat()
	{
		set_time_limit(0);
		ignore_user_abort(true);
		global $DB;
		$DAYS = intval(COption::GetOptionString("alexkova.rklite", "STAT_DAYS"));
		if($DAYS == 0)
			$DAYS = 90;
		$strSql = "DELETE FROM b_rklite_stat WHERE to_days(now())-to_days(EVENT_DATE)>=$DAYS";
		$DB->Query($strSql, false, "<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
		$strSql = "OPTIMIZE TABLE b_rklite_stat";
		$DB->Query($strSql, false, "<b>Error in </b><br/>File: ".__FILE__."<br/>Line: ".__LINE__."<br/>");
		return "CKuznica_rklite::DeleteStat();";
	}
}
?>