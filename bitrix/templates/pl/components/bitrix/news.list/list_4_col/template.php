<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul id="portfolio" class="inner-960 bottom-15 clearfix">
    <?foreach($arResult["ITEMS"] as $cnt=>$arItem): if($arParams['NEWS_COUNT']==$cnt) break;?>
    <li class="col1-4">
        <div class="project">
            <div class="proj-img">
                <a href="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="prettyPhoto zoom"></a>
                <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"></a>
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" height="200" alt="<?=$arItem["NAME"]?>">
            </div>

            <div class="proj-info">
                <h4><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h4>

                <p><?echo TruncateText($arItem["PREVIEW_TEXT"], 27)?></p>
            </div>
        </div>
    </li>
    <?endforeach?>

<!--    <li class="col1-4">-->
<!--        <div class="project">-->
<!--            <div class="proj-img"><a href="images/content/img220x146-2.jpg" class="prettyPhoto zoom"></a> <a href="detail.php"></a> <img src="images/content/img220x146-2.jpg" alt=""></div>-->
<!---->
<!--            <div class="proj-info">-->
<!--                <h4><a href="detail.php">Consectetur adipisicing elit</a></h4>-->
<!---->
<!--                <p>Et harum quidem rerum facilis est et expedita distinctio ...</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!---->
<!--    <li class="col1-4">-->
<!--        <div class="project">-->
<!--            <div class="proj-img"><a href="images/content/img220x146-3.jpg" class="prettyPhoto zoom"></a> <a href="detail.php"></a> <img src="images/content/img220x146-3.jpg" alt=""></div>-->
<!---->
<!--            <div class="proj-info">-->
<!--                <h4><a href="detail.php">Vel illum qui dolorem</a></h4>-->
<!---->
<!--                <p>Et harum quidem rerum facilis est et expedita distinctio ...</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!---->
<!--    <li class="col1-4">-->
<!--        <div class="project">-->
<!--            <div class="proj-img"><a href="images/content/img220x146-4.jpg" class="prettyPhoto zoom"></a> <a href="detail.php"></a> <img src="images/content/img220x146-4.jpg" alt=""></div>-->
<!---->
<!--            <div class="proj-info">-->
<!--                <h4><a href="detail.php">Quis nostrum exercitationem</a></h4>-->
<!---->
<!--                <p>Et harum quidem rerum facilis est et expedita distinctio ...</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!---->
<!--    <li class="col1-4">-->
<!--        <div class="project">-->
<!--            <div class="proj-img"><a href="images/content/img220x146-5.jpg" class="prettyPhoto zoom"></a> <a href="detail.php"></a> <img src="images/content/img220x146-5.jpg" alt=""></div>-->
<!---->
<!--            <div class="proj-info">-->
<!--                <h4><a href="detail.php">Ut enim ad minima veniam</a></h4>-->
<!---->
<!--                <p>Et harum quidem rerum facilis est et expedita distinctio ...</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!---->
<!--    <li class="col1-4">-->
<!--        <div class="project">-->
<!--            <div class="proj-img"><a href="images/content/img220x146-6.jpg" class="prettyPhoto zoom"></a> <a href="detail.php"></a> <img src="images/content/img220x146-6.jpg" alt=""></div>-->
<!---->
<!--            <div class="proj-info">-->
<!--                <h4><a href="detail.php">Consectetur adipisicing elit</a></h4>-->
<!---->
<!--                <p>Et harum quidem rerum facilis est et expedita distinctio ...</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!---->
<!--    <li class="col1-4">-->
<!--        <div class="project">-->
<!--            <div class="proj-img"><a href="images/content/img220x146-7.jpg" class="prettyPhoto zoom"></a> <a href="detail.php"></a> <img src="images/content/img220x146-7.jpg" alt=""></div>-->
<!---->
<!--            <div class="proj-info">-->
<!--                <h4><a href="detail.php">Vel illum qui dolorem</a></h4>-->
<!---->
<!--                <p>Et harum quidem rerum facilis est et expedita distinctio ...</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
<!---->
<!--    <li class="col1-4">-->
<!--        <div class="project">-->
<!--            <div class="proj-img"><a href="images/content/img220x146-8.jpg" class="prettyPhoto zoom"></a> <a href="detail.php"></a> <img src="images/content/img220x146-8.jpg" alt=""></div>-->
<!---->
<!--            <div class="proj-info">-->
<!--                <h4><a href="detail.php">Quis nostrum exercitationem</a></h4>-->
<!---->
<!--                <p>Et harum quidem rerum facilis est et expedita distinctio ...</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </li>-->
</ul>

<!--<div class="news-list">-->
<?//if($arParams["DISPLAY_TOP_PAGER"]):?>
<!--	--><?//=$arResult["NAV_STRING"]?><!--<br />-->
<?//endif;?>
<?//foreach($arResult["ITEMS"] as $arItem):?>
<!--	--><?//
//	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
//	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
//	?>
<!--	<p class="news-item" id="--><?//=$this->GetEditAreaId($arItem['ID']);?><!--">-->
<!--		--><?//if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
<!--			--><?//if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
<!--				<a href="--><?//=$arItem["DETAIL_PAGE_URL"]?><!--"><img-->
<!--						class="preview_picture"-->
<!--						border="0"-->
<!--						src="--><?//=$arItem["PREVIEW_PICTURE"]["SRC"]?><!--"-->
<!--						width="--><?//=$arItem["PREVIEW_PICTURE"]["WIDTH"]?><!--"-->
<!--						height="--><?//=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?><!--"-->
<!--						alt="--><?//=$arItem["PREVIEW_PICTURE"]["ALT"]?><!--"-->
<!--						title="--><?//=$arItem["PREVIEW_PICTURE"]["TITLE"]?><!--"-->
<!--						style="float:left"-->
<!--						/></a>-->
<!--			--><?//else:?>
<!--				<img-->
<!--					class="preview_picture"-->
<!--					border="0"-->
<!--					src="--><?//=$arItem["PREVIEW_PICTURE"]["SRC"]?><!--"-->
<!--					width="--><?//=$arItem["PREVIEW_PICTURE"]["WIDTH"]?><!--"-->
<!--					height="--><?//=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?><!--"-->
<!--					alt="--><?//=$arItem["PREVIEW_PICTURE"]["ALT"]?><!--"-->
<!--					title="--><?//=$arItem["PREVIEW_PICTURE"]["TITLE"]?><!--"-->
<!--					style="float:left"-->
<!--					/>-->
<!--			--><?//endif;?>
<!--		--><?//endif?>
<!--		--><?//if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
<!--			<span class="news-date-time">--><?//echo $arItem["DISPLAY_ACTIVE_FROM"]?><!--</span>-->
<!--		--><?//endif?>
<!--		--><?//if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
<!--			--><?//if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
<!--				<a href="--><?//echo $arItem["DETAIL_PAGE_URL"]?><!--"><b>--><?//echo $arItem["NAME"]?><!--</b></a><br />-->
<!--			--><?//else:?>
<!--				<b>--><?//echo $arItem["NAME"]?><!--</b><br />-->
<!--			--><?//endif;?>
<!--		--><?//endif;?>
<!--		--><?//if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
<!--			--><?//echo $arItem["PREVIEW_TEXT"];?>
<!--		--><?//endif;?>
<!--		--><?//if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
<!--			<div style="clear:both"></div>-->
<!--		--><?//endif?>
<!--		--><?//foreach($arItem["FIELDS"] as $code=>$value):?>
<!--			<small>-->
<!--			--><?//=GetMessage("IBLOCK_FIELD_".$code)?><!--:&nbsp;--><?//=$value;?>
<!--			</small><br />-->
<!--		--><?//endforeach;?>
<!--		--><?//foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
<!--			<small>-->
<!--			--><?//=$arProperty["NAME"]?><!--:&nbsp;-->
<!--			--><?//if(is_array($arProperty["DISPLAY_VALUE"])):?>
<!--				--><?//=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
<!--			--><?//else:?>
<!--				--><?//=$arProperty["DISPLAY_VALUE"];?>
<!--			--><?//endif?>
<!--			</small><br />-->
<!--		--><?//endforeach;?>
<!--	</p>-->
<?//endforeach;?>
<?//if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
<!--	<br />--><?//=$arResult["NAV_STRING"]?>
<?//endif;?>
<!--</div>-->
