<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/install/wizard_sol/wizard.php");

class SelectSiteStep extends CWizardStep
{
	function InitStep()
	{
		parent::InitStep();

		$wizard =& $this->GetWizard();
		$wizard->solutionName = "alexkova.business";

		$this->SetStepID("select_site");

		$this->SetNextStep("data_install");
		$this->SetTitle(GetMessage('ADV_CORPORATE_STEP'));


		if (!CModule::IncludeModule('advertising') && !CModule::IncludeModule('alexkova.rklite'))
		{
			$this->SetError(GetMessage('SHOW_NOT_ACCESS_ADV'));
			return false;
		}
	}

	function OnPostForm()
	{
		$wizard =& $this->GetWizard();
		$siteID = $wizard->GetVar("wizardSiteID");

		if ($wizard->IsNextButtonClick())
		{
			$wizard->SetVar("wizardSiteID", $siteID);
		}
	}

	function ShowStep()
	{
		$wizard =& $this->GetWizard();

		$arSites = array();
		$rsSites = CSite::GetList($by="sort", $order="desc", Array());
		while ($arSite = $rsSites->Fetch())
		{
			$arSites[$arSite["ID"]] = "[{$arSite["ID"]}]".$arSite["NAME"];
		}

		$this->content .= GetMessage('ADV_CORPORATE_INFO');

		$this->content .= '<div class="inst-template-list-block" style="margin-bottom: 20px; padding: 10px">';
		$this->content .= GetMessage('ADV_CORPORATE_SITE_SELECT');

		$this->content .= $this->ShowSelectField(
			"wizardSiteID",
			$arSites,
			Array()
		);

		$this->content .= "</div>";

	}
}

class DataInstallStep extends CDataInstallWizardStep
{
	function InitStep()
	{
		$this->SetStepID("data_install");
		$this->SetTitle(GetMessage("DATA_STEP_TITLE"));
		$this->SetNextCaption(GetMessage("wiz_go"));
	}
	function CorrectServices(&$arServices)
	{
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