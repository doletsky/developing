<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<!--<pre>--><?//=print_r($arResult["SEARCH"])?><!--</pre>-->
<div class="search-page">
<form action="/search.php" method="get">
	<input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40"/>
	&nbsp;<input type="submit" value="<?=GetMessage("SEARCH_GO")?>" />

</form><br />


<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
<?elseif($arResult["ERROR_CODE"]!=0):?>
	<p><?=GetMessage("SEARCH_ERROR")?></p>
	<?ShowError($arResult["ERROR_TEXT"]);?>
	<p><?=GetMessage("SEARCH_CORRECT_AND_CONTINUE")?></p>
	<br /><br />
	<p><?=GetMessage("SEARCH_SINTAX")?><br /><b><?=GetMessage("SEARCH_LOGIC")?></b></p>
	<table border="0" cellpadding="5">
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_OPERATOR")?></td><td valign="top"><?=GetMessage("SEARCH_SYNONIM")?></td>
			<td><?=GetMessage("SEARCH_DESCRIPTION")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_AND")?></td><td valign="top">and, &amp;, +</td>
			<td><?=GetMessage("SEARCH_AND_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_OR")?></td><td valign="top">or, |</td>
			<td><?=GetMessage("SEARCH_OR_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top"><?=GetMessage("SEARCH_NOT")?></td><td valign="top">not, ~</td>
			<td><?=GetMessage("SEARCH_NOT_ALT")?></td>
		</tr>
		<tr>
			<td align="center" valign="top">( )</td>
			<td valign="top">&nbsp;</td>
			<td><?=GetMessage("SEARCH_BRACKETS_ALT")?></td>
		</tr>
	</table>
<?elseif(count($arResult["SEARCH"])>0):?>
	<?if($arParams["DISPLAY_TOP_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
	<br /><hr />
<?foreach($arResult["SEARCH"] as $arItem):?>
    <section id="home-news" class="home-news-area">

        <div class="grid grid-pad">


            <div class="col-1-1">

                <div class="news-box">
                    <div class="news-content">
                        <div class="search-page-pl">
                            <a href="<?echo $arItem["URL"]?>"><div class="news-image" style="background-image: url(<?=$arItem["PIC"]?>);"></div></a>



                            <div class="news-info">

                                <div>
                                    <a href="<?echo $arItem["URL"]?>">
                                        <h3><?echo $arItem["TITLE_FORMATED"]?></h3></a>
                                    <p>
                                        <?=$arItem["TEXT"]?>
                                    </p>
                                    <h6><?=$arItem["DATE_CHANGE"]?></h6>
                                    <a href="/proper-lite/blog_post.html">Смотреть</a>
                                </div>


                            </div>


                        </div>
                    </div>
                </div>

            </div><!-- col -->


        </div><!-- grid -->


    </section>

<!--		<a href="--><?//echo $arItem["URL"]?><!--">--><?//echo $arItem["TITLE_FORMATED"]?><!--</a>-->
<!--		<p>--><?//echo $arItem["BODY_FORMATED"]?><!--</p>-->
<!--		--><?//if (
//			$arParams["SHOW_RATING"] == "Y"
//			&& strlen($arItem["RATING_TYPE_ID"]) > 0
//			&& $arItem["RATING_ENTITY_ID"] > 0
//		):?>
<!--			<div class="search-item-rate">--><?//
//				$APPLICATION->IncludeComponent(
//					"bitrix:rating.vote", $arParams["RATING_TYPE"],
//					Array(
//						"ENTITY_TYPE_ID" => $arItem["RATING_TYPE_ID"],
//						"ENTITY_ID" => $arItem["RATING_ENTITY_ID"],
//						"OWNER_ID" => $arItem["USER_ID"],
//						"USER_VOTE" => $arItem["RATING_USER_VOTE_VALUE"],
//						"USER_HAS_VOTED" => $arItem["RATING_USER_VOTE_VALUE"] == 0? 'N': 'Y',
//						"TOTAL_VOTES" => $arItem["RATING_TOTAL_VOTES"],
//						"TOTAL_POSITIVE_VOTES" => $arItem["RATING_TOTAL_POSITIVE_VOTES"],
//						"TOTAL_NEGATIVE_VOTES" => $arItem["RATING_TOTAL_NEGATIVE_VOTES"],
//						"TOTAL_VALUE" => $arItem["RATING_TOTAL_VALUE"],
//						"PATH_TO_USER_PROFILE" => $arParams["~PATH_TO_USER_PROFILE"],
//					),
//					$component,
//					array("HIDE_ICONS" => "Y")
//				);?>
<!--			</div>-->
<!--		--><?//endif;?>
<!--		<small>--><?//=GetMessage("SEARCH_MODIFIED")?><!-- --><?//=$arItem["DATE_CHANGE"]?><!--</small><br />--><?//
//		if($arItem["CHAIN_PATH"]):?>
<!--			<small>--><?//=GetMessage("SEARCH_PATH")?><!--&nbsp;--><?//=$arItem["CHAIN_PATH"]?><!--</small>--><?//
//		endif;
//		?>
        <hr />
	<?endforeach;?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
	<br />
	<p>
	<?if($arResult["REQUEST"]["HOW"]=="d"):?>
		<a href="<?=$arResult["URL"]?>&amp;how=r<?echo $arResult["REQUEST"]["FROM"]? '&amp;from='.$arResult["REQUEST"]["FROM"]: ''?><?echo $arResult["REQUEST"]["TO"]? '&amp;to='.$arResult["REQUEST"]["TO"]: ''?>"><?=GetMessage("SEARCH_SORT_BY_RANK")?></a>&nbsp;|&nbsp;<b><?=GetMessage("SEARCH_SORTED_BY_DATE")?></b>
	<?else:?>
		<b><?=GetMessage("SEARCH_SORTED_BY_RANK")?></b>&nbsp;|&nbsp;<a href="<?=$arResult["URL"]?>&amp;how=d<?echo $arResult["REQUEST"]["FROM"]? '&amp;from='.$arResult["REQUEST"]["FROM"]: ''?><?echo $arResult["REQUEST"]["TO"]? '&amp;to='.$arResult["REQUEST"]["TO"]: ''?>"><?=GetMessage("SEARCH_SORT_BY_DATE")?></a>
	<?endif;?>
	</p>
<?else:?>
	<?ShowNote(GetMessage("SEARCH_NOTHING_TO_FOUND"));?>
<?endif;?>
</div>