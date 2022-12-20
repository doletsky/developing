<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

       <div class="test-content">
            <h1><?=$arResult["NAME"]?></h1>
<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
            <div class="test-q">
                <div class="question"><span class="numb-q">Вопрос № <b><?=$arElement["SORT"]?></b></span><?=$arElement["NAME"]?>                                         <?if(strlen($arElement["PREVIEW_TEXT"])>0):?>
                                        <br /><?=$arElement["PREVIEW_TEXT"]?>
					<?endif?></div>
                                        Количество возможных ответов - <?=$arElement["DISPLAY_PROPERTIES"]["AQUANT"]["DISPLAY_VALUE"]?><br /><br />
					<input id="qmax" name="qmax" type="hidden" value="<?=$arElement["DISPLAY_PROPERTIES"]["AQUANT"]["DISPLAY_VALUE"]?>" />

                <form action="" class="jClever">
                    <div class="ans">
                        <ul>
						<?foreach($arElement["DISPLAY_PROPERTIES"]["ANS"]["VALUE"] as $k=>$ans):?>
							
								<?if($arElement["DISPLAY_PROPERTIES"]["AQUANT"]["DISPLAY_VALUE"]>1):?>
                                                                        
                                                                         <li><input type="checkbox" name="ans" value="<?=$arElement["DISPLAY_PROPERTIES"]["ANS"]["PROPERTY_VALUE_ID"][$k]?>"><label for=""><?=$ans?></label></li>
									
								<?else:?>
                                                                        
                                                                         <li><input type="radio" name="ans" value="<?=$arElement["DISPLAY_PROPERTIES"]["ANS"]["PROPERTY_VALUE_ID"][$k]?>"><label for=""><?=$ans?></label></li>
									
                                                                <?endif?>
						<?endforeach?>
                        </ul>
                    </div>

                    <div class="not-sel"></div><?=$arResult["NAV_STRING"]?>

                </form>
            </div>
<?endforeach;?>
        </div>
<?if(0):?>
                    <div class="tr-link"><a href="#" title="#">Ответить</a></div>
<pre><?print_r($arResult)?></pre>
<div class="catalog-section">


		<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
					<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
						
						<img border="0" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" /><br />
						
					<?elseif(is_array($arElement["DETAIL_PICTURE"])):?>
						
						<img border="0" src="<?=$arElement["DETAIL_PICTURE"]["SRC"]?>" width="<?=$arElement["DETAIL_PICTURE"]["WIDTH"]?>" height="<?=$arElement["DETAIL_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" /><br />
						
					<?endif?>
					<b><?=$arElement["NAME"]?></b>
                                        <?if(strlen($arElement["PREVIEW_TEXT"])>0):?>
                                        <br /><?=$arElement["PREVIEW_TEXT"]?>
					<?endif?>
                                        <br />Количество возможных ответов - <?=$arElement["DISPLAY_PROPERTIES"]["AQUANT"]["DISPLAY_VALUE"]?><br />
                                                <input id="qmax" name="qmax" type="hidden" value="<?=$arElement["DISPLAY_PROPERTIES"]["AQUANT"]["DISPLAY_VALUE"]?>" />
						<?foreach($arElement["DISPLAY_PROPERTIES"]["ANS"]["VALUE"] as $k=>$ans):?>
							
								<?if($arElement["DISPLAY_PROPERTIES"]["AQUANT"]["DISPLAY_VALUE"]>1):?>
                                                                        
                                                                         <input type="checkbox" name="ans" value="<?=$arElement["DISPLAY_PROPERTIES"]["ANS"]["PROPERTY_VALUE_ID"][$k]?>"><?=$ans?><br />
									
								<?else:?>
                                                                        
                                                                         <input type="radio" name="ans" value="<?=$arElement["DISPLAY_PROPERTIES"]["ANS"]["PROPERTY_VALUE_ID"][$k]?>"><?=$ans?><br />
									
                                                                <?endif?>
						<?endforeach?>

		<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?><?endif?>

<script>
function lr(pstr){
 var lnk=$(".tr-link a").attr('href');
 if(lnk.lastIndexOf("PAGEN=0")<0)location.href=lnk;
 else {
	$('.h-pw').css('display','block');
	$.post('/include/tests/<?=$_REQUEST["TID"]?>/testoff.php',{param:pstr},
		function(data){ 
			
			   $.post('/include/2pdf.php',{fn: '<?=$_REQUEST["PID"]?>_<?=$_REQUEST["UID"]?>_<?=$_REQUEST["TID"]?>'});
			   $.post('/include/2pdf.php',{fn: 'SV_<?=$_REQUEST["PID"]?>'});
			   $.post('/include/2pdf.php',{fn:'<?=$_REQUEST["PID"]?>'});
			   $.post('/include/2pdf.php',{fn:'<?=$_REQUEST["TID"]?>'});
						
				});
	}
  
}
$(".tr-link").click(function () {
   var param='<?=substr($APPLICATION->GetCurPageParam(),32);?>';
   var strsave='';
   var t=0; var m=$("#qmax").val();
   $("input:checked").each(function() {t++;param=param+':'+$(this).val();});
   if(t==0) {$('.not-sel').html('Ответ не выбран');return false;}
   else {
     if(t>m) {$('.not-sel').html('Можно выбрать не более '+m+' ответов!');return false;}
     else {$.post('/include/tests/<?=$_REQUEST["TID"]?>/stepsaver.php',
                 {param:param},
                  function(data){if(data){      lr(param);
						//setTimeout(function(){lr(param)},1000);
						}
                                  else {alert('Server error.'+data);return false;}
                                         });
           }return false;
        }
});
</script>