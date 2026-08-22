<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

WizardServices::IncludeServiceLang("bxready.php", $languageID);

if($Bxready = CModule::CreateModuleObject('alexkova.bxready2')){
    
    if (!$Bxready->IsInstalled()){

            if($Bxready->DoInstall() === false)
            {
                    $this->setError('Need Module BXReady');
                    echo GetMessage('BXREADY_INSTALL_ERROR');
            }
    }
}else{
	$this->setError('Need Module BXReady');
	echo GetMessage('BXREADY_NEED_INSTALL');
}


?>