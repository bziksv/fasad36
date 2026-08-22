<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$this->setFrameMode(true);
$arParams["MAX_WIDTH"] = intval($arParams["MAX_WIDTH"])>0 ? intval($arParams["MAX_WIDTH"]) : 960;
?>

<?if($arParams["USE_FIXED_PANEL"] == "Y"):?>
<script>

	var panelTop = 99999999;

	var mWidth = <?=$arParams["MAX_WIDTH"]?>;

	var isCreate = false;

	BXReady.FixedPanel = {

		init : function(siteID, templateID, templatePath, siteDir){

			if (!BXReady.FixedPanel.isCreate){



				params = JSON.stringify(
                                {
                                    'site' : siteID,
                                    'template' : templateID,
                                    'templatePath' : templatePath,
                                    'siteDir' : siteDir
                                }
				);
				request = $.ajax({
					url: "<?=$this->GetFolder()?>/ajax.php",
					data: {inv: params},
					success: function(data){
                                            $('#bxr-top-fixed-panel').html(data);
                                            panelTop = $('#bxr-top-fixed-panel-anker').position().top;
                                            $('#bxr-top-fixed-panel').trigger('BXReady.FixedPanel.onCreate');
					}
				});
                                
                                BXReady.FixedPanel.isCreate = true;
			};
		},

		show: function(){
			if ($('#bxr-top-fixed-panel').data('show') != '1'){

                            $('#bxr-top-fixed-panel').fadeIn(200);
                            $('#bxr-top-fixed-panel').data('show', '1');
                            $('#bxr-top-fixed-panel').trigger('BXReady.FixedPanel.onShow');
			}
		},

		hide: function(){
			if ($('#bxr-top-fixed-panel').data('show') != '0'){
				$('#bxr-top-fixed-panel').fadeOut(200);
				$('#bxr-top-fixed-panel').data('show', '0');
			}
		}

	};


	$(document).scroll(function(){

		if ($(window).width() < mWidth){
			BXReady.FixedPanel.hide();
			return;
		}

		if ($(document).scrollTop()>panelTop){
			BXReady.FixedPanel.show();
		}else{
			BXReady.FixedPanel.hide();
		}

	});

	$(window).resize(function(){
		if ($(window).width() < mWidth){
			BXReady.FixedPanel.hide();
			return;
		}
	});

</script>

	<a name="bxr-top-fixed-panel-anker" id="bxr-top-fixed-panel-anker"></a>
	<div id="bxr-top-fixed-panel"></div>
	<script>BXReady.FixedPanel.init('<?=SITE_ID?>','<?=SITE_TEMPLATE_ID?>','<?=SITE_TEMPLATE_PATH?>','<?=SITE_DIR?>');</script>
<?endif;?>

