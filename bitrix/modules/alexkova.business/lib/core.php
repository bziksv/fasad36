<?php

namespace Alexkova\Business;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

class Core {

	static $MODULE_ID = 'alexkova.business';
	private static $_instance = null;

	private $bannerSettings = null;

        public static $arUfCodes = null;

	private function __construct(){

	}

	protected function __clone() {

	}
	static public function getInstance() {
		if(is_null(self::$_instance))
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function getTemplateOption($template){
		if (strlen($template)>0){
			$result = \Bitrix\Main\Config\Option::get(self::$MODULE_ID, 'template_'.$template, '');
			return unserialize($result);
		}
	}

	public function setTemplateOption($template,$arSettings){
		if (is_array($arSettings)){
			\Bitrix\Main\Config\Option::set(self::$MODULE_ID, 'template_'.$template, serialize($arSettings));
		}
	}

        public function getUfSection($iblock_id, $section_id, $UfCode){
              
            if(empty($section_id) || empty($iblock_id) || empty($UfCode))
                return false;
            
            if(!is_null(self::$arUfCodes)) {
                if(isset(self::$arUfCodes[$UfCode]))                    
                    return self::$arUfCodes[$UfCode];
                else
                    return false;
            }
            
            $nav = \CIBlockSection::GetNavChain(false, $section_id);
            while($section = $nav->Fetch()){
                $sectionIds[] = $section["ID"];
            }
 
            $arUfCodes = array();
            $filter = array('IBLOCK_ID' => $iblock_id, "ID" => $sectionIds);
            $select = array('IBLOCK_ID', 'ID', 'NAME', 'UF_*');
            $rsSect = \CIBlockSection::GetList(array('id' => 'desc'), $filter, false, $select);
            
            while ($arSect = $rsSect->GetNext())
            {
                foreach ($arSect as $k => $v) {
                    if(substr($k, 0, 3) == 'UF_' || substr($k, 0, 4) == '~UF_') {
                        if(empty($v) || !is_array($v) || $v[0] == 0) {
                            continue;
                        }
                        
                        if(isset($arUfCodes[$k])) {
                            $arUfCodes[$k] = array_merge($arUfCodes[$k], (array)$v);
                        }
                        else {
                            $arUfCodes[$k] = $v;
                        }
                        
                    }
                }
            }

            self::$arUfCodes = $arUfCodes;
            
            if(isset(self::$arUfCodes[$UfCode]))                    
                return self::$arUfCodes[$UfCode];
            else
                return false;
        }
}
