<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);
?>
<nav class="bxr-mobile-push-menu">
	<div class="bxr-mobile-push-menu-header">
		<a class="bxr-mobile-menu-button bxr-mobile-menu-button-home" data-target='home' href="/">
			<span class="fa fa-home"></span>
		</a>
		<div class="bxr-mobile-menu-button bxr-mobile-menu-button-open" data-target='menu'>
			<span class="fa fa-bars"></span>
		</div>
		<div class="bxr-mobile-menu-button bxr-mobile-menu-button-close" data-target='menu'>
			<span class="fa fa-bars"></span>
		</div>

		<?if ($arParams["BXR_MOBILE_SHOW_USER_FORM"] == "Y"):?>
			<div class="bxr-mobile-menu-button bxr-mobile-menu-button-user pull-right" data-target='user'>
				<span class="fa fa-user"></span>
			</div>
		<?endif;?>

		<?if ($arParams["BXR_MOBILE_SHOW_ANSWER_FORM"] == "Y"):?>
			<div class="bxr-mobile-menu-button bxr-mobile-menu-button-contacts pull-right"  data-target='answer'>
				<span class="fa fa-envelope"></span>
			</div>
		<?endif;?>

		<?if ($arParams["BXR_MOBILE_SHOW_PHONE_FORM"] == "Y"):?>
			<div class="bxr-mobile-menu-button bxr-mobile-menu-button-phone pull-right" data-target='phone'>
				<span class="fa fa-phone"></span>
			</div>
		<?endif;?>

		<?if ($arParams["BXR_MOBILE_SHOW_SEARCH_FORM"] == "Y"):?>
			<div class="bxr-mobile-menu-button bxr-mobile-menu-button-search pull-right" data-target='search'>
				<span class="fa fa-search"></span>
			</div>
		<?endif;?>





	</div>

	<?if ($arParams["BXR_MOBILE_SHOW_PHONE_FORM"] == "Y"):?>
		<div id="bxr-mobile-phone" class="bxr-mobile-slide">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 tb30">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"named_area",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/mobile_phone.php",
								"INCLUDE_PTITLE" => GetMessage("GHANGE_MOBILE_PHONE")
							),
							false
						);?>
					</div>
				</div>
			</div>
		</div>
	<?endif;?>

	<?if ($arParams["BXR_MOBILE_SHOW_ANSWER_FORM"] == "Y"):?>
		<div id="bxr-mobile-contacts" class="bxr-mobile-slide">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 tb20">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"named_area",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/mobile_contacts.php",
								"INCLUDE_PTITLE" => GetMessage("GHANGE_MOBILE_CONTACTS")
							),
							false
						);?>
					</div>
				</div>
			</div>
		</div>
	<?endif;?>

	<?if ($arParams["BXR_MOBILE_SHOW_SEARCH_FORM"] == "Y"):?>
		<div id="bxr-mobile-search" class="bxr-mobile-slide">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 tb30">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"named_area",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => SITE_DIR."include/mobile_search.php",
								"INCLUDE_PTITLE" => GetMessage("GHANGE_MOBILE_SEARCH")
							),
							false
						);?>
					</div>
				</div>
			</div>
		</div>
	<?endif;?>





	<?if ($arParams["BXR_MOBILE_SHOW_USER_FORM"] == "Y"):?>
		<div id="bxr-mobile-user" class="bxr-mobile-slide">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 tb30">
						<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_login_frame");
						$basketFrame->begin();?>
						<?$APPLICATION->IncludeComponent(
							"bitrix:system.auth.form",
							"popup",
							array(
								"REGISTER_URL" => SITE_DIR."auth/",
								"FORGOT_PASSWORD_URL" => SITE_DIR."auth/",
								"PROFILE_URL" => SITE_DIR."profile/",
								"SHOW_ERRORS" => "Y",
								"COMPONENT_TEMPLATE" => "popup"
							),
							false
						);?>
						<?$basketFrame->beginStub();
						echo "...";
						$basketFrame->end();?>
					</div>
				</div>
			</div>
		</div>
	<?endif;?>



	<div class="bxr-mobile-push-menu-content">

		<div id="bxr-mobile-menu-body">

			<?if (!empty($arResult)):?>
			<ul id="bxr-multilevel-menu" data-child="0">
				<div class="title bxr-color">MENU</div>
				<?
				$previousLevel = 0;

				foreach($arResult as $cell=>$arItem):?>

			<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
				<?=str_repeat("</ul>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
			<?endif?>

			<?if ($arItem["IS_PARENT"]):

			$oldparent = $cell;
			$parent = $cell++;
			?>

				<? if(in_array($arItem['PARAMS']['ID'], getIndexes())): ?>
				<div class="parent" data-parent="<?=$parent?>" data-child="<?=$oldparent?>" text-js='<?=$arItem["TEXT"]?> <span class="direction fa fa-chevron-right"></span>'></div>
				<? else: ?>
				<div class="parent" data-parent="<?=$parent?>" data-child="<?=$oldparent?>">
					<?=$arItem["TEXT"]?> <span class="direction fa fa-chevron-right"></span>
				</div>
				<? endif; ?>
				
				<ul data-parent="<?=$parent?>"  data-child="<?=$oldparent?>">
					<div class="child" data-parent="<?=$parent?>">
						<span data-text_script="<?=GetMessage('BXR_PUSH_MENU_LEFT')?>"></span> <span class="direction fa fa-chevron-left"></span>
					</div>
					<div class="child-title">
					<? if(in_array($arItem['PARAMS']['ID'], getIndexes())): ?>
						<a href="<?=$arItem["LINK"]?>" text-js="<?=$arItem["TEXT"]?>"></a>
					<? else: ?>
						<a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
					<? endif; ?>
					</div>

					<?else:?>

						<li>
						<? if(in_array($arItem['PARAMS']['ID'], getIndexes())): ?>
							<a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>" text-js="<?=$arItem["TEXT"]?>"></a>
						<? else: ?>
							<a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
						<? endif; ?>
						</li>
						
					<?endif?>

					<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

					<?endforeach?>

					<?if ($previousLevel > 1)://close last item tags?>
						<?=str_repeat("</ul>", ($previousLevel-1) );?>
					<?endif?>

				</ul>
				<?endif?>




		</div>
	</div>

</nav>

<?
//$this->AddExternalCSS($this->GetFolder().'/theme/dark.css');

?>


