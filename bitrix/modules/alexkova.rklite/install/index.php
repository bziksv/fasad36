<?
global $MESS;
$strPath2Lang = str_replace("\\", "/", __FILE__);
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang)-strlen("/install/index.php"));
include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php"));

Class alexkova_rklite extends CModule
{
	var $MODULE_ID = "alexkova.rklite";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_CSS;

	function alexkova_rklite()
	{
		$arModuleVersion = array();

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

		if (is_array($arModuleVersion) && array_key_exists("VERSION", $arModuleVersion))
		{
			$this->MODULE_VERSION = $arModuleVersion["VERSION"];
			$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
		}
		else
		{
			//$this->MODULE_VERSION = COMPRESSION_VERSION;
			//$this->MODULE_VERSION_DATE = COMPRESSION_VERSION_DATE;
		}

		$this->MODULE_NAME = GetMessage("RKLITE_MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("RKLITE_MODULE_DESC");
		$this->PARTNER_NAME = GetMessage("RKLITE_PARTNER_NAME");;
		$this->PARTNER_URI = "http://kuznica74.ru";
	}


	function InstallDB($arParams = array())
	{
		//echo $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/db/".strtolower($DB->type)."/install.sql";die();
		global $DB, $APPLICATION, $errors;
		$errors = $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/db/".strtolower($DB->type)."/install.sql");
		if (!empty($errors))
		{
			$APPLICATION->ThrowException(implode("", $errors));
			return false;
		}
		RegisterModule($this->MODULE_ID);
		CAgent::AddAgent("CKuznica_rklite::DeleteStat();",'alexkova.rklite', "Y", "86400");
		RegisterModuleDependences("main", "OnProlog","alexkova.rklite", "CKuznica_rklite", "OnPrologHandler");
		return true;
	}

	function UnInstallDB($arParams = array())
	{
		global $APPLICATION, $DB, $errors;

		if(!array_key_exists("savedata", $arParams) || $arParams["savedata"] != "Y")
		{
			$errors = false;
			// delete whole base
			$errors = $DB->RunSQLBatch($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/db/".strtolower($DB->type)."/uninstall.sql");

			if (!empty($errors))
			{
				$APPLICATION->ThrowException(implode("", $errors));
				return false;
			}
		}
		CAgent::RemoveModuleAgents($this->MODULE_ID);
		UnRegisterModuleDependences("main", "OnProlog","alexkova.rklite", "CKuznica_rklite", "OnPrologHandler");
		UnRegisterModule($this->MODULE_ID);
		return true;
	}

	function InstallEvents()
	{
		return true;
	}

	function UnInstallEvents()
	{
		return true;
	}

	function InstallFiles($arParams = array())
	{
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/rk", $_SERVER["DOCUMENT_ROOT"]."/bitrix");
		CopyDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/themes", $_SERVER["DOCUMENT_ROOT"]."/bitrix/themes",true,true);
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/components'))
		{
			if ($dir = opendir($p))
			{
				while (false !== $item = readdir($dir))
				{
					if ($item == '..' || $item == '.')
						continue;
					CopyDirFiles($p.'/'.$item, $_SERVER['DOCUMENT_ROOT'].'/bitrix/components/'.$item, $ReWrite = True, $Recursive = True);
				}
				closedir($dir);
			}
		}
		return true;
	}

	function UnInstallFiles($arParams = array())
	{
		global $APPLICATION,$DB;
		DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/admin", $_SERVER["DOCUMENT_ROOT"]."/bitrix/admin");
		DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/rk", $_SERVER["DOCUMENT_ROOT"]."/bitrix");
		DeleteDirFiles($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/themes/.default", $_SERVER["DOCUMENT_ROOT"]."/bitrix/themes/.default");
		DeleteDirFilesEx("/bitrix/themes/.default/icons/alexkova.rklite");
		if(!array_key_exists("savedata", $arParams) || $arParams["savedata"] != "Y")
		{
			$sql = "SELECT ID FROM b_file WHERE MODULE_ID='{$this->MODULE_ID}'";
			$res = $DB->Query($sql,false,"Line: ".__LINE__);
			if(!$res)
			{
				$APPLICATION->ThrowException(GetMessage("ERROR_FILES_DELETE"));
				return false;
			}
			else
			{
				while($arFile = $res->Fetch())
				{
					if($arFile["ID"]>0)
						CFile::Delete($arFile["ID"]);
				}
			}
		}
		if (is_dir($p = $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/'.$this->MODULE_ID.'/install/components'))
		{
			if ($dir = opendir($p))
			{
				while (false !== $item = readdir($dir))
				{
					if ($item == '..' || $item == '.' || !is_dir($p0 = $p.'/'.$item))
						continue;

					$dir0 = opendir($p0);
					while (false !== $item0 = readdir($dir0))
					{
						if ($item0 == '..' || $item0 == '.')
							continue;
						DeleteDirFilesEx('/bitrix/components/'.$item.'/'.$item0);
					}
					closedir($dir0);
				}
				closedir($dir);
			}
		}
		return true;
	}

	function DoInstall()
	{
		global $APPLICATION,$errors;
		$errors = false;
		$this->InstallFiles();
		$this->InstallDB();
		$APPLICATION->IncludeAdminFile(GetMessage("RKLITE_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/step.php");
	}

	function DoUninstall()
	{
		global $APPLICATION, $DB, $errors, $step;
		$RK_RIGHT = $APPLICATION->GetGroupRight($this->MODULE_ID);
		if ($RK_RIGHT=="W")
		{
			$step = IntVal($step);
			$errors = false;
			if ($step < 2)
			{
				$APPLICATION->IncludeAdminFile(
					GetMessage("RKLITE_DELETE_TITLE"),
					$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/unstep1.php"
				);
			}
			elseif ($step == 2)
			{
				$errors = false;

				$this->UnInstallDB(array(
					"savedata" => $_REQUEST["savedata"],
				));

				$this->UnInstallFiles(array(
					"savedata" => $_REQUEST["savedata"],
				));

				$APPLICATION->IncludeAdminFile(
					GetMessage("RKLITE_DELETE_TITLE"),
					$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/".$this->MODULE_ID."/install/unstep2.php"
				);
			}
		}
	}
}
?>