<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul id="filter" class="alignright">
    <?foreach($arResult as $arItem):?>
        <li <?if($arItem['SELECTED']==1):?>class="current"<?$APPLICATION->SetTitle($arItem["TEXT"]);endif;?>>
            <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a><img src="/images/breadcr-dvdr.gif" alt="">
        </li>
    <?endforeach?>
</ul>