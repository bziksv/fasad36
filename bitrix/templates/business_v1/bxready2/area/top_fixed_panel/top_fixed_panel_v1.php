<div class="top_fixed_panel top_fixed_panel_v1">
	<? global $APPLICATION;?>
	<div class="bxr-full-width bxr-container-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-3 bxr-element-row-middle"><div class="bxr-element-col-middle">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"named_area",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/logo.php",
							"INCLUDE_PTITLE" => GetMessage("GHANGE_LOGO")
						),
						false
					);?>
				</div></div>
				<div class="col-lg-10 col-md-10 col-sm-9 bxr-built-menu bxr-element-row-middle"><div class="bxr-element-col-middle">
                                    <?
                                    $params = json_decode($_REQUEST["inv"], true);
                                    \Alexkova\Bxready2\Area::showArea("top_menu", "menu_v1_for_fixed.disabled", true, $params["site"], $params["template"], $params["templatePath"]);
                                    ?>
				</div></div>
				<div class="clearfix"></div>
			</div>
		</div>

	</div>
</div>
<script>
	$(document).on(
		'BXReady.FixedPanel.onCreate',
		'#bxr-top-fixed-panel',
		function(e){
                    if(window.BXReady.Business.Menu) {
                        window.BXReady.Business.Menu.resize($(this).find("ul.bxr-flex-menu"));
                        window.BXReady.Business.Menu.searchForm($(this).find("ul.bxr-flex-menu"));
		}
                    if(window.BXReady.Business.MenuHoverList)
                        window.BXReady.Business.MenuHoverList.init($(this).find(".bxr-list-hover-menu")); 
		}
	);

        $(document).on(
		'BXReady.FixedPanel.onShow',
		'#bxr-top-fixed-panel',
		function(e){
                    if(window.BXReady.Business.Menu) {
                        window.BXReady.Business.Menu.resize($(this).find("ul.bxr-flex-menu"));
                    }
		}
	);
</script>