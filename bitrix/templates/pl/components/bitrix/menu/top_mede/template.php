<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
    <ul class="menu">
        <li><a <?if($APPLICATION->GetCurPage()=='/'):?>class="curr" <?endif?>href="/">Главная</a></li>
<?foreach($arResult as $arItem):?>
        <li>
            <a <?if($APPLICATION->GetCurPageParam()==$arItem["LINK"]):?>class="curr" <?endif?>href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
        </li>
<?endforeach?>
        <li><a <?if($APPLICATION->GetCurPage()=='/search.php'):?>class="curr" <?endif?>href="/search.php">Найти</a></li>
    </ul>
