<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/install/wizard_sol/wizard.php");

class SelectSiteStep extends CSelectSiteWizardStep
{
	function InitStep()
	{
		parent::InitStep();

		$wizard =& $this->GetWizard();
		$wizard->solutionName = "alexkova.business";

		$this->SetNextStep("select_top_line");
                if($Bxready = CModule::CreateModuleObject('main')){
			if ($Bxready->MODULE_VERSION < '15.5.1'){
				$this->SetError(GetMessage('SHOW_NOT_ACCESS_MAIN_MODULE'));
				return false;
			}
		}
	}
}


/*class SelectTemplateStep extends CSelectTemplateWizardStep
{
	function InitStep()
	{
		$this->SetStepID("select_template");
		$this->SetTitle(GetMessage("SELECT_TEMPLATE_TITLE"));
		$this->SetSubTitle(GetMessage("SELECT_TEMPLATE_SUBTITLE"));

		if (!CModule::IncludeModule('alexkova.business'))
		{
			$this->SetError(GetMessage('SHOW_NOT_ACCESS_CORPORATE_MODULE'));
			return false;
		}
		
		if($Bxready = CModule::CreateModuleObject('main')){
			
			if ($Bxready->MODULE_VERSION < '15.5.1'){
				$this->SetError(GetMessage('SHOW_NOT_ACCESS_MAIN_MODULE'));
				return false;
			}
		}
		
		$this->SetNextStep("select_top_line");

		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
	}

	function OnPostForm()
	{
		$wizard =& $this->GetWizard();

		$proactive = COption::GetOptionString("statistic", "DEFENCE_ON", "N");
		if ($proactive == "Y")
		{
			COption::SetOptionString("statistic", "DEFENCE_ON", "N");
			$wizard->SetVar("proactive", "Y");
		}
		else
		{
			$wizard->SetVar("proactive", "N");
		}

		if ($wizard->IsNextButtonClick())
		{
			$arTemplates = array(
				"fullscreen",
				"column"
			);

			$templateID = $wizard->GetVar("wizTemplateID");

			if (!in_array($templateID, $arTemplates))
				$this->SetError(GetMessage("wiz_template"));

			$wizard->SetVar("templateID", $templateID);
		}
	}

	function ShowStep()
	{
		$wizard =& $this->GetWizard();

		$templatesPath = WizardServices::GetTemplatesPath($wizard->GetPath()."/site");

		$arTemplates = array(
			"fullscreen" => array(
				"PREVIEW" => $wizard->GetPath()."/images/template/fullscreen.jpg",
				"SCREENSHOT" => $wizard->GetPath()."/images/template/fullscreen_full.jpg",
				"NAME" => GetMessage('BXREADY_FULLSCREEN_TEMPLATE')
			),
			"column" => array(
				"PREVIEW" => $wizard->GetPath()."/images/template/column.jpg",
				"SCREENSHOT" => $wizard->GetPath()."/images/template/column_full.jpg",
				"NAME" => GetMessage('BXREADY_COLUMN_TEMPLATE')
			)
		);

		$defaultTemplateID = COption::GetOptionString("main", "wizard_template_id", "corparate", $wizard->GetVar("siteID"));
		$wizard->SetDefaultVar("wizTemplateID", $defaultTemplateID);

		$arTemplateInfo = $arTemplates;

		$this->content .= '<div class="inst-template-list-block">';
		foreach ($arTemplateInfo as $templateID=>$arTemplate)
		{
			if (!$arTemplate)
				continue;

			$this->content .= '<div class="inst-template-description" style="height: auto">';
			$this->content .= $this->ShowRadioField("wizTemplateID", $templateID, Array("id" => $templateID, "class" => "inst-template-list-inp"));

                        $this->content .= '<label for="'.$templateID.'" class="inst-template-list-label" style="cursor: pointer">'.$arTemplate["NAME"]."</label>";

			if ($arTemplate["SCREENSHOT"] && $arTemplate["PREVIEW"])
				$this->content .= CFile::Show2Images($arTemplate["PREVIEW"], $arTemplate["SCREENSHOT"], 730, 420, ' style="position: relative; top: 10px;" class="inst-template-list-img"');
			else
				$this->content .= CFile::ShowImage($arTemplate["SCREENSHOT"], 730, 420, ' style="position: relative; top: 10px;" class="inst-template-list-img"', "", true);

			$this->content .= "</div>";
		}

		$this->content .= "</div>";
	}
}*/

class SelectTopLineStep extends CSelectTemplateWizardStep
{
	function InitStep()
	{
		$this->SetStepID("select_top_line");
		$this->SetTitle(GetMessage("SELECT_TOPLINE_TITLE"));
		$this->SetSubTitle(GetMessage("SELECT_TOPLINE_SUBTITLE"));

		if (!CModule::IncludeModule('alexkova.business'))
		{
			$this->SetError(GetMessage('SHOW_NOT_ACCESS_CORPORATE_MODULE'));
			return false;
		}
                
        $this->SetNextStep("select_head");
		$this->SetPrevStep("select_template");

		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
		$this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));
	}

	function OnPostForm()
	{
		$wizard =& $this->GetWizard();

		$proactive = COption::GetOptionString("statistic", "DEFENCE_ON", "N");
		if ($proactive == "Y")
		{
			COption::SetOptionString("statistic", "DEFENCE_ON", "N");
			$wizard->SetVar("proactive", "Y");
		}
		else
		{
			$wizard->SetVar("proactive", "N");
		}
                     
		if ($wizard->IsNextButtonClick())
		{
                        $arTopLine = array(
							"top_panel_v1",
							"top_panel_v2",
							"top_panel_v3",
							"top_panel_v4",
			);

			$topLineID = $wizard->GetVar("wizTopLineID");
                        if (!in_array($topLineID, $arTopLine))
				$this->SetError(GetMessage("wiz_top_line"));

			$wizard->SetVar("wizTopLineID", $topLineID);
		}
	}

	function ShowStep()
	{
		$wizard =& $this->GetWizard();

		$topLinePath = $_SERVER["DOCUMENT_ROOT"].$wizard->GetPath().'/site/templates/business/bxready2/area/top_panel';

		$skinList = scandir($topLinePath);
		$messages = GetMessage('TOP_LINE_TYPES');

		$arExtMenu = array();
		$this->content .= '<div class="inst-template-list-block">';

		foreach ($skinList as $arFile){
			if (!in_array($arFile, array('.', '..'))){
				$name = str_replace('.php', '', $arFile);
				$title = strlen($messages[$name])>0 ? $messages[$name] : $name;
				$screen = $wizard->GetPath().'/images/top_line_type/'.$name."_full.jpg";
				$preview = $wizard->GetPath().'/images/top_line_type/'.$name.".jpg";

				$this->content .= '<div class="inst-template-description" style="height: auto">';
				$this->content .= $this->ShowRadioField("wizTopLineID", $name, Array("id" => $name, "class" => "inst-template-list-inp"));
                                $this->content .= '<label for="'.$name.'" style="margin-bottom:2px;" class="inst-template-list-label" style="cursor: pointer">['.$name."] ".$title."</label>";

				if ($screen && $preview)
					$this->content .= CFile::Show2Images($preview, $screen, 730, 220, ' style="position: relative; top: 5px; border: 2px solid #DDD;" class="inst-template-list-img"');
				else
					$this->content .= CFile::ShowImage($screen, 730, 220, ' style="position: relative; top: 5px;"  class="inst-template-list-img"', "", true);

				
				$this->content .= "</div>";


				}
		}

		$this->content .= "</div>";

		$this->content .= "</div>";
	}
}

class SelectHeaderStep extends CSelectTemplateWizardStep
{
	function InitStep()
	{
		$this->SetStepID("select_head");
		$this->SetTitle(GetMessage("SELECT_HEADER_TITLE"));
		$this->SetSubTitle(GetMessage("SELECT_HEADER_SUBTITLE"));

		if (!CModule::IncludeModule('alexkova.business'))
		{
			$this->SetError(GetMessage('SHOW_NOT_ACCESS_CORPORATE_MODULE'));
			return false;
		}
                
		$this->SetNextStep("select_fix_panel");
		$this->SetPrevStep("select_top_line");

		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
		$this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));
	}

	function OnPostForm()
	{
		$wizard =& $this->GetWizard();

		$proactive = COption::GetOptionString("statistic", "DEFENCE_ON", "N");
		if ($proactive == "Y")
		{
			COption::SetOptionString("statistic", "DEFENCE_ON", "N");
			$wizard->SetVar("proactive", "Y");
		}
		else
		{
			$wizard->SetVar("proactive", "N");
		}
                
		if ($wizard->IsNextButtonClick())
		{
                        $arHeader = array(
							"header_v1",
							"header_v2",
							"header_v3",
							"header_v4",
							"header_v5",
							"header_v6",
							"header_v7",
							"header_v8"
                        );


			$headerID = $wizard->GetVar("wizHeaderID");
                        if (!in_array($headerID, $arHeader))
				$this->SetError(GetMessage("wiz_header"));



			$wizard->SetVar("wizHeaderID", $headerID);
		}
	}

	function ShowStep()
	{
		$wizard =& $this->GetWizard();

		$topLinePath = $_SERVER["DOCUMENT_ROOT"].$wizard->GetPath().'/site/templates/business/bxready2/area/header';

		$skinList = scandir($topLinePath);
		$messages = GetMessage('HEADER_TYPES');

		$arExtMenu = array();
		$this->content .= '<div class="inst-template-list-block">';

		foreach ($skinList as $arFile){
			if (!in_array($arFile, array('.', '..'))){
				$name = str_replace('.php', '', $arFile);
				$title = strlen($messages[$name])>0 ? $messages[$name] : $name;
				$screen = $wizard->GetPath().'/images/header_type/'.$name."_full.jpg";
				$preview = $wizard->GetPath().'/images/header_type/'.$name.".jpg";

				$this->content .= '<div class="inst-template-description">';
				$this->content .= $this->ShowRadioField("wizHeaderID", $name, Array("id" => $name, "class" => "inst-template-list-inp"));
                                
                                $this->content .= '<label style="margin-bottom:2px;" for="'.$name.'" class="inst-template-list-label" style="cursor: pointer">['.$name."] ".$title."</label>";
				
				if ($screen && $preview)
					$this->content .= CFile::Show2Images($preview, $screen, 730, 140, ' style="position: relative; top: 5px;"  class="inst-template-list-img"');
				else
					$this->content .= CFile::ShowImage($screen, 730, 140, 'style="position: relative; top: 5px;"  class="inst-template-list-img"', "", true);

				$this->content .= "</div>";


			}
		}

		$this->content .= "</div>";

		$this->content .= "</div>";
	}
}

class SelectFixPanelStep extends CSelectTemplateWizardStep
{
	function InitStep()
	{
		$this->SetStepID("select_fix_panel");
		$this->SetTitle(GetMessage("SELECT_FIX_PANEL_TITLE"));
		$this->SetSubTitle(GetMessage("SELECT_FIX_PANEL_SUBTITLE"));

		if (!CModule::IncludeModule('alexkova.business'))
		{
			$this->SetError(GetMessage('SHOW_NOT_ACCESS_CORPORATE_MODULE'));
			return false;
		}

		$this->SetNextStep("select_footer");
		$this->SetPrevStep("select_head");

		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
		$this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));
	}

	function OnPostForm()
	{
		$wizard =& $this->GetWizard();

		$proactive = COption::GetOptionString("statistic", "DEFENCE_ON", "N");
		if ($proactive == "Y")
		{
			COption::SetOptionString("statistic", "DEFENCE_ON", "N");
			$wizard->SetVar("proactive", "Y");
		}
		else
		{
			$wizard->SetVar("proactive", "N");
		}

		if ($wizard->IsNextButtonClick())
		{
			$arTopLine = array(
				"top_fixed_panel_v1",
				"top_fixed_panel_v2"
			);

			$topLineID = $wizard->GetVar("wizTopFixPanelID");
			if (!in_array($topLineID, $arTopLine))
				$this->SetError(GetMessage("wiz_top_fix_panel"));

			$wizard->SetVar("wizTopFixPanelID", $topLineID);
		}
	}

	function ShowStep()
	{
		$wizard =& $this->GetWizard();

		$topLinePath = $_SERVER["DOCUMENT_ROOT"].$wizard->GetPath().'/site/templates/business/bxready2/area/top_fixed_panel';

		$skinList = scandir($topLinePath);
		$messages = GetMessage('TOP_LINE_TYPES');

		$arExtMenu = array();
		$this->content .= '<div class="inst-template-list-block">';

		foreach ($skinList as $arFile){
			if (!in_array($arFile, array('.', '..'))){

				if (substr_count($arFile, '.disabled')>0){
					continue;
				}

				$name = str_replace('.php', '', $arFile);
				$title = strlen($messages[$name])>0 ? $messages[$name] : $name;
				$screen = $wizard->GetPath().'/images/top_fix_panel_type/'.$name."_full.jpg";
				$preview = $wizard->GetPath().'/images/top_fix_panel_type/'.$name.".jpg";

				$this->content .= '<div class="inst-template-description" style="height: auto">';
				$this->content .= $this->ShowRadioField("wizTopFixPanelID", $name, Array("id" => $name, "class" => "inst-template-list-inp"));
				$this->content .= '<label for="'.$name.'" style="margin-bottom:2px;" class="inst-template-list-label" style="cursor: pointer">['.$name."] ".$title."</label>";

				if ($screen && $preview)
					$this->content .= CFile::Show2Images($preview, $screen, 730, 220, ' style="position: relative; top: 5px; border: 2px solid #DDD;" class="inst-template-list-img"');
				else
					$this->content .= CFile::ShowImage($screen, 730, 220, ' style="position: relative; top: 5px;"  class="inst-template-list-img"', "", true);


				$this->content .= "</div>";


			}
		}

		$this->content .= "</div>";

		$this->content .= "</div>";
	}
}

class SelectFooterStep extends CSelectTemplateWizardStep
{
	function InitStep()
	{
		$this->SetStepID("select_footer");
		$this->SetTitle(GetMessage("SELECT_FOOTER_TITLE"));
		$this->SetSubTitle(GetMessage("SELECT_FOOTER_SUBTITLE"));

		if (!CModule::IncludeModule('alexkova.business'))
		{
			$this->SetError(GetMessage('SHOW_NOT_ACCESS_CORPORATE_MODULE'));
			return false;
		}

		$this->SetNextStep("select_top_menu");
		$this->SetPrevStep("select_fix_panel");

		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
		$this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));
	}

	function OnPostForm()
	{
		$wizard =& $this->GetWizard();

		$proactive = COption::GetOptionString("statistic", "DEFENCE_ON", "N");
		if ($proactive == "Y")
		{
			COption::SetOptionString("statistic", "DEFENCE_ON", "N");
			$wizard->SetVar("proactive", "Y");
		}
		else
		{
			$wizard->SetVar("proactive", "N");
		}

		if ($wizard->IsNextButtonClick())
		{
			$arHeader = array(
				"footer_v1",
				"footer_v1_under",
				"footer_v2",
				"footer_v2_under",
				"footer_v3"
			);


			$headerID = $wizard->GetVar("wizFooterID");
			if (!in_array($headerID, $arHeader))
				$this->SetError(GetMessage("wiz_footer"));



			$wizard->SetVar("wizFooterID", $headerID);
		}
	}

	function ShowStep()
	{
		$wizard =& $this->GetWizard();

		$topLinePath = $_SERVER["DOCUMENT_ROOT"].$wizard->GetPath().'/site/templates/business/bxready2/area/footer';

		$skinList = scandir($topLinePath);
		$messages = GetMessage('FOOTER_TYPES');

		$arExtMenu = array();
		$this->content .= '<div class="inst-template-list-block">';

		foreach ($skinList as $arFile){
			if (!in_array($arFile, array('.', '..'))){

				if (substr_count($arFile, '.disabled')>0){
					continue;
				}

				$name = str_replace('.php', '', $arFile);
				$title = strlen($messages[$name])>0 ? $messages[$name] : $name;
				$screen = $wizard->GetPath().'/images/footer_type/'.$name."_full.jpg";
				$preview = $wizard->GetPath().'/images/footer_type/'.$name.".jpg";

				$this->content .= '<div class="inst-template-description">';
				$this->content .= $this->ShowRadioField("wizFooterID", $name, Array("id" => $name, "class" => "inst-template-list-inp"));

				$this->content .= '<label style="margin-bottom:2px;" for="'.$name.'" class="inst-template-list-label" style="cursor: pointer">['.$name."] ".$title."</label>";

				if ($screen && $preview)
					$this->content .= CFile::Show2Images($preview, $screen, 730, 140, ' style="position: relative; top: 5px;"  class="inst-template-list-img"');
				else
					$this->content .= CFile::ShowImage($screen, 730, 140, 'style="position: relative; top: 5px;"  class="inst-template-list-img"', "", true);

				$this->content .= "</div>";


			}
		}

		$this->content .= "</div>";

		$this->content .= "</div>";
	}
}

class SelectTopMenuStep extends CSelectTemplateWizardStep
{
	function InitStep()
	{
		$this->SetStepID("select_top_menu");
		$this->SetTitle(GetMessage("SELECT_TOP_MENU_TITLE"));
		$this->SetSubTitle(GetMessage("SELECT_TOP_MENU_SUBTITLE"));

		if (!CModule::IncludeModule('alexkova.business'))
		{
			$this->SetError(GetMessage('SHOW_NOT_ACCESS_CORPORATE_MODULE'));
			return false;
		}
		$this->SetNextStep("select_left_menu");
		$this->SetPrevStep("select_footer");

		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
		$this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));
	}

	function OnPostForm()
	{
		$wizard =& $this->GetWizard();

		$proactive = COption::GetOptionString("statistic", "DEFENCE_ON", "N");
		if ($proactive == "Y")
		{
			COption::SetOptionString("statistic", "DEFENCE_ON", "N");
			$wizard->SetVar("proactive", "Y");
		}
		else
		{
			$wizard->SetVar("proactive", "N");
		}

		if ($wizard->IsNextButtonClick())
		{

			$menuDetail = $wizard->GetVar("wizTopMenu");

			if (strlen($menuDetail['MenuType'])>0){
                            $wizard->SetVar("wizTopMenu", $menuDetail);

                            $topMenu = array();
                            $topMenu["TYPE"] = $menuDetail["MenuType"];

                            if(isset($menuDetail["MenuTemplate_".$topMenu["TYPE"]]))            
                                $topMenu["TEMPLATE"] = $menuDetail["MenuTemplate_".$topMenu["TYPE"]];

                            /**/

                            /*if(isset($menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_FIXED_MENU"]))
                                $topMenu["FIXED_MENU"] = $menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_FIXED_MENU"];
                            else
                                $topMenu["FIXED_MENU"] = "N";*/

                            if(isset($menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_FULL_SIZE"]))
                                $topMenu["FULL_WIDTH"] = $menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_FULL_SIZE"];
                             else
                                $topMenu["FULL_WIDTH"] = "N";

                            if(isset($menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_STYLE"]))
                                $topMenu["STYLE_MENU"] = $menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_STYLE"];
                            
                             if(isset($menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_SECTION_IMAGE"]))
                                $topMenu["PICTURE_SECTION"] = $menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_SECTION_IMAGE"];
                                                        
                            if(isset($menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_FONT_MENU"]))
                                $topMenu["FONT_MENU"] = $menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_FONT_MENU"];
                            
                            if(isset($menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_USE_SEARCH"]))
                                $topMenu["SEARCH_FORM"] = $menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_USE_SEARCH"];
                            else
                                $topMenu["SEARCH_FORM"] = "N";

                            if(isset($menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_hover_template"]))
                                $topMenu["TEMPLATE_MENU_HOVER"] = $menuDetail["MenuSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_hover_template"];

                           
                            /**/
                            
                            if(isset($menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_STYLE"]))
                                $topMenu["STYLE_MENU_HOVER"] = $menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_STYLE"];

                            if(isset($menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_SECTION_IMAGE"]))
                                $topMenu["PICTURE_SECTION_HOVER"] = $menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_SECTION_IMAGE"];

                            if(isset($menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_PARENT_SECTION_IMAGE"]))
                                $topMenu["PICTURE_CATEGARIES"] = $menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_PARENT_SECTION_IMAGE"];

                            if(isset($menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_RESPONSIVE_LG"]))
                                $topMenu["HOVER_MENU_COL_LG"] = $menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_RESPONSIVE_LG"];

                            if(isset($menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_RESPONSIVE_MD"]))
                                $topMenu["HOVER_MENU_COL_MD"] = $menuDetail["HoverSettings_".$topMenu["TYPE"]."_vs_".$topMenu["TEMPLATE"]."_vs_".$topMenu["TEMPLATE_MENU_HOVER"]."_vs_RESPONSIVE_MD"];
                            
                            
                            if($topMenu["PICTURE_SECTION"] == "ICO" || $topMenu["PICTURE_SECTION"] == "ICO_DEFAULT") {
                                switch($topMenu["STYLE_MENU"]) {
                                    case "light": 
                                        $topMenu["ICO_TOP_MENU_COLOR_1"] = "dark";
                                        $topMenu["ICO_TOP_MENU_COLOR_2"] = "color";
                                        break;
                                    case "dark": 
                                        $topMenu["ICO_TOP_MENU_COLOR_1"] = "light";
                                        $topMenu["ICO_TOP_MENU_COLOR_2"] = "light";
                                        break;
                                    case "color": 
                                        $topMenu["ICO_TOP_MENU_COLOR_1"] = "light";
                                        $topMenu["ICO_TOP_MENU_COLOR_2"] = "light";
                                        break;
                                }
                            }                                

                            if($topMenu["PICTURE_SECTION_HOVER"] == "ICO" || $topMenu["PICTURE_SECTION_HOVER"] == "ICO_DEFAULT") {
                                switch($topMenu["STYLE_MENU_HOVER"]) {
                                    case "colored_light": 
                                        $topMenu["ICO_TOP_MENU_HOVER_COLOR_1"] = "dark";
                                        $topMenu["ICO_TOP_MENU_HOVER_COLOR_2"] = "color";
                                        break;
                                    case "colored_dark": 
                                        $topMenu["ICO_TOP_MENU_HOVER_COLOR_1"] = "light";
                                        $topMenu["ICO_TOP_MENU_HOVER_COLOR_2"] = "light";
                                        break;
                                    case "colored_color":
                                        $topMenu["ICO_TOP_MENU_HOVER_COLOR_1"] = "light";
                                        $topMenu["ICO_TOP_MENU_HOVER_COLOR_2"] = "light";
                                        break;
                                }
                            }
                            
                            $wizard->SetVar("topMenu", $topMenu);
                                      
			}else{
				$this->setError('ERROR');
				return false;
			}

		}
	}

	function ShowStep()
	{
		$wizard =& $this->GetWizard();

		$arLangFactory = GetMessage('TOP_MENU_SETTINGS');

		if (strlen($arLangFactory["DESCRIPTION"])>0){
			$this->content .= '<div style="margin-bottom:12px;" class="inst-template-list-block">
			'.$arLangFactory["DESCRIPTION"].'
			</div>';
		}

		$defaultValue = $wizard->getVars();
		if (strlen($defaultValue['wizTopMenu']['HoverSettings_with_catalog_vs_version_v1_vs_RESPONSIVE_LG'])){
			$defaultValue['wizTopMenu']['HoverSettings_with_catalog_vs_version_v1_vs_RESPONSIVE_LG'] = 2;
		};
		if (strlen($defaultValue['wizTopMenu']['HoverSettings_with_catalog_vs_version_v1_vs_RESPONSIVE_MD'])){
			$defaultValue['wizTopMenu']['HoverSettings_with_catalog_vs_version_v1_vs_RESPONSIVE_MD'] = 2;
		};
		$wizard->setVar('wizTopMenu',$defaultValue['wizTopMenu']);


		$this->content .= '<div class="inst-template-list-block">';

		$arMenuDefaultHoverTemplates = array(
			'classic'=>array(
				"NAME"=> strlen($arLangFactory['menu_hover_classic'])>0 ? $arLangFactory['menu_hover_classic'] : 'list',
				"SETTINGS"=>array(
					"STYLE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'colored_light' => strlen($arLangFactory['menu_hover_classic_colored_light'])>0 ? $arLangFactory['menu_hover_classic_colored_light'] : 'colored_light',
							'colored_color' => strlen($arLangFactory['menu_hover_classic_colored_color'])>0 ? $arLangFactory['menu_hover_classic_colored_color'] : 'colored_color',
                                                        'colored_dark' => strlen($arLangFactory['menu_hover_classic_colored_dark'])>0 ? $arLangFactory['menu_hover_classic_colored_dark'] : 'colored_dark',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_classic_style'])>0 ? $arLangFactory['menu_hover_classic_style'] : 'STYLE',
					),
					"SECTION_IMAGE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'N' => strlen($arLangFactory['menu_hover_classic_icon_none'])>0 ? $arLangFactory['menu_hover_classic_icon_none'] : 'NONE',
							'ICO' => strlen($arLangFactory['menu_hover_classic_icon_ico'])>0 ? $arLangFactory['menu_hover_classic_icon_ico'] : 'ICO',
							'ICO_DEFAULT' => strlen($arLangFactory['menu_hover_classic_icon_default'])>0 ? $arLangFactory['menu_hover_classic_icon_default'] : 'DEFAULT',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_section_image'])>0 ? $arLangFactory['menu_hover_section_image'] : 'ICON SECTION_IMAGE',
                    			)
				)
			),
			'list'=>array(
				"NAME"=> strlen($arLangFactory['menu_hover_list'])>0 ? $arLangFactory['menu_hover_list'] : 'list',
				"SETTINGS"=>array(
					"STYLE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'colored_light' => strlen($arLangFactory['menu_hover_classic_colored_light'])>0 ? $arLangFactory['menu_hover_classic_colored_light'] : 'colored_light',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_classic_style'])>0 ? $arLangFactory['menu_hover_classic_style'] : 'STYLE',
					),
					"SECTION_IMAGE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'N' => strlen($arLangFactory['menu_hover_section_image_none'])>0 ? $arLangFactory['menu_hover_classic_icon_none'] : 'NONE',
							'ICON' => strlen($arLangFactory['menu_hover_section_image_icon'])>0 ? $arLangFactory['menu_hover_section_image_icon'] : 'ICO',
							'ICO_DEFAULT' => strlen($arLangFactory['menu_hover_section_default'])>0 ? $arLangFactory['menu_hover_section_default'] : 'ICON DEFAULT',
							'IMG' => strlen($arLangFactory['menu_hover_section_image'])>0 ? $arLangFactory['menu_hover_section_image'] : 'IMAGE',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_section_image'])>0 ? $arLangFactory['menu_hover_section_image'] : 'ICON SECTION_IMAGE',
					),
					"PARENT_SECTION_IMAGE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'N' => strlen($arLangFactory['menu_hover_classic_category_image_none'])>0 ? $arLangFactory['menu_hover_classic_category_image_none'] : 'NONE',
							'LEFT' => strlen($arLangFactory['menu_hover_classic_category_image_left'])>0 ? $arLangFactory['menu_hover_classic_category_image_left'] : 'ICO',
							'RIGHT' => strlen($arLangFactory['menu_hover_classic_category_image_right'])>0 ? $arLangFactory['menu_hover_classic_category_image_right'] : 'ICO',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_parent_image'])>0 ? $arLangFactory['menu_hover_parent_image'] : 'CATEGORY_IMAGE',
					),
					"RESPONSIVE_LG"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'3' => 3,
							'2' => 2,

						),
						'NAME'=>strlen($arLangFactory['menu_hover_responsive_lg'])>0 ? $arLangFactory['menu_hover_responsive_lg'] : 'RESPONSIVE LG',
					),
					"RESPONSIVE_MD"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'3' => 3,
							'2' => 2,

						),
						'NAME'=>strlen($arLangFactory['menu_hover_responsive_md'])>0 ? $arLangFactory['menu_hover_responsive_md'] : 'RESPONSIVE MD',
					)
				)
			)
		);


		$arMenuDefaultTemplates = array(
			'version_v1'=>array(
				"NAME"=> strlen($arLangFactory['menu_template_version_v1'])>0 ? $arLangFactory['menu_template_version_v1'] : 'version_1',
				"SETTINGS"=>array(
					/*"FIXED_MENU" => array(
						'TYPE'=>'checkbox',
						'VALUE'=>"Y",
						'NAME'=>strlen($arLangFactory['menu_template_version_v1_stay_ontop'])>0 ? $arLangFactory['menu_template_version_v1_stay_ontop'] : 'STAY ON TOP',
					),*/
					"FULL_SIZE" => array(
						'TYPE'=>'checkbox',
						'VALUE'=>"Y",
						'NAME'=>strlen($arLangFactory['menu_template_version_v1_fullsize'])>0 ? $arLangFactory['menu_template_version_v1_fullsize'] : 'fullsize',
					),
					"STYLE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'light' => strlen($arLangFactory['menu_template_version_v1_light'])>0 ? $arLangFactory['menu_template_version_v1_light'] : 'light',
							//'colored_light_big' => strlen($arLangFactory['menu_template_version_v1_colored_light_big'])>0 ? $arLangFactory['menu_template_version_v1_colored_light_big'] : 'colored_light_big',
							//'colored_light_lighten' => strlen($arLangFactory['menu_template_version_v1_colored_light_lighten'])>0 ? $arLangFactory['menu_template_version_v1_colored_light_lighten'] : 'colored_light_lighten',
							'dark' => strlen($arLangFactory['menu_template_version_v1_dark'])>0 ? $arLangFactory['menu_template_version_v1_dark'] : 'dark',
							//'colored_dark_big' => strlen($arLangFactory['menu_template_version_v1_colored_dark_big'])>0 ? $arLangFactory['menu_template_version_v1_colored_dark_big'] : 'colored_dark_big',
							//'colored_dark_lighten' => strlen($arLangFactory['menu_template_version_v1_colored_dark_lighten'])>0 ? $arLangFactory['menu_template_version_v1_colored_dark_lighten'] : 'colored_dark_lighten',
							'color' => strlen($arLangFactory['menu_template_version_v1_color'])>0 ? $arLangFactory['menu_template_version_v1_color'] : 'color',
							//'colored_color_big' => strlen($arLangFactory['menu_template_version_v1_colored_color_big'])>0 ? $arLangFactory['menu_template_version_v1_colored_color_big'] : 'colored_color_big',
							//'colored_color_lighten' => strlen($arLangFactory['menu_template_version_v1_colored_color_lighten'])>0 ? $arLangFactory['menu_template_version_v1_colored_color_lighten'] : 'colored_color_lighten',
						),
						'NAME'=>strlen($arLangFactory['menu_template_version_v1_style'])>0 ? $arLangFactory['menu_template_version_v1_style'] : 'STYLE',
					),
                                        "SECTION_IMAGE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'N' => strlen($arLangFactory['menu_hover_classic_icon_none'])>0 ? $arLangFactory['menu_hover_classic_icon_none'] : 'NONE',
							'ICO' => strlen($arLangFactory['menu_hover_classic_icon_ico'])>0 ? $arLangFactory['menu_hover_classic_icon_ico'] : 'ICO',
							'ICO_DEFAULT' => strlen($arLangFactory['menu_hover_classic_icon_default'])>0 ? $arLangFactory['menu_hover_classic_icon_default'] : 'DEFAULT',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_section_image'])>0 ? $arLangFactory['menu_hover_section_image'] : 'ICON SECTION_IMAGE',
                    			),
                                        "FONT_MENU"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'normal' => strlen($arLangFactory['menu_template_version_v1_normal'])>0 ? $arLangFactory['menu_template_version_v1_normal'] : 'normal',
							'ligth' => strlen($arLangFactory['menu_template_version_v1_ligth'])>0 ? $arLangFactory['menu_template_version_v1_ligth'] : 'ligth',
							'big' => strlen($arLangFactory['menu_template_version_v1_big'])>0 ? $arLangFactory['menu_template_version_v1_big'] : 'big',
                                                ),
						'NAME'=>strlen($arLangFactory['menu_template_version_v1_font_menu'])>0 ? $arLangFactory['menu_template_version_v1_font_menu'] : 'normal',
					),
					"USE_SEARCH" => array(
						'TYPE'=>'checkbox',
						'VALUE'=>"Y",
						'NAME'=>strlen($arLangFactory['menu_template_version_v1_usesearch'])>0 ? $arLangFactory['menu_template_version_v1_usesearch'] : 'use search',
					)
				),
				"HOVERS" => $arMenuDefaultHoverTemplates,
			),

		);

		$arMenuSelect = array(
			/*"only_catalog" => array(
				"NAME" => strlen($arLangFactory['only_catalog'])>0 ? $arLangFactory['only_catalog'] : 'only_catalog',
				"TEMPLATES" => $arMenuDefaultTemplates,

			),*/
			"with_catalog" => array(
				"NAME" => strlen($arLangFactory['with_catalog'])>0 ? $arLangFactory['with_catalog'] : 'with_catalog',
				"TEMPLATES" => $arMenuDefaultTemplates,
			)
		);

                if(count($arMenuSelect)>1)
                    $this->content .= '<div class="inst-template-description"  style="height: auto">';
                else
                    $this->content .= '<div class="inst-template-description"  style="display:none">';

		$this->content .= '<h2>'.GetMessage('MENU_TYPE_SELECT').'</h2>';

		$arMenyTypes = array();

		foreach($arMenuSelect as $cell=>$val){
			$arMenyTypes[$cell] = $val["NAME"];
		}

		$this->content .= $this->ShowSelectField("wizTopMenu[MenuType]", $arMenyTypes, array("id"=>"top_menu_type"));

		$this->content .= "</div>";

		foreach($arMenuSelect as $cell=>$val){

                        if(count($val["TEMPLATES"])>1)
                            $this->content .= '<div class="inst-template-description menu_types menu_type_'.$cell.'" style="height: auto">';
                        else 
                            $this->content .= '<div class="inst-template-description menu_types menu_type_'.$cell.'" style="display:none;height: auto">';
                        
                        $this->content .= '<h2>'.GetMessage('MENU_TEMPLATE_SELECT').'</h2>';

			foreach($val["TEMPLATES"] as $cell2=>$val2){
				$arTemplatesTypes[$cell2] = $val2["NAME"];

			};

			$this->content .= $this->ShowSelectField("wizTopMenu[MenuTemplate_$cell]", $arTemplatesTypes, array("id"=>"top_menu_template_".$cell));
			$this->content .= "<br />";
			$this->content .= '</div>';
		}

		foreach($arMenuSelect as $cell=>$val){
			foreach($val["TEMPLATES"] as $cell2=>$val2){
				$this->content .= '<div class="inst-template-description menu_templates menu_template_'.$cell.'_'.$cell2.'" style="height: auto">';
				$this->content .= '<h2>'.GetMessage('MENU_TEMPLATE_SETTINGS').'</h2>';
				foreach($val2["SETTINGS"] as $cell3=>$val3){
					if ($val3["TYPE"] == "select"){
						$this->content .= "<label for="."wizTopMenuSettings_$cell".'_vs_'.$cell2."_vs_".$cell3." style='cursor:pointer; margin: 30px 0'>".$val3["NAME"]."</label><br />";
						$this->content .= $this->ShowSelectField("wizTopMenu[MenuSettings_$cell".'_vs_'.$cell2."_vs_".$cell3."]", $val3["VALUES"], array("id"=>"_menu_settings_$cell".'_vs_'.$cell2.'_vs_'.$cell3));
						$this->content .= '<br>';
						$this->content .= '<br>';
					}
					if ($val3["TYPE"] == "checkbox"){
						$this->content .= $this->ShowCheckboxField("wizTopMenu[MenuSettings_$cell".'_vs_'.$cell2."_vs_".$cell3."]", $val3["VALUE"], array("id"=>"_menu_settings_$cell".'_vs_'.$cell2.'_vs_'.$cell3));
						$this->content .= "<label for="."_menu_settings_$cell".'_vs_'.$cell2."_vs_".$cell3."  style='cursor:pointer; margin: 30px 0'>".$val3["NAME"]."</label>";
						$this->content .= '<br>';
						$this->content .= '<br>';
					}

				};

				$hoverValues= array();

				foreach($val2["HOVERS"] as $cell4=>$val4){
					$hoverValues[$cell4] = $val4["NAME"];
				}

				$cell3 = 'hover_template';
				$this->content .= "<label for="."_menu_hover_$cell".'_vs_'.$cell2."_vs_".$cell3."  style='cursor:pointer; margin: 30px 0'>".GetMessage('MENU_HOVER_TEMPLATE')."</label>";
				$this->content .= '<br>';
				$this->content .= $this->ShowSelectField("wizTopMenu[MenuSettings_$cell".'_vs_'.$cell2."_vs_".$cell3."]", $hoverValues, array("id"=>"_menu_hover_$cell".'_vs_'.$cell2.'_vs_'.$cell3, "class"=>"hover_selector"));
				$this->content .= '<br>';
				$this->content .= '<br>';

				$this->content .= '</div>';


				foreach($val2["HOVERS"] as $cell4=>$val4){
					$this->content .= '<div class="inst-template-description menu_hovers menu_hover_'.$cell.'_'.$cell2.'_'.$cell4.'" style="height: auto">';
					$this->content .= '<h2>'.GetMessage('MENU_HOVER_SETTINGS').'</h2>';
					foreach($val4["SETTINGS"] as $cell3=>$val3){
						if ($val3["TYPE"] == "select"){
							$this->content .= "<label for="."wizTopMenuSettings_$cell".'_vs_'.$cell2.'_vs_'.$cell4."_vs_".$cell3." style='cursor:pointer; margin: 30px 0'>".$val3["NAME"]."</label><br />";
							$this->content .= $this->ShowSelectField("wizTopMenu[HoverSettings_$cell".'_vs_'.$cell2.'_vs_'.$cell4."_vs_".$cell3."]", $val3["VALUES"], array("id"=>"_menu_settings_$cell".'_vs_'.$cell2.'_vs_'.$cell4.'_vs_'.$cell3));
							$this->content .= '<br>';
							$this->content .= '<br>';
						}
						if ($val3["TYPE"] == "checkbox"){
							$this->content .= $this->ShowCheckboxField("wizTopMenu[HoverSettings_$cell".'_vs_'.$cell2.'_vs_'.$cell4."_vs_".$cell3."]", $val3["VALUE"], array("id"=>"_menu_settings_$cell".'_vs_'.$cell2.'_vs_'.$cell4.'_vs_'.$cell3));
							$this->content .= "<label for="."_menu_settings_$cell".'_vs_'.$cell2.'_vs_'.$cell4."_vs_".$cell3."  style='cursor:pointer; margin: 30px 0'>".$val3["NAME"]."</label>";
							$this->content .= '<br>';
							$this->content .= '<br>';
						}

					};
					$this->content .= '</div>';
				};

			};


		}


		$this->content .= "</div>";

		$this->content .= "
		<script src='".$wizard->GetPath().'/site/templates/business/js/jquery-2.1.4.js'."'></script>

		<script>
			$(document).ready(function(){

				function changeMenuType(){
					value = $('#top_menu_type').val();

					$('.menu_types').hide();
					$('.menu_types.menu_type_'+value).show();
				};

				function changeMenuTemplate(){
					value = $('#top_menu_type').val();
					value2 = $('#top_menu_template_'+value).val();
					console.log(value+' '+value2);

					$('.menu_templates').hide();
					$('.menu_templates.menu_template_'+value+'_'+value2).show();

				};

				function changeMenuHover(){
					value = $('#top_menu_type').val();
					value2 = $('#top_menu_template_'+value).val();
					value3 = $('#_menu_hover_'+value+'_vs_'+value2+'_vs_hover_template').val();
					console.log(value+' '+value2+' '+value3);

					$('.menu_hovers').hide();
					$('.menu_hovers.menu_hover_'+value+'_'+value2+'_'+value3).show();

				};

				$(document).on(
				'change',
				'#top_menu_type',
				function(){
					changeMenuType();
					changeMenuTemplate();
					changeMenuHover();
				}
				);

				$(document).on(
				'change',
				'.menu_types',
				function(){
					changeMenuTemplate();
					changeMenuHover();
				}
				);

				$(document).on(
				'change',
				'.hover_selector',
				function(){
					changeMenuHover();
				}
				);

				changeMenuType();
					changeMenuTemplate();
					changeMenuHover();

			})
		</script>";

		$this->content .="
		<style>
		.menu_templates, .menu_types, .menu_hovers{
		display: none;
		}

		.inst-template-description INPUT, .inst-template-description select{
		font-size: 18px;
    padding: 5px 10px;
    cursor: pointer;
		}

		.inst-template-description{
		border: 1px solid #CCC;
		margin-bottom: 15px;
		}
		</style>";
	}
}

class SelectLeftMenuStep extends CSelectTemplateWizardStep
{
	function InitStep()
	{
		$this->SetStepID("select_left_menu");
		$this->SetTitle(GetMessage("SELECT_LEFT_MENU_TITLE"));
		$this->SetSubTitle(GetMessage("SELECT_LEFT_MENU_SUBTITLE"));

		if (!CModule::IncludeModule('alexkova.business'))
		{
			$this->SetError(GetMessage('SHOW_NOT_ACCESS_CORPORATE_MODULE'));
			return false;
		}
		$this->SetNextStep("select_color");
		$this->SetPrevStep("select_top_menu");

		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
		$this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));
	}

	function OnPostForm()
	{            
		$wizard =& $this->GetWizard();

		$proactive = COption::GetOptionString("statistic", "DEFENCE_ON", "N");
		if ($proactive == "Y")
		{
			COption::SetOptionString("statistic", "DEFENCE_ON", "N");
			$wizard->SetVar("proactive", "Y");
		}
		else
		{
			$wizard->SetVar("proactive", "N");
		}

		if ($wizard->IsNextButtonClick())
		{

  			$menuDetail = $wizard->GetVar("wizLeftMenu"); 

			if (strlen($menuDetail['MenuType'])>0){
				$wizard->SetVar("wizLeftMenu", $menuDetail);
                                
                                $leftMenu = array();
                                $leftMenu["TYPE"] = $menuDetail["MenuType"];

                                if(isset($menuDetail["MenuTemplate_".$leftMenu["TYPE"]]))            
                                    $leftMenu["LEFT_MENU_TEMPLATE"] = $menuDetail["MenuTemplate_".$leftMenu["TYPE"]];

                                /**/

                                if(isset($menuDetail["MenuSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_STYLE"]))
                                    $leftMenu["STYLE_MENU"] = $menuDetail["MenuSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_STYLE"];

                                if(isset($menuDetail["MenuSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_PICTURE_SECTION"]))
                                    $leftMenu["PICTURE_SECTION"] = $menuDetail["MenuSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_PICTURE_SECTION"];

                                if(isset($menuDetail["MenuSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_SUBMENU"]))
                                    $leftMenu["SUBMENU"] = $menuDetail["MenuSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_SUBMENU"];

                                if(isset($menuDetail["MenuSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_hover_template"]))
                                    $leftMenu["HOVER_TEMPLATE"] = $menuDetail["MenuSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_hover_template"];

                                /**/

                                if(isset($menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_STYLE"]))
                                    $leftMenu["STYLE_MENU_HOVER"] = $menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_STYLE"];
                                
                                if(isset($menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_SECTION_IMAGE"]))
                                    $leftMenu["PICTURE_SECTION_HOVER"] = $menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_SECTION_IMAGE"];

                                if(isset($menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_PARENT_SECTION_IMAGE"]))
                                    $leftMenu["PICTURE_CATEGARIES"] = $menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_PARENT_SECTION_IMAGE"];

                                if(isset($menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_RESPONSIVE_LG"]))
                                    $leftMenu["HOVER_MENU_COL_LG"] = $menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_RESPONSIVE_LG"];

                                if(isset($menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_RESPONSIVE_MD"]))
                                    $leftMenu["HOVER_MENU_COL_MD"] = $menuDetail["HoverSettings_".$leftMenu["TYPE"]."_vs_".$leftMenu["LEFT_MENU_TEMPLATE"]."_vs_".$leftMenu["HOVER_TEMPLATE"]."_vs_RESPONSIVE_MD"];
                                
                                if($leftMenu["PICTURE_SECTION"] == "ICO" || $leftMenu["PICTURE_SECTION"] == "ICO_DEFAULT") {
                                    switch($leftMenu["STYLE_MENU"]) {
                                        case "colored_light": 
                                            $leftMenu["ICO_LEFT_MENU_COLOR_1"] = "dark";
                                            $leftMenu["ICO_LEFT_MENU_COLOR_2"] = "color";
                                            break;
                                        case "colored_dark": 
                                            $leftMenu["ICO_LEFT_MENU_COLOR_1"] = "light";
                                            $leftMenu["ICO_LEFT_MENU_COLOR_2"] = "light";
                                            break;
                                        case "colored_color": 
                                            $leftMenu["ICO_LEFT_MENU_COLOR_1"] = "light";
                                            $leftMenu["ICO_LEFT_MENU_COLOR_2"] = "light";
                                            break;
                                    }
                                }                                
         
                                if($leftMenu["PICTURE_SECTION_HOVER"] == "ICO" || $leftMenu["PICTURE_SECTION_HOVER"] == "ICO_DEFAULT") {
                                    echo $leftMenu["STYLE_MENU_HOVER"];
                                    switch($leftMenu["STYLE_MENU_HOVER"]) {
                                        case "colored_light": 
                                            $leftMenu["ICO_LEFT_MENU_HOVER_COLOR_1"] = "dark";
                                            $leftMenu["ICO_LEFT_MENU_HOVER_COLOR_2"] = "color";
                                            break;
                                        case "colored_dark": 
                                            $leftMenu["ICO_LEFT_MENU_HOVER_COLOR_1"] = "light";
                                            $leftMenu["ICO_LEFT_MENU_HOVER_COLOR_2"] = "light";
                                            break;
                                        case "colored_color":
                                            $leftMenu["ICO_LEFT_MENU_HOVER_COLOR_1"] = "light";
                                            $leftMenu["ICO_LEFT_MENU_HOVER_COLOR_2"] = "light";
                                            break;
                                    }
                                }
                            
                                $wizard->SetVar("leftMenu", $leftMenu);
                                
                        }else{
				$this->setError('ERROR');
				return false;
			}

		}
	}

	function ShowStep()
	{
                $wizard =& $this->GetWizard();

		$arLangFactory = GetMessage('LEFT_MENU_SETTINGS');

		if (strlen($arLangFactory["DESCRIPTION"])>0){
			$this->content .= '<div style="margin-bottom:12px;" class="inst-template-list-block">
			'.$arLangFactory["DESCRIPTION"].'
			</div>';
		}
                
                $defaultValue = $wizard->getVars();
		if (strlen($defaultValue['wizLeftMenu']['HoverSettings_with_catalog_vs_version_v1_vs_RESPONSIVE_LG'])){
			$defaultValue['wizLeftMenu']['HoverSettings_with_catalog_vs_version_v1_vs_RESPONSIVE_LG'] = 2;
		};
		if (strlen($defaultValue['wizLeftMenu']['HoverSettings_with_catalog_vs_version_v1_vs_RESPONSIVE_MD'])){
			$defaultValue['wizLeftMenu']['HoverSettings_with_catalog_vs_version_v1_vs_RESPONSIVE_MD'] = 2;
		};
		$wizard->setVar('wizLeftMenu',$defaultValue['wizLeftMenu']);
                
                $this->content .= '<div class="inst-template-list-block">';

		$arMenuDefaultHoverTemplates = array(
			'classic'=>array(
				"NAME"=> strlen($arLangFactory['menu_hover_classic'])>0 ? $arLangFactory['menu_hover_classic'] : 'list',
				"SETTINGS"=>array(
					"STYLE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'colored_light' => strlen($arLangFactory['menu_hover_classic_colored_light'])>0 ? $arLangFactory['menu_hover_classic_colored_light'] : 'colored_light',
                                                        'colored_dark' => strlen($arLangFactory['menu_hover_classic_colored_dark'])>0 ? $arLangFactory['menu_hover_classic_colored_dark'] : 'colored_dark',
							'colored_color' => strlen($arLangFactory['menu_hover_classic_colored_color'])>0 ? $arLangFactory['menu_hover_classic_colored_color'] : 'colored_color',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_classic_style'])>0 ? $arLangFactory['menu_hover_classic_style'] : 'STYLE',
					),
					"SECTION_IMAGE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'N' => strlen($arLangFactory['menu_hover_classic_icon_none'])>0 ? $arLangFactory['menu_hover_classic_icon_none'] : 'NONE',
							'ICO' => strlen($arLangFactory['menu_hover_classic_icon_ico'])>0 ? $arLangFactory['menu_hover_classic_icon_ico'] : 'ICO',
							'ICO_DEFAULT' => strlen($arLangFactory['menu_hover_classic_icon_default'])>0 ? $arLangFactory['menu_hover_classic_icon_default'] : 'DEFAULT',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_section_image'])>0 ? $arLangFactory['menu_hover_section_image'] : 'ICON SECTION_IMAGE',
                    			)
				)
			),
			'list'=>array(
				"NAME"=> strlen($arLangFactory['menu_hover_list'])>0 ? $arLangFactory['menu_hover_list'] : 'list',
				"SETTINGS"=>array(
					"STYLE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'colored_light' => strlen($arLangFactory['menu_hover_classic_colored_light'])>0 ? $arLangFactory['menu_hover_classic_colored_light'] : 'colored_light',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_classic_style'])>0 ? $arLangFactory['menu_hover_classic_style'] : 'STYLE',
					),
					"SECTION_IMAGE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'N' => strlen($arLangFactory['menu_hover_section_image_none'])>0 ? $arLangFactory['menu_hover_classic_icon_none'] : 'NONE',
							'ICON' => strlen($arLangFactory['menu_hover_section_image_icon'])>0 ? $arLangFactory['menu_hover_section_image_icon'] : 'ICO',
							'ICO_DEFAULT' => strlen($arLangFactory['menu_hover_section_default'])>0 ? $arLangFactory['menu_hover_section_default'] : 'ICON DEFAULT',
							'IMG' => strlen($arLangFactory['menu_hover_section_image'])>0 ? $arLangFactory['menu_hover_section_image'] : 'IMAGE',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_section_image'])>0 ? $arLangFactory['menu_hover_section_image'] : 'ICON SECTION_IMAGE',
					),
					"PARENT_SECTION_IMAGE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'N' => strlen($arLangFactory['menu_hover_classic_category_image_none'])>0 ? $arLangFactory['menu_hover_classic_category_image_none'] : 'NONE',
							'LEFT' => strlen($arLangFactory['menu_hover_classic_category_image_left'])>0 ? $arLangFactory['menu_hover_classic_category_image_left'] : 'ICO',
							'RIGHT' => strlen($arLangFactory['menu_hover_classic_category_image_right'])>0 ? $arLangFactory['menu_hover_classic_category_image_right'] : 'ICO',
						),
						'NAME'=>strlen($arLangFactory['menu_hover_parent_image'])>0 ? $arLangFactory['menu_hover_parent_image'] : 'CATEGORY_IMAGE',
					),
					"RESPONSIVE_LG"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'3' => 3,
							'2' => 2,

						),
						'NAME'=>strlen($arLangFactory['menu_hover_responsive_lg'])>0 ? $arLangFactory['menu_hover_responsive_lg'] : 'RESPONSIVE LG',
					),
					"RESPONSIVE_MD"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'3' => 3,
							'2' => 2,

						),
						'NAME'=>strlen($arLangFactory['menu_hover_responsive_md'])>0 ? $arLangFactory['menu_hover_responsive_md'] : 'RESPONSIVE MD',
					)
				)
			)
		);


		$arMenuDefaultTemplates = array(
			'left'=>array(
				"NAME"=> strlen($arLangFactory['menu_template_left'])>0 ? $arLangFactory['menu_template_left'] : 'left',
				"SETTINGS"=>array(
					"STYLE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'colored_light' => strlen($arLangFactory['menu_template_left_colored_light'])>0 ? $arLangFactory['menu_template_left_colored_light'] : 'colored_light',
							'colored_dark' => strlen($arLangFactory['menu_template_left_colored_dark'])>0 ? $arLangFactory['menu_template_left_colored_dark'] : 'colored_dark',
							'colored_color' => strlen($arLangFactory['menu_template_left_colored_color'])>0 ? $arLangFactory['menu_template_left_colored_color'] : 'colored_color',
						),
						'NAME'=>strlen($arLangFactory['menu_template_left_style'])>0 ? $arLangFactory['menu_template_left_style'] : 'STYLE',
					),
                                        "PICTURE_SECTION"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'N' => strlen($arLangFactory['menu_section_image_none'])>0 ? $arLangFactory['menu_section_image_none'] : 'N',
							'ICO' => strlen($arLangFactory['menu_section_image_icon'])>0 ? $arLangFactory['menu_section_image_icon'] : 'ICO',
							'ICO_DEFAULT' => strlen($arLangFactory['menu_section_default'])>0 ? $arLangFactory['menu_section_default'] : 'ICO_DEFAULT',
						),
						'NAME'=>strlen($arLangFactory['menu_section_image'])>0 ? $arLangFactory['menu_section_image'] : 'PICTURE_SECTION',
					),
                                        "SUBMENU"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'ACTIVE_SHOW' => strlen($arLangFactory['menu_submenu_active_show'])>0 ? $arLangFactory['menu_submenu_active_show'] : 'ACTIVE_SHOW',
							'SHOW' => strlen($arLangFactory['menu_submenu_show'])>0 ? $arLangFactory['menu_submenu_show'] : 'SHOW',
							'NOT_SHOW' => strlen($arLangFactory['menu_submenu_not_show'])>0 ? $arLangFactory['menu_submenu_not_show'] : 'NOT_SHOW',
						),
						'NAME'=>strlen($arLangFactory['menu_submenu'])>0 ? $arLangFactory['menu_submenu'] : 'SUBMENU',
					),
				),
				"HOVERS" => array(),
			),
                        'left_hover'=>array(
				"NAME"=> strlen($arLangFactory['menu_template_left_hover'])>0 ? $arLangFactory['menu_template_left_hover'] : 'left_hover',
				"SETTINGS"=>array(
					"STYLE"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'colored_light' => strlen($arLangFactory['menu_template_left_colored_light'])>0 ? $arLangFactory['menu_template_left_colored_light'] : 'colored_light',
							'colored_dark' => strlen($arLangFactory['menu_template_left_colored_dark'])>0 ? $arLangFactory['menu_template_left_colored_dark'] : 'colored_dark',
							'colored_color' => strlen($arLangFactory['menu_template_left_colored_color'])>0 ? $arLangFactory['menu_template_left_colored_color'] : 'colored_color',
						),
						'NAME'=>strlen($arLangFactory['menu_template_left_style'])>0 ? $arLangFactory['menu_template_left_style'] : 'STYLE',
					),/*+*/
                                        "PICTURE_SECTION"=>array(
						'TYPE'=>'select',
						'VALUES'=>array(
							'N' => strlen($arLangFactory['menu_section_image_none'])>0 ? $arLangFactory['menu_section_image_none'] : 'N',
							'ICO' => strlen($arLangFactory['menu_section_image_icon'])>0 ? $arLangFactory['menu_section_image_icon'] : 'ICO',
							'ICO_DEFAULT' => strlen($arLangFactory['menu_section_default'])>0 ? $arLangFactory['menu_section_default'] : 'ICO_DEFAULT',
						),
						'NAME'=>strlen($arLangFactory['menu_section_image'])>0 ? $arLangFactory['menu_section_image'] : 'PICTURE_SECTION',
                                        ),
                                ),                              
				"HOVERS" => $arMenuDefaultHoverTemplates,
			),

		);


		$arMenuSelect = array(
			/*"only_catalog" => array(
				"NAME" => strlen($arLangFactory['only_catalog'])>0 ? $arLangFactory['only_catalog'] : 'only_catalog',
				"TEMPLATES" => $arMenuDefaultTemplates,

			),
			"with_catalog" => array(
				"NAME" => strlen($arLangFactory['with_catalog'])>0 ? $arLangFactory['with_catalog'] : 'with_catalog',
				"TEMPLATES" => $arMenuDefaultTemplates,
			),*/
                        "widthout_catalog" => array(
				"NAME" => strlen($arLangFactory['widthout_catalog'])>0 ? $arLangFactory['widthout_catalog'] : 'widthout_catalog',
				"TEMPLATES" => $arMenuDefaultTemplates,
			)
		);

                if(count($arMenuSelect)>1)
                    $this->content .= '<div class="inst-template-description" style="height: auto">';
                else
                    $this->content .= '<div class="inst-template-description" style="display:none;height: auto">';

		$this->content .= '<h2>'.GetMessage('MENU_TYPE_SELECT').'</h2>';

		$arMenyTypes = array();

		foreach($arMenuSelect as $cell=>$val){
			$arMenyTypes[$cell] = $val["NAME"];
		}
                
                $this->content .= $this->ShowSelectField("wizLeftMenu[MenuType]", $arMenyTypes, array("id"=>"left_menu_type"));

		$this->content .= "</div>";
                
                foreach($arMenuSelect as $cell=>$val){

			$this->content .= '<div class="inst-template-description left_menu_types left_menu_type_'.$cell.'" style="height: auto">';
			$this->content .= '<h2>'.GetMessage('MENU_TEMPLATE_SELECT').'</h2>';

			foreach($val["TEMPLATES"] as $cell2=>$val2){
				$arTemplatesTypes[$cell2] = $val2["NAME"];

			};

			$this->content .= $this->ShowSelectField("wizLeftMenu[MenuTemplate_$cell]", $arTemplatesTypes, array("id"=>"left_menu_template_".$cell));
			$this->content .= "<br />";
			$this->content .= '</div>';
		}

		foreach($arMenuSelect as $cell=>$val){
			foreach($val["TEMPLATES"] as $cell2=>$val2){
				$this->content .= '<div class="inst-template-description menu_templates menu_template_'.$cell.'_'.$cell2.'" style="height: auto">';
				$this->content .= '<h2>'.GetMessage('MENU_TEMPLATE_SETTINGS').'</h2>';
				foreach($val2["SETTINGS"] as $cell3=>$val3){
					if ($val3["TYPE"] == "select"){
						$this->content .= "<label for="."wizLeftMenuSettings_$cell".'_vs_'.$cell2."_vs_".$cell3." style='cursor:pointer; margin: 30px 0'>".$val3["NAME"]."</label><br />";
						$this->content .= $this->ShowSelectField("wizLeftMenu[MenuSettings_$cell".'_vs_'.$cell2."_vs_".$cell3."]", $val3["VALUES"], array("id"=>"_menu_settings_$cell".'_vs_'.$cell2.'_vs_'.$cell3));
						$this->content .= '<br>';
						$this->content .= '<br>';
					}
					if ($val3["TYPE"] == "checkbox"){
						$this->content .= $this->ShowCheckboxField("wizLeftMenu[MenuSettings_$cell".'_vs_'.$cell2."_vs_".$cell3."]", $val3["VALUE"], array("id"=>"_menu_settings_$cell".'_vs_'.$cell2.'_vs_'.$cell3));
						$this->content .= "<label for="."_menu_settings_$cell".'_vs_'.$cell2."_vs_".$cell3."  style='cursor:pointer; margin: 30px 0'>".$val3["NAME"]."</label>";
						$this->content .= '<br>';
						$this->content .= '<br>';
					}

				};

				$hoverValues= array();

                                if(!empty($val2["HOVERS"])):
                                    foreach($val2["HOVERS"] as $cell4=>$val4){
                                            $hoverValues[$cell4] = $val4["NAME"];
                                    }

                                    $cell3 = 'hover_template';
                                    $this->content .= "<label for="."_menu_hover_$cell".'_vs_'.$cell2."_vs_".$cell3."  style='cursor:pointer; margin: 30px 0'>".GetMessage('MENU_HOVER_TEMPLATE')."</label>";
                                    $this->content .= '<br>';
                                    $this->content .= $this->ShowSelectField("wizLeftMenu[MenuSettings_$cell".'_vs_'.$cell2."_vs_".$cell3."]", $hoverValues, array("id"=>"_menu_hover_$cell".'_vs_'.$cell2.'_vs_'.$cell3, "class"=>"hover_selector"));
                                    $this->content .= '<br>';
                                    $this->content .= '<br>';

                                    $this->content .= '</div>';

                                    foreach($val2["HOVERS"] as $cell4=>$val4){
                                            $this->content .= '<div class="inst-template-description menu_hovers menu_hover_'.$cell.'_'.$cell2.'_'.$cell4.'" style="height: auto">';
                                            $this->content .= '<h2>'.GetMessage('MENU_HOVER_SETTINGS').'</h2>';
                                            foreach($val4["SETTINGS"] as $cell3=>$val3){
                                                    if ($val3["TYPE"] == "select"){
                                                            $this->content .= "<label for="."wizLeftMenuSettings_$cell".'_vs_'.$cell2."_vs_".$cell4."_vs_".$cell3." style='cursor:pointer; margin: 30px 0'>".$val3["NAME"]."</label><br />";
                                                            $this->content .= $this->ShowSelectField("wizLeftMenu[HoverSettings_$cell".'_vs_'.$cell2."_vs_".$cell4."_vs_".$cell3."]", $val3["VALUES"], array("id"=>"_menu_settings_$cell".'_vs_'.$cell2.'_vs_'.$cell4."_vs_".$cell3));
                                                            $this->content .= '<br>';
                                                            $this->content .= '<br>';
                                                    }
                                                    if ($val3["TYPE"] == "checkbox"){
                                                            $this->content .= $this->ShowCheckboxField("wizLeftMenu[HoverSettings_$cell".'_vs_'.$cell2."_vs_".$cell4."_vs_".$cell3."]", $val3["VALUE"], array("id"=>"_menu_settings_$cell".'_vs_'.$cell2.'_vs_'.$cell4."_vs_".$cell3));
                                                            $this->content .= "<label for="."_menu_settings_$cell".'_vs_'.$cell2."_vs_".$cell4."_vs_".$cell3."  style='cursor:pointer; margin: 30px 0'>".$val3["NAME"]."</label>";
                                                            $this->content .= '<br>';
                                                            $this->content .= '<br>';
                                                    }

                                            };
                                            $this->content .= '</div>';
                                    };
                                else:
                                    $this->content .= '</div>';
                                endif;

			};


		}


		$this->content .= "</div>";
                
                $this->content .= "</div>";

		global $APPLICATION;
		//$APPLICATION->AddHeadScript();

		$this->content .= "
		<script src='".$wizard->GetPath().'/site/templates/business/js/jquery-2.1.4.js'."'>
		</script>

		<script>
                $(document).ready(function(){

                        function changeMenuType(){
                                value = $('#left_menu_type').val();

                                $('.left_menu_types').hide();
                                $('.left_menu_types.left_menu_type_'+value).show();                                
                        };

                        function changeMenuTemplate(){
                                value = $('#left_menu_type').val();
                                value2 = $('#left_menu_template_'+value).val();
                                console.log(value+' '+value2);

                                $('.menu_templates').hide();
                                $('.menu_templates.menu_template_'+value+'_'+value2).show();

                        };

                        function changeMenuHover(){
                                value = $('#left_menu_type').val();
                                value2 = $('#left_menu_template_'+value).val();
                                value3 = $('#_menu_hover_'+value+'_vs_'+value2+'_vs_hover_template').val();
                                console.log(value+' '+value2+' '+value3);
                                console.log('.menu_hovers.menu_hover_'+value+'_'+value2+'_'+value3);

                                $('.menu_hovers').hide();
                                $('.menu_hovers.menu_hover_'+value+'_'+value2+'_'+value3).show();

                        };

                        $(document).on(
                        'change',
                        '#left_menu_type',
                        function(){
                                changeMenuType();
                                changeMenuTemplate();
                                changeMenuHover();
                        }
                        );

                        $(document).on(
                        'change',
                        '.left_menu_types',
                        function(){
                                changeMenuTemplate();
                                changeMenuHover();
                        }
                        );

                        $(document).on(
                        'change',
                        '.hover_selector',
                        function(){
                                changeMenuHover();
                        }
                        );

                        changeMenuType();
                                changeMenuTemplate();
                                changeMenuHover();

                        })
                </script>";

		$this->content .="
		<style>
                    .menu_templates, .menu_types, .menu_hovers{
                    display: none;
		}

		.inst-template-description INPUT, .inst-template-description select{
                    font-size: 18px;
                    padding: 5px 10px;
                    cursor: pointer;
		}

		.inst-template-description{
                    border: 1px solid #CCC;
                    margin-bottom: 15px;
		}
		</style>";
                
	}
}

class SelectColorStep extends CSelectTemplateWizardStep
{
	function InitStep()
	{
		$this->SetStepID("select_color");
		$this->SetTitle(GetMessage("SELECT_COLOR_TITLE"));
		$this->SetSubTitle(GetMessage("SELECT_COLOR_SUBTITLE"));

		if (!CModule::IncludeModule('alexkova.business'))
		{
			$this->SetError(GetMessage('SHOW_NOT_ACCESS_CORPORATE_MODULE'));
			return false;
		}
                
                $this->SetNextStep("data_install");
		$this->SetPrevStep("select_left_menu");

		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
		$this->SetPrevCaption(GetMessage("PREVIOUS_BUTTON"));
	}

	function OnPostForm()
	{
                $wizard =& $this->GetWizard();

		$proactive = COption::GetOptionString("statistic", "DEFENCE_ON", "N");
		if ($proactive == "Y")
		{
			COption::SetOptionString("statistic", "DEFENCE_ON", "N");
			$wizard->SetVar("proactive", "Y");
		}
		else
		{
			$wizard->SetVar("proactive", "N");
		}

		if ($wizard->IsNextButtonClick())
		{

			//echo "<pre>"; print_r($wizard->GetVars()); echo "</pre>";

			$lessDetail = $wizard->GetVar("wizLESS");

			if (strlen($lessDetail['color'])>0){
				$wizard->SetVar("wizLESS", $lessDetail);
			}else{
				$this->setError(GetMessage("wiz_color"));
				return false;
			}

		}
	}

	function ShowStep()
	{
                $wizard =& $this->GetWizard();

		$arLangFactory = GetMessage('COLOR_SETTINGS');

		if (strlen($arLangFactory["DESCRIPTION"])>0){
			$this->content .= '<div style="margin-bottom:12px;" class="inst-template-list-block">
			'.$arLangFactory["DESCRIPTION"].'
			</div>';
		}
                
                $lessDetail = $wizard->GetVar("wizLESS");
                
                if(!isset($lessDetail["less_darken"]) || $lessDetail["less_darken"]<=0)
                    $lessDetail["less_darken"] = "15";
                
                if(!isset($lessDetail["less_lighten"]) || $lessDetail["less_lighten"]<=0)
                    $lessDetail["less_lighten"] = "15";

				if (strlen($lessDetail['color'])<=0) {
					$lessDetail['color'] = '#f44336';
					$wizard->SetVar("wizLESS", $lessDetail);
					$lessDetail = $wizard->GetVar("wizLESS");
				}

                
                $this->content .= '<div class="inst-template-list-block">';                
                $this->content .= $this->ShowInputField("text", "wizLESS[color]", array("id"=>"color-base", "class"=>""));
                $this->content .= '</div>';
                
                
                $this->content .= '<div style="margin-top:18px;" class="inst-template-list-block">';                
                $this->content .= '<label style="margin-bottom:2px;" for="less-darken-val" class="inst-template-list-label" style="cursor: pointer">'.$arLangFactory["less-darken-val"]."</label>";
		$this->content .= $this->ShowInputField("text", "wizLESS[less_darken]", array("id"=>"less-darken-val", "class"=>"", "readonly"=>"readonly", "style"=>"margin-left:15px;width:50px;border:0; color:#900; font-weight:bold; font-size: 20px"));
                $this->content .= '<div style="margin-top:5px;" id="less-darken"></div>';               
                $this->content .= '</div>';
                
                $this->content .= '<div style="margin-top:18px;" class="inst-template-list-block">';                
                $this->content .= '<label style="margin-bottom:2px;" for="less-lighten-val" class="inst-template-list-label" style="cursor: pointer">'.$arLangFactory["less-lighten-val"]."</label>";
		$this->content .= $this->ShowInputField("text", "wizLESS[less_lighten]", array("id"=>"less-lighten-val", "class"=>"", "readonly"=>"readonly", "style"=>"margin-left:15px;width:50px;border:0; color:#900; font-weight:bold; font-size: 20px"));
                $this->content .= '<div style="margin-top:5px;" id="less-lighten"></div>';               
                $this->content .= '</div>';
                                                
                $this->content .= "
                    <script src='".$wizard->GetPath()."/site/templates/business/js/jquery-1.11.3.js"."'></script>
                    <script src='/bitrix/tools/alexkova.business/spectrum/spectrum.js'></script>
                    <script src='/bitrix/tools/alexkova.business/ui/jquery-ui.js'></script>
                    
                    <script>                    
                        $(document).ready(function(){
                            if (document.createStyleSheet){
                                document.createStyleSheet('/bitrix/tools/alexkova.business/spectrum/spectrum.css');
                                document.createStyleSheet('/bitrix/tools/alexkova.business/ui/jquery-ui.css');
                            }
                            else {
                                $(\"head\").append($(\"<link rel='stylesheet' href='/bitrix/tools/alexkova.business/spectrum/spectrum.css' type='text/css' media='screen' />\"));
                                $(\"head\").append($(\"<link rel='stylesheet' href='/bitrix/tools/alexkova.business/ui/jquery-ui.css' type='text/css' media='screen' />\"));
                            }
                            
                            $(\"#color-base\").spectrum({
                                preferredFormat: 'hex',
                                showInput: true,
                                showPalette: true,
                                palette: [['#F44336','#E91E63','#9C27B0','#7E57C2','#5C6BC0'],['#2196F3','#039BE5','#0097A7','#009688','#43A047'],['#689F38','#827717','#F9A825','#FF9800','#EF6C00'],['#FF5722','#795548','#757575','#607D8B','#000000']],
                                change: function(color) {
                                    $(\"#color-base\").val(color.toHexString());
                                }
                            });
                            
                            
                            $(\"#less-darken\").slider({
                                value: ". $lessDetail["less_darken"] .",
                                min: 0,
                                max: 30,
                                step: 5,
                                slide: function( event, ui ) {
                                   $(\"#less-darken-val\").val( ui.value);
                                }
                            });
                            
                            $(\"#less-darken-val\").val($(\"#less-darken\").slider(\"value\"));
                            
                            $(\"#less-lighten\").slider({
                                value: ". $lessDetail["less_lighten"] .",
                                min: 0,
                                max: 30,
                                step: 5,
                                slide: function( event, ui ) {
                                   $(\"#less-lighten-val\").val( ui.value);
                                }
                            });
                            
                            $(\"#less-lighten-val\").val($(\"#less-lighten\").slider(\"value\"));


                         });               
                    </script>
                ";

	}
}

/*
class SiteSettingsStep extends CSiteSettingsWizardStep
{
	function InitStep()
	{
		$wizard =& $this->GetWizard();
		$this->SetStepID("site_settings");

		$wizard->solutionName = "alexkova.business";
		parent::InitStep();

		$this->SetNextCaption(GetMessage("NEXT_BUTTON"));
		$this->SetTitle(GetMessage("WIZ_STEP_SITE_SET"));

		$siteID = $wizard->GetVar("siteID");

		if(COption::GetOptionString("alexkova.business", "wizard_installed", "N", $siteID) == "Y" && !WIZARD_INSTALL_DEMO_DATA)
			$this->SetNextStep("data_install");
		else
		{
			$this->SetNextStep("catalog_settings");
		}

		$this->SetPrevStep("select_color");

		$wizard->SetDefaultVars(
			Array(
				"shopEmail" => COption::GetOptionString("alexkova.business", "shopEmail", "sale@".$_SERVER["SERVER_NAME"], $siteID),
				"siteMetaDescription" => GetMessage("wiz_site_desc"),
				"siteMetaKeywords" => GetMessage("wiz_keywords"),
			)
		);



	}

	function ShowStep()
	{
		$wizard =& $this->GetWizard();

		$this->content .= '<div class="wizard-input-form">'.$wizard->GetID();

		if(LANGUAGE_ID != "ru")
		{
			$this->content .= '<div class="wizard-input-form-block">
				<label for="shopEmail" class="wizard-input-title">'.GetMessage("WIZ_SHOP_EMAIL").'</label>
				'.$this->ShowInputField('text', 'shopEmail', array("id" => "shopEmail", "class" => "wizard-field")).'
			</div>';
		}

		$firstStep = COption::GetOptionString("main", "wizard_first" . substr($wizard->GetID(), 7)  . "_" . $wizard->GetVar("siteID"), false, $wizard->GetVar("siteID"));
		$styleMeta = 'style="display:block"';
		if($firstStep == "Y") $styleMeta = 'style="display:none"';

		$this->content .= '
		<div  id="bx_metadata" '.$styleMeta.'>
			<div class="wizard-input-form-block">
				<div class="wizard-metadata-title">'.GetMessage("wiz_meta_data").'</div>
				<label for="siteMetaDescription" class="wizard-input-title">'.GetMessage("wiz_meta_description").'</label>
				'.$this->ShowInputField("textarea", "siteMetaDescription", Array("id" => "siteMetaDescription", "rows"=>"3", "class" => "wizard-field")).'
			</div>';
		$this->content .= '
			<div class="wizard-input-form-block">
				<label for="siteMetaKeywords" class="wizard-input-title">'.GetMessage("wiz_meta_keywords").'</label><br>
				'.$this->ShowInputField('text', 'siteMetaKeywords', array("id" => "siteMetaKeywords", "class" => "wizard-field")).'
			</div>
		</div>';

//install Demo data
		if($firstStep == "Y")
		{
			$this->content .= '
			<div class="wizard-input-form-block"'.(LANGUAGE_ID != "ru" ? ' style="display:none"' : '').'>
				'.$this->ShowCheckboxField(
					"installDemoData",
					"Y",
					(array("id" => "installDemoData", "onClick" => "if(this.checked == true){document.getElementById('bx_metadata').style.display='block';}else{document.getElementById('bx_metadata').style.display='none';}"))
				).'
				<label for="installDemoData">'.GetMessage("wiz_structure_data").'</label>
			</div>';
		}
		else
		{
			$this->content .= $this->ShowHiddenField("installDemoData","Y");
		}

		if(LANGUAGE_ID != "ru")
		{
			if (CModule::IncludeModule("catalog"))
			{
				$db_res = CCatalogGroup::GetGroupsList(array("CATALOG_GROUP_ID"=>'1', "BUY"=>"Y", "GROUP_ID"=>2));
				if (!$db_res->Fetch())
				{
					$this->content .= '
					<div class="wizard-input-form-block">
						<label for="shopAdr">'.GetMessage("WIZ_SHOP_PRICE_BASE_TITLE").'</label>
						<div class="wizard-input-form-block-content">
							'. GetMessage("WIZ_SHOP_PRICE_BASE_TEXT1") .'<br><br>
							'. $this->ShowCheckboxField("installPriceBASE", "Y",
							(array("id" => "install-demo-data")))
						. ' <label for="install-demo-data">'.GetMessage("WIZ_SHOP_PRICE_BASE_TEXT2").'</label><br />

						</div>
					</div>';
				}
			}
		}

		$this->content .= '</div>';
	}
	function OnPostForm()
	{
		$wizard =& $this->GetWizard();
		//$res = $this->SaveFile("siteLogo", Array("extensions" => "gif,jpg,jpeg,png", "max_height" => 40, "max_width" => 280, "make_preview" => "Y"));
	}
}
*/

class DataInstallStep extends CDataInstallWizardStep
{
	function CorrectServices(&$arServices)
	{
		if($_SESSION["BX_ESHOP_LOCATION"] == "Y")
			$this->repeatCurrentService = true;
		else
			$this->repeatCurrentService = false;

		$wizard =& $this->GetWizard();
		if($wizard->GetVar("installDemoData") != "Y")
		{
		}
	}
}

class FinishStep extends CFinishWizardStep
{
	function InitStep()
	{
		$this->SetStepID("finish");
		$this->SetNextStep("finish");
		$this->SetTitle(GetMessage("FINISH_STEP_TITLE"));
		$this->SetNextCaption(GetMessage("wiz_go"));  
	}

	function ShowStep()
	{
		$wizard =& $this->GetWizard();		   
		if ($wizard->GetVar("proactive") == "Y")
			COption::SetOptionString("statistic", "DEFENCE_ON", "Y");
		
		$siteID = WizardServices::GetCurrentSiteID($wizard->GetVar("siteID"));
		$rsSites = CSite::GetByID($siteID);
		$siteDir = "/"; 
		if ($arSite = $rsSites->Fetch())
			$siteDir = $arSite["DIR"]; 

		$wizard->SetFormActionScript(str_replace("//", "/", $siteDir."/?finish"));

		$this->CreateNewIndex();
		
		COption::SetOptionString("main", "wizard_solution", $wizard->solutionName, false, $siteID);

		$this->content .=
			'<table class="wizard-completion-table">
				<tr>
					<td class="wizard-completion-cell">'
						.GetMessage("FINISH_STEP_CONTENT").
					'</td>
				</tr>
			</table>';
	//	$this->content .= "<br clear=\"all\"><a href=\"/bitrix/admin/wizard_install.php?lang=".LANGUAGE_ID."&site_id=".$siteID."&wizardName=bitrix:eshop.mobile&".bitrix_sessid_get()."\" class=\"button-next\"><span id=\"next-button-caption\">".GetMessage("wizard_store_mobile")."</span></a><br>";

		if ($wizard->GetVar("installDemoData") == "Y")
			$this->content .= GetMessage("FINISH_STEP_REINDEX");		
			
		
	}

}
?>