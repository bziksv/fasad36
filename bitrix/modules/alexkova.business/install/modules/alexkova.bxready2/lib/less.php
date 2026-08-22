<?php
/*
 * New Class of BXready2
 */
namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;
use Alexkova\Bxready2\Bxready;

Loc::loadMessages(__FILE__);

class Less extends \Alexkova\Bxready2\Allbxready{

	public function lessIsOld($inFile, $outFile){

		if (filemtime($inFile)>filemtime($outFile))
			return true;
		else
			return false;
	}

	static public function createLess($inFile, $outFile, $lessVars = array(), $autoControl = false){

		if ($autoControl && !self::lessIsOld($inFile, $outFile)) return false;
		if (!file_exists($inFile)) return false;

		require_once $_SERVER["DOCUMENT_ROOT"].'/bitrix/modules/'.self::$moduleID.'/lib/less/Less.php';

		$parser = new \Less_Parser();

		$parser->parse(file_get_contents($inFile));
		$parser->ModifyVars($lessVars);
		$css = $parser->getCss();
		file_put_contents($outFile, $css);

		if (!file_exists($outFile)) return false;

		return true;
	}
}