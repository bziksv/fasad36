<?php

namespace Alexkova\Bxready2;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Config\Option;

Loc::loadMessages(__FILE__);

class Draw extends \Alexkova\Bxready2\Allbxready {

	static $ELEMENT_MODE_LIBRARY = 'library';
	static $ELEMENT_MODE_USER = 'user';

	private $addtionalFiles = array();

	private $componentTemplate = null;
	private $componentResult = null;

	private $defaultImage = null;
	private $markerCollection = null;

	private $useExtFiles = false;

	private static $_instance = null;

	private function __construct(&$componentTemplate, &$componentResult) {

		if (!is_null($componentTemplate)){
			$this->componentTemplate = $componentTemplate;
		}
		if (!is_null($componentResult)){
			$this->componentResult = $componentResult;
		}

		$this->defaultImage = '/bitrix/tools/bxready/.default/no-image.png';

		$this->markerCollection = 'circle_vertical_small';
	}
	protected function __clone() {

	}

	static public function getInstance(&$componentTemplate = null, &$componentResult = null) {
		if(is_null(self::$_instance))
		{
			self::$_instance = new self($componentTemplate, $componentResult);
		}
		return self::$_instance;
	}

	public function showElement($elementLib, $elementType, $arElement = array(), $arElementParams = array(), $onlyEpilog = false, $hideElements = false){

	
		$this->clearAdditionalFiles();
		$this->setUseExtFiles(false);

		return self::drawElement($elementLib, $elementType, $arElement, $arElementParams, $onlyEpilog, $hideElements);
        }

	public function setCurrentTemplate(&$componentTemplate){

		$this->componentTemplate = $componentTemplate;

	}

	public function clearAdditionalFiles(){
		$this->addtionalFiles = array();
	}

	public function getUseExtFiles(){
		return $this->useExtFiles;
	}

	public function setUseExtFiles($newFlag){
		$this->useExtFiles = $newFlag;
	}


	private function drawElement($elementLib, $elementType, $arElement = array(), $arElementParams = array(), $onlyEpilog = false, $hideElements = false){

		$getElement = false;

                global ${$arElementParams['BXREADY_ELEMENT_EXT_PARAMS']};

                $extParams = ${$arElementParams['BXREADY_ELEMENT_EXT_PARAMS']};

		if (is_array($extParams)){
			foreach ($extParams as $cell=>$val){
				$arElementParams[$cell] = $val;
			}
		}
		if ($arElementParams["BXREADY_USER_TYPES"] == "Y" && strlen($arElementParams["BXREADY_USER_TYPE_VARIANT"]) > 0)
			$pathPrefix = self::getElementPath($elementLib, $elementType, true, $arElementParams["BXREADY_USER_TYPE_VARIANT"]);
		else
			$pathPrefix = self::getElementPath($elementLib, $elementType);
		if (strlen($pathPrefix) >0 ) $getElement = true;

                
		if($getElement){

			$elementTemplate = $_SERVER["DOCUMENT_ROOT"].$pathPrefix."/element.php";
			
			
                        $elementEpilog = $_SERVER["DOCUMENT_ROOT"].$pathPrefix."/epilog.php";
			if (file_exists($elementTemplate)){
                            if (!$onlyEpilog)
				include ($elementTemplate);
                            else 
                                include ($elementEpilog);
				if ($this->getUseExtFiles()){


					if (is_object($this->componentTemplate))
					{
						$addFiles = $this->getAdditionalFiles();
						if (count($addFiles)>0){

							foreach($addFiles as $val){
								if ($val["TYPE"] == "CSS"){
                                                                    $this->componentTemplate->addExternalCss($val["PATH"]);
								}
								if ($val["TYPE"] == "JS"){
                                                                    $this->componentTemplate->addExternalJS($val["PATH"]);
								}
							}
						}
					}
				}

				return true;

			}

		}else{
			return false;
		}
	}

	public static function getElementPath($elementLib, $elementType, $userType = false, $userVariant = ''){

		$getElement = false;
		$Path = '';
		if ($userType){

			if (strlen($userVariant) > 0){
				$elementType = $userVariant;
			}
                        $pathPrefix = '/local/php_interface/include/bxready2/collection/user/'.$elementType;
			if (file_exists($_SERVER["DOCUMENT_ROOT"].$pathPrefix."/element.php")){
				$getElement = true;
			} else {                            
                            $pathPrefix = '/bitrix/php_interface/include/bxready2/collection/user/'.$elementType;
                            if (file_exists($_SERVER["DOCUMENT_ROOT"].$pathPrefix."/element.php"))
                                $getElement = true;
                        }

		}else{
                        $pathPrefix = '/local/php_interface/include/bxready2/collection/bxr_'.$elementLib.'/'.$elementType;

			if (!file_exists($_SERVER["DOCUMENT_ROOT"].$pathPrefix."/element.php")){
                                $pathPrefix = '/bitrix/php_interface/include/bxready2/collection/bxr_'.$elementLib.'/'.$elementType;
				if (file_exists($_SERVER["DOCUMENT_ROOT"].$pathPrefix."/element.php")){
					$getElement = true;
				}
			}else{
				$getElement = true;
			}

			if (!$getElement){
				$pathPrefix = '/bitrix/tools/bxready2/collection/bxr_'.$elementLib.'/'.$elementType;
			}


			if (!$getElement && file_exists($_SERVER["DOCUMENT_ROOT"].$pathPrefix."/element.php")){
				$getElement = true;
			}
		}

		if ($getElement) $Path = $pathPrefix;
                
		return $Path;
	}

	public function getDefaultImage(){
		if (!is_null($this->defaultImage)){
			return $this->defaultImage;
		}else{
			return false;
		}
	}

	public function prepareImage($imageID, $metrics){
		if ($imageID>0){
			return \CFile::ResizeImageGet($imageID, $metrics, BX_RESIZE_IMAGE_PROPORTIONAL, true);
		}
	}

	public function setMarkerCollection($collection){

		if (substr_count($collection, '#')){
			$arExtElement = explode('#',$collection);
			$collection = $arExtElement[1];
		}

		$this->markerCollection = $collection;

	}

	public function showMarkerGroup($arMarkers=array(), $onlyEpilog = false){

		return self::drawElement('markers', $this->markerCollection, $arMarkers, array(), $onlyEpilog);
	}

	public function setAdditionalFile($type, $path, $mode = false){

		if (strlen($path)>0 && in_array($type, array("JS", "CSS"))){
			$this->addtionalFiles[] = array(
				"PATH"=>$path,
				"MODE"=>$mode,
				"TYPE" => $type
			);
			$this->setUseExtFiles(true);
		}

	}

	public function getAdditionalFiles(){
		return $this->addtionalFiles;
	}
}
