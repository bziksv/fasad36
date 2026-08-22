<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

if(!CModule::IncludeModule("iblock"))
	return;

if(COption::GetOptionString("alexkova.business", "wizard_installed", "N", WIZARD_SITE_ID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
	return;

WizardServices::IncludeServiceLang("iblock_related.php", LANGUAGE_ID);


$related = GetMessage('BXR_RELATED');

if (is_array($related['tree']) && count($related['tree'])>0 ){

	foreach($related['tree'] as $cell=>$elements){

		$parent = 0;

		$res = CIblockElement::GetList(
			array(),
			array('XML_ID'=>$related['detail'][$cell]['XML_ID']),
			false,
			false,
			array('ID', 'IBLOCK_ID')
		);

		if ($element = $res->Fetch()){

			$parent = $element['ID'];
			$iblock_id = $element['IBLOCK_ID'];

		}



		if ($parent>0){

			$child = array();

			foreach ($elements as $val){

				$element = $related['detail'][$val]['XML_ID'];
				if (strlen($related['detail'][$val]['XML_ID'])>0){

					$res = CIblockElement::GetList(
						array(),
						array('XML_ID'=>$related['detail'][$val]['XML_ID']),
						false,
						false,
						array('ID')
					);

					if ($element = $res->Fetch()){
						$child[] = $element['ID'];
					}
				}

			}

			if (count($child)>0){
				CIBlockElement::SetPropertyValues($parent, $iblock_id, $child, 'BXR_RELATED');
			}

		}

	}

}

?>