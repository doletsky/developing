<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul id="portfolio" class="inner-960 bottom-15 clearfix">
    <?foreach($arResult["ITEMS"] as $cnt=>$arItem):
//    if($arParams['NEWS_COUNT']==$cnt) break;?>
    <li class="col1-3">
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
</ul>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
    <br /><?=$arResult["NAV_STRING"]?>
<?endif;?>