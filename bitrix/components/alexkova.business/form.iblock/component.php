<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var $this \Alexkova\Corporate\FormIblockComponent */

global $BXR_FORM_COUNTER;

if (intval($BXR_FORM_COUNTER)<=0)
	$BXR_FORM_COUNTER = 1;
else
	$BXR_FORM_COUNTER ++;

$arParams["IDENTITY"] = $BXR_FORM_COUNTER;
$arParams["POST_FORM_URI"] = $this->getPath().'/ajax/form.php';

$_SESSION["ALEXKOVA.BUSINESS"]["FORMS_PARAM"][$arParams["IBLOCK_ID"]."_".$BXR_FORM_COUNTER] = serialize($arParams);

$this->includeComponentTemplate();

ob_start();
?>

<?if ($BXR_FORM_COUNTER<2):?>
	<script>
		BX.ready(function(){

			window.BXReady.Business.showFormSuccess = function(formId, data){
				data = '<div class="answer">' + data + '</div>'
				$('#ajaxFormContainer_'+formId).html(data);
			};

			window.BXReady.Business.formRefresh = function (formId) {
				window.BXReady.showAjaxShadow("#ajaxFormContainer_" + formId,"ajaxFormContainerShadow" + formId);
				BX.ajax.submit(BX("iblockForm" + formId),function(data){
					window.BXReady.closeAjaxShadow("ajaxFormContainerShadow" + formId);

					dataInc = data.replace(/<div[^>]+>/gi, '');//strip_tags

					if(dataInc.substr(0,7) === 'success')
					{
						window.BXReady.Business.showFormSuccess(formId,data.substr(7,data.lenght))
						return false;
					}
					BX('ajaxFormContainer_' + formId).innerHTML = data;
				});
				return false;
			};

			$(document).on(
				'show.bs.modal',
				'.modal',
				function(e){
//					console.log(e.relatedTarget);
                                        dataAttr = $(e.relatedTarget).data();
                                        delete dataAttr.target;
                                        delete dataAttr.toggle;
//                                        console.log(dataAttr);
					attr = $(this).attr('id');
					formId =  $('#'+attr+' .modal-body').data('form');
					bodyId = $('#'+attr+' .modal-body').attr('id');

					$.ajax(
						{
							url: '<?=$arParams["POST_FORM_URI"]?>',
							data: 'FORM_ID='+formId+'&DATA='+JSON.stringify(dataAttr),
							success: function(data){
								$('#'+bodyId).html(data);
							}
						}
					);
				}
			);
		});
	</script>
<?endif;?>
<?
$GLOBALS["APPLICATION"]->AddHeadString(ob_get_clean(),true);
?>